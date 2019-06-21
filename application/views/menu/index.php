<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Menu Management</h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" style="text-align: center" role="alert">', '</div>') ?>
            <div class="flash_message">
                <?= $this->session->flashdata('message') ?>
            </div>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewMenu">Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menu as $dataMenu) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $dataMenu['menu']; ?></td>
                            <td>
                                <a href="#editMenu<?php echo $dataMenu['id']; ?>" data-toggle="modal" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                                <a href="#deleteMenu<?php echo $dataMenu['id']; ?>" data-toggle="modal" style="font-size: 1.2em; color: red;"><i class="fas fa-trash"></i></a>
                            </td>

                            <!-- Modal Edit Menu -->
                            <div class="modal fade" id="editMenu<?php echo $dataMenu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenu" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editMenu">Edit Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= 'menu/update/' . $dataMenu['id']; ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $dataMenu['menu']; ?>">
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

                            <!-- Modal Delete Menu -->
                            <div class="modal fade" id="deleteMenu<?php echo $dataMenu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteMenu" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteMenu">Delete Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure want to delete menu <b><?= $dataMenu['menu']; ?></b> ?</p>
                                        </div>
                                        <form action="<?= 'menu/delete/' . $dataMenu['id']; ?>" method="post">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" autofocus>Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal New Menu-->
<div class="modal fade" id="addNewMenu" tabindex="-1" role="dialog" aria-labelledby="addNewMenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewMenu">Create New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Type New Menu Name...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>