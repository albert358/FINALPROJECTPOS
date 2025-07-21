<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-4"><?= esc($page_title) ?></h3>

<div class="card">
    <div class="card-header">
        <h5>Recent Activity</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
            <tr>
                <th>Cashier</th>
                <th>Activity</th>
                <th>Timestamp</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Anna Cruz</td>
                <td>Processed order #12345</td>
                <td>2025-07-15 10:34 AM</td>
            </tr>
            <tr>
                <td>Leo Santos</td>
                <td>Refunded transaction #45678</td>
                <td>2025-07-15 09:21 AM</td>
            </tr>
            <tr>
                <td>Anna Cruz</td>
                <td>Logged in</td>
                <td>2025-07-15 08:01 AM</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
