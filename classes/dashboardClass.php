<?php 
    class dashboard extends dbh {

        public function countDailySales() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%M %d, %Y') as orderByDay, sum(totalAmount) as totalByDay FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%M %d, %Y') ORDER BY orderDate DESC LIMIT 7");
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


        public function countWeeklySales() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%Uth Week of %Y') as orderByWeek, sum(totalAmount) as totalByWeek FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%U %Y') ORDER BY orderDate DESC LIMIT 1");
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


        public function countMonthlySales() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%M - %Y') as orderByMonth, sum(totalAmount) as totalByMonth FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%M %Y') ORDER BY orderDate DESC LIMIT 1");
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

        public function countYearlySales() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%Y') as orderByYear, sum(totalAmount) as totalByYear FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%Y') ORDER BY orderDate DESC LIMIT 1");
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

        public function getYearlySalesLimitOne() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT DATE_FORMAT(orderDate, '%Y') as orderByYear, sum(totalAmount) as totalByYear FROM orders WHERE orderPurchased = ? GROUP BY DATE_FORMAT(orderDate, '%Y') ORDER BY orderDate DESC LIMIT 1");
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

        public function countProducts() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM products");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return 0;
            }
    
            $this->disconnect(); 
        }

        public function countGoodProducts() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM products WHERE quantity > ?");
            $stmt->execute([20]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return 0;
            }
    
            $this->disconnect(); 
        }

        public function countCriticalProducts() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM products WHERE quantity <= ? AND quantity != ?");
            $stmt->execute([20, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return 0;
            }
    
            $this->disconnect(); 
        }

        public function countStockoutProducts() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM products WHERE quantity = ?");
            $stmt->execute([0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return 0;
            }
    
            $this->disconnect(); 
        }

        public function countFMStockProducts() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT products.*, categories.* FROM products LEFT JOIN categories ON products.category = categories.categoryId WHERE quantitySold >= ? ORDER BY quantitySold DESC LIMIT 5");
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

        public function countOrders() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM orders WHERE orderPurchased = ?");
            $stmt->execute([1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return 0;
            }
    
            $this->disconnect(); 
        }

        public function countOrdersApproved() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, deliveries.*, users.* FROM orders LEFT JOIN deliveries ON orders.orderId = deliveries.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderApproved = ? AND deliveryStatus = ? ORDER BY orderApprovedDate DESC");
            $stmt->execute([1, 1, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function countOrdersDelivered() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, deliveries.*, users.* FROM orders LEFT JOIN deliveries ON orders.orderId = deliveries.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orderPurchased = ? AND orderSetDeliver = ? AND deliveryStatus = ? ORDER BY orderApprovedDate DESC");
            $stmt->execute([1, 1, 1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function countServiceReqs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT orders.*, users.* FROM orders LEFT JOIN users ON orders.userId = users.userId WHERE orderServiceInst != ? AND orderPurchased = ? ORDER BY orderId DESC");
            $stmt->execute(["None", 1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function countSRAssigned() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceAss = ? AND services.serviceInstStatus = ? ORDER BY services.serviceId DESC");
            $stmt->execute([1, 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }
    
            $this->disconnect();  

        }

        public function countSRDeclined() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceAss = ? ORDER BY services.serviceId DESC");
            $stmt->execute([2]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function countSRDone() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT services.*, orders.*, users.* FROM services LEFT JOIN orders ON services.orderId = orders.orderId LEFT JOIN users ON orders.userId = users.userId WHERE orders.orderServiceAss = ? AND services.serviceInstStatus = ? ORDER BY services.serviceId DESC");
            $stmt->execute([1, 1]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $datacount;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

    }

    $classDashboard = New dashboard();

?>