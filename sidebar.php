<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="<?= base_url('admin/dashboard') ?>" class="logo" style="display: flex; align-items: center;">
                <img
                        src="<?= base_url('assets/img/kaiadmin/RedOscar.jpg') ?>"
                        alt="RedOscarPOS Logo"
                        class="navbar-brand"
                        height="55"
                        width="55" // Set width equal to height for a perfect circle
                style="border-radius: 50%; object-fit: cover;"
                />
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
                <li class="nav-item <?= service('router')->controllerName() === 'AdminDashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/dashboard') ?>" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Admin Dashboard</p> </a>
                </li>

                <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
                    <h4 class="text-section">Management</h4>
                </li>

                <li class="nav-item
            <?= (in_array(service('router')->controllerName(), ['Menu', 'CategoryController', 'Orders'])) ? 'active submenu' : '' ?>">
                    <a data-bs-toggle="collapse" href="#menuManagement" class="collapsed" aria-expanded="false">
                        <i class="icon-lock-open me-2"></i> <span class="sub-item">Menu Management</span> <span class="caret"></span>
                    </a>
                    <div class="collapse
            <?= (in_array(service('router')->controllerName(), ['Menu', 'CategoryController', 'Orders'])) ? 'show' : '' ?>" id="menuManagement">
                        <ul class="nav nav-collapse">
                            <li class="<?= (service('router')->methodName() === 'index' && service('router')->controllerName() === 'Menu') ? 'active' : '' ?>">
                                <a href="<?= base_url('admin/menu') ?>"> <span class="sub-item">Menu List</span>
                                </a>
                            </li>
                            <li class="<?= (service('router')->methodName() === 'new' && service('router')->controllerName() === 'Menu') ? 'active' : '' ?>">
                                <a href="<?= base_url('admin/menu/new') ?>"> <span class="sub-item">Add New Menu</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'CategoryController' ? 'active' : '' ?>">
                                <a href="<?= base_url('categories') ?>">
                                    <span class="sub-item">Categories</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'Orders' ? 'active' : '' ?>">
                                <a href="<?= base_url('orders') ?>">
                                    <span class="sub-item">Orders</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
            <?= (in_array(service('router')->controllerName(), ['Transaction', 'TransactionHistory', 'Refunds'])) ? 'active submenu' : '' ?>">
                    <a data-bs-toggle="collapse" href="#transactionManagement" class="collapsed" aria-expanded="false">
                        <i class="icon-docs me-2"></i> <span class="sub-item">Transaction Management</span> <span class="caret"></span>
                    </a>
                    <div class="collapse
            <?= (in_array(service('router')->controllerName(), ['Transaction', 'TransactionHistory', 'Refunds'])) ? 'show' : '' ?>" id="transactionManagement">
                        <ul class="nav nav-collapse">
                            <li class="<?= (service('router')->methodName() === 'index' && service('router')->controllerName() === 'Transaction') ? 'active' : '' ?>">
                                <a href="<?= base_url('transaction') ?>">
                                    <span class="sub-item">Transactions</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'TransactionHistory' ? 'active' : '' ?>">
                                <a href="<?= base_url('transaction/history') ?>">
                                    <span class="sub-item">Transaction History</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'Refunds' ? 'active' : '' ?>">
                                <a href="<?= base_url('transaction/refunds') ?>">
                                    <span class="sub-item">Refunds</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
            <?= (in_array(service('router')->controllerName(), ['Report', 'DailyReport', 'WeeklyReport', 'MonthlyReport'])) ? 'active submenu' : '' ?>">
                    <a data-bs-toggle="collapse" href="#reportsAnalytics" class="collapsed" aria-expanded="false">
                        <i class="icon-chart me-2"></i> <span class="sub-item">Report Analytics</span> <span class="caret"></span>
                    </a>
                    <div class="collapse
            <?= (in_array(service('router')->controllerName(), ['Report', 'DailyReport', 'WeeklyReport', 'MonthlyReport'])) ? 'show' : '' ?>" id="reportsAnalytics">
                        <ul class="nav nav-collapse">
                            <li class="<?= (service('router')->methodName() === 'index' && service('router')->controllerName() === 'Report') ? 'active' : '' ?>">
                                <a href="<?= base_url('report') ?>">
                                    <span class="sub-item">Overview</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'DailyReport' ? 'active' : '' ?>">
                                <a href="<?= base_url('report/daily') ?>">
                                    <span class="sub-item">Daily Report</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'WeeklyReport' ? 'active' : '' ?>">
                                <a href="<?= base_url('report/weekly') ?>">
                                    <span class="sub-item">Weekly Report</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'MonthlyReport' ? 'active' : '' ?>">
                                <a href="<?= base_url('report/monthly') ?>">
                                    <span class="sub-item">Monthly Report</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item
            <?= (in_array(service('router')->controllerName(), ['ManageCashier', 'CashierRequest', 'ActivityLog'])) ? 'active submenu' : '' ?>">
                    <a data-bs-toggle="collapse" href="#cashierManagement" class="collapsed" aria-expanded="false">
                        <i class="icon-user me-2"></i> <span class="sub-item">Manage Cashiers</span> <span class="caret"></span>
                    </a>
                    <div class="collapse
            <?= (in_array(service('router')->controllerName(), ['ManageCashier', 'CashierRequest', 'ActivityLog'])) ? 'show' : '' ?>" id="cashierManagement">
                        <ul class="nav nav-collapse">
                            <li class="<?= (service('router')->methodName() === 'index' && service('router')->controllerName() === 'ManageCashier') ? 'active' : '' ?>">
                                <a href="<?= base_url('admin/manage-cashiers') ?>">
                                    <span class="sub-item">Cashiers</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'CashierRequest' ? 'active' : '' ?>">
                                <a href="<?= base_url('admin/request') ?>">
                                    <span class="sub-item">Request Report</span>
                                </a>
                            </li>
                            <li class="<?= service('router')->controllerName() === 'ActivityLog' ? 'active' : '' ?>">
                                <a href="<?= base_url('admin/activity-log') ?>">
                                    <span class="sub-item">Activity Log</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" >
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

