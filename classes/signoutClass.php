<?php 
    class signout extends dbh {

        public function signOut() {
            $connection = $this->connect();
            $stmt = $connection->prepare("UPDATE users SET userStatus = ? WHERE userId = ?");
            $stmt->execute([0, $_SESSION['userdetails']['userId']]);

            if ($stmt) {
                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                $activityDone = "Sign Out"; 
                $connection = $this->connect();
                $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                $stmt->execute([$activityUniqueId, $_SESSION['userdetails']['userUniqueId'], $activityDone, 3]);
            }

            if(!isset($_SESSION)) {
                session_start();
            }
    
            session_start();
            session_destroy();
            $_SESSION['userdetails'] = null;
            unset($_SESSION['userdetails']);
        }

    }

    $classSignOut = New signout();

?>