<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cart</h1>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cart_check = $this->cart->contents();
                    foreach ($cart_check as $cart) {
                        ?>
                        <tr>
                            <td class="col-3">
                                <div class="media">
                                    <p class="thumbnail pull-left"> <img class="media-object" src="<?= base_url('assets/img/item/') . $cart['image']; ?>" style="width: 72px; height: 72px;"> </p>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?= $cart['name']; ?></h4>
                                        <span><?= $cart['description']; ?></span><span class="text-success"><strong></strong></span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-1" style="text-align: center">
                                <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                            </td>
                            <td class="col-sm-2"><strong><?= "Rp " . number_format($cart['price'], 0, ',', '.'); ?></strong></td>
                            <td class="col-sm-1 text-center"><strong></strong></td>
                            <td class="col-sm-1">
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if ($cart_check) { ?>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td class="text-right">
                                <h5><strong>$24.59</strong></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <h5>Estimated Shipping</h5>
                            </td>
                            <td class="text-right">
                                <h5><strong>$6.94</strong></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <h3>Total</h3>
                            </td>
                            <td class="text-right">
                                <h3><strong>$31.53</strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <button type="button" class="btn btn-primary">
                                    <span></span> Continue Shopping
                                </button></td>
                            <td>
                                <button type="button" class="btn btn-success">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
                                </button></td>
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