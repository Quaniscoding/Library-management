<div class="main">
    @livewire('client.components.header')

    <div class="container mx-auto mt-32 px-4">
        <h1 class="mb-8 text-3xl font-bold text-center text-gray-800 dark:text-white">
            📚 Đề xuất Sách & Tài Liệu
        </h1>

        <form wire:submit.prevent="submitProposal"
            class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-md dark:shadow-lg rounded-lg p-8">
            <!-- Tiêu đề đề xuất -->
            <div class="mb-6">
                <label for="tieu_de" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                    Tiêu đề đề xuất
                </label>
                <input type="text" id="tieu_de" wire:model.defer="tieu_de"
                    placeholder="Nhập tên sách hoặc tài liệu bạn đề xuất" class="shadow appearance-none border border-gray-300 dark:border-gray-600 rounded w-full py-2 px-3 
                           text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 leading-tight 
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('tieu_de')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <!-- Loại đề xuất -->
            <div class="mb-6">
                <label for="loai" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                    Loại đề xuất
                </label>
                <select id="loai" wire:model="loai" class="shadow appearance-none border border-gray-300 dark:border-gray-600 rounded w-full py-2 px-3 
                           text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 leading-tight 
                           focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="sach">Sách</option>
                    <option value="tai_lieu">Tài liệu số</option>
                </select>
                @error('loai')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mô tả (Tùy chọn) -->
            <div class="mb-6">
                <label for="mo_ta" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                    Mô tả (Tùy chọn)
                </label>
                <textarea id="mo_ta" wire:model.defer="mo_ta" rows="4"
                    placeholder="Nhập thêm thông tin chi tiết (ví dụ: tác giả, nội dung, lý do đề xuất)" class="shadow appearance-none border border-gray-300 dark:border-gray-600 rounded w-full py-2 px-3 
                           text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 leading-tight 
                           focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('mo_ta')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nút Gửi -->
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-800 
                           text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Gửi đề xuất
                </button>
            </div>
        </form>
    </div>
</div>