<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-white" wire:poll.1s>
    <h1 class="text-center font-bold text-2xl mb-6 text-gray-900 dark:text-white">Quản lý Ngành</h1>

    <!-- Button Tạo Ngành Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 dark:bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">
            Tạo ngành mới
        </button>
    </div>

    <!-- Bảng Quản Lý Ngành -->
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
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Tên ngành</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Khoa</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nganhs as $nganh)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-white">
                        {{ $nganh->id }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-white">
                        {{ $nganh->ten_nganh }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-white">
                        {{ $nganh->khoa->ten_khoa ?? "" }}
                    </td>
                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="editNganh({{ $nganh->id }})"
                            class="bg-yellow-500 dark:bg-yellow-600 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:hover:bg-yellow-700">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $nganh->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:hover:bg-red-700">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-900 dark:text-white">
                        Không có dữ liệu ngành.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Tạo/Cập Nhật Ngành -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">
                    {{ $isEditMode ? 'Cập nhật ngành' : 'Tạo ngành mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 dark:bg-gray-600 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateNganh' : 'createNganh' }}" class="h-auto overflow-auto">
                <div class="mb-4">
                    <label for="ten_nganh" class="block font-semibold text-gray-900 dark:text-white">Tên ngành</label>
                    <input type="text" id="ten_nganh" wire:model.defer="ten_nganh"
                        class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-md px-3 py-2">
                    @error('ten_nganh') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="khoa_id" class="block font-semibold text-gray-900 dark:text-white">Khoa</label>
                    <select id="khoa_id" wire:model.defer="khoa_id"
                        class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded-md px-3 py-2">
                        <option value="">-- Chọn Khoa --</option>
                        @foreach($khoas as $khoa)
                        <option value="{{ $khoa->id }}">{{ $khoa->ten_khoa }}</option>
                        @endforeach
                    </select>
                    @error('khoa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 dark:bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:hover:bg-gray-700">
                        Huỷ
                    </button>
                    <button type="submit"
                        class="bg-blue-600 dark:bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Xác Nhận Xóa -->
    <div x-data="{ open: @entangle('isConfirmModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4 text-center text-gray-900 dark:text-white">Xác nhận xóa</h2>
            <p class="text-center mb-6 text-gray-900 dark:text-white">Bạn có chắc chắn muốn xóa ngành này không?</p>
            <p class="text-center mb-6 text-gray-900 dark:text-white">Thao tác này không thể hoàn tác.</p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 dark:bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:hover:bg-gray-700">
                    Huỷ
                </button>
                <button type="button" wire:click="deleteNganh"
                    class="bg-red-600 dark:bg-red-700 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:hover:bg-red-800">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($nganhs->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $nganhs->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-700 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($nganhs->getUrlRange(1, $nganhs->lastPage()) as $page => $url)
            @if ($page == $nganhs->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-700 rounded-md">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 dark:text-blue-400 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800">{{
                $page }}</a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($nganhs->hasMorePages())
            <a href="{{ $nganhs->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-700 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">Next</a>
            @else
            <span
                class="px-4 py-2 text-gray-400 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>
</main>