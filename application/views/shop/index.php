<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Shop Page</h1>

    <div class="row">
        <?php foreach ($item as $i) : ?>
            <div class="col-sm-2">
                <div class="card mb-3">
                    <img src="<?= base_url('assets/img/item/') . $i['image']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title mb-0"><?= $i['name']; ?></h5>
                        <p class="card-text mb-0"><?= $i['price']; ?></p>
                        <p class="card-text mb-0">Stock : <?= $i['stock']; ?></p>
                    </div>
                    <div class="col-12 pb-3 justify-content-end">
                        <button class="btn btn-primary col-12" style="font-size: .75rem"><i class="fas fa-shopping-cart"></i> Buy</button>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->