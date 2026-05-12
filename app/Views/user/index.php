<?php

use App\Models\UserModel;

?>

<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="section-header d-flex justify-content-between">
    <h1>User</h1>

    <a href="<?= base_url('users/create') ?>" class="btn btn-primary">Add User</a>
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
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="5" class="text-center">No users found.</td>
                        </tr>
                    <?php endif; ?>
                    
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><a href="<?= base_url('users/detail/' . $user['id']) ?>"><?= $user['id'] ?></a></td>
                            <td><?= $user['name'] ?></td>
                            <td><?=  $user['username'] ?></td>
                            <td><?= UserModel::getRoleName($user['role']) ?></td>
                            <td>
                                <a href="<?= base_url('users/edit/' . $user['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?= base_url('users/delete/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete user?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>