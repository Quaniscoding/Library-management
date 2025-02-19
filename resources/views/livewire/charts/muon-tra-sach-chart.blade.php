<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md mt-6">
    <h1 class="text-2xl font-bold text-center dark:text-white text-gray-800 mb-4">Tình trạng mượn trả sách</h1>
    <div class="relative">
        <canvas id="borrowReturnChart"></canvas>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('borrowReturnChart').getContext('2d');
    var borrowReturnChart = new Chart(ctx, {
        type: 'bar', // Sử dụng biểu đồ cột
        data: {
            labels: @json($months), // Các nhãn tháng, ví dụ: ["2025-01", "2025-02", ...]
            datasets: [{
                    label: 'Số lượng mượn',
                    data: @json($borrowCounts),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Số lượng trả',
                    data: @json($returnCounts),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Điều chỉnh bước nhảy của trục y
                    }
                }
            }
        }
    });
});
</script>