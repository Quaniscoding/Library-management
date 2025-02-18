<div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 mt-6" wire:poll.10s>
    <!-- Header với tiêu đề và nút điều hướng -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">
            Danh sách sinh viên đặt sách gần đây
        </h2>
        <a href="/admin/manage-datsach"
            class="bg-blue-600 dark:bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 dark:hover:bg-blue-600 transition">
            Kiểm tra
        </a>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        #</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Tên sinh viên</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Cuốn sách ID</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Ngày đặt</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Tình trạng</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Tạo ngày</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Cập nhật ngày</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($datSachs as $datSach)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">{{ $datSach->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">
                        {{ $datSach->sinhvien->ho_ten }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">
                        {{ $datSach->cuon_sach_id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">
                        {{ \Carbon\Carbon::parse($datSach->ngay_dat)->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($datSach->tinh_trang == 'DangDat')
                        <span
                            class="px-3 py-1 text-xs font-medium bg-yellow-100 text-yellow-700 dark:bg-yellow-200 dark:text-yellow-800 rounded-full">Đang
                            Đặt</span>
                        @elseif($datSach->tinh_trang == 'DaNhan')
                        <span
                            class="px-3 py-1 text-xs font-medium bg-green-100 text-green-700 dark:bg-green-200 dark:text-green-800 rounded-full">Đã
                            Nhận</span>
                        @else
                        <span
                            class="px-3 py-1 text-xs font-medium bg-red-100 text-red-700 dark:bg-red-200 dark:text-red-800 rounded-full">Hủy</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">
                        {{ \Carbon\Carbon::parse($datSach->created_at)->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-200">
                        {{ \Carbon\Carbon::parse($datSach->updated_at)->format('d/m/Y H:i') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>