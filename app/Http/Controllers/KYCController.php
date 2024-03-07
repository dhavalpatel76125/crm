<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\KYCApproved;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KYCController extends Controller
{
    public function index()
    {
        return view('admin.kyc.index');
    }

    // kyc datatable
    public function datatable()
    {
        //only current user kyc
        $kyc = Kyc::with('user')->where('user_id', auth()->user()->id)->get();

        return datatables()->of($kyc)->make(true);
    }


    //store
    public function store(Request $request)
    {

        $user = auth()->user();
        $userId = $user->id;
        $request->validate([
            'title' => 'required',
            'document_type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $kyc = new Kyc();
        $kyc->user_id = $userId;
        $kyc->title = $request->title;
        $kyc->document_type = $request->document_type;
        $kyc->image = $imageName;
        $kyc->expiry_date = $request->expiry_date;
        $kyc->save();

        return redirect()->back()->with('success', 'KYC uploaded successfully');
    }

    //edit ajx
    public function edit($id)
    {
        $kyc = Kyc::findOrFail($id);
        return response()->json($kyc);
    }

    //update
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'document_type' => 'required',
            'expiry_date' => 'required|date',
        ]);



        $kyc = Kyc::findOrFail($id);

        // if image is not empty
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $kyc->image = $imageName;
        }

        $kyc->title = $request->title;
        $kyc->document_type = $request->document_type;
        $kyc->expiry_date = $request->expiry_date;
        $kyc->save();

        return redirect()->back()->with('success', 'KYC updated successfully');
    }

    // all users kyc
    public function allUsersKyc()
    {
        return view('admin.users.all_users_kyc');
    }

    // all users kyc datatable
    public function allUsersKycDatatable()
    {
        //all users kyc
        $kyc = Kyc::with('user')->get();

        return datatables()->of($kyc)->make(true);
    }


    //updateStatus
    public function updateStatus(Request $request, $id)
    {

        $kyc = Kyc::findOrFail($id);
        $kyc->status = $request->status;
        $status = $request->status;
        $kyc->save();

        $user = $kyc->user;
        $email = $user->email;
        $name = $user->first_name;
        $recipient = $email;

        //send mail 
        Mail::to($recipient)->send(new KYCApproved($status, $name));

        return response()->json(['success' => 'Status updated successfully']);
    }

    // KYC add by admin
    public function addByAdmin($id)
    {
        return view('admin.users.kyc', compact('id'));
    }


    // KYC store by admin
    public function storeByAdmin(Request $request)
    {

        $userId = $request->user_id;
        $request->validate([
            'title' => 'required',
            'document_type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $kyc = new Kyc();
        $kyc->user_id = $userId;
        $kyc->title = $request->title;
        $kyc->document_type = $request->document_type;
        $kyc->image = $imageName;
        $kyc->expiry_date = $request->expiry_date;
        $kyc->status = 'approved';
        $kyc->save();

        return redirect()->route('users.kyc')->with('success', 'KYC uploaded successfully');
    }
}
