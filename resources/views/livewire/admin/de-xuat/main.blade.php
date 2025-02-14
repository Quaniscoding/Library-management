<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
    <h1 class="text-center font-bold text-2xl mb-6 text-gray-800 dark:text-white">
        Quản lý đề xuất thêm sách, tài liệu
    </h1>

    <!-- Bảng Quản Lý Đề xuất thêm sách, tài liệu -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo tên"
                    class="border border-gray-300 dark:border-gray-600 px-4 py-2 rounded-md focus:outline-none bg-white dark:bg-gray-700 text-gray-800 dark:text-white" />
            </div>
        </div>

        <table
            class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">ID
                    </th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">Sinh
                        Viên</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">Tiêu
                        đề</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">Loại
                    </th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">Mô
                        tả</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">
                        Trạng thái</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">Hành
                        động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dexuats as $dexuat)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $dexuat->id }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $dexuat->sinhvien->ho_ten }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $dexuat->tieu_de }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ match ($dexuat->loai) {
                        'sach' => 'Sách',
                        'tai_lieu' => 'Tài liệu',
                        } }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $dexuat->mo_ta }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ match ($dexuat->trang_thai) {
                        'ChuaXuLy' => 'Chưa xử lý',
                        'DaXuLy' => 'Đã xử lý',
                        } }}
                    </td>
                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="edit({{ $dexuat->id }})"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md transition-colors">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $dexuat->id }})"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md transition-colors">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8"
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        Không có dữ liệu.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Cập nhật trạng thái đề xuất -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 dark:text-white rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">Cập nhật trạng thái đề xuất</h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 dark:bg-gray-600 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="update" class="h-auto overflow-auto">
                <div class="mb-4">
                    <label for="trang_thai" class="block font-semibold text-gray-800 dark:text-white">Trạng thái</label>
                    <select id="trang_thai" wire:model.defer="trang_thai"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-white">
                        <option value="">-- Chọn trạng thái --</option>
                        <option value="ChuaXuLy">Chưa xử lý</option>
                        <option value="DaXuLy">Đã xử lý</option>
                    </select>
                    @error('trang_thai')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 dark:bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:hover:bg-gray-700">
                        Huỷ
                    </button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded-md">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Xác Nhận Xóa -->
    <div x-data="{ open: @entangle('isConfirmModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 dark:text-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4 text-center">Xác nhận xóa</h2>
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa đề xuất này không?</p>
            <p class="text-center mb-6">Thao tác này không thể hoàn tác.</p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 dark:bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:hover:bg-gray-700">
                    Huỷ
                </button>
                <button type="button" wire:click="delete"
                    class="bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800 text-white px-4 py-2 rounded-md">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    <!-- Phân Trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($dexuats->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-300 rounded-md cursor-not-allowed">
                Previous
            </span>
            @else
            <a href="{{ $dexuats->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-700 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">
                Previous
            </a>
            @endif

            <!-- Page Numbers -->
            @foreach ($dexuats->getUrlRange(1, $dexuats->lastPage()) as $page => $url)
            <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                class="px-4 py-2 rounded-md
         {{ $page == $dexuats->currentPage() 
            ? 'bg-blue-600 text-white dark:bg-blue-700' 
            : 'text-blue-600 dark:text-blue-400 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                {{ $page }}
            </a>
            @endforeach

            <!-- Next Page Button -->
            @if($dexuats->hasMorePages())
            <a href="{{ $dexuats->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-700 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">
                Next
            </a>
            @else
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-300 rounded-md cursor-not-allowed">
                Next
            </span>
            @endif
        </div>
    </div>
</main>