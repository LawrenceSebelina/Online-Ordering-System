<?php 
    class inventory extends dbh {

        public function addProduct() {

            if (isset($_POST['addProduct'])){
                $userUId = $_POST['userUId'];
                $productDesc = $_POST['productDesc'];
                $category = $_POST['category'];
                $model = $_POST['model'];
                $detailedDesc = $_POST['detailedDesc'];
                $weight = $_POST['weight'];
                $unit = $_POST['unit'];
                $unitPrice = $_POST['unitPrice'];
                $quantity = $_POST['quantity'];
                $productUniqueId = md5(uniqid(mt_rand() . time(), true));

                    if (!empty($_FILES["imageProduct"]["name"])) {

                        $target_dir = "productImages/";
                        $target_dir_move = "../productImages/";
                        $target_file = $target_dir . basename($_FILES["imageProduct"]["name"]);
                        $target_file_move = $target_dir_move . basename($_FILES["imageProduct"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["imageProduct"]["tmp_name"], $target_file_move);

                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO products (productUniqueId, productDesc, category, model, description, weight, unit, unitPrice, quantity, productImgs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$productUniqueId, $productDesc, $category, $model, $detailedDesc, $weight, $unit, $unitPrice, $quantity, $target_file]);
                        
                        if ($stmt) {
                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                            $activityDone = "Add: New product " . $productDesc . " - (" . $model . ")"; 
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$activityUniqueId, $userUId, $activityDone, 1]);

                            if ($stmt) {
                                echo "<script>
                                    swal('Successful!', 'Product Added Successfully', 'success').then(function() {
                                        window.location = document.referrer;
                                    });
                                </script>";
                            }
                        }

                    } else {
                        echo "<script>
                                swal('Error!', 'Please insert product image!', 'error').then(function() {
                                    window.location = document.referrer;
                                });
                            </script>";
                    }

                
            }

            $this->disconnect(); 

        }

        public function updateProduct() {

            if (isset($_POST['updateProduct'])){
                $updateUserUID = $_POST['updateUserUID'];
                $updateProductID = $_POST['updateProductID'];
                $updateProductDesc = $_POST['updateProductDesc'];
                $updateModel = $_POST['updateModel'];
                $updateDetailedDesc = $_POST['updateDetailedDesc'];
                $updateCategory = $_POST['updateCategory'];
                $updateWeight = $_POST['updateWeight'];
                $updateUnit = $_POST['updateUnit'];
                $updateUnitPrice = $_POST['updateUnitPrice'];

                if (!empty($_FILES["updateProduct"]["name"])) { 
                    $target_dir = "productImages/";
                    $target_dir_move = "../productImages/";
                    $target_file = $target_dir . basename($_FILES["updateProduct"]["name"]);
                    $target_file_move = $target_dir_move . basename($_FILES["updateProduct"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["updateProduct"]["tmp_name"], $target_file_move);
                } else {
                    $target_file = $_POST['updateProductPhotoDir'];
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE products SET productDesc = ?, category = ?, model = ?, description = ?, weight = ?, unit = ?, unitPrice = ?, productImgs = ? WHERE productId = ?");
                $stmt->execute([$updateProductDesc, $updateCategory, $updateModel, $updateDetailedDesc, $updateWeight, $updateUnit, $updateUnitPrice, $target_file, $updateProductID]);
                    
                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update: Product " . $updateProductDesc . " - (" . $updateModel . ")"; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $updateUserUID, $activityDone, 1]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'Product Updated Successfully', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                }
            }

            $this->disconnect(); 

        }

        public function deleteProduct() {

            if (isset($_POST['deleteProduct'])){
                $deleteUserUID = $_POST['deleteUserUID'];
                $deleteProductID = $_POST['deleteProductID'];
                $deleteProductDM = $_POST['deleteProductDM'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE products SET productDel = ? WHERE productId = ?");
                $stmt->execute([1, $deleteProductID]);
                    
                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Delete: Product " . $deleteProductDM; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $deleteUserUID, $activityDone, 1]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'Product Deleted Successfully', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                }
            }

            $this->disconnect(); 

        }

        public function getProduct($productUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productUniqueId = ? AND quantity > ? AND productDel = ?"); // 
            $stmt->execute([$productUniqueId, 0, 0]); //
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ?");
            $stmt->execute([0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getTSProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ? LIMIT 36"); //WHERE quantity > ?
            $stmt->execute([0]); //["0"]
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getProductsPerPage($page_no, $total_records_per_page, $offset, $previous_page, $next_page, $adjacents) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ?");
            $stmt->execute([0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
            $total_no_of_pages = ceil($datacount / $total_records_per_page); 

            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ? LIMIT $offset, $total_records_per_page");
            $stmt->execute([0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getFMStockProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE quantitySold >= ? AND productDel = ? ORDER BY quantitySold DESC");
            $stmt->execute([1, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getSMStockProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ? ORDER BY quantitySold ASC");
            $stmt->execute([0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getProductsLimitTen() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ? ORDER BY quantitySold DESC LIMIT 10");
            $stmt->execute([0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getProductsByCatPro($categoryUniqueId, $productUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE categoryUniqueId = ? AND productUniqueId != ? AND productDel = ?"); // AND quantity > ?
            $stmt->execute([$categoryUniqueId, $productUniqueId, 0]); //, "0"
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getProductsByCat($categoryUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE categoryUniqueId = ? AND productDel = ?");
            $stmt->execute([$categoryUniqueId, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if ($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getProductsByCatPerPage($categoryUniqueId, $page_no, $total_records_per_page, $offset, $previous_page, $next_page, $adjacents) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE categoryUniqueId = ? AND productDel = ?");
            $stmt->execute([$categoryUniqueId, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
            $total_no_of_pages = ceil($datacount / $total_records_per_page); 

            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE categoryUniqueId = ? AND productDel = ? LIMIT $offset, $total_records_per_page");
            $stmt->execute([$categoryUniqueId, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function notGetProductsByCat($categoryUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE categoryUniqueId != ? AND productDel = ?");
            $stmt->execute([$categoryUniqueId, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getProductsBySearch($search) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ? AND (productDesc LIKE ? OR model LIKE ? OR categoryName LIKE ?)"); //quantity > ? AND ( )
            $stmt->execute([0, "%$search%", "%$search%", "%$search%"]); //"0", 
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getProductsBySearchPerPage($search, $page_no, $total_records_per_page, $offset, $previous_page, $next_page, $adjacents) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ? AND (productDesc LIKE ? OR model LIKE ? OR categoryName LIKE ?)"); //quantity > ? AND ( )
            $stmt->execute([0, "%$search%", "%$search%", "%$search%"]); //"0", 
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
            $total_no_of_pages = ceil($datacount / $total_records_per_page); 

            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE productDel = ? AND (productDesc LIKE ? OR model LIKE ? OR categoryName LIKE ?) LIMIT $offset, $total_records_per_page"); //quantity > ? AND ( ) 
            $stmt->execute([0, "%$search%", "%$search%", "%$search%"]); //"0", 
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function addProductQty() {

            if (isset($_POST['addProductQty'])){
                $addQtyUserUID = $_POST['addQtyUserUID'];
                $addQtyProductId = $_POST['addQtyProductId'];
                $addCurrentQty = $_POST['addCurrentQty'];
                $addQuantity = $_POST['addQuantity'];
                $anewQuantity = $addCurrentQty + $addQuantity;
                $addQtyProductDM = $_POST['addQtyProductDM'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE products SET quantity = ? WHERE productId = ?");
                $stmt->execute([$anewQuantity, $addQtyProductId]);
                    
                if ($stmt) {

                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Add: " . $addQuantity . " new quantity to product: " . $addQtyProductDM . ". New quantity: " . $anewQuantity; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $addQtyUserUID, $activityDone, 1]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'New Stock Added', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                }
            }
    
            $this->disconnect(); 
    
        }

        public function minusProductQty() {

            if (isset($_POST['minusProductQty'])){
                $minusQtyUserUID = $_POST['minusQtyUserUID'];
                $minusQtyProductId = $_POST['minusQtyProductId'];
                $minusCurrentQty = $_POST['minusCurrentQty'];
                $minusQuantity = $_POST['minusQuantity'];
                $minusQtyProductDM = $_POST['minusQtyProductDM']; 

                if ($minusQuantity > $minusCurrentQty) {
                     echo "<script>
                        swal('Warning!', 'Quantity to be deducted is too large!', 'warning').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                } else {
                    $mnewQuantity = $minusCurrentQty - $minusQuantity;

                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE products SET quantity = ? WHERE productId = ?");
                    $stmt->execute([$mnewQuantity, $minusQtyProductId]);
                        
                    if ($stmt) {

                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Deduct: " . $minusQuantity . " quantity to product: " . $minusQtyProductDM . ". New quantity: " . $mnewQuantity; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $minusQtyUserUID, $activityDone, 1]);

                        if ($stmt) {
                            echo "<script>
                                swal('Successful!', 'Stock Change Successfully', 'success').then(function() {
                                    window.location = document.referrer;
                                });
                            </script>";
                        }
                        
                    }
                }
                
            }

            $this->disconnect(); 

        }

        public function addCategory() {

            if (isset($_POST['addCategory'])){
                $categoryUserUId = $_POST['categoryUserUId'];
                $categoryName = $_POST['categoryName'];
                $categoryDesc = $_POST['categoryDesc'];
                $categoryUniqueId = md5(uniqid(mt_rand() . time(), true));

                $connection = $this->connect();
                $stmt = $connection->prepare("INSERT INTO categories (categoryUniqueId, categoryName, categoryDesc) VALUES (?, ?, ?)");
                $stmt->execute([$categoryUniqueId, $categoryName, $categoryDesc]);
                    
                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Add: New category " . $categoryName; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $categoryUserUId, $activityDone, 1]);

                    if ($stmt) {
                        echo "<script>
                        swal('Successful!', 'New Category Added', 'success').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                    }
                }
            }

            $this->disconnect(); 

        }

        public function updateCategory() {

            if (isset($_POST['updateCategory'])){
                $updateCategoryUserUID = $_POST['updateCategoryUserUID'];
                $updateCategoryID = $_POST['updateCategoryID'];
                $updateCategoryName = $_POST['updateCategoryName'];
                $updateCategoryDesc = $_POST['updateCategoryDesc'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE categories SET categoryName = ?, categoryDesc = ? WHERE categoryId = ?");
                $stmt->execute([$updateCategoryName, $updateCategoryDesc, $updateCategoryID]);
                    
                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update: Category " . $updateCategoryName; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $updateCategoryUserUID, $activityDone, 1]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'Category Updated Successfully', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                }
            }

            $this->disconnect(); 

        }

        public function deleteCategory() {

            if (isset($_POST['deleteCategory'])){
                $deleteCategoryUserUID = $_POST['deleteCategoryUserUID'];
                $deleteCategoryID = $_POST['deleteCategoryID'];
                $deleteCategoryDM = $_POST['deleteCategoryDM'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE categories SET categoryDel = ? WHERE categoryId = ?");
                $stmt->execute([1, $deleteCategoryID]);
                    
                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Delete: Category " . $deleteCategoryDM; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $deleteCategoryUserUID, $activityDone, 1]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'Category Deleted Successfully', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                }
            }

            $this->disconnect(); 

        }

        public function getCategories() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM categories WHERE categoryDel = ?");
            $stmt->execute([0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getCategory($categoryID, $categoryName) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM categories WHERE categoryId = ? AND categoryName = ?");
            $stmt->execute([$categoryID, $categoryName]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getModel($categoryID) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM categories WHERE categoryId = ?");
            $stmt->execute([$categoryID]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getInventoryLogs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT activitylogs.*, users.* FROM activitylogs LEFT JOIN users ON activitylogs.userUniqueId = users.userUniqueId WHERE activityType = ? ORDER BY activityId DESC");
            $stmt->execute([1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function addToCart() {

            if (isset($_POST['addToCart'])){
                $cartUserId = $_POST['cartUserId'];
                $cartProdId = $_POST['cartProdId'];
                $cartProductQty = $_POST['cartProductQty'];
                $cartProdUp = $_POST['cartProdUp'];
                $cartProductRQty = $_POST['cartProductRQty'];
                $total = $cartProdUp * $cartProductQty;
                $checkedOut = 0;
                
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM cart WHERE userId = ? AND productId = ? AND checkedOut = ?");
                $stmt->execute([$cartUserId, $cartProdId, 0]);
                $data = $stmt->fetch();
                
                if (!empty($data)) {
                    if ($cartProdId == $data['productId']) {
                        $newCartProdQty = $data['productQty'] + $cartProductQty;
    
                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE cart SET productQty = ? WHERE productId = ?");
                        $stmt->execute([$newCartProdQty, $cartProdId]);
                    }
                } else {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO cart (userId, productId, productQty, productRQty, total, checkedOut) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$cartUserId, $cartProdId, $cartProductQty, $cartProductRQty, $total, $checkedOut]);
                }

                
                if ($stmt) {
                    echo "<script>
                        swal('Successful!', 'Product Added to your Cart Successfully', 'success').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                    
                }
            }

            $this->disconnect(); 

        }

        public function getCart($userId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT cart.*, users.*, products.*, categories.* FROM cart LEFT JOIN users ON cart.userId = users.userId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE cart.userId = ? AND cart.checkedOut = ? ORDER BY cart.cartId DESC");
            $stmt->execute([$userId, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getCheckOut($userId, $orderNo) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, sales.*, cart.*, users.*, products.*, categories.* FROM orders LEFT JOIN sales ON orders.orderId = sales.orderId LEFT JOIN cart ON cart.cartId = sales.cartId LEFT JOIN users ON cart.userId = users.userId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE cart.userId = ? AND orders.orderNo = ? ORDER BY cart.cartId DESC");
            $stmt->execute([$userId, $orderNo]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getOrdersTotalBalance($userId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT sum(totalBalance) AS newTotalBalance FROM orders WHERE userId = ? AND paymentType = ? AND orderPurchased = ? AND orderApproved = ? GROUP BY userId ORDER BY orderApprovedDate DESC");
            $stmt->execute([$userId, "Installment", 1, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getOrdersTotalBalanceApproved($userId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT sum(totalBalance) AS newTotalBalance FROM orders WHERE userId = ? AND paymentType = ? AND orderPurchased = ? AND orderApproved = ? GROUP BY userId ORDER BY orderApprovedDate DESC");
            $stmt->execute([$userId, "Installment", 1, 1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getOrderId() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orderId FROM orders ORDER BY orderId DESC LIMIT 1");
            $stmt->execute();
            $datas = $stmt->fetch();
            $datacount = $stmt->rowCount();

            if($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
    
            $this->disconnect(); 
        }

        public function checkOut() {

            if (isset($_POST['checkOut'])){

                if (!empty($_POST['cartIds'])) {
                    $cartIds = $_POST['cartIds'];
                    $userId = $_POST['userId'];
                    $totalQuantities = $_POST['totalQuantities'];
                    $totalSelectedItems = $_POST['totalSelectedItems'];
                    $totalAmount = $_POST['totalAmount'];
                    $orderId = $_POST['orderId'] + 1;
                    $baseOrderName = "SSPI";
                    $baseOrderNumber = sprintf("%07d", $orderId);
                    $baseOrderYear = date("Y");
                    $orderNo = $baseOrderName . "-" . $baseOrderNumber . "-" . $baseOrderYear;   

                    // SSPI-00001-2023

                    // $uniqueOrderNo = substr(md5(uniqid(mt_rand() . time(), true)), 0, 8);
                    // $orderNo = date("ymd") . "_" . $uniqueOrderNo;   

                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO orders (userId, orderNo, totalNoItems, totalNoQuantity, totalAmount, totalBalance) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$userId, $orderNo, $totalSelectedItems, $totalQuantities, $totalAmount, $totalAmount]);

                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT orderId FROM orders ORDER BY orderId DESC LIMIT 1");
                        $stmt->execute();
                        $datas = $stmt->fetch();

                        foreach ($datas as $data) {
                            $orderId = $data;

                            foreach ($cartIds as $cartId) {
                                $newCartId = $cartId;
        
                                $connection = $this->connect();
                                $stmt = $connection->prepare("INSERT INTO sales (orderId, cartId) VALUES (?, ?)");
                                $stmt->execute([$orderId, $newCartId]);

                                if ($stmt) {
                                    echo "<script>
                                        window.location.assign('index.php?route=checkout&order=$orderNo');
                                    </script>";
                                }
                            }
                        }
                    }
                    
                } else {
                    echo "<script>
                        swal('Warning!', 'Please select item(s)', 'warning').then(function() {
                        window.location = document.referrer;
                    });
                    </script>";
                }
            }
            
            $this->disconnect(); 

        }

        public function placeOrder() {

            if (isset($_POST['placeOrder'])){
                $orderId = $_POST['orderId'];
                $userId = $_POST['userId'];
                $cartIds = $_POST['cartId'];
                $productQtys = $_POST['productQty'];
                $productIds = $_POST['productId'];
                $payment = $_POST['payment'];
                $orderServiceInst = $_POST['orderServiceInst'];
                $snTotalAmount = $_POST['snTotalAmount'];
                $snTotalDelFee = $_POST['snTotalDelFee'];
                $snTotalServFee = $_POST['snTotalServFee'];
                date_default_timezone_set('Asia/Manila');
                $orderDateTime = date('Y-m-d H:i:s');
                $orderByWeekUId = md5(date("WY"));
                $orderByMonthUId = md5(date("FY"));
                $orderByYearUId = md5(date("Y"));

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE orders SET paymentType = ?, orderServiceInst = ?, orderPurchased = ?, orderByWeekUId = ?, orderByMonthUId = ?, orderByYearUId = ?, orderDate = ?, totalAmount = ?, totalBalance = ?, totalDeliveryFee = ?, totalServiceFee = ? WHERE orderId = ?");
                $stmt->execute([$payment, $orderServiceInst, 1, $orderByWeekUId, $orderByMonthUId, $orderByYearUId, $orderDateTime, $snTotalAmount, $snTotalAmount, $snTotalDelFee, $snTotalServFee, $orderId]);

                if ($stmt) {
                    
                    foreach ($cartIds as $cartId) {
                        $newCartId = $cartId;

                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE cart SET checkedOut = ? WHERE cartId = ?");
                        $stmt->execute([1, $newCartId]);

                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT cart.*, products.* FROM cart LEFT JOIN products ON cart.productId = products.productId WHERE cartId = ?");
                        $stmt->execute([$newCartId]);
                        $datas = $stmt->fetchAll();

                        foreach ($datas as $data) {
                            $productId = $data['productId'];
                            $newProductQuantity = $data['quantity'] - $data['productQty'];
                            $newQuantitySold = $data['productQty'] + $data['quantitySold'];

                            $connection = $this->connect();
                            $stmt = $connection->prepare("UPDATE products SET quantity = ?, quantitySold = ? WHERE productId = ?");
                            $stmt->execute([$newProductQuantity, $newQuantitySold, $productId]);
                            
                            if ($stmt) {

                                $connection = $this->connect();
                                $stmt = $connection->prepare("DELETE FROM orders WHERE userId = ? AND orderPurchased = ?");
                                $stmt->execute([$userId, 0]);

                                echo "<script>
                                    swal('Success!', 'You Place Order Successfully!', 'success').then(function() {
                                        window.location.assign('index.php?route=home');
                                });
                                </script>";
                            }
                        }
                    }
                }
            }

            $this->disconnect();

        }

        public function changeCartQty($newCartQty, $cartId, $userId, $newCartTotal) {

            $connection = $this->connect();
            $stmt = $connection->prepare("UPDATE cart SET productQty = ?, total = ? WHERE cartId = ? AND userId = ?");
            $stmt->execute([$newCartQty, $newCartTotal, $cartId, $userId]);
    
            $this->disconnect(); 

        }

        public function deleteSelectedCart($selectCartId, $userId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("DELETE FROM cart WHERE cartId = ? AND userId = ?");
            $stmt->execute([$selectCartId, $userId]);
    
            $this->disconnect(); 
            
        }

    }

    $classInventory = New inventory();

?>