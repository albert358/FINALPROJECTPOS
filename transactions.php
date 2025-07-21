<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-4"><?= esc($page_title) ?></h3>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h5>Total Transactions</h5>
            <h3>₱12,500</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h5>Pending Transactions</h5>
            <h3>5</h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h5>Completed Today</h5>
            <h3>18</h3>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Recent Transactions</h5>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
            <tr>
                <th>Transaction ID</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>TXN00123</td>
                <td>Juan Dela Cruz</td>
                <td>₱450.00</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>2025-07-15</td>
            </tr>
            <tr>
                <td>TXN00124</td>
                <td>Maria Santos</td>
                <td>₱320.00</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>2025-07-15</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
