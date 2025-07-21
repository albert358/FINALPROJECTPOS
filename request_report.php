<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('content') ?>

    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-0"><?= esc($page_title ?? 'Request Report') ?></h3>
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
                <h5 class="card-title">Request a Report from Cashier</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/submit-report-request') ?>" method="post">
                    <?= csrf_field() ?>
                    <?php $errors = session()->getFlashdata('errors') ?? [] ?>

                    <div class="mb-3">
                        <label for="cashier_id" class="form-label">Select Cashier <span class="text-danger">*</span></label>
                        <select class="form-control" id="cashier_id" name="cashier_id" required>
                            <option value="">-- Select Cashier --</option>
                            <?php if (!empty($cashiers)): ?>
                                <?php foreach ($cashiers as $cashier): ?>
                                    <option value="<?= esc($cashier->id) ?>" <?= (old('cashier_id') == $cashier->id) ? 'selected' : '' ?>>
                                        <?= esc($cashier->username) ?> (ID: <?= esc($cashier->id) ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="" disabled>No approved cashiers available</option>
                            <?php endif; ?>
                        </select>
                        <?php if (isset($errors['cashier_id'])): ?>
                            <small class="text-danger"><?= esc($errors['cashier_id']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="report_type" class="form-label">Report Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="report_type" name="report_type" required>
                            <option value="">-- Select Report Type --</option>
                            <?php if (!empty($reportTypes)): ?>
                                <?php foreach ($reportTypes as $type): ?>
                                    <option value="<?= esc($type->type_name) ?>" <?= (old('report_type') == $type->type_name) ? 'selected' : '' ?>>
                                        <?= esc($type->type_name) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="Daily Sales" <?= (old('report_type') == 'Daily Sales') ? 'selected' : '' ?>>Daily Sales</option>
                                <option value="Weekly Sales" <?= (old('report_type') == 'Weekly Sales') ? 'selected' : '' ?>>Weekly Sales</option>
                                <option value="Refunds List" <?= (old('report_type') == 'Refunds List') ? 'selected' : '' ?>>Refunds List</option>
                                <option value="Monthly Sales" <?= (old('report_type') == 'Monthly Sales') ? 'selected' : '' ?>>Monthly Sales</option>
                                <option value="Custom Report" <?= (old('report_type') == 'Custom Report') ? 'selected' : '' ?>>Custom Report</option>
                            <?php endif; ?>
                        </select>
                        <?php if (isset($errors['report_type'])): ?>
                            <small class="text-danger"><?= esc($errors['report_type']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="date_range" class="form-label">Date Range (optional)</label>
                        <input type="text" class="form-control" id="date_range" name="date_range" placeholder="e.g., Today, Yesterday, 2025-06-01 to 2025-06-30" value="<?= old('date_range') ?>">
                        <small class="form-text text-muted">Specify the period for the report.</small>
                        <?php if (isset($errors['date_range'])): ?>
                            <small class="text-danger"><?= esc($errors['date_range']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Additional Notes (optional)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Any specific details or instructions for the cashier..."><?= old('notes') ?></textarea>
                        <?php if (isset($errors['notes'])): ?>
                            <small class="text-danger"><?= esc($errors['notes']) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-secondary me-2">Clear</button>
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>