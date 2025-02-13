<div class="min-h-screen bg-gray-100 dark:bg-gray-900 overflow-hidden">
    @livewire('client.components.header')

    <div class="container mx-auto mt-32 px-4 rounded-2xl">
        <div
            class="flex flex-col md:flex-row bg-white dark:bg-gray-800 shadow-2xl dark:shadow-xl rounded-2xl overflow-hidden transition-colors duration-300">
            <!-- Bên trái: Hình ảnh sách -->
            <div class="md:w-1/2 relative">
                @if($sach->anh_bia)
                <img src="{{ asset('storage/' . $sach->anh_bia) }}" alt="{{ $sach->ten_sach }}"
                    class="w-full h-full object-cover">
                @else
                <img src="https://placehold.co/750x750?text={{ urlencode($sach->ten_sach) }}"
                    alt="{{ $sach->ten_sach }}" class="w-full h-full object-cover">
                @endif
                <!-- Overlay để tạo hiệu ứng tối nhẹ trên ảnh (có thể hiển thị tiêu đề sách nếu cần) -->
                <div class="absolute inset-0 bg-black opacity-25"></div>
            </div>

            <!-- Bên phải: Form mượn sách -->
            <div class="md:w-1/2 p-8 flex flex-col justify-center">
                <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white text-center mb-6">
                    Mượn sách: {{ $sach->ten_sach }}
                </h2>
                <div class="mb-6 text-center">
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Tác giả:</span> {{ $sach->tacGia->ho_ten ?? 'Không rõ' }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        <span class="font-semibold">Thể loại:</span> {{ $sach->theLoai->ten_the_loai ?? 'Không rõ' }}
                    </p>
                </div>

                <!-- Form mượn sách -->
                <form wire:submit.prevent="borrowBook" class="space-y-6">
                    <div>
                        <label for="ngay_muon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Ngày mượn:
                        </label>
                        <input type="text" id="ngay_muon" wire:model="ngay_muon" required
                            class="date-picker mt-1 block w-full rounded-2xl border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Chọn ngày trả" readonly>
                    </div>
                    <div>
                        <label for="ngay_hen_tra" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Ngày hẹn trả:
                        </label>
                        <input type="text" placeholder="Chọn hẹn trả" readonly id="ngay_hen_tra"
                            wire:model="ngay_hen_tra" required
                            class="date-picker mt-1 block w-full rounded-2xl border-gray-300 dark:border-gray-600 shadow-sm dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white rounded-2xl font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span wire:loading.remove wire:target="borrowBook">Mượn sách</span>
                        <span wire:loading wire:target="borrowBook">Đang xử lý...</span>
                    </button>
                </form>

                <!-- Liên kết quay lại danh sách sách -->
                <div class="mt-6 text-center">
                    <a href="{{ route('sach') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                        &larr; Quay lại danh sách sách
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>