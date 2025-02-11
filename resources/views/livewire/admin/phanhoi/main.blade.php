<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6">
    <h1 class="text-center font-bold text-2xl mb-6">Quản lý phản hồi sách, tài liệu</h1>


    <!-- Bảng Quản lý phản hồi sách, tài liệu -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo tên"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none " />
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Sinh Viên</th>
                    <th class="border border-gray-300 px-4 py-2">Nội dung</th>
                    <th class="border border-gray-300 px-4 py-2">Trạng thái</th>
                    <th class="border border-gray-300 px-4 py-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($phanhois as $phanhoi)
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $phanhoi->id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $phanhoi->sinhvien->ho_ten }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $phanhoi->noi_dung }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center"> {{ match ($phanhoi->trang_thai)
                        {
                        'ChuaXuLy' => 'Chưa xử lý',
                        'DaXuLy' => 'Đã xử lý',
                        } 
                        }}</td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2">
                        <button wire:click="edit({{ $phanhoi->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $phanhoi->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="border border-gray-300 px-4 py-2 text-center">Không có dữ liệu.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 ">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    Cập nhật trạng thái phản hồi
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>

            </div>
            <!-- Form -->
            <form wire:submit.prevent="update" class=" h-auto overflow-auto">
                <div class="mb-4">
                    <label for="trang_thai" class="block font-semibold">Trạng thái</label>
                    <select id="trang_thai" wire:model.defer="trang_thai"
                        class="w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="">-- Chọn trạng thái --</option>
                        <option value="ChuaXuLy">Chưa xử lý</option>
                        <option value="DaXuLy">Đã xử lý</option>
                    </select>
                    @error('trang_thai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-bold mb-4 text-center">Xác nhận xóa</h2>
            <p class="text-center mb-6">Bạn có chắc chắn muốn xóa phản hồi này không?
            </p>
            <p class="text-center mb-6">Thao tác này không thể hoàn
                tác.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="delete"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Xóa</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($phanhois->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $phanhois->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($phanhois->getUrlRange(1, $phanhois->lastPage()) as $page => $url)

            <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                class="{{ $page == $phanhois->currentPage() ? 'bg-blue-600 text-white' : 'text-blue-600 border border-gray-300 hover:bg-gray-100' }} px-4 py-2 rounded-md">
                {{ $page }}
            </a>
            @endforeach

            <!-- Next Page Button -->
            @if($phanhois->hasMorePages())
            <a href="{{ $phanhois->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Next</a>
            @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>

</main>