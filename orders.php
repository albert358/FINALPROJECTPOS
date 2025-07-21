<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="fw-bold mb-4">Order List</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Juan Dela Cruz</td>
                <td>₱299.99</td>
                <td><span class="badge bg-success">Completed</span></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Maria Santos</td>
                <td>₱150.00</td>
                <td><span class="badge bg-warning">Pending</span></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pedro Reyes</td>
                <td>₱450.25</td>
                <td><span class="badge bg-danger">Cancelled</span></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
