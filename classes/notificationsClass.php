<?php 
    class notifications extends dbh {

        public function getNotificationsByUserId($userIdentification) {

            if(isset($_POST['viewNotification'])){
    
                if($_POST["viewNotification"] != '') {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE notifications SET notificationStatus = ? WHERE userId = ?");
                    $stmt->execute([1, $userIdentification]);
                }
                
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT notifications.*, notifications.orderId AS notificationOrderId, services.*, orders.orderNo AS notificationOrderNo, orders.*, payments.*, deliveries.* FROM notifications LEFT JOIN services ON notifications.serviceId = services.serviceId LEFT JOIN orders ON notifications.orderId = orders.orderId LEFT JOIN payments ON notifications.paymentId = payments.paymentId LEFT JOIN deliveries ON notifications.deliveryId = deliveries.deliveryId WHERE notifications.userId = ? ORDER BY notificationId DESC LIMIT 5");

                $stmt->execute([$userIdentification]);
                $datas = $stmt->fetchAll();
                $datacount = $stmt->rowCount();
                $displayNotification = '';

                if($datacount > 0) {
                    foreach ($datas as $data) {

                        if ($data["notificationType"] == 0) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Approved</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> has been approved. Order due date is on <strong class="text-primary">'.date('M d, Y', strtotime($data["orderDueDate"])).'</strong>. Please settle <strong class="text-primary">&#x20B1;'.number_format(intval($data["totalBalance"] / 2), 2).'</strong> of your total order(s) amount <strong class="text-primary">&#x20B1;'.number_format($data["totalBalance"], 2).'</strong> upon approval of your installment. You have 60 days to settle the remaining balance on your order. <strong class="text-danger">Reminder: </strong><span class="text-decoration-underline">Please send to our email (jenna@star-seiki.com.ph) your bank receipts or proof of payment for verification.</span></span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 1) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Approved</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> has been approved. Order due date is on <strong class="text-primary">'.date('M d, Y', strtotime($data["orderDueDate"])).'</strong>. You have 30 days to settle the full payment upon approval of order. <strong class="text-danger">Reminder: </strong><span class="text-decoration-underline">Please send to our email (jenna@star-seiki.com.ph) your bank receipts or proof of payment for verification.</span></span>
                                </td>
                            </tr>'; 
                        } elseif ($data["notificationType"] == 2) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Payment Received</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your <strong class="text-primary">&#x20B1;'.number_format($data["pay"], 2).'</strong>  intallment payment has been received for your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong>. Now, your remaining total balance is <strong class="text-primary">&#x20B1;'.number_format($data["balance"], 2).'</strong>.</span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 3) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Payment Received</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your <strong class="text-primary">&#x20B1;'.$data["pay"].'</strong> full payment has been received for your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong>.</span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 4) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-services-reqs&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Service Installation Request Assigned</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your service installation request for order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> has successfully assigned. Installer Name: <strong class="text-primary">'.$data["serviceInstFname"] . " " . $data["serviceInstLname"].'</strong>, Position: <strong class="text-primary">'.$data["serviceInstPos"].'</strong>, Installation Date: <strong class="text-primary">'.date('M d, Y h:i a', strtotime($data["serviceAssignDate"])).'</strong>, Service Description: <strong class="text-primary">'.$data["serviceInstDesc"].'</strong>.</span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 5) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-services-reqs&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Service Installation Request Declined</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your request for service installation for order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> is not available at this moment <strong class="text-primary">'.$data["serviceInstReason"].'</strong>. You will be <strong>reschedule and notify</strong> once our engineer is available. Sorry for inconvenience. Thank you :) </span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 6) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-services-reqs&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Service Installation Request Assigned</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Sorry for the inconvenience, our service engineer are now available. Your service installation request for <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> has successfully <stong>rescheduled and assigned</stong>. Installer Name: <strong class="text-primary">'.$data["serviceInstFname"] . " " . $data["serviceInstLname"].'</strong>, Position: <strong class="text-primary">'.$data["serviceInstPos"].'</strong>, Installation Date: <strong class="text-primary">'.date('M d, Y h:i a', strtotime($data["serviceAssignDate"])).'</strong>, Service Description: <strong class="text-primary">'.$data["serviceInstDesc"].'</strong>. </span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 7) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-services-reqs&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Service Installation Request Completed</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your service installation request for order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> has marked completed. </span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 8) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Delivery Date</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> delivery date is on <strong class="text-primary">'.date('M d, Y', strtotime($data["deliveryEstDate"])).'</strong>.</span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 9) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Marked Delivered</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> has marked delivered. </span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 10) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Payment Reminder</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> has 10 days left to pay your existing balance on your <strong class="text-primary">&#x20B1;'.number_format($data["totalBalance"], 2).'</strong>. Please send your proof/s of payment to our email <strong class="text-danger">jenna@star-seiki.com.ph</strong> for verification. Thank you.</span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 11) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Payment Reminder</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order due date for <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> is today <strong class="text-primary">'.date('M d, Y', strtotime($data["orderDueDate"])).'</strong>. Please settle your balance payment <strong class="text-primary">&#x20B1;'.number_format($data["totalBalance"], 2).'</strong> and send us the proof/s of payment to our email <strong class="text-danger">jenna@star-seiki.com.ph</strong> for verification. Thank you.</span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 12) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Payment Reminder</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">Your order due date for <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> is on last <strong class="text-primary">'.date('M d, Y', strtotime($data["orderDueDate"])).'</strong>. Please settle your existing balance <strong class="text-primary">&#x20B1;'.number_format($data["totalBalance"], 2).'</strong> to avoid inconvenience in your future transaction with us. Please send us the proof/s of payment to our email <strong class="text-danger">jenna@star-seiki.com.ph</strong> for verification. Thank you.</span>
                                </td>
                            </tr>';
                        } elseif ($data["notificationType"] == 13) {
                            $displayNotification .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=user&view=my-orders&oid='.$data['notificationOrderId'].'&on='.$data['notificationOrderNo'].'"></a></td>
    
                                <td><img src="assets/images/page-logo.png" width="50" height="50" alt=""></td>
                                <td class="text-light" style="width: 21rem;">
                                    <strong>Order Returned</strong>
                                    <br>
                                    <span class="d-inline-block text-wrap mt-1" style="font-size: 0.8rem;">We are sorry for the damaged product in your order <strong class="text-primary">'.$data["notificationOrderNo"].'</strong> that was delivered on last <strong class="text-primary">'.date('M d, Y', strtotime($data["deliveryMarkedDate"])).'</strong>, we take the full accountability of that matter. We accept the return of the product. Thank you! Please shop again!</span>
                                </td>
                            </tr>';
                        }
                    

                        
                    }
                    
                } else {
                    $displayNotification .= 
                        '<li class="text-center mt-2">
                            <h4>No notifications yet!</h4>
                            <span><i class="fa-solid fa-bell" style="font-size: 10rem;"></i></span>
                            <br>
                        </li>';
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT orders.*, DATE_FORMAT(DATE_SUB(orderDueDate, interval 10 day), '%Y-%m-%d') AS newDueDate FROM orders WHERE orderApproved = ? AND totalBalance != ? AND orderDueNotif = ? AND DATE_FORMAT(DATE_SUB(orderDueDate, interval 10 day), '%Y-%m-%d') = CURDATE()");
                $stmt->execute([1, 0, 0]);
                $orders = $stmt->fetchAll();
                $ordersCount = $stmt->rowCount();

                if ($ordersCount > 0) {
                    foreach ($orders as $order) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, notificationType) VALUES (?, ?, ?)");
                        $stmt->execute([$order['userId'], $order['orderId'], 10]);
                    }

                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE orders SET orderDueNotif = ? WHERE orderId = ?");
                        $stmt->execute([1, $order['orderId']]);
                    }
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT orders.*, DATE_FORMAT(orderDueDate, '%Y-%m-%d') AS newDueDate FROM orders WHERE orderApproved = ? AND totalBalance != ? AND orderDueNotif = ? AND DATE_FORMAT(orderDueDate, '%Y-%m-%d') = CURDATE()");
                $stmt->execute([1, 0, 1]);
                $dueOrders = $stmt->fetchAll();
                $dueOrdersCount = $stmt->rowCount();

                if ($dueOrdersCount > 0) {
                    foreach ($dueOrders as $dueOrder) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, notificationType) VALUES (?, ?, ?)");
                        $stmt->execute([$dueOrder['userId'], $dueOrder['orderId'], 11]);
                    }

                    $newDueDate = date_create($dueOrder['newDueDate']);
                    date_add($newDueDate, date_interval_create_from_date_string("5 days"));
                    $dateAddFiveDays = date_format($newDueDate,"Y-m-d");

                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE orders SET orderDueNotif = ?, orderDueDateFD = ? WHERE orderId = ?");
                        $stmt->execute([2, $dateAddFiveDays, $dueOrder['orderId']]);
                    }
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT orders.*, DATE_FORMAT(orderDueDateFD, '%Y-%m-%d') AS newDueDate FROM orders WHERE orderApproved = ? AND totalBalance != ? AND orderDueNotif = ? AND DATE_FORMAT(orderDueDateFD, '%Y-%m-%d') = CURDATE()");
                $stmt->execute([1, 0, 2]);
                $dueOrdersF = $stmt->fetchAll();
                $dueOrdersFCount = $stmt->rowCount();

                if ($dueOrdersFCount > 0) {
                    foreach ($dueOrdersF as $dueOrderF) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO notifications (userId, orderId, notificationType) VALUES (?, ?, ?)");
                        $stmt->execute([$dueOrderF['userId'], $dueOrderF['orderId'], 12]);
                    }

                    $newDueDateF = date_create($dueOrderF['newDueDate']);
                    date_add($newDueDateF, date_interval_create_from_date_string("5 days"));
                    $dateAddFiveDaysF = date_format($newDueDateF,"Y-m-d");

                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE orders SET orderDueNotif = ?, orderDueDateFD = ? WHERE orderId = ?");
                        $stmt->execute([2, $dateAddFiveDaysF, $dueOrderF['orderId']]);
                    }
                }


                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM notifications WHERE notificationStatus = ? AND userId = ? ORDER BY notificationId DESC");
                $stmt->execute([0, $userIdentification]);
                $datacount = $stmt->rowCount();

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM notifications WHERE userId = ? ORDER BY notificationId DESC");
                $stmt->execute([$userIdentification]);
                $infocount = $stmt->rowCount();

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                $stmt->execute([$userIdentification]);
                $userdata = $stmt->fetch(); 
                $usercount = $stmt->rowCount();
                if ($usercount > 0) {
                    $userStatus = $userdata['userStatus'];
                } 

                $data = array(
                    'displayNotification' => $displayNotification,
                    'unseenNotification' => $datacount,
                    'totalNotifications' => $infocount,
                    'userStatus' => $userStatus,
                );
        
                echo json_encode($data);
            }
    
            $this->disconnect(); 

        }


        public function getCart($userIdentificationn) {

            if(isset($_POST['viewCart'])){
    
                if($_POST["viewCart"] != '') {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE cart SET cartNotificationStatus = ? WHERE userId = ?");
                    $stmt->execute([1, $userIdentificationn]);
                }
                
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT cart.*, users.*, products.*, categories.* FROM cart LEFT JOIN users ON cart.userId = users.userId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE cart.userId = ? AND cart.checkedOut = ? ORDER BY cart.cartId DESC LIMIT 5");
                $stmt->execute([$userIdentificationn, 0]);
                $datas = $stmt->fetchAll();
                $datacounts = $stmt->rowCount();
                $displayCart = '';

                if($datacounts > 0) {
                    foreach ($datas as $data) {
                        $displayCart .= 
                            '<tr class="item-notification" style="cursor: pointer;">
                                <td class="d-none"><a href="index.php?route=product&pid='.$data['productUniqueId'].'&pd='.$data['model'].'"></a></td>

                                <td><img src='.$data["productImgs"].' width="50" height="50" alt=""></td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">'.$data["productDesc"].'</span>('.$data["model"].')
                                </td>
                                <td class="text-success">&#x20B1;'.number_format($data["unitPrice"], 2).'</td>
                            </tr>';
                    }
                    
                } else {
                    $displayCart .= 
                        '<li class="text-center mt-2">
                            <h4>No products yet!</h4>
                            <span><i class="fa-solid fa-cart-shopping" style="font-size: 10rem;"></i></span>
                            <br>
                            <br>
                            <a href="index.php?route=home" class="bg-primary text-bold link-light text-decoration-none rounded"><i class="fa-solid fa-cart-plus fs-5 align-middle me-2"></i>Add item(s) to your cart!</a>
                        </li>';
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM cart WHERE cartNotificationStatus = ? AND userId = ? ORDER BY cartId DESC");
                $stmt->execute([0, $userIdentificationn]);
                $datacount = $stmt->rowCount();

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM cart WHERE checkedOut = ? AND userId = ? ORDER BY cartId DESC");
                $stmt->execute([0, $userIdentificationn]);
                $infocount = $stmt->rowCount();
        
                $data = array(
                    'displayCart' => $displayCart,
                    'unseenItems' => $datacount,
                    'totalItems' => $infocount
                );
        
                echo json_encode($data);
            }

        }

        public function getAccountStatus($userIdentificationnn) {

            if (isset($userIdentificationnn)) {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                $stmt->execute([$userIdentificationnn]);
                $userdata = $stmt->fetch(); 
                $usercount = $stmt->rowCount();
                if ($usercount > 0) {
                    $userStatus = $userdata['userStatus'];
                } 

                $data = array(
                    'userStatus' => $userStatus
                );
        
                echo json_encode($data);
            }

        }

        public function verifyAccount($userUniqueId) {

            if (isset($userUniqueId)) {
                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userVerify = ? WHERE userUniqueId = ?");
                $stmt->execute([1, $userUniqueId]);

                if ($stmt) {
                    $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
                    $stmt->execute([$userUniqueId]);
                    $verifiedAccount = $stmt->fetch(); 

                    if ($verifiedAccount['userVerify'] == 1) {
                        $result = "Already";
                    } else {
                        $result = "Success";
                    }
                } else {
                    $result = "Failed";
                }

                $data = array(
                    'result' => $result
                );
        
                echo json_encode($data);
                

                
            }

        }

    }

    $classNotifications = New notifications();

?>