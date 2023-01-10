<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Categories</title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/inventoryClass.php'); 
        $datas = $classInventory->getCategories();
    ?>
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
        <div class="container">
            <div class="card bg-custom-green mb-4">
                <div class="card-header text-center fw-bold text-uppercase text-light">Categories</div>
            </div>
            
            <div class="card">
                <div class="border-custom-green rounded">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                        <div class="d-flex justify-content-start mb-4">
                            <button type="button" class="btn btn-success d-flex align-items-center fw-bold me-2" data-bs-toggle="modal" data-bs-target="#addCategories"><i class="bx bxs-plus-square fs-4 me-2"></i>Add Category</button>
                        </div>

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="d-none">Id</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if(!empty($datas)) { ?>
                                <?php foreach ($datas as $data) { ?>
                                <tr>
                                    <td class="d-none"><?php echo $data['categoryId']; ?></td>
                                    <td><?php echo $data['categoryName']; ?></td>
                                    <td><?php echo $data['categoryDesc']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="updateCategories btn btn-primary" title="Edit Category" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="bx bxs-edit fs-4 align-middle"></i></button>
                                        <button type="button" class="deleteCategories btn btn-danger" title="Delete Category" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="bx bx-trash fs-4 align-middle"></i></button>
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

</body>
</html>