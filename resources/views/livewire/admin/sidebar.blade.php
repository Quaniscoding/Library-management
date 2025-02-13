<!-- Sidebar -->
<aside
    class="bg-white dark:bg-gray-700 dark-mode text-black dark:text-white w-full md:w-64 min-h-[80vh] flex flex-col justify-between ml-2 shadow-md rounded-md">
    <div>
        <!-- Header -->
        <div
            class="p-4 text-lg font-semibold border-b border-gray-700 dark:border-gray-600 flex flex-col items-center justify-center">
            <div>
                <img src="/images/logo.png" alt="" class="h-[80px]">
            </div>
            <h1 class="text-lg font-bold text-gray-900 dark:text-white mt-2">Quản lý thư viện</h1>
        </div>

        <!-- Navigation -->
        <nav class="flex flex-col p-4 space-y-2 overflow-auto">
            <!-- Dashboard -->
            <a href="/admin"
                class="block px-3 py-2 rounded-md 
            {{ request()->is('admin') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                Dashboard
            </a>
            @role('admin')
            <!-- Quản lý Người dùng -->
            <div x-data="{ open: window.location.pathname.startsWith('/admin/manage-user') || 
                      window.location.pathname.startsWith('/admin/manage-roles') || 
                      window.location.pathname.startsWith('/admin/manage-permissions') || 
                      window.location.pathname.startsWith('/admin/manage-rolehaspermission') }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700">
                    Người dùng
                    <span x-show="!open">▼</span>
                    <span x-show="open">▲</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-user"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-user') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Users
                    </a>
                    <a href="/admin/manage-roles"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-roles') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Roles
                    </a>
                    <a href="/admin/manage-permissions"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-permissions') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Permissions
                    </a>
                    <a href="/admin/manage-rolehaspermission"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-rolehaspermission') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Role has Permission
                    </a>
                </div>
            </div>

            <!-- Quản lý Sinh viên -->
            <div x-data="{ open: window.location.pathname.startsWith('/admin/manage-sinhvien') }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700">
                    Sinh viên
                    <span x-show="!open">▼</span>
                    <span x-show="open">▲</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-sinhvien"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-sinhvien') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Sinh viên
                    </a>
                </div>
            </div>

            <!-- Quản lý Khoa/Nhân viên -->
            <div x-data="{ open: window.location.pathname.startsWith('/admin/manage-khoa') ||
            window.location.pathname.startsWith('/admin/manage-nganh') ||
            window.location.pathname.startsWith('/admin/manage-bophan') ||
            window.location.pathname.startsWith('/admin/manage-nhanvien') }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700">
                    Khoa và Nhân viên
                    <span x-show="!open">▼</span>
                    <span x-show="open">▲</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-khoa"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-khoa') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Khoa
                    </a>
                    <a href="/admin/manage-nganh"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-nganh') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Ngành
                    </a>
                    <a href="/admin/manage-bophan"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-bophan') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Bộ phận
                    </a>
                    <a href="/admin/manage-nhanvien"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-nhanvien') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Nhân viên
                    </a>
                </div>
            </div>
            @endrole

            <!-- Quản lý Sách -->
            <div x-data="{ open: window.location.pathname.startsWith('/admin/manage-sach') ||
            window.location.pathname.startsWith('/admin/manage-vitrisach') ||
            window.location.pathname.startsWith('/admin/manage-monhoc')  || 
            window.location.pathname.startsWith('/admin/manage-cuonsach')  ||
            window.location.pathname.startsWith('/admin/manage-datsach') }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700">
                    Sách
                    <span x-show="!open">▼</span>
                    <span x-show="open">▲</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-sach"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-sach') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Sách
                    </a>
                    <a href="/admin/manage-datsach"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-datsach') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Đặt sách
                    </a>
                    <a href="/admin/manage-vitrisach"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-vitrisach') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Vị trí sách
                    </a>
                    <a href="/admin/manage-monhoc"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-monhoc') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Môn Học
                    </a>
                    <a href="/admin/manage-cuonsach"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-cuonsach') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Cuốn Sách
                    </a>
                </div>
            </div>

            <!-- Quản lý Phiếu -->
            <div x-data="{ open: window.location.pathname.startsWith('/admin/manage-phieumuon') ||
            window.location.pathname.startsWith('/admin/manage-phieutra') ||
            window.location.pathname.startsWith('/admin/manage-phat') ||
            window.location.pathname.startsWith('/admin/manage-hoadonphat') }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700">
                    Phiếu
                    <span x-show="!open">▼</span>
                    <span x-show="open">▲</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-phieumuon"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-phieumuon') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Phiếu mượn
                    </a>
                    <a href="/admin/manage-phieutra"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-phieutra') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Phiếu trả
                    </a>
                    <a href="/admin/manage-phat"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-phat') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Phạt
                    </a>
                    <a href="/admin/manage-hoadonphat"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-hoadonphat') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Hóa đơn phạt
                    </a>
                </div>
            </div>

            <!-- Quản lý Tài liệu -->
            <div x-data="{ open: window.location.pathname.startsWith('/admin/manage-tailieumo') }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700">
                    Tài liệu
                    <span x-show="!open">▼</span>
                    <span x-show="open">▲</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-tailieumo"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-tailieumo') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Tài liệu mở
                    </a>
                </div>
            </div>

            <!-- Các quản lý khác -->
            <div x-data="{ open: window.location.pathname.startsWith('/admin/manage-nhaxuatban') ||
            window.location.pathname.startsWith('/admin/manage-tacgia') ||
            window.location.pathname.startsWith('/admin/manage-theloai') ||
            window.location.pathname.startsWith('/admin/manage-dexuat') ||
            window.location.pathname.startsWith('/admin/manage-phanhoi') }">
                <button @click="open = !open"
                    class="flex justify-between items-center w-full px-3 py-2 text-left rounded-md text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700">
                    Khác
                    <span x-show="!open">▼</span>
                    <span x-show="open">▲</span>
                </button>
                <div x-show="open" class="space-y-2 pl-4">
                    <a href="/admin/manage-nhaxuatban"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-nhaxuatban') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Nhà xuất bản
                    </a>
                    <a href="/admin/manage-tacgia"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-tacgia') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Tác giả
                    </a>
                    <a href="/admin/manage-theloai"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-theloai') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Thể loại
                    </a>
                    <a href="/admin/manage-dexuat"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-dexuat') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Quản lý đề xuất sách, tài liệu
                    </a>
                    <a href="/admin/manage-phanhoi"
                        class="block px-3 py-2 rounded-md 
                    {{ request()->is('admin/manage-phanhoi') ? 'bg-gray-400 text-blue-500 dark:bg-gray-600 dark:text-blue-300' : 'text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700' }}">
                        Quản lý phản hồi
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Xin chào! {{ auth()->user()->name }}</span>
        </div>
        <ul class="py-2">
            <li>
                <a href="/" wire:navigate
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    Quay lại trang chủ</a>
            </li>
            <li>
                <div class="block px-4 text-sm text-gray-900 dark:text-white">
                    @livewire('theme-switcher')
                </div>
            </li>
            <li>
                <a href="/admin/logout" wire:navigate
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Đăng
                    xuất</a>
            </li>
        </ul>
    </div>
</aside>