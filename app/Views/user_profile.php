<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Picture & Paging</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="file"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background-color: #0056b3; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .avatar-img { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; }
        .alert-success { background-color: #d4edda; color: #155724; }
        .pagination { margin-top: 15px; }
        .pagination a, .pagination span { padding: 8px 12px; border: 1px solid #ddd; margin-right: 5px; text-decoration: none; color: #0056b3; }
        .pagination .active { background-color: #0056b3; color: white; border: 1px solid #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Hands-On Activity: Profile Picture & Paging</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('users/upload') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="name">User Name:</label>
            <input type="text" name="name" id="name" value="<?= old('name') ?>" required>
        </div>
        <div class="form-group">
            <label for="avatar">Profile Picture:</label>
            <input type="file" name="avatar" id="avatar" accept="image/*" required>
        </div>
        <button type="submit">Upload & Save</button>
    </form>

    <hr style="margin: 40px 0;">

    <h3>User Directory</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td>
                            <?php if ($user['avatar']): ?>
                                <img src="<?= base_url('uploads/' . $user['avatar']) ?>" class="avatar-img" alt="Avatar">
                            <?php else: ?>
                                <img src="<?= base_url('uploads/default.png') ?>" class="avatar-img" alt="Default Avatar">
                            <?php endif; ?>
                        </td>
                        <td><?= esc($user['name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?= $pager->links() ?>
    </div>
</div>

</body>
</html>