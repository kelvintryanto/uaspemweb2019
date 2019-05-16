<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sub Menu Management</h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message') ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewSubMenu">Add New Sub Menu</a>
            <h2>belum ada edit dan delete</h2>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col" style="text-align: center;">Active</th>
                        <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($subMenu as $dataSubMenu) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $dataSubMenu['title']; ?></td>
                            <td><?= $dataSubMenu['menu']; ?></td>
                            <td><?= $dataSubMenu['url']; ?></td>
                            <td><?= $dataSubMenu['icon']; ?></td>
                            <td style="text-align: center;">
                                <?php
                                if ($dataSubMenu['is_active'] == 1) {
                                    echo '<i style="color:green; font-size: 1.5em" class="fas fa-check"></i>';
                                } else {
                                    echo '<i style="color:red; font-size: 1.5em" class="fas fa-circle"></i>';
                                }
                                ?></td>
                            <td style="text-align: center;">
                                <a href="" data-toggle="modal" data-target="#editMenu" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                                <a href="" data-toggle="modal" data-target="#deleteMenu" style="font-size: 1.2em; color: red;"><i class="fas fa-trash"></i></a>
                            </td>
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

<!-- Modal New Sub Menu-->
<div class="modal fade" id="addNewSubMenu" tabindex="-1" role="dialog" aria-labelledby="addNewSubMenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewSubMenu">Create New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Type New Sub Menu Name...">
                    </div>
                    <div class="form-group">
                        <select name="submenu_id" id="submenu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $dataMenu) : ?>
                                <option value="<?= $dataMenu['id']; ?>"><?= $dataMenu['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Type New URL Name...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Type New Icon Font Awesome Name...">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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

<!-- Modal Edit Menu -->
<div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="editMenu" aria-hidden="true">
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

<!-- Modal Delete Menu -->
<div class="modal fade" id="deleteMenu" tabindex="-1" role="dialog" aria-labelledby="deleteMenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMenu">Delete Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete menu?</p>
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