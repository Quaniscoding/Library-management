<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md mt-6">
    <h1 class="text-2xl font-bold text-center dark:text-white text-gray-800 mb-4">Tình trạng sách</h1>
    <div class="relative">
        <canvas id="bookStatusChart"></canvas>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('bookStatusChart').getContext('2d');
    var bookStatusChart = new Chart(ctx, {
        type: 'bar', // Bạn có thể chọn bar, line, ...
        data: {
            labels: @json($statuses), // Các nhãn: Con, Muon, Bao_Tri, Mat
            datasets: [{
                label: 'Sách theo tình trạng',
                data: @json($counts), // Dữ liệu thống kê
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)', // Màu cho "Con"
                    'rgba(255, 206, 86, 0.2)', // Màu cho "Muon"
                    'rgba(153, 102, 255, 0.2)', // Màu cho "Bao_Tri"
                    'rgba(255, 99, 132, 0.2)' // Màu cho "Mat"
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
        }
    });
});
</script>