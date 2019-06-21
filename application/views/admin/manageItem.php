<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Manage Item
        <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#addNewItem">
            Add New Item
        </button>
    </h1>


    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>

    <div class="flash_message">
        <?= $this->session->flashdata('message') ?>
    </div>


    <table id="example" class="display" style="width:100%">
        <?php $i = 1 ?>
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name Item</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Posted by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($item as $item) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><img style="width: 30px;" src="<?= base_url('assets/img/item/') . $item['image']; ?>" class="card-img-top"></td>
                    <td><?= $item['name']; ?></td>
                    <td><?= $item['price']; ?></td>
                    <td><?= $item['stock']; ?></td>
                    <td><?= $item['username']; ?></td>
                    <td>
                        <!-- editItem -->
                        <a href="#editItem<?php echo $item['id']; ?>" data-toggle="modal" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                        <!-- deleteItem -->
                        <a href="#deleteItem<?php echo $item['id']; ?>" data-toggle="modal" style="font-size: 1.2em; color: red;">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <!-- Modal Delete Item -->
                <div class="modal fade" id="deleteItem<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteItem" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteItem<?php echo $item['id']; ?>">Delete Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete item?</p>
                            </div>
                            <form action="<?= 'delete/' . $item['id']; ?>" method="post">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" autofocus>Yes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Menu -->
                <div class="modal fade" id="editItem<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editItem" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= 'update/' . $item['id']; ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Item Name" value="<?= $item['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" value="<?= $item['stock']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= $item['price']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"><?= $item['description']; ?></textarea>
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
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name Item</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Posted by</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal add item -->
<div class="modal fade" id="addNewItem" tabindex="-1" role="dialog" aria-labelledby="addNewItem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewItem">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- form_open_multipart untuk upload image dalam codeigniter -->
            <!-- supaya bisa upload ke folder asset -->
            <?= form_open_multipart('admin/manageItem'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Item Name">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Item</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- End of Modal -->