<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-4"><?= esc($page_title) ?></h3>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">All Transaction History</h5>
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>TXN00098</td>
                <td>Ana Lopez</td>
                <td>₱800.00</td>
                <td>GCash</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>2025-07-10</td>
            </tr>
            <tr>
                <td>TXN00099</td>
                <td>Mark Reyes</td>
                <td>₱1,200.00</td>
                <td>Cash</td>
                <td><span class="badge bg-danger">Failed</span></td>
                <td>2025-07-11</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
