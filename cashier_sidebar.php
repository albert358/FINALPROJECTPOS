<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="<?= base_url('cashier/dashboard') ?>" class="logo" style="display: flex; align-items: center;">
                <img src="<?= base_url('assets/img/kaiadmin/RedOscar.jpg') ?>" alt="RedOscarPOS Logo"
                     class="navbar-brand" height="55" width="auto" />
                <span style="color: white; font-size: 1.5rem; font-weight: bold; margin-left: 10px;">RedOscar</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item <?= service('router')->controllerName() === 'CashierDashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('cashier/dashboard') ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                    <h4 class="text-section">Operations</h4>
                </li>

                <li class="nav-item <?= (in_array(service('router')->controllerName(), ['CashierOrder', 'POS'])) ? 'active submenu' : '' ?>">
                    <a data-bs-toggle="collapse" href="#orderManagement" class="collapsed" aria-expanded="false">
                        <i class="fas fa-receipt"></i>
                        <span class="sub-item">Order Management</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?= (in_array(service('router')->controllerName(), ['CashierOrder', 'POS'])) ? 'show' : '' ?>" id="orderManagement">
                        <ul class="nav nav-collapse">
                            <li class="<?= service('router')->controllerName() === 'POS' ? 'active' : '' ?>">
                                <a href="<?= base_url('cashier/pos') ?>"><span class="sub-item">POS</span></a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'CashierOrder' ? 'active' : '' ?>">
                                <a href="<?= base_url('cashier/orders') ?>"><span class="sub-item">Order List</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item <?= (in_array(service('router')->controllerName(), ['CashierTransaction', 'CashierRefund'])) ? 'active submenu' : '' ?>">
                    <a data-bs-toggle="collapse" href="#transactionSection" class="collapsed" aria-expanded="false">
                        <i class="icon-docs"></i>
                        <span class="sub-item">Transactions</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?= (in_array(service('router')->controllerName(), ['CashierTransaction', 'CashierRefund'])) ? 'show' : '' ?>" id="transactionSection">
                        <ul class="nav nav-collapse">
                            <li class="<?= service('router')->controllerName() === 'CashierTransaction' ? 'active' : '' ?>">
                                <a href="<?= base_url('cashier/transactions') ?>"><span class="sub-item">Transaction List</span></a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'CashierRefund' ? 'active' : '' ?>">
                                <a href="<?= base_url('cashier/refunds') ?>"><span class="sub-item">Refund Requests</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item <?= service('router')->controllerName() === 'PrintReceipt' ? 'active' : '' ?>">
                    <a href="<?= base_url('cashier/print-receipt') ?>">
                        <i class="fas fa-print"></i>
                        <p>Print Receipt</p>
                    </a>
                </li>

                <li class="nav-item <?= (in_array(service('router')->controllerName(), ['CashierDailyReport', 'CashierWeeklyReport', 'CashierMonthlyReport'])) ? 'active submenu' : '' ?>">
                    <a data-bs-toggle="collapse" href="#myReports" class="collapsed" aria-expanded="false">
                        <i class="icon-chart"></i>
                        <span class="sub-item">My Reports</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?= (in_array(service('router')->controllerName(), ['CashierDailyReport', 'CashierWeeklyReport', 'CashierMonthlyReport'])) ? 'show' : '' ?>" id="myReports">
                        <ul class="nav nav-collapse">
                            <li class="<?= service('router')->controllerName() === 'CashierDailyReport' ? 'active' : '' ?>">
                                <a href="<?= base_url('cashier/reports/daily') ?>"><span class="sub-item">Daily Report</span></a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'CashierWeeklyReport' ? 'active' : '' ?>">
                                <a href="<?= base_url('cashier/reports/weekly') ?>"><span class="sub-item">Weekly Report</span></a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'CashierMonthlyReport' ? 'active' : '' ?>">
                                <a href="<?= base_url('cashier/reports/monthly') ?>"><span class="sub-item">Monthly Report</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item <?= service('router')->controllerName() === 'CashierActivityLog' ? 'active' : '' ?>">
                    <a href="<?= base_url('cashier/cashier_activity_log') ?>">
                        <i class="fas fa-history"></i>
                        <p>Activity Log</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
