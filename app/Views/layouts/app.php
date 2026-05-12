<?php include(APPPATH . 'Views/layouts/header.php'); ?>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <!-- Navbar -->
        <?php include(APPPATH . 'Views/layouts/navbar.php'); ?>

        <!-- Sidebar -->
        <?php include(APPPATH . 'Views/layouts/sidebar.php'); ?>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <?= $this->renderSection('content') ?>
            </section>
        </div>
    </div>
</div>

<?php include(APPPATH . 'Views/layouts/footer.php'); ?>