<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="section-header d-flex justify-content-between">
    <h1>Employee</h1>

    <a href="<?= base_url('employees/create') ?>" class="btn btn-primary">Add Employee</a>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body table-responsive">
            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach (session()->get('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($employees)): ?>
                        <tr>
                            <td colspan="6" class="text-center">No employees found.</td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><a href="<?= base_url('employees/detail/' . $employee['id']) ?>"><?= $employee['id'] ?></a></td>
                            <td><img src="<?= base_url('uploads/' . $employee['photo']) ?>" alt="Photo" width="50"></td>
                            <td><?= $employee['name'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= $employee['phone'] ?></td>
                            <td>
                                <a href="<?= base_url('employees/edit/' . $employee['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?= base_url('employees/delete/' . $employee['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete user?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>