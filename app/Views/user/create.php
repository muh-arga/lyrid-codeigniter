<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="section-header d-flex justify-content-between">
    <h1>User - Create</h1>
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

            <form method="POST" action="<?= base_url('/users/create') ?>">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?= old('password') ?>" required>
                </div>

                <div class="mb-3">
                    <label>Role</label>
                        
                    <select name="role" class="form-control">
                        <?php foreach($roles as $role => $name): ?>
                            <option value="<?= $role ?>" <?= old('role') == $role ? 'selected' : '' ?>><?= $name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-primary">Save</button>
                <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>