<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use App\Models\TempTransaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    //referred users list
    public function refrellUsers()
    {
        return view('admin.referred-users.index');
    }

    //referred users datatable
    public function refrellUsersDatatable()
    {
        //auth user
        $user = auth()->user();
        $refrellUsers = User::where('referred_by', $user->id)->get();
        return datatables()->of($refrellUsers)->make(true);
    }

    //all users list
    public function users()
    {
        return view('admin.users.index');
    }

    //all users datatable
    public function usersDatatable()
    {
        $users = User::where('role', '!=', 'admin')->get();

        return datatables()->of($users)->make(true);
    }

    //update role
    public function updateRole(Request $request)
    {
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();
        return response()->json(['success' => 'Role updated successfully']);
    }

    //edit
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    //update
    public function update(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->city = $request->city;
        $user->save();

        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    //delete
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        //all kyc of user delete

        $allkyc = Kyc::where('user_id', $id)->get();
        foreach ($allkyc as $kyc) {
            $kyc->delete();            
        }


        return redirect()->route('users')->with('success', 'User deleted successfully');
    }

    // KYC add by admin
    public function addByAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.kyc', compact('user'));
    }

    //referalLink
    public function referalLink()
    {
        $user = auth()->user();
        $referralLink = url('/register' .'/'. $user->affiliate_code);
        return view('admin.referal-link.index', compact('referralLink'));
    }

    // bank deatails
    public function bankDetails()
    {
        return view('admin.users.bank-details');
    }

    //add money approval
    public function addMoneyApproval($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.add-money-approval', compact('user', 'id'));
    }

    //add money approval store
    public function addMoneyApprovalStore(Request $request)
    {
        $request->validate([
            'money' => 'required',
            'received_date' => 'required',
        ]);

        $tempTransaction = new TempTransaction();
        $tempTransaction->user_id = $request->user_id;
        $tempTransaction->money = $request->money;
        $tempTransaction->received_date = $request->received_date;
        $tempTransaction->save();
        return redirect()->route('users')->with('success', 'Money added successfully');
    }


    //student list of money approval
    public function studentMoneyApproval()
    {
        return view('admin.student-money-approval.index');
    }

    //student list of money approval datatable
    public function studentMoneyApprovalDatatable()
    {
        // $tempTransactions = TempTransaction::all();

        // join the user table with temp_transactions table
        $tempTransactions = TempTransaction::join('users', 'temp_transactions.user_id', '=', 'users.id')
            ->select('temp_transactions.*', 'users.first_name', 'users.last_name', 'users.email')
            ->get();
        
        return datatables()->of($tempTransactions)->make(true);
    }
}
