<!-- Adding of Products Modal -->
<?php $classInventory->addProduct(); ?>
<div class="modal fade" id="addProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border border-success border-5 rounded">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="formAddProd">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-square-plus fs-5 me-2"></i>
                        <div>
                            <strong>New Product</strong>
                        </div>
                    </div>

                    <div class="upload-photo d-flex justify-content-center">
                        <div class="upload-photo-product">
                            <div class="preview-photo-product">
                                <div class="preview">
                                    <img src="../uploads/product-default-img.png" id="photo-previewer-product">
                                    <input type="file" id="file-preview-product" accept="image/*" name="imageProduct" onchange="previewImageProduct(event);">
                                    <label for="file-preview-product"><i class=""></i>Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="userUId" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="productDesc" id="productDesc" class="form-control" placeholder="Product Description" pattern="[a-zA-Z0-9-_.ñ\s()/]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label for="productDesc">Product Description</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="model" id="model" class="form-control" placeholder="Model" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label for="model">Model</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="detailedDesc" id="detailedDesc" class="form-control" placeholder="Detailed Description" style="height: 5rem;" required></textarea>
                                <label for="detailedDesc">Detailed Description</label>
                            </div>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-money-bill-wave fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="unitPrice" id="unitPrice" class="form-control" placeholder="Unit Price" pattern="[0-9₱.]+" title="Must contain numbers" required>
                                <label for="unitPrice">Unit Price</label>
                            </div>
                        </div>
                    
                        <?php $datas = $classInventory->getCategories(); ?>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-hand-pointer fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="category" name="category" onchange="selectCategory();" required>
                                    <?php if(!empty($datas)) { ?>
                                    <?php foreach ($datas as $data) { ?>
                                        <option value="<?php echo $data['categoryId'] ?? ""; ?>"><?php echo $data['categoryName'] ?? ""; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                                <label for="category">Category</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="weight" id="weight" class="form-control" placeholder="Weight" pattern="[0-9.]+" title="Must contain numbers and symbol (.)" required>
                                <label for="weight">Weight</label>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-floating">
                                    <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="unit" name="unit" onchange="checkUnit(this.value);">
                                        <option value="Grams">Grams</option>
                                        <option value="Kilograms">Kilograms</option>
                                        <option value="Milligrams">Milligrams</option>
                                        <option value="Micrograms">Micrograms</option>
                                        <option value="Quintal">Quintal</option>
                                        <option value="Pound">Pound</option>
                                        <option value="Ounce">Ounce</option>
                                        <option value="Others">Others...</option>
                                    </select>
                                    <label for="unit">Unit</label>        
                                </div>

                                <div class="form-floating">
                                    <input type="text" name="otherUnit" id="otherUnit" class="form-control" placeholder="Other Unit" style="display: none;">
                                    <label for="otherUnit" id="otherUnitLabel" style="display: none;">Other Unit</label>
                                </div>  
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-boxes-stacked fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity" pattern="[0-9]+" title="Must contain numbers" required>
                                <label for="quantity">Quantity</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success d-flex align-items-center" onclick="undisplayedOtherUnit()"><i class="fa-solid fa-repeat"></i>&nbsp<strong>&nbsp&nbsp&nbspReset&nbsp&nbsp&nbsp</strong></button>
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="addProduct"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal" onclick="undisplayedOtherUnit()"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- Adding of Products Modal -->

<!-- Updating of Products Stock Modal -->
<?php $classInventory->updateProduct(); ?>
<div class="modal fade" id="updateProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border border-primary border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="formUpdateProd">

                    <div class="alert alert-primary d-flex align-items-center">
                        <i class="fa-solid fa-pen-to-square fs-5 me-2"></i>
                        <div>
                            <strong>Update Product</strong>
                        </div>
                    </div>

                    <div class="upload-photo d-flex justify-content-center">
                        <div class="upload-photo-product">
                            <div class="update-photo-product">
                                <div class="update">
                                    <img src="" id="photo-update-product">
                                    <input type="file" id="file-update-product" accept="image/*" name="updateProduct" onchange="updateImageProduct(event);">
                                    <label for="file-update-product"><i class=""></i>Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="updateProductPhotoDir" id="updateProductPhotoDir">
                    <input type="hidden" name="updateProductID" id="updateProductID">
                    <input type="hidden" name="updateUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-cart-shopping fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="updateProductDesc" id="updateProductDesc" class="form-control" placeholder="Product Description" pattern="[a-zA-Z0-9-_.ñ\s()/]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label for="updateProductDesc">Product Description</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-cart-shopping fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="updateModel" id="updateModel" class="form-control" placeholder="Model" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label for="updateModel">Model</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="updateDetailedDesc" id="updateDetailedDesc" class="form-control" placeholder="Detailed Description" style="height: 5rem;" required></textarea>
                                <label for="updateDetailedDesc">Detailed Description</label>
                            </div>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-money-bill-wave fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="updateUnitPrice" id="updateUnitPrice" class="form-control" placeholder="Unit Price" pattern="[0-9₱.]+" title="Must contain numbers" required>
                                <label for="updateUnitPrice">Unit Price</label>
                            </div>
                        </div>
                    
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-hand-pointer fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="updateCategory" name="updateCategory">
                                    <?php if(!empty($datas)) { ?>
                                    <?php foreach ($datas as $data) { ?>
                                        <option value="<?php echo $data['categoryId'] ?? ""; ?>"><?php echo $data['categoryName'] ?? ""; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                                <label for="updateCategory">Category</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-hand-pointer fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="updateWeight" id="updateWeight" class="form-control" placeholder="Weight" pattern="[0-9.]+" title="Must contain numbers and symbol (.)" required>
                                <label for="updateWeight">Weight</label>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-floating">
                                    <select class="form-select" style="height: 3.6rem;" aria-label=".form-select-lg example" id="updateUnit" name="updateUnit" onchange="updateCheckUnit(this.value);">
                                        <option value="Grams">Grams</option>
                                        <option value="Kilograms">Kilograms</option>
                                        <option value="Milligrams">Milligrams</option>
                                        <option value="Micrograms">Micrograms</option>
                                        <option value="Quintal">Quintal</option>
                                        <option value="Pound">Pound</option>
                                        <option value="Ounce">Ounce</option>
                                        <option value="Others">Others...</option>
                                    </select>
                                    <label for="updateUnit">Unit</label>        
                                </div>

                                <div class="form-floating">
                                    <input type="text" name="updateOtherUnit" id="updateOtherUnit" class="form-control" placeholder="Other Unit" style="display: none;">
                                    <label for="updateOtherUnit" id="updateUnitLabel" style="display: none;">Other Unit</label>
                                </div>  
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="updateProduct"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal" onclick="updateUndisplayedOtherUnit()"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Updating of Products Modal -->

<!-- Viewing of Products Stock Modal -->
<div class="modal fade" id="viewProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-warning border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="formUpdateProd">

                    <div class="alert alert-warning d-flex align-items-center">
                        <i class="fa-solid fa-eye fs-5 me-2"></i>
                        <div>
                            <strong>View Product</strong>
                        </div>
                    </div>

                    <div class="upload-photo d-flex justify-content-center">
                        <div class="upload-photo-product">
                            <div class="view-photo-product mb-3">
                                <div class="view">
                                    <img src="" id="photo-view-product">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-warning bg-opacity-25"><i class="fa-solid fa-cart-shopping fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="viewProductDesc" id="viewProductDesc" class="form-control" placeholder="Product Description" pattern="[a-zA-Z0-9-_.ñ\s()/]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label for="viewProductDesc">Product Description</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-warning bg-opacity-25"><i class="fa-solid fa-cart-shopping fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="viewModel" id="viewModel" class="form-control" placeholder="Model" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label for="viewModel">Model</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-warning bg-opacity-25"><i class="fa-solid fa-clipboard-list fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="viewDetailedDesc" id="viewDetailedDesc" class="form-control" placeholder="Detailed Description" style="height: 5rem;" required></textarea>
                                <label for="viewDetailedDesc">Detailed Description</label>
                            </div>
                        </div> 

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-warning bg-opacity-25"><i class="fa-solid fa-money-bill-wave fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="viewUnitPrice" id="viewUnitPrice" class="form-control" placeholder="Unit Price" pattern="[0-9₱.]+" title="Must contain numbers" required>
                                <label for="viewUnitPrice">Unit Price</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-warning bg-opacity-25"><i class="fa-solid fa-list-check fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="viewCategory" id="viewCategory" class="form-control" placeholder="Category" pattern="[0-9₱.]+" title="Must contain numbers" required>
                                <label for="viewCategory">Category</label>
                            </div>
                        </div>
                        
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-warning bg-opacity-25"><i class="fa-solid fa-weight-scale fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="viewWeight" id="viewWeight" class="form-control" placeholder="Weight" pattern="[0-9.]+" title="Must contain numbers and symbol (.)" required>
                                <label for="viewWeight">Weight</label>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" name="viewUnit" id="viewUnit" class="form-control" placeholder="Weight" pattern="[0-9.]+" title="Must contain numbers and symbol (.)" required>
                                    <label for="viewUnit">Unit</label>        
                                </div> 
                            </div>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspClose&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Viewing of Products Modal -->

<!-- Deleting of Products Stock Modal -->
<?php $classInventory->deleteProduct(); ?>
<div class="modal fade" id="deleteProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-danger border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-trash-can fs-5 me-2"></i>
                        <div>
                            <strong>Delete Product</strong>
                        </div>
                    </div>

                    <input type="hidden" name="deleteProductID" id="deleteProductID">
                    <input type="hidden" name="deleteProductDM" id="deleteProductDM">
                    <input type="hidden" name="deleteUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="text-center mt-3 mb-2">
                        <h4>Are you sure you want to delete <strong><span id="deleteProductDesc" name="deleteProductDesc" class="text-danger"></span></strong>?</h4>
                    </div> 

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="deleteProduct"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Deleting of Products Modal -->

<!-- Adding of Product Stock Modal -->
<?php $classInventory->addProductQty(); ?>
<div class="modal fade" id="addProductStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-primary border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-primary d-flex align-items-center">
                        <i class="fa-solid fa-circle-plus fs-5 me-2"></i>
                        <div>
                            <strong>Add Stock</strong>
                        </div>
                    </div>

                    <input type="hidden" name="addQtyProductId" id="addQtyProductId">
                    <input type="hidden" name="addQtyProductDM" id="addQtyProductDM">
                    <input type="hidden" name="addQtyUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="addCurrentQty" id="addCurrentQty" class="form-control" placeholder="Remaining Quantities" readonly>
                                <label>Remaining Quantities</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="number" name="addQuantity" id="addQuantity" class="form-control" placeholder="Add New Quantities" pattern="[0-9]+" title="Must contain numbers" required>
                                <label>Add New Quantities</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="addProductQty"><i class="fa-solid fa-circle-plus"></i>&nbsp<strong>&nbsp&nbsp&nbspAdd&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Adding of Product Stock Modal -->

<!-- Removing of Product Stock Modal -->
<?php $classInventory->minusProductQty(); ?>
<div class="modal fade" id="removeProductStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-danger border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-circle-minus fs-5 me-2"></i>
                        <div>
                            <strong>Deduct Stock</strong>
                        </div>
                    </div>

                    <input type="hidden" name="minusQtyProductId" id="minusQtyProductId">
                    <input type="hidden" name="minusQtyProductDM" id="minusQtyProductDM">
                    <input type="hidden" name="minusQtyUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-danger bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="minusCurrentQty" id="minusCurrentQty" min="0" class="form-control" placeholder="Remaining Quantities" readonly>
                                <label>Remaining Quantities</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-danger bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="number" name="minusQuantity" id="minusQuantity" min="0" class="form-control" placeholder="Deduct Quantities" pattern="[0-9]+" title="Must contain numbers" required>
                                <label>Deduct Quantities</label>
                            </div>
                        </div>
                    </div>  

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="minusProductQty"><i class="fa-solid fa-circle-minus"></i>&nbsp<strong>&nbsp&nbspDeduct&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Removing of Product Stock Modal -->

<!-- Adding of Categories Modal -->
<?php $classInventory->addCategory(); ?>
<div class="modal fade" id="addCategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-success border-5 rounded">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="fa-solid fa-square-plus fs-5 me-2"></i>
                        <div>
                            <strong>New Category</strong>
                        </div>
                    </div>

                    <input type="hidden" name="categoryUserUId" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="categoryName" id="categoryName" class="form-control" placeholder="Category Name" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Category Name</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-success bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="categoryDesc" id="categoryDesc" class="form-control" placeholder="Category Description" style="height: 7rem;" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required></textarea>
                                <label>Category Description</label>
                            </div>
                        </div> 
                    </div>
                      
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success d-flex align-items-center"><i class="fa-solid fa-repeat"></i>&nbsp<strong>&nbsp&nbsp&nbspReset&nbsp&nbsp&nbsp</strong></button>
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="addCategory"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- Adding of Categories Modal -->

<?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "categories") { ?>
<!-- Updating of Category Modal -->
<?php $classInventory->updateCategory(); ?>
<div class="modal fade" id="updateCategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-primary border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-primary d-flex align-items-center">
                        <i class="fa-solid fa-pen-to-square fs-5 me-2"></i>
                        <div>
                            <strong>Update Category</strong>
                        </div>
                    </div>

                    <input type="hidden" name="updateCategoryID" id="updateCategoryID">
                    <input type="hidden" name="updateCategoryUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">

                    <div class="mt-3">
                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <input type="text" name="updateCategoryName" id="updateCategoryName" class="form-control" placeholder="Category Name" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required>
                                <label>Category Name</label>
                            </div>
                        </div>

                        <div class="input-group d-flex justify-content-center mb-2">
                            <span class="input-group-text bg-primary bg-opacity-25"><i class="fa-solid fa-pen-to-square fa-fw fs-4"></i></span>
                            <div class="form-floating">
                                <textarea name="updateCategoryDesc" id="updateCategoryDesc" class="form-control" placeholder="Category Description" style="height: 7rem;" pattern="[a-zA-Z0-9-_.ñ\s()]+" title="Must contain letters, numbers, and symbols (e.g. -_.())" required></textarea>
                                <label>Category Description</label>
                            </div>
                        </div>  
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="updateCategory"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp<strong>&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Updating of Category Modal -->

<!-- Deleting of Category Modal -->
<?php $classInventory->deleteCategory(); ?>
<div class="modal fade" id="deleteCategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-danger border-4">
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="fa-solid fa-trash-can fs-5 me-2"></i>
                        <div>
                            <strong>Delete Category</strong>
                        </div>
                    </div>

                    <input type="hidden" name="deleteCategoryID" id="deleteCategoryID">
                    <input type="text" name="deleteCategoryDM" id="deleteCategoryDM">
                    <input type="hidden" name="deleteCategoryUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                    
                    <div class="mt-3 mb-2">
                        <div class="text-center">
                            <h4>Are you sure you want to delete <strong><span id="deleteCategoryName" name="deleteCategoryName" class="text-danger"></span></strong>?</h4>
                        </div> 
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="deleteCategory"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
<!-- End of Deleting Category Modal -->
<?php } ?>

