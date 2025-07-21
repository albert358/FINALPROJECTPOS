<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= esc($page_title ?? 'Report Overview') ?></h4>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body d-flex align-items-center">
                    <div class="icon bg-primary text-white me-3">
                        <i class="fas fa-coins fa-2x"></i>
                    </div>
                    <div>
                        <h5>Total Sales</h5>
                        <h4>₱120,450</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body d-flex align-items-center">
                    <div class="icon bg-success text-white me-3">
                        <i class="fas fa-receipt fa-2x"></i>
                    </div>
                    <div>
                        <h5>Transactions</h5>
                        <h4>785</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body d-flex align-items-center">
                    <div class="icon bg-danger text-white me-3">
                        <i class="fas fa-undo fa-2x"></i>
                    </div>
                    <div>
                        <h5>Refunds</h5>
                        <h4>₱3,200</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Monthly Sales</h5>
                </div>
                <div class="card-body">
                    <canvas id="barChart" height="150"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Sales by Category</h5>
                </div>
                <div class="card-body">
                    <canvas id="doughnutChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js CDN (or include locally if preferred) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Sales (₱)',
                data: [12500, 16500, 14200, 18900, 21000, 17500, 19500],
                backgroundColor: '#4b7bec'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
    new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Drinks', 'Meals', 'Desserts', 'Sides'],
            datasets: [{
                data: [32000, 52000, 18500, 10500],
                backgroundColor: ['#34ace0', '#33d9b2', '#ffb142', '#ff5252']
            }]
        },
        options: {
            responsive: true,
            cutout: '65%'
        }
    });
</script>

<?= $this->endSection() ?>
