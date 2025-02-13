<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-gray-200">
    <h1 class="text-center font-bold text-2xl mb-6 dark:text-white">Quản lý Roles has permission</h1>

    <!-- Button Tạo Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            Tạo mới
        </button>
    </div>

    <!-- Bảng Quản Lý -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tên Role</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tên Permission</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $data->role->name ?? 'N/A' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $data->permission->name ?? 'N/A' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2 dark:border-gray-600">
                        <button wire:click="editData({{ $data->role_id }}, {{ $data->permission_id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $data->role_id }}, {{ $data->permission_id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-800">
                            Xoá
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tạo/Cập nhật -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 dark:bg-gray-800 dark:text-white">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    {{ $isEditMode ? 'Cập nhật' : 'Tạo mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>
            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateData' : 'createData' }}" class="h-auto overflow-auto">
                <div class="mb-4">
                    <label for="role_id" class="block font-semibold">Role</label>
                    <select id="role_id" wire:model.defer="role_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">-- Chọn Role --</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="permission_id" class="block font-semibold">Permission</label>
                    <select id="permission_id" wire:model.defer="permission_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">-- Chọn Permission --</option>
                        @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permission_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
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

    <!-- Modal Xác Nhận Xóa -->
    <div x-data="{ open: @entangle('isConfirmModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 dark:bg-gray-800 dark:text-white">
            <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Xác nhận xóa</h2>
            <p class="text-center mb-6 dark:text-gray-300">Bạn có chắc chắn muốn xóa không?</p>
            <p class="text-center mb-6 dark:text-gray-300">Thao tác này không thể hoàn tác.</p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                    Huỷ
                </button>
                <button type="button" wire:click="deleteData"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-800">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    <!-- Phân Trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($datas->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">
                Previous
            </span>
            @else
            <a href="{{ $datas->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                Previous
            </a>
            @endif

            <!-- Page Numbers -->
            @foreach ($datas->getUrlRange(1, $datas->lastPage()) as $page => $url)
            @if ($page == $datas->currentPage())
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
            @if($datas->hasMorePages())
            <a href="{{ $datas->nextPageUrl() }}"
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