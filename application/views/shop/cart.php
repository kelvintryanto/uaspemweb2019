<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cart</h1>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>

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
                            <td><?= $i; ?></td>
                            <td style="text-align:center;"><img style="width: 72px;" src="<?= base_url('assets/img/item/') . $cart['image']; ?>" class="card-img-top"></td>
                            <td>
                                <?= $cart['name']; ?>
                            </td>
                            <td><?= $cart['description']; ?></td>
                            <td width="3%" style="text-align: center">
                                <?= $cart['qty']; ?>
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
                                    <p>Estimated Total <?= "Rp " . number_format($total_price, 0, ',', '.'); ?></p>
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
                                        <form action="<?= base_url('shop/cart'); ?>" method="post">
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
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                                                </div>
                                                <!-- <div class="form-group">
                                                            <label for="province">Province</label>
                                                            <select name="province" id="provinceSelect" class="form-control">
                                                            <option value="">Select province</option>
                                                            <?php foreach ($province as $province) { ?>
                                                                                                                        <option value="<?= $province['province_id'] ?>"><?= $province['province'] ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            </div> -->
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <select name="city" id="city" class="form-control">
                                                        <option value="">Select City</option>
                                                        <?php foreach ($city as $cityOps) { ?>
                                                            <option value="<?= $cityOps['city_id'] ?>"><?= $cityOps['city_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="courier">Courier</label>
                                                    <select name="courier" id="courier" class="form-control">
                                                        <option value="">Select Courier</option>
                                                        <option value="jne">JNE</option>
                                                        <option value="tiki">TIKI</option>
                                                        <option value="pos">POS</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Confirm Shipping</button>
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

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('#provinceSelect').on('change', function() {
            var provinceID = $(this).val();
            if(provinceID!=''){
                $.ajax({
                    url: "fetchCity",
                    method:"post",
                    data: {provinceID: provinceID},
                    dataType:"JSON",
                    success: function(data){
                        console.log(data);
                    }
                })
            }
        });
    });
</script> -->