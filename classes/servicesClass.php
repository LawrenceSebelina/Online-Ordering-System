<?php 
    class services extends dbh {

        public function getOrdersWithServiceInst() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, users.* FROM orders LEFT JOIN users ON orders.userId = users.userId WHERE orderServiceInst != ? AND orderPurchased = ? AND orderServiceAss = ? ORDER BY orderId DESC");
            $stmt->execute(["None", 1, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getOrderWithServiceInst($orderId, $orderNo) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, orders.orderNo AS newOrderNo, services.*, sales.*, cart.*, users.*, products.*, categories.* FROM orders LEFT JOIN services ON orders.orderId = services.orderId LEFT JOIN sales ON orders.orderId = sales.orderId LEFT JOIN cart ON cart.cartId = sales.cartId LEFT JOIN users ON cart.userId = users.userId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE sales.orderId = ? AND orders.orderNo = ?");
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

        public function getAssignedServiceInstInfo($orderId, $orderNo) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId WHERE orders.orderId = ? AND services.orderNo = ?");
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

        public function getAssignedServiceInst() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceAss = ? AND services.serviceInstStatus = ? ORDER BY services.serviceId DESC");
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

        public function getDoneServiceInst() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceAss = ? AND services.serviceInstStatus = ? ORDER BY services.serviceId DESC");
            $stmt->execute([1, 1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getDeclinedServiceInst() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceAss = ? ORDER BY services.serviceId DESC");
            $stmt->execute([2]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function assignedService() {

            if (isset($_POST['assignedService'])) {
                $assignedUserUID = $_POST['assignedUserUID'];
                $assignedOrderId = $_POST['assignedOrderId'];
                $assignedOrderNo = $_POST['assignedOrderNo'];
                $assignedUserId = $_POST['assignedUserId'];
                $assignedFirstName = $_POST['assignedFirstName'];
                $assignedLastName = $_POST['assignedLastName'];
                $assignedPosition = $_POST['assignedPosition'];
                $assignedDate = $_POST['assignedDate'];
                $assignedDesc = $_POST['assignedDesc'];
                date_default_timezone_set('Asia/Manila');
                $assignedDT = date('Y-m-d H:i:s');

                $connection = $this->connect();
                $stmt = $connection->prepare("INSERT INTO services (orderId, orderNo, serviceInstFname, serviceInstLname, serviceInstPos, serviceInstDesc, serviceAssignDate, serviceDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$assignedOrderId, $assignedOrderNo, $assignedFirstName, $assignedLastName, $assignedPosition, $assignedDesc, $assignedDate, $assignedDT]);

                if ($stmt) {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE orders SET orderServiceAss = ? WHERE orderId = ? AND orderNo = ?");
                    $stmt->execute([1, $assignedOrderId, $assignedOrderNo]);

                    if ($stmt) {

                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT serviceId FROM services ORDER BY serviceId DESC LIMIT 1");
                        $stmt->execute();
                        $datas = $stmt->fetch();
    
                        foreach ($datas as $data) {
                            $serviceId = $data;
    
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, serviceId, notificationType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$assignedUserId, $assignedOrderId, $serviceId, 4]);            
    
                            if ($stmt) {
                                echo "<script>
                                    swal('Successful!', 'Service installation request assigned!', 'success').then(function() {
                                        window.location = document.referrer;
                                    });
                                </script>";
                            }
                        }

                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Assigned Service Installation: Order (" . $assignedOrderNo . ")"; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $assignedUserUID, $activityDone, 5]);
    
                    }
                }

            }   
    
            $this->disconnect(); 

        }


        public function declinedService() {

            if (isset($_POST['declinedService'])) {
                $declinedUserUID = $_POST['declinedUserUID'];
                $declinedOrderId = $_POST['declinedOrderId'];
                $declinedOrderNo = $_POST['declinedOrderNo'];
                $declinedUserId = $_POST['declinedUserId'];
                $declinedReason = $_POST['declinedReason'];
                date_default_timezone_set('Asia/Manila');
                $declinedDT = date('Y-m-d H:i:s');

                $connection = $this->connect();
                $stmt = $connection->prepare("INSERT INTO services (orderId, orderNo, serviceInstReason, serviceDate) VALUES (?, ?, ?, ?)");
                $stmt->execute([$declinedOrderId, $declinedOrderNo, $declinedReason, $declinedDT]);

                if ($stmt) {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE orders SET orderServiceAss = ? WHERE orderId = ? AND orderNo = ?");
                    $stmt->execute([2, $declinedOrderId, $declinedOrderNo]);

                    if ($stmt) {

                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT serviceId FROM services ORDER BY serviceId DESC LIMIT 1");
                        $stmt->execute();
                        $datas = $stmt->fetch();
                        
                        foreach ($datas as $data) {
                            $serviceId = $data;
    
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, serviceId, notificationType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$declinedUserId, $declinedOrderId, $serviceId, 5]);            
    
                            if ($stmt) {
                                echo "<script>
                                    swal('Successful!', 'Service installation request declined!', 'success').then(function() {
                                        window.location = document.referrer;
                                    });
                                </script>";
                            }
                        }

                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Declined Service Installation: Order (" . $declinedOrderNo . ")"; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $declinedUserUID, $activityDone, 5]);

                    }
                }
                
            }

            $this->disconnect(); 

        }


        public function assignedDeclinedService() {

            if (isset($_POST['assignedDeclinedService'])) {
                $assignedDeclinedUserUID = $_POST['assignedDeclinedUserUID'];
                $assignedDeclinedOrderId = $_POST['assignedDeclinedOrderId'];
                $assignedDeclinedOrderNo = $_POST['assignedDeclinedOrderNo'];
                $assignedDeclinedUserId = $_POST['assignedDeclinedUserId'];
                $assignedDeclinedServId = $_POST['assignedDeclinedServId'];
                $assignedDeclinedFN = $_POST['assignedDeclinedFN'];
                $assignedDeclinedLN = $_POST['assignedDeclinedLN'];
                $assignedDeclinedPos = $_POST['assignedDeclinedPos'];
                $assignedDeclinedDate = $_POST['assignedDeclinedDate'];
                $assignedDeclineDesc = $_POST['assignedDeclineDesc'];
                date_default_timezone_set('Asia/Manila');
                $assignedDeclineDT = date('Y-m-d H:i:s');


                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE services SET serviceInstFname = ?, serviceInstLname = ?, serviceInstPos = ?, serviceInstDesc = ?, serviceAssignDate = ?, serviceDate = ? WHERE serviceId = ? AND orderId = ? AND orderNo = ?");
                $stmt->execute([$assignedDeclinedFN, $assignedDeclinedLN, $assignedDeclinedPos, $assignedDeclineDesc, $assignedDeclinedDate, $assignedDeclineDT, $assignedDeclinedServId, $assignedDeclinedOrderId, $assignedDeclinedOrderNo]);

                if ($stmt) {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE orders SET orderServiceAss = ? WHERE orderId = ? AND orderNo = ?");
                    $stmt->execute([1, $assignedDeclinedOrderId, $assignedDeclinedOrderNo]);

                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, serviceId, notificationType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$assignedDeclinedUserId, $assignedDeclinedOrderId, $assignedDeclinedServId, 6]);            

                        if ($stmt) {
                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                            $activityDone = "Reschedule Service Installation: Order (" . $assignedDeclinedOrderNo . ")"; 
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$activityUniqueId, $assignedDeclinedUserUID, $activityDone, 5]);
                            
                            if ($stmt) {
                                echo "<script>
                                    swal('Successful!', 'Service installation request assigned!', 'success').then(function() {
                                        window.location = document.referrer;
                                    });
                                </script>";
                            }
                            
                        }
                        
                    }
                }

            }   
    
            $this->disconnect(); 

        }

        public function assignedMarkedAsDone() {

            if (isset($_POST['assignedMarkedAsDone'])) {
                $markedAsDoneUserUID = $_POST['markedAsDoneUserUID'];
                $markedAsDoneOrderId = $_POST['markedAsDoneOrderId'];
                $markedAsDoneOrderNo = $_POST['markedAsDoneOrderNo'];
                $markedAsDoneUserId = $_POST['markedAsDoneUserId'];
                $markedAsDoneServId = $_POST['markedAsDoneServId'];
                date_default_timezone_set('Asia/Manila');
                $markedAsDoneDateTime = date('Y-m-d H:i:s');
                
                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE services SET serviceInstStatus = ?, serviceMarkedDate = ? WHERE serviceId = ? AND orderId = ? AND orderNo = ?");
                $stmt->execute([1, $markedAsDoneDateTime, $markedAsDoneServId, $markedAsDoneOrderId, $markedAsDoneOrderNo]);

                if ($stmt) {
    
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, serviceId, notificationType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$markedAsDoneUserId, $markedAsDoneOrderId, $markedAsDoneServId, 7]);            

                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Service Installation Marked as Done: Order (" . $markedAsDoneOrderNo . ")"; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $markedAsDoneUserUID, $activityDone, 5]);

                        if ($stmt) {
                            echo "<script>
                                swal('Successful!', 'Service installation request mark as done!', 'success').then(function() {
                                    window.location = document.referrer;
                                });
                            </script>"; 
                        }
                       
                    }
                    
                }

            }
    
            $this->disconnect(); 

        }

        public function getServiceInstByUserId($getServiceInstByUserId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.orderId AS newOrderId, orders.orderNo AS newOrderNo, orders.*, services.*, users.* FROM orders LEFT JOIN services ON orders.orderId = services.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.userId = ? AND orders.orderServiceInst != ? ORDER BY orders.orderId DESC");
            $stmt->execute([$getServiceInstByUserId, "None"]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();

            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getDeclinedServiceInstInfo($orderId, $orderNo) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.*, sales.*, cart.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN sales ON sales.orderId = orders.orderId LEFT JOIN cart ON cart.cartId = sales.cartId LEFT JOIN users ON cart.userId = users.userId WHERE orders.orderServiceAss = ? AND services.orderId = ? AND services.orderNo = ?");
            $stmt->execute([2, $orderId, $orderNo]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getServiceLogs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT activitylogs.*, users.* FROM activitylogs LEFT JOIN users ON activitylogs.userUniqueId = users.userUniqueId WHERE activityType = ? ORDER BY activityId DESC");
            $stmt->execute([5]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getNotificationsByUserId($getNotificationsByUserId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT notifications.*, services.*, notifications.orderId AS notificationOrderId, orders.orderNo AS notificationOrderNo, orders.*, payments.*, deliveries.* FROM notifications LEFT JOIN services ON notifications.serviceId = services.serviceId LEFT JOIN orders ON notifications.orderId = orders.orderId LEFT JOIN payments ON notifications.paymentId = payments.paymentId LEFT JOIN deliveries ON notifications.deliveryId = deliveries.deliveryId WHERE notifications.userId = ? ORDER BY notificationId DESC");
            $stmt->execute([$getNotificationsByUserId]);
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

    $classServices = New services();

?>