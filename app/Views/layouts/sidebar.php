<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="<?= base_url('/') ?>">Lyrid Test</a>
        </div>

        <ul class="sidebar-menu">
            <?php if(session()->get('user')['role'] == 'admin'): ?>
                <li class="<?= $currentPage == 'users' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('/users') ?>">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            <?php endif; ?>

            <li class="<?= $currentPage == 'employees' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/employees') ?>">
                    <i class="fas fa-user"></i>
                    <span>Employees</span>
                </a>
            </li>
        </ul>

    </aside>
</div>