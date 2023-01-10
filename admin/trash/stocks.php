<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Stocks</title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/inventoryClass.php'); 
        $datas = $classInventory->getProducts();
    ?>
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
        <div class="container">
            <div class="card bg-custom-green mb-4">
                <div class="card-header text-center fw-bold text-uppercase text-light">Stocks</div>
            </div>
            
            <div class="card">
                <div class="border-custom-green rounded">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="d-none">Id</th>
                                    <th>Photo</th>
                                    <th>Description</th>
                                    <th class="text-center">Remaining Qty</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if(!empty($datas)) { ?>
                                <?php foreach ($datas as $data) { ?>
                                <tr>
                                    <td class="d-none"><?php echo $data['productId']; ?></td>
                                    <td><img src="<?php echo "../" . $data['productImgs']; ?>" width="50" height="50" alt=""></td>
                                    <td><?php echo $data['productDesc']; ?></td>

                                    <?php if ($data['quantity'] == 0 ) { ?>
                                        <td class="bg-danger text-light text-center"><?php echo $data['quantity']; ?></td>
                                    <?php } elseif ($data['quantity'] <= 20 ) {?>
                                        <td class="bg-warning text-light text-center"><?php echo $data['quantity']; ?></td>
                                    <?php } else { ?>
                                        <td class="bg-success text-light text-center"><?php echo $data['quantity']; ?></td>
                                    <?php } ?>

                                    <td class="text-center">
                                        <button type="button" class="addProductStock btn btn-primary" title="Add Stock" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="bx bx-plus-circle fs-4 align-middle"></i></button>
                                        <button type="button" class="removeProductStock btn btn-danger" title="Deduct Stock" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="bx bx-minus-circle fs-4 align-middle"></i></button>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>     
            </div>

            <?php include_once('assets/components/inventoryModals.php'); ?>

        </div>
    </main>

    <?php include_once('assets/components/footer.php'); ?>
    
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>
</html>