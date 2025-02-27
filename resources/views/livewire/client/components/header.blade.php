<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700"
    wire:poll.10s>
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center justify-start rtl:justify-end">
            <div x-data="{ showButton: ['/sach', '/tai-lieu'].includes(window.location.pathname) }">
                <button x-show="showButton" @click="sidebarOpen = !sidebarOpen"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
            </div>

            <a href="/" class="flex ms-2 md:me-24">
                <img src="https://itc.edu.vn/Data/Sites/1/media/img/logo.png" class="h-8 me-3" alt="FlowBite Logo" />
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"
                    style="font-family: 'Pacifico', cursive;">ITCLib</span>
            </a>
        </div>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-5"
            x-data="{ navbarOpen: false }">
            @if(Auth::guard('student')->check())
            <!-- Menu dành cho Sinh viên -->
            <div class="relative" x-data="{ open: false }">
                <button type="button" @click="open = !open"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    :aria-expanded="open.toString()">
                    <span class="sr-only">Open user menu</span>
                    <img src="https://ui-avatars.com/api/{{ Auth::guard('student')->user()->ho_ten }}"
                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-300 dark:border-gray-600 shadow-md"
                        alt="avatar">
                </button>
                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 z-50 mt-2 w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    style="display: none;">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">
                            {{ Auth::guard('student')->user()->ho_ten }}
                        </span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ Auth::guard('student')->user()->email }}
                        </span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="/lich-su-muon" wire:navigate
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Lịch sử mượn sách / tài liệu</a>
                        </li>
                        <li>
                            <a href="/tai-khoan" wire:navigate
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Quản lý tài khoản</a>
                        </li>
                        <li>
                            <div class="block px-4 text-sm">
                                @livewire('theme-switcher')
                            </div>
                        </li>
                        <li>
                            <a href="/logout" wire:navigate
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
            @elseif(Auth::guard('web')->check())
            <!-- Menu dành cho Admin -->
            <div class="relative" x-data="{ open: false }">
                <button type="button" @click="open = !open"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    :aria-expanded="open.toString()">
                    <span class="sr-only">Open user menu</span>
                    <img src="https://ui-avatars.com/api/{{ Auth::guard('web')->user()->name }}"
                        class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border border-gray-300 dark:border-gray-600 shadow-md"
                        alt="avatar">
                </button>
                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 z-50 mt-2 w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    style="display: none;">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">
                            {{ Auth::guard('web')->user()->name }}
                        </span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ Auth::guard('web')->user()->email }}
                        </span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="/admin" wire:navigate
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Quản lý hệ thống</a>
                        </li>
                        <li>
                            <div class="block px-4 text-sm">
                                @livewire('theme-switcher')
                            </div>
                        </li>
                        <li>
                            <a href="/logout" wire:navigate
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>

            @else
            <!-- Hiển thị khi chưa đăng nhập -->
            <div class="pt-3 md:pt-0 md:block hidden">
                <a href="/login"
                    class="py-2 px-3 sm:py-2.5 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <span class="sm:inline">Đăng nhập</span>
                </a>
            </div>
            @endif

            <!-- Nút toggle cho menu mobile -->
            <button @click="navbarOpen = !navbarOpen" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" :aria-expanded="navbarOpen.toString()">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div x-show="navbarOpen" @click.away="navbarOpen = false"
                x-transition:enter="transition transform ease-out duration-300"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform ease-in duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="absolute top-16 right-0 w-52 bg-white border border-gray-200 rounded-lg shadow-lg md:hidden dark:bg-gray-800 dark:border-gray-700 m-2"
                x-cloak>
                <ul class="flex flex-col font-medium p-4 space-y-2">
                    <li>
                        <a wire:navigate href="/"
                            class="block py-2 px-3 {{ request()->is('/') ? 'text-white bg-gray-400 ' : 'dark:text-white' }} hover:text-white rounded">Trang
                            chủ</a>
                    </li>
                    <li>
                        <a wire:navigate href="/sach"
                            class="block py-2 px-3 {{ request()->is('sach') ? 'text-white bg-gray-400' : 'dark:text-white' }} hover:text-white rounded">Sách</a>
                    </li>
                    <li>
                        <a wire:navigate href="/tai-lieu"
                            class="block py-2 px-3 {{ request()->is('tai-lieu') ? 'text-white bg-gray-400' : 'dark:text-white' }} hover:text-white rounded">Tài
                            liệu</a>
                    </li>
                    <li>
                        <a wire:navigate href="/de-xuat"
                            class="block py-2 px-3 {{ request()->is('de-xuat') ? 'text-white bg-gray-400' : 'dark:text-white' }} hover:text-white rounded">Đề
                            xuất sách/tài liệu</a>
                    </li>
                    <li>
                        <a wire:navigate href="/lien-he"
                            class="block py-2 px-3 {{ request()->is('lien-he') ? 'text-white bg-gray-400' : 'dark:text-white' }} hover:text-white rounded">Liên
                            hệ</a>
                    </li>
                    <li>
                        <a wire:navigate href="/phan-hoi"
                            class="block py-2 px-3 {{ request()->is('phan-hoi') ? 'text-white bg-gray-400' : 'dark:text-white' }} hover:text-white rounded">Phản
                            hồi</a>
                    </li>
                    @if(!Auth::guard('student')->check())
                    <li>
                        <div class="pt-3 md:pt-0">
                            <a href="/login"
                                class="py-2 px-3 sm:py-2.5 sm:px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                <span class="sm:inline">Đăng nhập</span>
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>


        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800 dark:border-gray-700">
                <li>
                    <a wire:navigate href="/sach"
                        class="block py-2 px-3 {{ request()->is('sach') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0"
                        aria-current="page">Sách</a>
                </li>
                <li>
                    <a wire:navigate href="/tai-lieu"
                        class="block py-2 px-3 {{ request()->is('tai-lieu') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0">Tài
                        liệu</a>
                </li>
                <li>
                    <a wire:navigate href="/de-xuat"
                        class="block py-2 px-3 {{ request()->is('de-xuat') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0">Đề
                        xuất sách/tài liệu</a>
                </li>
                <li>
                    <a wire:navigate href="/lien-he"
                        class="block py-2 px-3 {{ request()->is('lien-he') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0">Liên
                        hệ</a>
                </li>
                <li>
                    <a wire:navigate href="/phan-hoi"
                        class="block py-2 px-3 {{ request()->is('phan-hoi') ? 'text-blue-700 ' : 'dark:text-white' }} md:hover:bg-transparent md:hover:text-blue-700 rounded md:bg-transparent md:p-0">Phản
                        hồi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>