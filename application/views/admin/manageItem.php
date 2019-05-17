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

    <div class="row">
        <?php foreach ($item as $i) : ?>
            <div class="col-sm-2">
                <div class="card">
                    <img src="<?= base_url('assets/img/item/') . $i['image']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-0"><?= $i['name']; ?></h5>
                        <p class="card-text mb-0"><?= $i['price']; ?></p>
                        <p class="card-text mb-0">Stock : <?= $i['stock']; ?></p>
                        <p class="card-text text-truncate">Posted by : <?= $i['username']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

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
                <div id="userpic" class="userpic">
                    <div class="js-preview userpic__preview"></div>
                    <div class="btn btn-success js-fileapi-wrapper">
                        <div class="js-browse">
                            <!-- <span class="btn-txt">Choose</span> -->
                            <input type="file" class="custom-file-input" name="image" id="image">
                            <label class="custom-file-label btn-txt" for="image">Choose</label>
                        </div>
                        <div class="js-upload" style="display: none;">
                            <div class="progress progress-success">
                                <div class="js-progress bar"></div>
                            </div>
                            <span class="btn-txt">Uploading</span>
                        </div>
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

<div id="popup" class="popup" style="display: none;">
    <div class="popup__body">
        <div class="js-img"></div>
    </div>
    <div style="margin: 0 0 5px; text-align: center;">
        <div class="js-upload btn btn_browse btn_browse_small">Upload</div>
    </div>
</div>