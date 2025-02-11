<div class="main overflow-hidden">
    @livewire('client.components.header')
    <div class="mt-32 container mx-auto px-4 min-h-[720px]">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">📖 Lịch Sử Mượn Sách</h2>

        <button data-modal-target="lich-su-phat-modal" data-modal-toggle="lich-su-phat-modal"
            class="m-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Lịch sử phạt
        </button>

        <div id="lich-su-phat-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-3xl max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Lịch sử bị phạt
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="lich-su-phat-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <!-- Bảng dữ liệu -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                Sách</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                Số Tiền</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                Lý Do</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                                Tình Trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($phats as $phat)
                                        <tr>
                                            <td class="px-4 py-2 whitespace-nowrap text-base text-gray-900">
                                                {{ $phat->sach->ten_sach }}
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-base text-gray-900">
                                                {{ number_format($phat->so_tien, 0, ',', '.') }} VND
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-base text-gray-900">
                                                {{ $phat->ly_do }}
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-base">
                                                @if($phat->tinh_trang === 'ChuaThanhToan')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Chưa Thanh Toán
                                                </span>
                                                @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Đã Thanh Toán
                                                </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="px-4 py-2 text-center text-sm text-gray-500">
                                                Không có lịch sử phạt nào.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Phân trang -->
                            <div class="px-4 py-3 bg-gray-50">
                                {{ $phats->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Tên Sách</th>
                    <th class="border px-4 py-2">Ngày Đặt</th>
                    <th class="border px-4 py-2">Tình Trạng</th>
                    <th class="border px-4 py-2">Email Log</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($datSachs as $index => $datSach)
                <tr class="hover:bg-gray-100 text-center">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800">
                        {{ $datSach->cuonSach->sach->ten_sach ?? 'N/A' }}
                    </td>
                    <td class="px-4 py-2 text-gray-600">
                        {{ \Carbon\Carbon::parse($datSach->ngay_dat)->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-2">
                        @if ($datSach->tinh_trang == 'DangDat')
                        <span class="px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-700 rounded-full">Đang
                            Đặt</span>
                        @elseif ($datSach->tinh_trang == 'DaNhan')
                        <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">Đã
                            Nhận</span>
                        @else
                        <span class="px-3 py-1 text-sm font-medium bg-red-100 text-red-700 rounded-full">Hủy</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="https://mailtrap.io/inboxes/3406591" target="_blank"
                            class="text-blue-600 hover:underline">
                            Kiểm tra mail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-2">
        <div class="inline-flex items-center space-x-2">
            <!-- Previous Page Button -->
            @if($datSachs->onFirstPage())
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-500 rounded-md cursor-not-allowed">Previous</span>
            @else
            <a href="{{ $datSachs->previousPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Previous</a>
            @endif

            <!-- Page Numbers -->
            @foreach ($datSachs->getUrlRange(1, $datSachs->lastPage()) as $page => $url)
            @if ($page == $datSachs->currentPage())
            <span class="px-4 py-2 text-white bg-blue-600 dark:bg-blue-500 rounded-md">{{ $page }}</span>
            @else
            <a href="{{ $url }}"
                class="px-4 py-2 text-blue-600 border border-gray-300 rounded-md hover:bg-gray-100 dark:text-blue-400 dark:border-gray-600 dark:hover:bg-gray-700">{{
                $page }}</a>
            @endif
            @endforeach

            <!-- Next Page Button -->
            @if($datSachs->hasMorePages())
            <a href="{{ $datSachs->nextPageUrl() }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">Next</a>
            @else
            <span
                class="px-4 py-2 text-gray-400 bg-gray-200 dark:bg-gray-700 dark:text-gray-500 rounded-md cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>
</div>