<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-white" wire:poll.10s>
    <h1 class="text-center font-bold text-2xl mb-6 text-gray-900 dark:text-white">Quản lý Khoa</h1>

    <!-- Button Tạo Khoa Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Tạo khoa mới
        </button>
    </div>

    <!-- Bảng Quản Lý Khoa -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo tên"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-600">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">ID</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Tên khoa</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Địa chỉ</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Số điện thoại</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Email</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($khoas as $khoa)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-gray-100">
                        {{ $khoa->id }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-gray-100">
                        {{ $khoa->ten_khoa }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-gray-100">
                        {{ $khoa->dia_chi }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-gray-100">
                        {{ $khoa->sdt }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-gray-100">
                        {{ $khoa->email }}
                    </td>
                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="editKhoa({{ $khoa->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:hover:bg-yellow-600">Sửa</button>
                        <button wire:click="openConfirmModal({{ $khoa->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:hover:bg-red-700">Xoá</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6"
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-gray-100">
                        Không có dữ liệu khoa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Tạo/Cập Nhật -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">
                    {{ $isEditMode ? 'Cập nhật khoa' : 'Tạo khoa mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateKhoa' : 'createKhoa' }}" class="h-auto overflow-auto">
                <div class="mb-4">
                    <label for="ten_khoa" class="block font-semibold text-gray-900 dark:text-white">Tên khoa</label>
                    <input type="text" id="ten_khoa" wire:model.defer="ten_khoa"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md px-3 py-2">
                    @error('ten_khoa') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="dia_chi" class="block font-semibold text-gray-900 dark:text-white">Địa chỉ</label>
                    <input type="text" id="dia_chi" wire:model.defer="dia_chi"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md px-3 py-2">
                    @error('dia_chi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="sdt" class="block font-semibold text-gray-900 dark:text-white">Số điện thoại</label>
                    <input type="text" id="sdt" wire:model.defer="sdt"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md px-3 py-2">
                    @error('sdt') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-semibold text-gray-900 dark:text-white">Email</label>
                    <input type="text" id="email" wire:model.defer="email"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md px-3 py-2">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Lưu</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Xác Nhận Xóa -->
    <div x-data="{ open: @entangle('isConfirmModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4 text-center text-gray-900 dark:text-white">Xác nhận xóa</h2>
            <p class="text-center mb-6 text-gray-900 dark:text-gray-300">Bạn có chắc chắn muốn xóa khoa này không?</p>
            <p class="text-center mb-6 text-gray-900 dark:text-gray-300">Thao tác này không thể hoàn tác.</p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteKhoa"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>

    <!-- Phân Trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($khoas->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 rounded-md cursor-not-allowed"><i class="fa-solid fa-backward"></i></span>
            @else
            <a href="{{ $khoas->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700"><i class="fa-solid fa-backward"></i></a>
            @endif

            <!-- Page Numbers -->
            @foreach ($khoas->getUrlRange(1, $khoas->lastPage()) as $page => $url)
            @if ($page == $khoas->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 rounded-md">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700">
                {{ $page }}
            </a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($khoas->hasMorePages())
            <a href="{{ $khoas->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700"><i class="fa-solid fa-forward"></i></a>
            @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 rounded-md cursor-not-allowed"><i class="fa-solid fa-forward"></i></span>
            @endif
        </div>
    </div>
</main>