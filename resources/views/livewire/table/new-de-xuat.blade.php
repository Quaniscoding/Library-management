<div class="bg-white shadow-lg rounded-xl p-6 mt-6" wire:poll.1s>
    <!-- Header: tiêu đề và nút điều hướng -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">
            Danh sách đề xuất gần đây
        </h2>
        <a href="/admin/manage-dexuat" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
            Kiểm tra
        </a>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sinh Viên
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiêu đề
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Loại
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mô tả
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng
                        thái
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($dexuats as $dexuat)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $dexuat->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $dexuat->sinhvien->ho_ten ?? 'Không có dữ liệu' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $dexuat->tieu_de ?? 'Không có dữ liệu' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $dexuat->tieu_de =='sach'? 'Sách':'Tài liệu' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $dexuat->mo_ta ?? 'Không có dữ liệu' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $dexuat->trang_thai ==='ChuaXuLy'?'Chưa xử lý' :'Đã xử lý' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>