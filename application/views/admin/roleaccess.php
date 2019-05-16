<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Role Access <?= $role['role']; ?></h1>

    <div class="row">
        <div class="col-lg-3">
            <?= $this->session->flashdata('message') ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col" style="text-align:center;">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menu as $dataMenu) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $dataMenu['menu']; ?></td>
                            <td>
                                <div class="form-check" style="text-align:center;">
                                    <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $dataMenu['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $dataMenu['id']; ?>">
                                </div>
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