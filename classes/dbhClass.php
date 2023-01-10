<?php 
    class dbh {

        private $host = "mysql:host=localhost;dbname=ois_starseikiph";
        private $user = "root";
        private $pass = "";
        protected $conn;

        protected function connect() {
            try {
                $this->conn = new PDO($this->host, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $this->conn;  
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            } 
        }

        protected function disconnect() {
            $this->conn = null;
        }

    }
?>