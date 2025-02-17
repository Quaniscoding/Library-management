<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-gray-200" wire:poll.1s>
    <h1 class="text-center font-bold text-2xl mb-6 dark:text-white">Quản lý phạt</h1>

    <!-- Button Tạo Phạt Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            Tạo phạt mới
        </button>
    </div>

    <!-- Bảng Quản Lý Phạt -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo id"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" />
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">ID</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Sinh viên</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Sách</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Phiếu trả</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Số tiền</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Lý do</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tình trạng</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($phats as $phat)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">{{ $phat->id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $phat->sinhvien->ho_ten }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $phat->sach->ten_sach }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $phat->phieu_tra_id ? $phat->phieu_tra_id : 'Trống' }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ number_format($phat->so_tien, 0, ',', '.') }} VNĐ
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">{{ $phat->ly_do }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        @if($phat->tinh_trang === 'DaThanhToan')
                        Đã Thanh Toán
                        @elseif($phat->tinh_trang === 'ChuaThanhToan')
                        Chưa Thanh Toán
                        @else
                        {{ $phat->tinh_trang }}
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2 dark:border-gray-600">
                        <button wire:click="editPhat({{ $phat->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $phat->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">Không có
                        phạt.</td>
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
                    {{ $isEditMode ? 'Cập nhật phạt' : 'Tạo phạt mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updatePhat' : 'createPhat' }}" class="h-auto overflow-auto">
                <div class="mb-4">
                    <label for="phieu_tra_id" class="block font-semibold">Phiếu Trả</label>
                    <select id="phieu_tra_id" wire:model.defer="phieu_tra_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">-- Chọn Phiếu Trả --</option>
                        @foreach($phieutras as $phieutra)
                        <option value="{{ $phieutra->id }}">{{ $phieutra->id }}</option>
                        @endforeach
                    </select>
                    @error('phieu_tra_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="so_tien" class="block font-semibold">Số tiền</label>
                    <input type="text" id="so_tien" wire:model.defer="so_tien"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('so_tien') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="ly_do" class="block font-semibold">Lý do</label>
                    <input type="text" id="ly_do" wire:model.defer="ly_do"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    @error('ly_do') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="tinh_trang" class="block font-semibold">Tình Trạng</label>
                    <select id="tinh_trang" wire:model.defer="tinh_trang"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">-- Chọn tình trạng --</option>
                        <option value="DaThanhToan">Đã Thanh Toán</option>
                        <option value="ChuaThanhToan">Chưa Thanh Toán</option>
                    </select>
                    @error('tinh_trang') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
            <p class="text-center mb-6 dark:text-gray-300">Bạn có chắc chắn muốn xóa phạt này không?</p>
            <p class="text-center mb-6 dark:text-gray-300">Thao tác này không thể hoàn tác.</p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deletePhat"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">Xóa</button>
            </div>
        </div>
    </div>

    <!-- Phân Trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($phats->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">Previous</span>
            @else
            <a href="{{ $phats->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($phats->getUrlRange(1, $phats->lastPage()) as $page => $url)
            @if ($page == $phats->currentPage())
            <span
                class="px-4 py-2 text-white bg-blue-600 rounded-md dark:bg-blue-500 dark:text-white">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100 dark:border-gray-600 dark:text-blue-300 dark:hover:bg-gray-700">{{ $page }}</a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($phats->hasMorePages())
            <a href="{{ $phats->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Next</a>
            @else
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">Next</span>
            @endif
        </div>
    </div>

</main>