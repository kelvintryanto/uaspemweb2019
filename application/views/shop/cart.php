<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cart</h1>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Subtotal</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php
                    $cart_check = $this->cart->contents();
                    $total_price = $this->cart->total();
                    foreach ($cart_check as $cart) {
                        ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td style="text-align:center;"><img style="width: 72px;" src="<?= base_url('assets/img/item/') . $cart['image']; ?>" class="card-img-top"></td>
                            <td>
                                <?= $cart['name']; ?>
                            </td>
                            <td><?= $cart['description']; ?></td>
                            <td width="3%" style="text-align: center">
                                <input type="number" class="form-control" id="amount" name="amount" min="1" max="" value="<?= $cart['qty']; ?>">
                            </td>
                            <td width="12%" class="text-center"><strong><?= "Rp " . number_format($cart['price'], 0, ',', '.'); ?></strong></td>
                            <td width="12%" class="text-center"><strong><?= "Rp " . number_format($cart['price'] * $cart['qty'], 0, ',', '.'); ?></strong></td>
                            <td>
                                <a href="#deleteCart<?php echo $cart['id']; ?>" data-toggle="modal" style="font-size: 1.2em; color: red;">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal Delete Cart -->
                        <div class="modal fade" id="deleteCart<?php echo $cart['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteCart" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure want to delete <?= $cart['name']; ?>?</p>
                                    </div>
                                    <form action="<?= 'deleteCart/' ?>" method="post">
                                        <div class="modal-footer">
                                            <input type="hidden" name="rowid" value="<?= $cart['rowid']; ?>">
                                            <input type="hidden" name="cart_id" value="<?= $cart['id']; ?>">
                                            <button type="submit" class="btn btn-danger" autofocus>Yes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php } ?>
                    <?php if ($cart_check) { ?>
                        <tr>
                            <td colspan="4">
                                <b>
                                    <p>Estimated Total <?= "Rp " . number_format($this->cart->total(), 0, ',', '.'); ?></p>
                                </b>
                            </td>
                            <td colspan="4" align="right">
                                <a type="button" class="btn btn-primary" href="<?= base_url('shop') ?>">
                                    Continue Shopping
                                </a>
                                <button type="button" class="btn btn-success" data-target="#alamat" data-toggle="modal">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
                                </button>
                            </td>

                            <!-- Modal Shipping Address-->
                            <div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Shipping Address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('shop/'); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="receiver">Receiver Name</label>
                                                    <input type="text" class="form-control" id="receiver" name="receiver" placeholder="Name...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="number">Phone Number</label>
                                                    <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="province">Province</label>
                                                    <select name="province" id="province" class="form-control">
                                                        <option value="">Select Province</option>
                                                        <!-- generate province -->
                                                        <?php

                                                        $curl = curl_init();

                                                        curl_setopt_array($curl, array(
                                                            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
                                                            CURLOPT_RETURNTRANSFER => true,
                                                            CURLOPT_ENCODING => "",
                                                            CURLOPT_MAXREDIRS => 10,
                                                            CURLOPT_TIMEOUT => 30,
                                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                            CURLOPT_CUSTOMREQUEST => "GET",
                                                            CURLOPT_HTTPHEADER => array(
                                                                "key: c31c4d2f47fe7e913de7f645a63fa6c9"
                                                            ),
                                                        ));

                                                        $province = curl_exec($curl);
                                                        $err = curl_error($curl);

                                                        curl_close($curl);

                                                        if ($err) {
                                                            echo "cURL Error #:" . $err;
                                                        } else {
                                                            // echo $response;
                                                            // echo "<br><br>";
                                                            $result = json_decode($province, true);
                                                            foreach ($result['rajaongkir']['results'] as $results) {
                                                                echo '<option value=' . $results['province_id'] . '>'  . $results['province'] . '</option>';
                                                            }                                                        
                                                        }
                                                        // harus pakai ajax buat hide and unhide pilihan ketika dipilih
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php } else { ?>
                        <tr align="center">
                            <td colspan="8">Your Cart is Empty</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

