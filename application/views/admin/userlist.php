<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>
    <div class="row">
        <div class="col-lg-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">username</th>
                        <th scope="col" style="text-align:center;">member since</th>
                        <th scope="col" style="text-align:center;">active</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $u['username']; ?></td>
                            <td style="text-align:center;"><?= date('D, d F Y', $u['date_created']); ?></td>
                            <td style="text-align:center;">
                                <?php
                                if ($u['is_active']) {
                                    echo '<i style="color:green; font-size: 1.5em" class="fas fa-check"></i>';
                                } else {
                                    echo '<i style="color:red; font-size: 1.5em" class="fas fa-circle"></i>';
                                }
                                ?>
                            </td>

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