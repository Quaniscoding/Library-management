<div class="main">
    @livewire('client.components.header')

    <div class="container mx-auto mt-32 px-4">
        <h1 class="mb-8 text-3xl font-bold text-center">Phản hồi về sách, tài liệu</h1>

        <form wire:submit.prevent="submitProposal" class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-8">

            <div class="mb-6">
                <label for="noi_dung" class="block text-gray-700 text-sm font-bold mb-2">
                    Nội dung
                </label>
                <textarea required id="noi_dung" wire:model.defer="noi_dung" rows="4"
                    placeholder="Nhập nội dung bạn muốn phản hồi"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                @error('noi_dung')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <!-- Nút Gửi -->
            <div class="flex items-center justify-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Gửi phản hồi
                </button>
            </div>
        </form>
    </div>
</div>