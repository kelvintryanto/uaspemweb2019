<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Shop Page</h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>
    <div class="flash_message">
        <?= $this->session->flashdata('message') ?>
    </div>

    <div class="row">
        <?php foreach ($item as $i) : ?>
            <div class="col-sm-2">
                <div class="card mb-3">
                    <img src="<?= base_url('assets/img/item/') . $i['image']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-0"><?= $i['name']; ?></h5>
                        <p class="card-text mb-0"><?= "Rp  " . number_format($i['price'], 0, ',', '.'); ?></p>
                        <?php if ($i['stock'] > 0) {
                            echo "<p class='card-text mb-0'>Stock : " . $i['stock'];
                        } else {
                            echo "<p class='card-text mb-0' style='color:red;'>Out of Stock";
                        };
                        ?>
                        </p>
                    </div>
                    <form action="<?= 'shop/addtoCart/' . $i['id']; ?>" method="post">
                        <div class="form-group col-12">
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="amount" min="0" max="<?= $i['stock'] ?>">
                            <?= form_error('amount', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="col-12 pb-3 justify-content-end">
                            <button type="submit" name="addtoCart" class="btn btn-primary col-12" style="font-size: .75rem"><i class="fas fa-shopping-cart"></i> Buy</button>
                        </div>
                    </form>
                </div>
            </div>

        <?php endforeach ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->