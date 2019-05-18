<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Shop Page</h1>
    	

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