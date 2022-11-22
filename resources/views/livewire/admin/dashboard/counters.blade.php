<div>
    <div class="flex items-center justify-between">
        <h1 class="text-4xl font-extrabold">{{ __("Dashboard") }}</h1>
    </div>

    <div class="my-10">
        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="px-4 py-5 bg-white shadow border border-gray-200 rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Subscribers</dt>
                <dd class="mt-1 text-3xl font-medium text-gray-900">{{ $subscribers }}</dd>
            </div>
            <div class="px-4 py-5 bg-white shadow border border-gray-200 rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Today's Visitors</dt>
                <dd class="mt-1 text-3xl font-medium text-gray-900">{{ $visitors }}</dd>
            </div>
            <div class="px-4 py-5 bg-white shadow border border-gray-200 rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">7-day growth</dt>
                <dd class="mt-1 text-3xl font-medium text-gray-900">{{ $weeklyGrowth }}%</dd>
            </div>
        </dl>
    </div>

    <div class="my-10">
        <canvas id="chartContainer"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        var jsonData = @php echo json_encode($graphData, JSON_NUMERIC_CHECK); @endphp;
        let dates = [];
        let visitors = [];
        for (var i = 0; i < jsonData.length; i++) {
            dates.push(jsonData[i][0]);
            visitors.push(jsonData[i][1]);
        }
        var ctx = document.getElementById('chartContainer').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
            labels: dates,
            datasets: [{
                label: 'Visits per day',
                data: visitors,
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
        </script>
    </div>
</div>
