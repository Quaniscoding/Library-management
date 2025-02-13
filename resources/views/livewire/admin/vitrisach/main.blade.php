<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-gray-200">
    <h1 class="text-center font-bold text-2xl mb-6 dark:text-white">Quản Lý Vị Trí Sách</h1>

    <!-- Button Tạo Vị Trí Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            Tạo vị trí sách mới
        </button>
    </div>

    <!-- Bảng Quản Lý Vị Trí -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo tên"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700 dark:bg-gray-800">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">ID</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Khu Vực</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tường</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Kệ</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vitrisachs as $vitrisach)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">{{ $vitrisach->id }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $vitrisach->khu_vuc }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $vitrisach->tuong }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">{{ $vitrisach->ke }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2 dark:border-gray-600">
                        <button wire:click="editViTriSach({{ $vitrisach->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $vitrisach->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">Không có
                        dữ liệu vị trí.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 dark:text-white rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    {{ $isEditMode ? 'Cập nhật vị trí' : 'Tạo sách vị trí' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateViTriSach' : 'createViTriSach' }}"
                class="h-auto overflow-auto">
                <div class="mb-4">
                    <label for="khu_vuc" class="block font-semibold">Khu Vực</label>
                    <input type="text" id="khu_vuc" wire:model.defer="khu_vuc"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('khu_vuc') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="tuong" class="block font-semibold">Tường</label>
                    <input type="text" id="tuong" wire:model.defer="tuong"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('tuong') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ke" class="block font-semibold">Kệ</label>
                    <input type="text" id="ke" wire:model.defer="ke"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('ke') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">Huỷ</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Lưu</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Xác Nhận Xóa -->
    <div x-data="{ open: @entangle('isConfirmModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 dark:text-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Xác nhận xóa</h2>
            <p class="text-center mb-6 dark:text-gray-300">Bạn có chắc chắn muốn xóa vị trí này không?</p>
            <p class="text-center mb-6 dark:text-gray-300">Thao tác này không thể hoàn tác.</p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteViTriSach"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">Xóa</button>
            </div>
        </div>
    </div>

    <!-- Phân trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($vitrisachs->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">Previous</span>
            @else
            <a href="{{ $vitrisachs->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($vitrisachs->getUrlRange(1, $vitrisachs->lastPage()) as $page => $url)
            <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                class="{{ $page == $vitrisachs->currentPage() ? 'bg-blue-600 text-white dark:bg-blue-500 dark:text-white' : 'text-blue-600 border border-gray-300 hover:bg-gray-100 dark:border-gray-600 dark:text-blue-300 dark:hover:bg-gray-700' }} px-4 py-2 rounded-md">
                {{ $page }}
            </a>
            @endforeach

            <!-- Next Page Button -->
            @if($vitrisachs->hasMorePages())
            <a href="{{ $vitrisachs->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Next</a>
            @else
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">Next</span>
            @endif
        </div>
    </div>

</main>