<main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-gray-900 dark:text-white">
    <h1 class="text-center font-bold text-2xl mb-6">Quản lý bộ phận</h1>

    <!-- Button Tạo Bộ Phận Mới -->
    <div class="mb-4 text-left">
        <button wire:click="openModal"
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
            Tạo bộ phận mới
        </button>
    </div>

    <!-- Bảng Quản Lý Bộ Phận -->
    <div class="overflow-x-auto">
        <div class="flex justify-between">
            <div class="mb-4 flex justify-start">
                <input type="text" wire:model.live="searchName" placeholder="Tìm kiếm theo tên"
                    class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-600">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">ID</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Tên bộ phận</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Mô tả</th>
                    <th class="border border-gray-300 px-4 py-2 dark:border-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bophans as $bophan)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">{{ $bophan->id }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {{ $bophan->ten_bo_phan }}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600">
                        {!! $bophan->mo_ta ? $bophan->mo_ta : '<span class="text-gray-400">Chưa có</span>' !!}
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center space-x-2 dark:border-gray-600">
                        <button wire:click="editBoPhan({{ $bophan->id }})"
                            class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                            Sửa
                        </button>
                        <button wire:click="openConfirmModal({{ $bophan->id }})"
                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                            Xoá
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6"
                        class="border border-gray-300 px-4 py-2 text-center dark:border-gray-600 dark:text-gray-400">
                        Không có dữ liệu bộ phận.
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
                <h2 class="text-xl font-bold mb-4">
                    {{ $isEditMode ? 'Cập nhật bộ phận' : 'Tạo bộ phận mới' }}
                </h2>
                <button type="button" wire:click="closeModal"
                    class="w-10 h-10 bg-gray-500 text-white text-xl rounded-full flex items-center justify-center hover:bg-gray-600">
                    X
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="{{ $isEditMode ? 'updateBoPhan' : 'createBoPhan' }}">
                <div class="mb-4">
                    <label for="ten_bo_phan" class="block font-semibold">Tên bộ phận</label>
                    <input type="text" id="ten_bo_phan" wire:model.defer="ten_bo_phan"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('ten_bo_phan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="mo_ta" class="block font-semibold">Mô tả</label>
                    <input type="text" id="mo_ta" wire:model.defer="mo_ta"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @error('mo_ta') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" wire:click="closeModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
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

    <!-- Pagination -->
    <div class="flex justify-center mt-6">
        <div class="inline-flex items-center space-x-2">
            @if($bophans->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700">Previous</span>
            @else
            <a href="{{ $bophans->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                Previous
            </a>
            @endif

            @foreach ($bophans->getUrlRange(1, $bophans->lastPage()) as $page => $url)
            @if ($page == $bophans->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 rounded-md dark:bg-blue-500">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100 dark:border-gray-600 dark:text-white dark:hover:bg-gray-700">
                {{ $page }}
            </a>
            @endif
            @endforeach

            @if($bophans->hasMorePages())
            <a href="{{ $bophans->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                Next
            </a>
            @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed dark:bg-gray-700">Next</span>
            @endif
        </div>
    </div>

</main>