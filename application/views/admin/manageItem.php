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

    <?= $this->session->flashdata('message') ?>


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
                        <a href="" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                        <a href="" style="font-size: 1.2em; color: red;"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
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

<!-- Modal -->
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