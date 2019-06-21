<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>

    <div class="flash_message">
        <?= $this->session->flashdata('message') ?>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Username</th>
                        <th scope="col" style="text-align:center;">Member Since</th>
                        <th scope="col" style="text-align:center;">Role</th>
                        <th scope="col" style="text-align:center;">Activated Email</th>
                        <th scope="col" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td style="text-align:center;"><img style="width: 30px;" src="<?= base_url('assets/img/profile/') . $u['image']; ?>" class="card-img-top"></td>
                            <td><?= $u['username']; ?></td>
                            <td style="text-align:center;"><?= date('D, d F Y', $u['date_created']); ?></td>
                            <td style="text-align:center;">
                                <?php foreach ($user_role as $ur) {
                                    if ($u['role_id'] == $ur['id']) {
                                        echo $ur['role'];
                                    }
                                } ?>
                            </td>
                            <td style="text-align:center;">
                                <?php
                                if ($u['is_active']) {
                                    echo '<i style="color:green; font-size: 1.5em" class="fas fa-check"></i>';
                                } else {
                                    echo '<i style="color:red; font-size: 1.5em" class="fas fa-circle"></i>';
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if ($u['id'] != $user['id']) { ?>
                                    <a href="#editUser<?php echo $u['id']; ?>" data-toggle="modal" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                                    <a href="#deleteUser<?php echo $u['id']; ?>" data-toggle="modal" style="font-size: 1.2em; color: red;"><i class="fas fa-trash"></i></a>
                                <?php } ?>
                            </td>

                            <!-- Modal Delete User -->
                            <div class="modal fade" id="deleteUser<?php echo $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteItem" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteItem<?php echo $u['id']; ?>">Delete Item</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure want to delete this user?</p>
                                            <div class="card mb-3" style="max-width: 540px;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" class="card-img" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $u['username']; ?></h5>
                                                            <p class="card-text"><?= $u['email']; ?></p>
                                                            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $u['date_created']); ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?= 'deleteUser/' . $u['id']; ?>" method="post">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" autofocus>Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit User -->
                            <div class="modal fade" id="editUser<?php echo $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editItem" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Item</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= 'updateUser/' . $u['id']; ?>" method="post">
                                            <div class="modal-body">
                                                <div class="col-md-4 mx-auto mb-1">
                                                    <img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" class="card-img" alt="...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?= $u['username']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= $u['email']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select name="role" id="role" class="form-control">
                                                        <?php foreach ($user_role as $role) {
                                                            if ($u['role_id'] == $role['id']) {
                                                                echo '<option selected="selected" value=' . $role['id'] . " > " . $role['role'] . '</option>';
                                                            } else {
                                                                echo '<option value=' . $role['id'] . '>'  . $role['role'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <!-- <input type=" text " class=" form - control " id=" role " name=" role " placeholder=" role " value=" < ? = $u['role_id']; ?>"> -->
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?= check_activeuser($u['id']) ?> value="1">
                                                        <label class="form-check-label" for="is_active">Active?</label>
                                                    </div>
                                                    <!-- <label for="is_active">Active</label> -->
                                                    <!-- <input type="number" class="form-control" id="is_active" name="is_active" placeholder="Activate Address" value="<?= $u['is_active']; ?>"> -->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->