<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="section-header d-flex justify-content-between">
    <h1>Employee - Create</h1>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->get('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" action="<?= base_url('/employees/create') ?>">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= old('phone') ?>" required>
                </div>
                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?= old('address') ?>" required>
                </div>
                <div class="mb-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" accept=".jpg,.jpeg" required>
                </div>
                <button class="btn btn-primary">Save</button>
                <a href="<?= base_url('employees') ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>