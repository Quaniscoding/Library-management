<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-gray-200">
    <h1 class="text-center font-bold text-2xl mb-6 dark:text-white">Quản lý người dùng</h1>

    <!-- Button Tạo Người Dùng Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            Tạo người dùng mới
        </button>
    </div>

    <!-- Bảng Quản Lý Người Dùng -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo tên"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
            </div>
        </div>
        <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">ID</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tên</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Email</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Email Đã Xác Minh</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Mật khẩu</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Ngày tạo</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Ngày cập nhật</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">{{ $user->id }}</td>
                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">{{ $user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">{{ $user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $user->email_verified_at ? '✔' : '✘' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">{{ $user->password }}</td>
                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">
                        {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-600">
                        {{ \Carbon\Carbon::parse($user->createdupdated_at_at)->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2 dark:border-gray-600">
                        <button wire:click="editUser({{ $user->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $user->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-800">
                            Xoá
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tạo/Cập nhật Người Dùng -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 dark:bg-gray-800 dark:text-white">
            <h2 class="text-xl font-bold mb-4">
                {{ $isEditMode ? 'Cập nhật người dùng' : 'Tạo người dùng mới' }}
            </h2>
            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateUser' : 'createUser' }}">
                <div class="mb-4">
                    <label for="name" class="block font-semibold">Tên</label>
                    <input type="text" id="name" wire:model.defer="name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-semibold">Email</label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                @if (!$isEditMode)
                <div class="mb-4">
                    <label for="password" class="block font-semibold">Mật khẩu</label>
                    <input type="password" id="password" wire:model.defer="password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                @endif
                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                        Huỷ
                    </button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Xác Nhận Xóa Người Dùng -->
    <div x-data="{ open: @entangle('isConfirmModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 dark:bg-gray-800 dark:text-white">
            <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Xác nhận xóa</h2>
            <p class="text-center mb-6 dark:text-gray-300">
                Bạn có chắc chắn muốn xóa người dùng này không?
            </p>
            <p class="text-center mb-6 dark:text-gray-300">
                Thao tác này không thể hoàn tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                    Huỷ
                </button>
                <button type="button" wire:click="deleteUser"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    <!-- Phân Trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($users->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">
                Previous
            </span>
            @else
            <a href="{{ $users->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                Previous
            </a>
            @endif

            <!-- Page Numbers -->
            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
            @if ($page == $users->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 rounded-md dark:bg-blue-500 dark:text-white">
                {{ $page }}
            </span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100 dark:border-gray-600 dark:text-blue-300 dark:hover:bg-gray-700">
                {{ $page }}
            </a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($users->hasMorePages())
            <a href="{{ $users->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                Next
            </a>
            @else
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">
                Next
            </span>
            @endif
        </div>
    </div>
</main>