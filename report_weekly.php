<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Weekly Report</h4>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Sales and Order Summary by Week</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="thead-light">
                        <tr>
                            <th>Week</th>
                            <th>Total Sales (₱)</th>
                            <th>Total Number of Orders</th>
                            <th>Average Daily Sales (₱)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($weeklyData)): ?>
                            <?php foreach ($weeklyData as $row): ?>
                                <tr>
                                    <td><?= esc($row['week']) ?></td>
                                    <td><?= number_format(esc($row['total_sales']), 2) ?></td>
                                    <td><?= esc($row['total_orders']) ?></td>
                                    <td><?= number_format(esc($row['average_daily_sales']), 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No weekly report data found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Weekly Sales Trend</div>
            </div>
            <div class="card-body">
                <canvas id="weeklySalesChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Total Orders by Week</div>
            </div>
            <div class="card-body">
                <canvas id="weeklyOrdersChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Prepare data for charts
            const weeklyData = <?= json_encode($weeklyData ?? []) ?>; // Ensure $weeklyData is passed from controller
            const weeks = weeklyData.map(row => 'Week ' + row.week); // Prefix "Week " for labels
            const totalSales = weeklyData.map(row => parseFloat(row.total_sales));
            const totalOrders = weeklyData.map(row => parseInt(row.total_orders));

            // --- Weekly Sales Line Chart ---
            const weeklySalesCtx = document.getElementById('weeklySalesChart').getContext('2d');
            new Chart(weeklySalesCtx, {
                type: 'line',
                data: {
                    labels: weeks,
                    datasets: [{
                        label: 'Total Sales (₱)',
                        data: totalSales,
                        borderColor: 'rgb(54, 162, 235)', // Blue color
                        tension: 0.1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Weekly Sales Trend'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Week Number'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Sales (₱)'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // --- Total Orders by Week Bar Chart ---
            const weeklyOrdersCtx = document.getElementById('weeklyOrdersChart').getContext('2d');
            new Chart(weeklyOrdersCtx, {
                type: 'bar',
                data: {
                    labels: weeks,
                    datasets: [{
                        label: 'Total Number of Orders',
                        data: totalOrders,
                        backgroundColor: 'rgba(255, 99, 132, 0.6)', // Red color
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Number of Orders by Week'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Week Number'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Orders'
                            },
                            beginAtZero: true,
                            ticks: {
                                precision: 0 // Ensure integer ticks for order count
                            }
                        }
                    }
                }
            });
        });
    </script>
<?= $this->endSection() ?>