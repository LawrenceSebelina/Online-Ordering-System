<?php 
    class reports extends dbh {

        public function getProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getGStockProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE quantity > ? ORDER BY quantity DESC");
            $stmt->execute([20]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getCStockProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE quantity <= ? AND quantity != ? ORDER BY quantity DESC");
            $stmt->execute([20, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getSStockProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE quantity = ?");
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
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE quantitySold >= ? ORDER BY quantitySold DESC");
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

        public function getSMStockProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId ORDER BY quantitySold ASC");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function getTransactionLogs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, users.* FROM orders LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderApproved = ? ORDER BY orderApprovedDate DESC");
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

        public function getWeeklySales() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%uth Week of %Y') as orderByWeek, sum(totalAmount) as totalByWeek, sum(totalBalance) as totalBalance, md5(DATE_FORMAT(orderDate, '%u%Y')) as orderByWeekUId FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%u %Y') ORDER BY orderDate DESC");
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

        public function getWeeklySalesProdSold($orderByWeekUId) {

            $connection = $this->connect();

            $stmt = $connection->prepare("SELECT orders.*, sales.*, cart.*, products.*, categories.*, DATE_FORMAT(orderDate, '%Uth Week of %Y') as orderByWeek FROM orders LEFT JOIN sales ON orders.orderId = sales.orderId LEFT JOIN cart ON cart.cartId = sales.cartId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE orderByWeekUId = ? ORDER BY orderDate DESC"); //orderId != ? AND 

            // $stmt = $connection->prepare("SELECT cart.*, sales.*, payments.*, products.*, categories.*, DATE_FORMAT(paymentDate, '%Uth Week of %Y') as orderByWeek FROM cart LEFT JOIN sales ON cart.cartId = sales.cartId LEFT JOIN payments ON payments.orderId = sales.orderId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE paymentId != ? AND orderByWeekUId = ? ORDER BY paymentDate DESC");

            $stmt->execute([$orderByWeekUId]); //"", 
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getMonthlySales() {

            $connection = $this->connect();
            // $stmt = $connection->prepare("SELECT DATE_FORMAT(paymentDate, '%M of %Y') as orderByMonth, sum(pay) as totalByMonth, sum(balance) as totalBalance, md5(DATE_FORMAT(paymentDate, '%M%Y')) as orderByMonthUId FROM payments GROUP BY DATE_FORMAT(paymentDate, '%M %Y') ORDER BY paymentDate DESC");
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%M of %Y') as orderByMonth, sum(totalAmount) as totalByMonth, sum(totalBalance) as totalBalance, md5(DATE_FORMAT(orderDate, '%M%Y')) as orderByMonthUId FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%M %Y') ORDER BY orderDate DESC");
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

        public function getMonthlySalesProdSold($orderByMonthUId) {

            $connection = $this->connect();
            // $stmt = $connection->prepare("SELECT cart.*, sales.*, payments.*, products.*, categories.*, DATE_FORMAT(paymentDate, '%M of %Y') as orderByMonth FROM cart LEFT JOIN sales ON cart.cartId = sales.cartId LEFT JOIN payments ON payments.orderId = sales.orderId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE paymentId != ? AND orderByMonthUId = ? ORDER BY paymentDate DESC");
            $stmt = $connection->prepare("SELECT orders.*, sales.*, cart.*, products.*, categories.*, DATE_FORMAT(orderDate, '%M of %Y') as orderByMonth FROM orders LEFT JOIN sales ON orders.orderId = sales.orderId LEFT JOIN cart ON cart.cartId = sales.cartId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE orderByMonthUId = ? ORDER BY orderDate DESC");
            $stmt->execute([$orderByMonthUId]); //"", 
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getYearlySales() {

            $connection = $this->connect();
            // $stmt = $connection->prepare("SELECT DATE_FORMAT(paymentDate, '%Y') as orderByYear, sum(pay) as totalByYear, sum(balance) as totalBalance, md5(DATE_FORMAT(paymentDate, '%Y')) as orderByYearUId FROM payments GROUP BY DATE_FORMAT(paymentDate, '%Y') ORDER BY paymentDate DESC");
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%Y') as orderByYear, sum(totalAmount) as totalByYear, sum(totalBalance) as totalBalance, md5(DATE_FORMAT(orderDate, '%Y')) as orderByYearUId FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%Y') ORDER BY orderDate DESC");
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

        public function getYearlySalesProdSold($orderByYearUId) {

            $connection = $this->connect();
            // $stmt = $connection->prepare("SELECT cart.*, sales.*, payments.*, products.*, categories.*, DATE_FORMAT(paymentDate, '%Y') as orderByYear FROM cart LEFT JOIN sales ON cart.cartId = sales.cartId LEFT JOIN payments ON payments.orderId = sales.orderId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE paymentId != ? AND orderByYearUId = ? ORDER BY paymentDate DESC");
            $stmt = $connection->prepare("SELECT orders.*, sales.*, cart.*, products.*, categories.*, DATE_FORMAT(orderDate, '%Y') as orderByYear FROM orders LEFT JOIN sales ON orders.orderId = sales.orderId LEFT JOIN cart ON cart.cartId = sales.cartId LEFT JOIN products ON cart.productId = products.productId LEFT JOIN categories ON products.category = categories.categoryId WHERE orderByYearUId = ? ORDER BY orderDate DESC");
            $stmt->execute([$orderByYearUId]); //"", 
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getOrders() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, users.* FROM orders LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderApproved = ? ORDER BY orderId DESC");
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

        public function getPayments() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT payments.*, payments.orderId AS paymentOrderId, orders.*, users.* FROM payments LEFT JOIN orders ON payments.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId ORDER BY paymentOrderId DESC");
            $stmt->execute();
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
            $stmt = $connection->prepare("SELECT orders.*, deliveries.*, users.* FROM orders LEFT JOIN deliveries ON orders.orderId = deliveries.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderSetDeliver = ? AND deliveryStatus = ? ORDER BY orderApprovedDate DESC");
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

        public function getServices() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, orders.orderNo AS ordersOrderNo, services.*, services.orderId AS serviceOrderId, users.* FROM orders LEFT JOIN services ON orders.orderId = services.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceInst != ? ORDER BY orderDate DESC");
            $stmt->execute(["None"]);
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
            $stmt = $connection->prepare("SELECT services.*, orders.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceAss = ? ORDER BY services.serviceId DESC");
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

    }

    $classReports = New reports();

?>