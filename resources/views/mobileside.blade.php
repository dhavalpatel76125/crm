        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <img src="{{ asset('images/black_logo.png') }}" alt="Big Bull Image" class="w-32 h-auto sm:w-24 sm:h-auto">

                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="{{ url('/dashboard') }}"
                    class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                @if (Auth::user()->role == 'admin')
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-600 text-white"
                        onclick="dropdown()">
                        <div class="flex justify-between w-full items-center">
                            <span class="text-[15px] ml-4 text-white font-bold">
                                <i class="fas fa-user-alt mr-3"></i>All Users
                            </span>
                            <span class="text-sm rotate-180" id="arrow">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                    <div class="text-left text-sm mt-2 w-4/5 mx-auto text-white font-bold" id="submenu">
                        <a href="{{ url('/users') }}" class="block p-2 hover:bg-blue-600 rounded-md mt-1">
                            Users
                        </a>
                        <a href="{{ url('/users/kyc') }}" class="block p-2 hover:bg-blue-600 rounded-md mt-1">
                            Users Kyc
                        </a>
                        <a href="{{ url('/students/money-approval') }}"
                            class="block p-2 hover:bg-blue-600 rounded-md mt-1">
                            Money Approval List
                        </a>
                    </div>
                    <a href="{{ url('/courses') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-align-left mr-3"></i>
                        Courses
                    </a>
                    <a href="{{ url('/batches') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-tasks mr-3"></i>
                        Batches
                    </a>
                @endif
                @if (Auth::user()->role == 'user')
                    <a href="#"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-wallet mr-3"></i>
                        My Wallet
                    </a>
                    <a href="{{ url('/kyc') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-file mr-3"></i>
                        KYC And Payment Documents
                    </a>
                    <a href="{{ url('/referral') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        Referral Students
                    </a>
                    <a href="{{ url('/allcourses') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-book-open mr-3"></i>
                        Courses
                    </a>
                    <a href="{{ url('/referal-link') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-link mr-3"></i>
                        My Referral Link
                    </a>
                    <a href="#"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-rupee-sign mr-3"></i>
                        Payments
                    </a>
                    <a href="{{ url('/bank-details') }}"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-rupee-sign mr-3"></i>
                        Bank Details
                    </a>
                @endif
            </nav>
        </header>
