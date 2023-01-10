<?php 
    class orders extends dbh {

        public function getOrders() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, users.* FROM orders JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderApproved = ? ORDER BY orderId DESC");
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

        public function getApprovedOrders() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, deliveries.*, users.* FROM orders LEFT JOIN deliveries ON orders.orderId = deliveries.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderApproved = ? AND deliveryStatus = ? ORDER BY orderApprovedDate DESC");
            $stmt->execute([1, 1, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getDeliveredOrders() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, deliveries.*, users.* FROM orders LEFT JOIN deliveries ON orders.orderId = deliveries.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderSetDeliver = ? AND deliveryStatus = ? ORDER BY totalBalance DESC");
            $stmt->execute([1, 1, 1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getReturnedOrders() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, deliveries.*, users.* FROM orders LEFT JOIN deliveries ON orders.orderId = deliveries.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderSetDeliver = ? AND deliveryStatus = ? ORDER BY totalBalance DESC");
            $stmt->execute([1, 1, 2]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getOrderLogs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT activitylogs.*, users.* FROM activitylogs LEFT JOIN users ON activitylogs.userUniqueId = users.userUniqueId WHERE activityType = ? ORDER BY activityId DESC");
            $stmt->execute([4]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getOrder($orderId, $orderNo) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, orders.orderNo as newOrderNo, deliveries.*, sales.*, cart.*, users.*, products.*, categories.* FROM orders LEFT JOIN deliveries ON orders.orderId = deliveries.orderId LEFT JOIN sales ON orders.orderId = sales.orderId LEFT JOIN cart ON cart.cartId = sales.cartId LEFT JOIN users ON cart.userId = users.userId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE orders.orderId = ? AND orders.orderNo = ?");
            $stmt->execute([$orderId, $orderNo]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getPayment($orderId, $orderNo) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM payments WHERE orderId = ? AND orderNo = ?");
            $stmt->execute([$orderId, $orderNo]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function addPayment() {

            if (isset($_POST['addPayment'])) {
                $orderUserUID = $_POST['orderUserUID'];
                $orderUserId = $_POST['orderUserId'];
                $orderOrderId = $_POST['orderOrderId'];
                $orderOrderNo = $_POST['orderOrderNo'];
                $orderPaymentType = $_POST['orderPaymentType'];
                $orderTotalAmount = $_POST['orderTotalAmount'];
                $orderTotalBalance = $_POST['orderTotalBalance'];
                $orderPayment = $_POST['orderPayment'];
                
                if ($orderPaymentType == "Installment") {
                    if ($orderPayment <= 0) {
                        echo "<script>
                            swal('Warning!', 'Your payment is invalid!', 'warning').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    } elseif ($orderPayment > $orderTotalBalance) {
                        echo "<script>
                            swal('Warning!', 'Your payment is too large!', 'warning').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    } else {
                        $newBalance = $orderTotalBalance - $orderPayment; 

                        date_default_timezone_set('Asia/Manila');
                        $paymentDate = date('Y-m-d H:i:s');
                        $orderByWeekUId = md5(date("WY"));
                        $orderByMonthUId = md5(date("FY"));
                        $orderByYearUId = md5(date("Y"));
                        
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO payments (orderId, orderNo, pay, balance, orderByWeekUId, orderByMonthUId, orderByYearUId, paymentDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$orderOrderId, $orderOrderNo, $orderPayment, $newBalance,  $orderByWeekUId, $orderByMonthUId, $orderByYearUId, $paymentDate]);
    
                        if ($stmt) {
                            $connection = $this->connect();
                            $stmt = $connection->prepare("UPDATE orders SET totalBalance = ? WHERE orderId = ? AND orderNo = ?");
                            $stmt->execute([$newBalance, $orderOrderId, $orderOrderNo]);
    
                            if ($stmt) {

                                $connection = $this->connect();
                                $stmt = $connection->prepare("SELECT paymentId FROM payments ORDER BY paymentId DESC LIMIT 1");
                                $stmt->execute();
                                $datas = $stmt->fetch();

                                foreach ($datas as $data) {
                                    $paymentId = $data;

                                    $connection = $this->connect();
                                    $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, paymentId, notificationType) VALUES (?, ?, ?, ?)");
                                    $stmt->execute([$orderUserId, $orderOrderId, $paymentId, 2]);            

                                    if ($stmt) {
                                
                                        echo "<script>
                                            swal('Successful!', 'Payment!', 'success').then(function() {
                                                window.location = document.referrer;
                                            });
                                        </script>";
                                    }
                                }

                                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                                $activityDone = "Add Payment: Order (" . $orderOrderNo . ")"; 
                                $connection = $this->connect();
                                $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                                $stmt->execute([$activityUniqueId, $orderUserUID, $activityDone, 4]);

                            }
                        }
                    }
                } elseif ($orderPaymentType == "Full Payment") {
                    if ($orderPayment <= 0) {
                        echo "<script>
                            swal('Warning!', 'Your payment is invalid!', 'warning').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    } elseif ($orderPayment > $orderTotalBalance) {
                        echo "<script>
                            swal('Warning!', 'Your payment is too large!', 'warning').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    } elseif ($orderPayment != $orderTotalBalance) {
                        echo "<script>
                            swal('Warning!', 'Your need to pay full!', 'warning').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    } else {
                        $newBalance = $orderTotalBalance - $orderPayment; 

                        date_default_timezone_set('Asia/Manila');
                        $paymentDate = date('Y-m-d H:i:s');
                        $orderByWeekUId = md5(date("WY"));
                        $orderByMonthUId = md5(date("FY"));
                        $orderByYearUId = md5(date("Y"));

                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO payments (orderId, orderNo, pay, balance, orderByWeekUId, orderByMonthUId, orderByYearUId, paymentDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$orderOrderId, $orderOrderNo, $orderPayment, $newBalance, $orderByWeekUId, $orderByMonthUId, $orderByYearUId, $paymentDate]);
    
                        if ($stmt) {
                            $connection = $this->connect();
                            $stmt = $connection->prepare("UPDATE orders SET totalBalance = ? WHERE orderId = ? AND orderNo = ?");
                            $stmt->execute([$newBalance, $orderOrderId, $orderOrderNo]);
    
                            if ($stmt) {
                                $connection = $this->connect();
                                $stmt = $connection->prepare("SELECT paymentId FROM payments ORDER BY paymentId DESC LIMIT 1");
                                $stmt->execute();
                                $datas = $stmt->fetch();

                                foreach ($datas as $data) {
                                    $paymentId = $data;

                                    $connection = $this->connect();
                                    $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, paymentId, notificationType) VALUES (?, ?, ?, ?)");
                                    $stmt->execute([$orderUserId, $orderOrderId, $paymentId, 3]);            

                                    if ($stmt) {
                                        echo "<script>
                                            swal('Successful!', 'Payment!', 'success').then(function() {
                                                window.location = document.referrer;
                                            });
                                        </script>";
                                    }
                                }

                                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                                $activityDone = "Add Payment: Order (" . $orderOrderNo . ")"; 
                                $connection = $this->connect();
                                $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                                $stmt->execute([$activityUniqueId, $orderUserUID, $activityDone, 4]);

                            }
                        }
                    }
                }
            }
    
            $this->disconnect(); 

        }

        public function approvedOrder() {
            
            if(isset($_POST['approvedOrder'])) {
                $approvedUserUID = $_POST['approvedUserUID'];
                $approvedOrderId = $_POST['approvedOrderId'];
                $approvedOrderNo = $_POST['approvedOrderNo'];
                $approvedUserId = $_POST['approvedUserId'];
                $approvedPaymentType = $_POST['approvedPaymentType'];
                date_default_timezone_set('Asia/Manila');
                $approvedDateTime = date('Y-m-d H:i:s');

                if ($approvedPaymentType == "Installment") {
                    $approvedDueDate = date('Y-m-d H:i:s', strtotime("+60 days"));

                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE orders SET orderApproved = ?, orderApprovedDate = ?, orderDueDate = ? WHERE orderId = ? AND orderNo = ?");
                    $stmt->execute([1, $approvedDateTime, $approvedDueDate, $approvedOrderId, $approvedOrderNo]);

                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO deliveries (orderId, orderNo) VALUES (?, ?)");
                        $stmt->execute([$approvedOrderId, $approvedOrderNo]);

                        if ($stmt) {
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, notificationType) VALUES (?, ?, ?)");
                            $stmt->execute([$approvedUserId, $approvedOrderId, 0]);
    
                            if ($stmt) {
                                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                                $activityDone = "Approved: Order (" . $approvedOrderNo . ")"; 
                                $connection = $this->connect();
                                $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                                $stmt->execute([$activityUniqueId, $approvedUserUID, $activityDone, 4]);

                                if ($stmt) {
                                    echo "<script>
                                        swal('Successful!', 'Order approved!', 'success').then(function() {
                                            window.location = document.referrer;
                                        });
                                    </script>";
                                }
                            }

                        } 

                    }

                    
                } elseif ($approvedPaymentType == "Full Payment") {
                    $approvedDueDate = date('Y-m-d H:i:s', strtotime("+30 days"));

                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE orders SET orderApproved = ?, orderApprovedDate = ?, orderDueDate = ? WHERE orderId = ? AND orderNo = ?");
                    $stmt->execute([1, $approvedDateTime, $approvedDueDate, $approvedOrderId, $approvedOrderNo]);
    
                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO deliveries (orderId, orderNo) VALUES (?, ?)");
                        $stmt->execute([$approvedOrderId, $approvedOrderNo]);

                        if ($stmt) {
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, notificationType) VALUES (?, ?, ?)");
                            $stmt->execute([$approvedUserId, $approvedOrderId, 1]);

                            if ($stmt) {
                                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                                $activityDone = "Approved: Order (" . $approvedOrderNo . ")"; 
                                $connection = $this->connect();
                                $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                                $stmt->execute([$activityUniqueId, $approvedUserUID, $activityDone, 4]);

                                if ($stmt) {
                                    echo "<script>
                                        swal('Successful!', 'Order approved!', 'success').then(function() {
                                            window.location = document.referrer;
                                        });
                                    </script>";
                                }
                            }
                            
                        }  
                    } 
                }       

            }
        }

        public function approvedMarkedAsDlvrd() {

            if (isset($_POST['approvedMarkedAsDlvrd'])) {
                $mrkDlvrdUserUID = $_POST['mrkDlvrdUserUID'];
                $mrkDlvrdOrderId = $_POST['mrkDlvrdOrderId'];
                $mrkDlvrdOrderNo = $_POST['mrkDlvrdOrderNo'];
                $mrkDlvrdUserId = $_POST['mrkDlvrdUserId'];
                $mrkDlvrdDeliverId = $_POST['mrkDlvrdDeliverId'];
                date_default_timezone_set('Asia/Manila');
                $mrkDlvrdDateTime = date('Y-m-d H:i:s');
                
                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE deliveries SET deliveryStatus = ?, deliveryMarkedDate = ? WHERE deliveryId = ? AND orderId = ? AND orderNo = ?");
                $stmt->execute([1, $mrkDlvrdDateTime, $mrkDlvrdDeliverId, $mrkDlvrdOrderId, $mrkDlvrdOrderNo]);

                if ($stmt) {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, deliveryId, notificationType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$mrkDlvrdUserId, $mrkDlvrdOrderId, $mrkDlvrdDeliverId, 9]);            

                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Order Marked as Delivered: Order (" . $mrkDlvrdOrderNo . ")"; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $mrkDlvrdUserUID, $activityDone, 4]);

                        if ($stmt) {
                            echo "<script>
                                swal('Successful!', 'Order mark as delivered!', 'success').then(function() {
                                    window.location = document.referrer;
                                });
                            </script>";
                        }
                    }
                    
                }

            }
    
            $this->disconnect(); 

        }

        public function approvedMarkedAsReturn() {

            if (isset($_POST['approvedMarkedAsReturn'])) {
                $markReturnUserUID = $_POST['markReturnUserUID'];
                $markReturnOrderId = $_POST['markReturnOrderId'];
                $markReturnOrderNo = $_POST['markReturnOrderNo'];
                $markReturnUserId = $_POST['markReturnUserId'];
                $markReturnDeliverId = $_POST['markReturnDeliverId'];
                $markedReturnDesc = $_POST['markedReturnDesc']; 
                date_default_timezone_set('Asia/Manila');
                $markReturnDateTime = date('Y-m-d H:i:s');
                
                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE deliveries SET deliveryStatus = ?, deliveryMarkedDate = ?, deliveryReturnDesc = ? WHERE deliveryId = ? AND orderId = ? AND orderNo = ?");
                $stmt->execute([2, $markReturnDateTime, $markedReturnDesc, $markReturnDeliverId, $markReturnOrderId, $markReturnOrderNo]);

                if ($stmt) {
    
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, deliveryId, notificationType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$markReturnUserId, $markReturnOrderId, $markReturnDeliverId, 13]);            

                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Order Marked as Returned: Order (" . $markReturnOrderNo . ")"; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $markReturnUserUID, $activityDone, 4]);

                        if ($stmt) {
                            echo "<script>
                                swal('Successful!', 'Order mark as Return!', 'success').then(function() {
                                    window.location = document.referrer;
                                });
                            </script>";
                        }
                        
                    }
                    
                }

            }
    
            $this->disconnect(); 

        }

        public function setOrderDelInfo() {

            if (isset($_POST['setOrderDelInfo'])) {
                $setOrderDelUserUID = $_POST['setOrderDelUserUID'];
                $setOrderDelUserId = $_POST['setOrderDelUserId'];
                $setOrderDelId = $_POST['setOrderDelId'];
                $setOrderDelNo = $_POST['setOrderDelNo'];
                $setOrderDelDate = $_POST['setOrderDelDate'];
                
                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE deliveries SET deliveryEstDate = ? WHERE orderId = ? AND orderNo = ?");
                $stmt->execute([$setOrderDelDate, $setOrderDelId, $setOrderDelNo]);

                if ($stmt) {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE orders SET orderSetDeliver = ? WHERE orderId = ? AND orderNo = ?");
                    $stmt->execute([1, $setOrderDelId, $setOrderDelNo]);

                    if ($stmt) {

                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT deliveryId FROM deliveries ORDER BY deliveryId DESC LIMIT 1");
                        $stmt->execute();
                        $datas = $stmt->fetch();

                        foreach ($datas as $data) {
                            $deliveryId = $data;

                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, deliveryId, notificationType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$setOrderDelUserId, $setOrderDelId, $deliveryId, 8]);            

                            if ($stmt) {
                                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                                $activityDone = "Set Delivery: Order (" . $setOrderDelNo . ")"; 
                                $connection = $this->connect();
                                $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                                $stmt->execute([$activityUniqueId, $setOrderDelUserUID, $activityDone, 4]);
                        
                                if ($stmt) {
                                    echo "<script>
                                        swal('Successful!', 'Order delivery assigned!!', 'success').then(function() {
                                            window.location = document.referrer;
                                        });
                                    </script>";
                                }
                                
                            }
                        }
                    }
                }
                    
                
            }
    
            $this->disconnect(); 

        }

        public function getOrderByUserId($getOrderByUserId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, users.* FROM orders JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orders.userId = ? ORDER BY orderId DESC");
            $stmt->execute([1, $getOrderByUserId]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

    }

    $classOrders = New orders();

?>