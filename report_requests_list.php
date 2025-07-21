<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><?= esc($page_title) ?></h4>
            <?php if (!empty($breadcrumbs)): ?>
                <ul class="breadcrumbs">
                    <?php foreach ($breadcrumbs as $i => $breadcrumb): ?>
                        <?php if ($i > 0): ?>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item <?= isset($breadcrumb['active']) && $breadcrumb['active'] ? 'active' : '' ?>">
                            <a href="<?= esc($breadcrumb['link']) ?>">
                                <i class="<?= isset($breadcrumb['icon']) ? esc($breadcrumb['icon']) : 'flaticon-home' ?>"></i>
                                <?= esc($breadcrumb['text']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('info')): ?>
            <div class="alert alert-info"><?= session()->getFlashdata('info') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">All Report Requests</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($reportRequests)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped mt-3">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Cashier ID</th>
                                <th>Report Type ID</th>
                                <th>Date Range</th>
                                <th>Notes</th>
                                <th>Status</th>
                                <th>Requested By</th>
                                <th>Requested At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($reportRequests as $index => $request): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= esc($request->cashier_id) ?></td>
                                    <td><?= esc($request->report_type_id) ?></td>
                                    <td>
                                        <?php if (!empty($request->date_range_start) && !empty($request->date_range_end)): ?>
                                            <?= esc($request->date_range_start) ?> to <?= esc($request->date_range_end) ?>
                                        <?php elseif (!empty($request->date_range_start)): ?>
                                            <?= esc($request->date_range_start) ?>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc(substr($request->additional_notes, 0, 50)) ?><?= (strlen($request->additional_notes) > 50) ? '...' : '' ?></td>
                                    <td><span class="badge <?= ($request->status == 'pending') ? 'bg-warning' : (($request->status == 'completed') ? 'bg-success' : 'bg-secondary') ?>"><?= esc(ucfirst($request->status)) ?></span></td>
                                    <td><?= esc($request->requested_by_admin_id) ?></td>
                                    <td><?= esc($request->created_at) ?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>No report requests submitted yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>