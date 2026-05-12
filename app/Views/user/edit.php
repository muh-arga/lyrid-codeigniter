<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="section-header d-flex justify-content-between">
    <h1>User - Edit</h1>
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

            <form method="POST" action="<?= base_url('/users/edit/' . $user['id']) ?>">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required value="<?= old('name', $user['name']) ?>">
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required value="<?= old('username', $user['username']) ?>">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <?php foreach($roles as $role => $name): ?>
                            <option value="<?= $role ?>" <?= old('role', $user['role']) == $role ? 'selected' : '' ?>><?= $name ?></option>
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