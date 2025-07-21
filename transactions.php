<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<div class="page-inner">
    <h3 class="page-title"><?= esc($page_title) ?></h3>

    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">Recent Transactions</div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Date</th>
                    <th>Cashier</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>#TXN123456</td>
                    <td>2025-07-15</td>
                    <td>Jane Doe</td>
                    <td>₱1,250.00</td>
                    <td>Cash</td>
                    <td><span class="badge bg-success">Completed</span></td>
                </tr>
                <tr>
                    <td>#TXN123457</td>
                    <td>2025-07-15</td>
                    <td>Mike Smith</td>
                    <td>₱980.00</td>
                    <td>GCash</td>
                    <td><span class="badge bg-success">Completed</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
