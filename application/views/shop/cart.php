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
                        <th class="text-center">Subtotal</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cart_check = $this->cart->contents();
                    $total_price = $this->cart->total();
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
                                <input type="number" class="form-control" id="amount" name="amount" min="1" max="<?= $cart['stock']; ?>" value="<?= $cart['qty']; ?>">
                            </td>
                            <td class="col-sm-2"><strong><?= "Rp " . number_format($cart['price'], 0, ',', '.'); ?></strong></td>
                            <td class="col-sm-1 text-center"><strong><?= $cart['price'] * $cart['qty']; ?></strong></td>
                            <td class="col-sm-1">
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
                                        <h5 class="modal-title" id="deleteCart<?php echo $cart['id']; ?>">Delete Item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure want to delete <?= $cart['name']; ?>?</p>
                                    </div>
                                    <form action="<?= 'deleteCart/' . $cart['id']; ?>" method="post">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" autofocus>Yes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($cart_check) { ?>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <h5>Estimated Total</h5>
                            </td>
                            <td class="text-right">
                                <h5><strong><?= "Rp " . number_format($this->cart->total(), 0, ',', '.'); ?></strong></h5>
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
                                <h5><strong><?= "Rp " . number_format(9000, 0, ',', '.'); ?></strong></h5>
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
                                <h3>
                                    <strong>
                                        <?php $total = $this->cart->total() + 9000;
                                        echo "Rp " . number_format($total, 0, ',', '.');
                                        ?>
                                    </strong>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <a type="button" class="btn btn-primary" href="<?= base_url('shop') ?>">
                                    Continue Shopping
                                </a>
                            </td>
                            <td>
                                <a type="button" class="btn btn-success" href="<?= base_url('shop/payment/'); ?>">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
                                </a>
                            </td>
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