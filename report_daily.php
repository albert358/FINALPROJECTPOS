<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Daily Report</h4>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Sales and Order Summary by Day</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Total Sales (₱)</th>
                            <th>Number of Orders</th>
                            <th>Average Order Value (₱)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($dailyData)): ?>
                            <?php foreach ($dailyData as $row): ?>
                                <tr>
                                    <td><?= esc($row['date']) ?></td>
                                    <td><?= number_format(esc($row['sales']), 2) ?></td>
                                    <td><?= esc($row['orders']) ?></td>
                                    <td><?= number_format(esc($row['avg_order_value']), 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No daily report data found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Daily Sales Chart</div>
            </div>
            <div class="card-body">
                <canvas id="dailySalesChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Number of Orders Chart</div>
            </div>
            <div class="card-body">
                <canvas id="ordersChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Prepare data for charts
            const dailyData = <?= json_encode($dailyData ?? []) ?>; // Ensure $dailyData is passed from controller
            const dates = dailyData.map(row => row.date);
            const sales = dailyData.map(row => parseFloat(row.sales));
            const orders = dailyData.map(row => parseInt(row.orders));

            // --- Daily Sales Line Chart ---
            const dailySalesCtx = document.getElementById('dailySalesChart').getContext('2d');
            new Chart(dailySalesCtx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Total Sales (₱)',
                        data: sales,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Daily Sales Over Time'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Sales (₱)'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // --- Number of Orders Bar Chart ---
            const ordersCtx = document.getElementById('ordersChart').getContext('2d');
            new Chart(ordersCtx, {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Number of Orders',
                        data: orders,
                        backgroundColor: 'rgba(153, 102, 255, 0.6)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Number of Orders by Day'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Orders'
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