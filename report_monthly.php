<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('content') ?>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Monthly Report</h4>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Sales and Order Summary by Month</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center align-middle">
                        <thead class="thead-light">
                        <tr>
                            <th>Month</th>
                            <th>Total Sales (₱)</th>
                            <th>Total Number of Orders</th>
                            <th>Growth vs. Previous Month</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($monthlyData)): ?>
                            <?php foreach ($monthlyData as $row): ?>
                                <tr>
                                    <td><?= esc($row['month']) ?></td>
                                    <td><?= number_format(esc($row['total_sales']), 2) ?></td>
                                    <td><?= esc($row['total_orders']) ?></td>
                                    <td><?= esc($row['growth_vs_prev_month']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No monthly report data found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Monthly Sales Performance</div>
            </div>
            <div class="card-body">
                <canvas id="monthlySalesChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">Total Orders by Month</div>
            </div>
            <div class="card-body">
                <canvas id="monthlyOrdersChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Prepare data for charts
            const monthlyData = <?= json_encode($monthlyData ?? []) ?>; // Ensure $monthlyData is passed from controller
            const months = monthlyData.map(row => row.month); // Assuming 'month' is like 'January', 'February', etc.
            const totalSales = monthlyData.map(row => parseFloat(row.total_sales));
            const totalOrders = monthlyData.map(row => parseInt(row.total_orders));

            // --- Monthly Sales Line Chart ---
            const monthlySalesCtx = document.getElementById('monthlySalesChart').getContext('2d');
            new Chart(monthlySalesCtx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Total Sales (₱)',
                        data: totalSales,
                        borderColor: 'rgb(255, 159, 64)', // Orange color
                        tension: 0.1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Monthly Sales Trend'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
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

            // --- Total Orders by Month Bar Chart ---
            const monthlyOrdersCtx = document.getElementById('monthlyOrdersChart').getContext('2d');
            new Chart(monthlyOrdersCtx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Total Number of Orders',
                        data: totalOrders,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)', // Greenish-blue
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Total Number of Orders by Month'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
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