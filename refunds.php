<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-4"><?= esc($page_title) ?></h3>

<!-- Summary Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>Total Refunds</h6>
            <h4 class="text-danger">₱5,320.00</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>Pending</h6>
            <h4 class="text-warning">3</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>Approved</h6>
            <h4 class="text-success">7</h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h6>Rejected</h6>
            <h4 class="text-secondary">2</h4>
        </div>
    </div>
</div>

<!-- Search & Filter -->
<div class="row mb-3">
    <div class="col-md-6">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search by Customer or ID" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
</div>

<!-- Refunds Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Refund Requests</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th>Refund ID</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Requested On</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>RFND0123</td>
                    <td>Leo Ramos</td>
                    <td>₱250.00</td>
                    <td>Wrong order</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>2025-07-14</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-primary">View</button>
                            <button class="btn btn-sm btn-success">Approve</button>
                            <button class="btn btn-sm btn-danger">Reject</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>RFND0124</td>
                    <td>Emily Cruz</td>
                    <td>₱100.00</td>
                    <td>Double charged</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td>2025-07-13</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                    </td>
                </tr>
                <tr>
                    <td>RFND0125</td>
                    <td>Kevin Bautista</td>
                    <td>₱150.00</td>
                    <td>Food not delivered</td>
                    <td><span class="badge bg-secondary">Rejected</span></td>
                    <td>2025-07-12</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
