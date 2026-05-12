<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="section-header d-flex justify-content-between">
    <h1>Employee - Edit</h1>
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

            <form method="POST" enctype="multipart/form-data" action="<?= base_url('employees/edit/' . $employee['id']) ?>">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required value="<?= old('name', $employee['name']) ?>">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required value="<?= old('email', $employee['email']) ?>">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" required value="<?= old('phone', $employee['phone']) ?>">
                </div>
                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required value="<?= old('address', $employee['address']) ?>">
                </div>

                <div class="mb-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" accept=".jpg,.jpeg">
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="<?= base_url('employees') ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>