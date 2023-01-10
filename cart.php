<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>My Cart</title>
</head>
<body class="d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php');
        include_once('classes/inventoryClass.php');
        
        if (!empty($userdetails)) {  
            $userId = $userdetails['userId'];
            $datas = $classInventory->getCart($userId);
            $infos = $classInventory->getOrderId();

            if (!empty($infos)) {
                foreach ($infos as $info) {
                    $orderId = $info;
                }
            }

            if(!empty($datas)) {
                foreach ($datas as $data) {
                    $myCartCount = count($datas);
                }
            } else {
                echo "<script>
                    swal('Your cart is empty!', 'Please add item(s) first!', 'warning').then(function() {
                    window.location.assign('index.php?route=home');
                });
                </script>";
            }    
    ?>

        <?php $classInventory->checkOut(); ?>
        
        <form id="cartForm" method="post">
            <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
                <div class="border-bottom-custom-green mb-4 mt-1">
                    <div class="card-header text-center fw-bold text-uppercase d-flex align-items-start pb-2 text-custom-green">
                        <i class="fa-solid fa-cart-shopping fa-fw fs-4 me-2"></i>My Cart (<?php echo $myCartCount ?? "0"; ?>)
                    </div>
                </div>
                
                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">
                            
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="d-none"></th>
                                            <th></th>
                                            <th>Description</th>
                                            <th class="text-center">Unit Price</th>
                                            <th>Quantity</th>
                                            <th class="text-center">Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php if(!empty($datas)) { ?>
                                        <?php foreach ($datas as $data) { ?>
                                        <tr>

                                            <td>
                                                <input type="checkbox" name="cartIds[]" value="<?php echo $data['cartId']; ?>" autocomplete="off">
                                            </td>

                                            <td class="d-none"><?php echo $data['cartId']; ?></td>

                                            <td>
                                                <img src="<?php echo $data['productImgs']; ?>" width="100" height="100" alt="">
                                            </td>

                                            <td>
                                                <?php echo $data['productDesc'] . " (" . $data['model'] . ")" . " - " . $data['weight'] . " " .$data['unit'] ; ?>
                                            </td>

                                            <td class="text-end">
                                                <input type="text" id="input-price-<?php echo $data['cartId']; ?>" class="form-control-plaintext text-center w-auto" value="₱<?php echo number_format($data['unitPrice'], 2); ?>">
                                            </td>

                                            <td>
                                                <div class="input-group mt-3" style="width: 10rem">
                                                    <button type="button" class="btn btn-danger" onClick="decrementQuantity(<?php echo $data['cartId']; ?>)">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    
                                                    <input type="text" id="input-quantity-<?php echo $data['cartId']; ?>" name="itemQuantity" class="form-control text-center itemQuantity" value="<?php echo $data['productQty']; ?>" min="1" max="<?php echo $data['quantity']; ?>" readonly>

                                                    <button type="button" class="btn btn-success" onClick="incrementQuantity(<?php echo $data['cartId']; ?>)">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div>
                                                <p class="text-center mt-2" style="font-size: .85rem">Available: <strong><?php echo $data['quantity']; ?></strong></p>
                                            </td>

                                            <td class="text-end">
                                                <input type="text" id="input-total-<?php echo $data['cartId']; ?>" class="form-control-plaintext text-center w-auto subTotal" value="₱<?php echo number_format($data['total'], 2); ?>">
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger deleteProductCart" title=""><i class="fa-solid fa-xmark fs-4 align-middle"></i></button>
                                            </td>

                                            <td><input type="hidden" name="productQty[]" value="<?php echo $data['productQty']; ?>"></td>
                                            <td><input type="hidden" name="productQuantity[]" value="<?php echo $data['quantity']; ?>"></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                                
                            
                        </div>
                    </div>     
                </div>
            </main>
            <div class="container-fluid sticky-bottom">
                <div class="bg-dark bg-opacity-50 p-3 d-flex align-items-center justify-content-end">
                    <div class="text-light mt-auto mb-auto me-2">
                        <p class="selectedItems m-auto fs-4">0<span> Item(s): </span></p>
                        <input type="hidden" class="totalSelectedItems" name="totalSelectedItems" value="0">
                    </div>
                    <div class="text-light me-4">
                        <p class="totalPrice m-auto fs-4">₱0.00</p>
                        <input type="hidden" class="totalAmount" name="totalAmount" value="0">
                    </div>
                    <div class="text-light">
                        <input type="hidden" class="totalQuantities" name="totalQuantities" value="0">
                        <input type="hidden" class="userId" name="userId" value="<?php echo $userId; ?>">
                        <input type="hidden" class="orderId" name="orderId" value="<?php echo $orderId ?? "0"; ?>">
                    </div>
                    <div class="">
                        <button type="submit" name="checkOut" class="btn btn-lg btn-warning d-flex align-items-center justify-content-center"><i class="fa-solid fa-cart-shopping fs-4 me-2"></i><strong>Check Out</strong></button>
                    </div>
                </div>
            </div>
        </form>

    <?php include_once('assets/components/footer.php'); ?>

    <?php } else {
        $userId = null;
        echo "<script>
            swal('Warning!', 'Please Sign in first!', 'warning').then(function() {
                window.location.assign('index.php?route=signin');
            });
        </script>";
    } ?>
</body>
</html>