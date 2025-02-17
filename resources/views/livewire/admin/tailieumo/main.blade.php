<!-- Main Section -->
<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-gray-200" wire:poll.1s>
    <h1 class="text-center font-bold text-2xl mb-6 dark:text-white">Quản Lý Tài Liệu Mở</h1>

    <!-- Button Tạo Tài Liệu Mở Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            Tạo tài liệu mở mới
        </button>
    </div>

    <!-- Bảng Quản Lý Tài Liệu Mở -->
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
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Ảnh bìa</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tên Tài Liệu</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tác Giả</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">NXB</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Năm Phát Hành</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Số Trang</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">ISBN</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Link Tải Về</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Môn</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Ngành</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Khoa</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tailieumos as $tailieumo)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">{{ $tailieumo->id }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        <img src="{{ asset('storage/' . $tailieumo->anh_bia) }}" alt="Ảnh bìa" width="50">
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->ten_tai_lieu }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->tacgia->ho_ten }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->nha_xuat_ban_id }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->nam_phat_hanh }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->so_trang }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {!! $tailieumo->isbn ? $tailieumo->isbn : '<span class="text-gray-400 dark:text-gray-400">Chưa
                            có</span>' !!}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->link_tai_ve }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->mon->ten_mon }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->nganh->ten_nganh }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $tailieumo->khoa->ten_khoa }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2 dark:border-gray-600">
                        <button wire:click="editTaiLieuMo({{ $tailieumo->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 dark:bg-yellow-600 dark:hover:bg-yellow-700">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $tailieumo->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="14" class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">Không có
                        dữ liệu tài liệu mở.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('isModalOpen') }" x-show="open"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 dark:bg-gray-800 dark:text-white">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    {{ $isEditMode ? 'Cập nhật tài liệu mở' : 'Tạo sách tài liệu mở' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none transition-transform transform hover:scale-110">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateTaiLieuMo' : 'createTaiLieuMo' }}"
                class="flex flex-col gap-4 h-auto overflow-auto">
                <div class="flex gap-4">
                    <div>
                        <div class="mb-4">
                            <label for="ten_tai_lieu" class="block font-semibold">Tên Tài Liệu</label>
                            <input type="text" id="ten_tai_lieu" wire:model.defer="ten_tai_lieu"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            @error('ten_tai_lieu') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="anh_bia" class="block font-semibold">Ảnh bìa tài liệu</label>
                            <input type="file" accept="image/*" id="anh_bia" wire:model="anh_bia"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="tac_gia_id" class="block font-semibold">Tác Giả</label>
                            <select id="tac_gia_id" wire:model.defer="tac_gia_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                <option value="">-- Chọn Tác Giả --</option>
                                @foreach($tacgias as $tacgia)
                                <option value="{{ $tacgia->id }}">{{ $tacgia->ho_ten }}</option>
                                @endforeach
                            </select>
                            @error('tac_gia_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nha_xuat_ban_id" class="block font-semibold">NXB</label>
                            <select id="nha_xuat_ban_id" wire:model.defer="nha_xuat_ban_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                <option value="">-- Chọn NXB --</option>
                                @foreach($nhaxuatbans as $nhaxuatban)
                                <option value="{{ $nhaxuatban->id }}">{{ $nhaxuatban->ten_nha_xuat_ban }}</option>
                                @endforeach
                            </select>
                            @error('nha_xuat_ban_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nam_phat_hanh" class="block font-semibold">Năm Phát Hành</label>
                            <input type="text" id="nam_phat_hanh" wire:model.defer="nam_phat_hanh"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            @error('nam_phat_hanh') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label for="so_trang" class="block font-semibold">Số Trang</label>
                            <input type="text" id="so_trang" wire:model.defer="so_trang"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            @error('so_trang') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            @if ($anh_bia)
                            @if (is_object($anh_bia))
                            <img src="{{ $anh_bia->temporaryUrl() }}" width="100">
                            @else
                            <img src="{{ asset('storage/' . $anh_bia) }}" width="100">
                            @endif
                            @endif
                            @error('anh_bia')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="isbn" class="block font-semibold">ISBN</label>
                            <input type="text" id="isbn" wire:model.defer="isbn"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            @error('isbn') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="link_tai_ve" class="block font-semibold">Link Tải Về</label>
                            <input type="text" id="link_tai_ve" wire:model.defer="link_tai_ve"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            @error('link_tai_ve') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="mon_hoc_id" class="block font-semibold">Môn</label>
                            <select id="mon_hoc_id" wire:model.defer="mon_hoc_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                <option value="">-- Chọn Môn --</option>
                                @foreach($monhocs as $monhoc)
                                <option value="{{ $monhoc->id }}">{{ $monhoc->ten_mon }}</option>
                                @endforeach
                            </select>
                            @error('mon_hoc_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nganh_id" class="block font-semibold">Ngành</label>
                            <select id="nganh_id" wire:model.defer="nganh_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                <option value="">-- Chọn Ngành --</option>
                                @foreach($nganhs as $nganh)
                                <option value="{{ $nganh->id }}">{{ $nganh->ten_nganh }}</option>
                                @endforeach
                            </select>
                            @error('nganh_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="khoa_id" class="block font-semibold">Khoa</label>
                            <select id="khoa_id" wire:model.defer="khoa_id"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                <option value="">-- Chọn Khoa --</option>
                                @foreach($khoas as $khoa)
                                <option value="{{ $khoa->id }}">{{ $khoa->ten_khoa }}</option>
                                @endforeach
                            </select>
                            @error('khoa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
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
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 dark:bg-gray-800 dark:text-white">
            <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Xác nhận xóa</h2>
            <p class="text-center mb-6 dark:text-gray-300">Bạn có chắc chắn muốn xóa tài liệu này không?</p>
            <p class="text-center mb-6 dark:text-gray-300">Thao tác này không thể hoàn tác.</p>
            <div class="flex justify-center space-x-4">
                <button type="button" wire:click="closeConfirmModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">Huỷ</button>
                <button type="button" wire:click="deleteTaiLieuMo"
                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800">Xóa</button>
            </div>
        </div>
    </div>

    <!-- Phân Trang -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($tailieumos->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">Previous</span>
            @else
            <a href="{{ $tailieumos->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($tailieumos->getUrlRange(1, $tailieumos->lastPage()) as $page => $url)
            <a wire:click.prevent="gotoPage({{ $page }})" href="#"
                class="{{ $page == $tailieumos->currentPage() ? 'bg-blue-600 text-white dark:bg-blue-500 dark:text-white' : 'text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100 dark:border-gray-600 dark:text-blue-300 dark:hover:bg-gray-700' }} px-4 py-2 rounded-md">
                {{ $page }}
            </a>
            @endforeach

            <!-- Next Page Button -->
            @if($tailieumos->hasMorePages())
            <a href="{{ $tailieumos->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Next</a>
            @else
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700 dark:text-gray-300">Next</span>
            @endif
        </div>
    </div>

</main>