<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="section-header d-flex justify-content-between">
    <h1>Employee - Detail</h1>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="<?= $employee['name'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required value="<?= $employee['email'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required value="<?= $employee['phone'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required value="<?= $employee['address'] ?>" disabled>
            </div>

            <div class="mb-3">
                <label>Photo</label>
                <div>
                    <img src="<?= base_url('uploads/' . $employee['photo']) ?>" alt="Photo" width="500">
                </div>
            </div>

            <a href="<?= base_url('employees') ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>