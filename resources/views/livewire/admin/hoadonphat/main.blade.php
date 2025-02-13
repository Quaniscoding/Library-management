<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
    <h1 class="text-center font-bold text-2xl mb-6 text-gray-900 dark:text-white">
        Quản Lý Hóa Đơn Phạt
    </h1>

    <!-- Button Tạo Đơn Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">
            Tạo đơn phạt mới
        </button>
    </div>

    <!-- Bảng Quản Lý Đơn -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo ID"
                    class="border border-gray-300 dark:border-gray-600 px-4 py-2 rounded-md focus:outline-none bg-white dark:bg-gray-700 text-gray-800 dark:text-white" />
            </div>
        </div>

        <table
            class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">
                        ID
                    </th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">
                        ID Phạt
                    </th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">
                        Ngày Lập
                    </th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">
                        Ngày Thanh Toán
                    </th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">
                        Trạng Thái
                    </th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-800 dark:text-white">
                        Hành động
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hoadonphats as $hoadonphat)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $hoadonphat->id }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $hoadonphat->phat_id }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $hoadonphat->ngay_lap ? \Carbon\Carbon::parse($hoadonphat->ngay_lap)->format('d/m/Y') : 'Chưa
                        lập' }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        {{ $hoadonphat->ngay_thanh_toan ?
                        \Carbon\Carbon::parse($hoadonphat->ngay_thanh_toan)->format('d/m/Y') : 'Chưa thanh toán' }}
                    </td>
                    <td
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        @if($hoadonphat->trang_thai === 'DaThanhToan')
                        Đã Thanh Toán
                        @elseif($hoadonphat->trang_thai === 'ChuaThanhToan')
                        Chưa Thanh Toán
                        @else
                        {{ $hoadonphat->trang_thai }}
                        @endif
                    </td>
                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="editHoaDonPhat({{ $hoadonphat->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:hover:bg-yellow-600">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $hoadonphat->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:hover:bg-red-700">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10"
                        class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center text-gray-800 dark:text-white">
                        Không có hóa đơn phạt.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">
                    {{ $isEditMode ? 'Cập nhật đơn phạt' : 'Tạo đơn phạt' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 dark:bg-gray-600 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateHoaDonPhat' : 'createHoaDonPhat' }}"
                class="h-auto overflow-auto">
                <div class="mb-4">
                    <label for="phat_id" class="block font-semibold text-gray-800 dark:text-white">
                        ID Phạt
                    </label>
                    <select id="phat_id" wire:model.defer="phat_id"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-white">
                        <option value="">-- Chọn ID --</option>
                        @foreach($phats as $phat)
                        <option value="{{ $phat->id }}">{{ $phat->id }}</option>
                        @endforeach
                    </select>
                    @error('phat_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_lap" class="block font-semibold text-gray-800 dark:text-white">
                        Ngày Lập
                    </label>
                    <input type="text" placeholder="Chọn ngày Lập" readonly id="ngay_lap" wire:model.defer="ngay_lap"
                        class="date-picker w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-white">
                    @error('ngay_lap') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="ngay_thanh_toan" class="block font-semibold text-gray-800 dark:text-white">
                        Ngày Thanh Toán
                    </label>
                    <input type="text" placeholder="Chọn Thanh Toán" readonly id="ngay_thanh_toan"
                        wire:model.defer="ngay_thanh_toan"
                        class="date-picker w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-white">
                    @error('ngay_thanh_toan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="trang_thai" class="block font-semibold text-gray-800 dark:text-white">
                        Trạng Thái
                    </label>
                    <select id="trang_thai" wire:model.defer="trang_thai"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-white">
                        <option value="">-- Chọn tình trạng --</option>
                        <option value="DaThanhToan">Đã Thanh Toán</option>
                        <option value="ChuaThanhToan">Chưa Thanh Toán</option>
                    </select>
                    @error('trang_thai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 dark:bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:hover:bg-gray-700">
                        Huỷ
                    </button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">
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
            <h2 class="text-xl font-bold mb-4 text-center text-gray-800 dark:text-white">
                Xác nhận xóa
            </h2>
            <p class="text-center mb-6 text-gray-800 dark:text-white">
                Bạn có chắc chắn muốn xóa hóa đơn phạt này không?
            </p>
            <p class="text-center mb-6 text-gray-800 dark:text-white">
                Thao tác này không thể hoàn tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 dark:bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:hover:bg-gray-700">
                    Huỷ
                </button>
                <button type="button" wire:click="deleteHoaDonPhat"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:hover:bg-red-800">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    <!-- Phân Trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($hoadonphats->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-300 rounded-md cursor-not-allowed">
                Previous
            </span>
            @else
            <a href="{{ $hoadonphats->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-700 rounded-md hover:bg-blue-700 dark:hover:bg-blue-800">
                Previous
            </a>
            @endif

            <!-- Page Numbers -->
            @foreach ($hoadonphats->getUrlRange(1, $hoadonphats->lastPage()) as $page => $url)
            <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                class="px-4 py-2 rounded-md {{ $page == $hoadonphats->currentPage() ? 'bg-blue-600 text-white dark:bg-blue-700' : 'text-blue-600 dark:text-blue-400 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                {{ $page }}
            </a>
            @endforeach

            <!-- Next Page Button -->
            @if($hoadonphats->hasMorePages())
            <a href="{{ $hoadonphats->nextPageUrl() }}"
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