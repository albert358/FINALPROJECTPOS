<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>
<div class="page-inner">
    <h3 class="page-title"><?= esc($page_title) ?></h3>

    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">Refund Requests</div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Refund ID</th>
                    <th>Date Requested</th>
                    <th>Cashier</th>
                    <th>Amount</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>#RF1001</td>
                    <td>2025-07-14</td>
                    <td>Anna Cruz</td>
                    <td>₱300.00</td>
                    <td>Wrong item entered</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                </tr>
                <tr>
                    <td>#RF1002</td>
                    <td>2025-07-13</td>
                    <td>David Lee</td>
                    <td>₱500.00</td>
                    <td>Customer changed mind</td>
                    <td><span class="badge bg-success">Approved</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
