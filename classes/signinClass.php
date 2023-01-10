<?php 
    class signin extends dbh {

        public function signIn() {

            if (isset($_POST['signIn'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (!empty($username) && !empty($password)){
                    if (!empty($username)) {
                        if (!empty($password)) {
                            
                            $password = sha1($_POST['password']);

                            $connection = $this->connect();
                            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
                            $stmt->execute([$username, $password]);
                            $data = $stmt->fetch(); 
                            $datacount = $stmt->rowCount();
                            
                            if ($datacount > 0) {
                                // $newUserStatus = $data['userStatus'] + 1; 
                                // $myUserId = $data['userId'];
                                if ($data['userDel'] == 0) {
                                    if ($data['userVerify'] == 1) {
                                        if ($data['userStatus'] == 0) {
                                            if ($data['userType'] == "Admin") {
                                                $newUserStatus = $data['userStatus'] += 1; 
                                                $myUserId = $data['userId'];
                                                $this->userChangeStatus($newUserStatus, $myUserId);
                                                $this->setUserDetails($data);
                                                header ("location: admin/index.php?route=home");
                                            } elseif ($data['userType'] == "Head Admin") {
                                                $newUserStatus = $data['userStatus'] += 1; 
                                                $myUserId = $data['userId'];
                                                $this->userChangeStatus($newUserStatus, $myUserId);
                                                $this->setUserDetails($data);
                                                header ("location: admin/index.php?route=home");
                                            } elseif ($data['userType'] == "User") {
                                                $this->setUserDetails($data);
                                                $newUserStatus = $data['userStatus'] += 1; 
                                                $myUserId = $data['userId'];
                                                $this->userChangeStatus($newUserStatus, $myUserId);
                                                header ("location: index.php?route=home");
                                            }

                                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                                            $activityDone = "Sign In"; 
                                            $connection = $this->connect();
                                            $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                                            $stmt->execute([$activityUniqueId, $data['userUniqueId'], $activityDone, 3]);

                                        } else {
                                            // $_SESSION['username'] = $_POST['username'];
                                            // $_SESSION['error'] = "Your account has already Signed In in another device!";
        
                                            echo "<script>
                                                swal('Your account has already Signed In or someone is trying to access your account in another device!', 'Your account will automatically Sign Out!', 'warning').then(function() {
                                                    window.location.assign('./index.php?route=signout');
                                                });
                                            </script>";
        
                                            $newUserStatus = $data['userStatus'] += 1; 
                                            $myUserId = $data['userId'];
                                            $this->userChangeStatus($newUserStatus, $myUserId);
        
                                        }
                                    } else {
                                        echo "<script>
                                            swal('Not Verified!', 'Please check your Email to verify your account!', 'warning').then(function() {
                                                window.location.assign('./index.php?route=signout');
                                            });
                                        </script>";
                                    }

                                } else {
                                    echo "<script>
                                        swal('No user found!', 'Your account has been permanently deleted!', 'warning').then(function() {
                                            window.location.assign('./index.php?route=signout');
                                        });
                                    </script>";
                                }
                                
                            } else {
                                $_SESSION['username'] = $_POST['username'];
                                $_SESSION['error'] = "Incorrect Username or Password!";
                            }
                        } else {
                            $_SESSION['error'] = "Please Insert Password!";
                            $_SESSION['username'] = $_POST['username'];
                        }
                    } else {
                        $_SESSION['error'] = "Please Insert Username!";
                    }
                } else {
                    $_SESSION['error'] = "Please Insert Username and Password!";
                }
                
            }
    
            $this->disconnect(); 
    
        }

        public function setUserDetails($array) {
            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['userdetails'] = array(
                "userUniqueId" => $array['userUniqueId'], 
                "userId" => $array['userId'], 
                "firstName" => $array['firstName'], 
                "lastName" => $array['lastName'], 
                "userType" => $array['userType'], 
                "age" => $array['age'],
                "birthday" => $array['birthday'], 
                "address" => $array['address'], 
                "contactNo" => $array['contactNo'], 
                "gender" => $array['gender'],
                "username" => $array['username'],
                "password" => $array['password'],
                "email" => $array['email'],
                "userProfileImg" => $array['userProfileImg'],
                "userCName" => $array['userCName'],
                "userCAddress" => $array['userCAddress'],
                "userCPosition" => $array['userCPosition'],
                "userCNo" => $array['userCNo'],
                "userCEmail" => $array['userCEmail'],
                "userCId" => $array['userCId'],
                "userStatus" => $array['userStatus']

            );
    
            return $_SESSION['userdetails'];
        }
    
        public function getUserDetails() {
            if (!isset($_SESSION)) {
                session_start();
            }
    
            if (isset($_SESSION['userdetails'])) {
                return $_SESSION['userdetails'];
            }  
            
            // elseif (!isset($_SESSION['userdetails'])) {
            //     header('location: signin.php');
            // }

            else {
                return null;
            }
            
        }

        public function userChangeStatus($newUserStatus, $myUserId) {
            
            $connection = $this->connect();
            $stmt = $connection->prepare("UPDATE users SET userStatus = ? WHERE userId = ?");
            $stmt->execute([$newUserStatus, $myUserId]);
    
            if ($stmt) {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                $stmt->execute([$myUserId]);
                $data = $stmt->fetch(); 
                $datacount = $stmt->rowCount();

                if($datacount > 0) {
                    $this->setUserDetails($data);
                } else {
                    return false;
                }
            }

            $this->disconnect(); 

        }

        public function userChangeCompanyDetails() {
            if (isset($_POST['userChangeCD'])) {
                $userId = $_POST['userId'];
                $userCDCompanyName = $_POST['userCDCompanyName'];
                $userCDCompanyAddress = $_POST['userCDCompanyAddress'];
                $userCDCompanyPos = $_POST['userCDCompanyPos'];
                $userCDCompanyContact = $_POST['userCDCompanyContact'];
                $userCDCompanyEmail = $_POST['userCDCompanyEmail'];

                if (!empty($_FILES["userCDImageCompany"]["name"])) { 
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["userCDImageCompany"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["userCDImageCompany"]["tmp_name"], $target_file);
                } else {
                    $target_file = $_POST['userCDCompanyImgDir'];
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userCName = ?, userCAddress = ?, userCPosition = ?, userCNo = ?, userCEmail = ?, userCId = ? WHERE userId = ?");
                $stmt->execute([$userCDCompanyName, $userCDCompanyAddress, $userCDCompanyPos, $userCDCompanyContact, $userCDCompanyEmail, $target_file, $userId]);

                if ($stmt) {

                    $connection = $this->connect();
                    $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                    $stmt->execute([$userId]);
                    $data = $stmt->fetch(); 
                    $datacount = $stmt->rowCount();

                    if ($datacount > 0) {
                        $this->setUserDetails($data);
                    } else {
                        return false;
                    }

                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update: Company details"; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $data['userUniqueId'], $activityDone, 3]);
                    
                    if ($stmt) {
                        echo "<script>
                            swal('Success!', 'New company information saved!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                }

            }
    
            $this->disconnect(); 

        }

        public function userChangeProfileDetails() {
            if (isset($_POST['userChangePD'])) {
                $userId = $_POST['userId'];
                $userChangePDFName = $_POST['userChangePDFName'];
                $userChangePDLName = $_POST['userChangePDLName'];
                $userChangePDAge = $_POST['userChangePDAge'];
                $userChangePDBirthday = $_POST['userChangePDBirthday'];
                $userChangePDGender = $_POST['userChangePDGender'];
                $userChangePDAddress = $_POST['userChangePDAddress'];
                $userChangePDContactNo = $_POST['userChangePDContactNo'];
                $userChangePDEmail = $_POST['userChangePDEmail'];

                if (!empty($_FILES["userCDImageProfile"]["name"])) { 
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["userCDImageProfile"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["userCDImageProfile"]["tmp_name"], $target_file);
                } else {
                    $target_file = $_POST['userCDProfileImgDir'];
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET firstName = ?, lastName = ?, age = ?, birthday = ?, address = ?, contactNo = ?, gender = ?, email = ?, userProfileImg = ? WHERE userId = ?");
                $stmt->execute([$userChangePDFName, $userChangePDLName, $userChangePDAge, $userChangePDBirthday, $userChangePDAddress, $userChangePDContactNo, $userChangePDGender, $userChangePDEmail, $target_file, $userId]);

                if ($stmt) {

                    $connection = $this->connect();
                    $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                    $stmt->execute([$userId]);
                    $data = $stmt->fetch(); 
                    $datacount = $stmt->rowCount();

                    if($datacount > 0) {
                        $this->setUserDetails($data);
                    } else {
                        return false;
                    }
                    
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update: Profile details"; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $data['userUniqueId'], $activityDone, 3]);

                    if ($stmt) {
                        echo "<script>
                            swal('Success!', 'New information saved!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                }

            }
    
            $this->disconnect(); 

        }

        public function userChangePass() {
            
            if (isset($_POST['userChangePass'])) {
                $userId = $_POST['userId'];
                $userCPass = $_POST['userCPass'];
                $userCurrentPass = sha1($_POST['userCurrentPass']);
                $userNewPass = sha1($_POST['userNewPass']);
                $userCNewPass = sha1($_POST['userCNewPass']);

                if ($userCurrentPass == $userCPass) {
                    if ($userNewPass == $userCNewPass) {

                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE users SET password = ?, cpassword = ? WHERE userId = ?");
                        $stmt->execute([$userNewPass, $userCNewPass, $userId]);

                        if ($stmt) {

                            $connection = $this->connect();
                            $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                            $stmt->execute([$userId]);
                            $data = $stmt->fetch(); 
                            $datacount = $stmt->rowCount();

                            if($datacount > 0) {
                                $this->setUserDetails($data);
                            } else {
                                return false;
                            }

                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                            $activityDone = "Update: Password"; 
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$activityUniqueId, $data['userUniqueId'], $activityDone, 3]);

                            if ($stmt) {
                                echo "<script>
                                    swal('Success!', 'New password saved!', 'success').then(function() {
                                        window.location = document.referrer;
                                    });
                                </script>";
                            }
                            
                        }
                    
                    } else {
                        echo "<script>
                            swal('Danger!', 'New password did not match!', 'warning').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                } else {
                    echo "<script>
                        swal('Danger!', 'Your current password did not match!', 'warning').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                }

            }
    
            $this->disconnect(); 

        }

        public function adminChangePass() {

            if (isset($_POST['adminChangePass'])) {
                $userId = $_POST['userId'];
                $newUserUniqueId = $_POST['newUserUniqueId'];
                $adminCPass = $_POST['adminCPass'];
                $adminCurrentPass = sha1($_POST['adminCurrentPass']);
                $adminNewPass = sha1($_POST['adminNewPass']);
                $adminCNewPass = sha1($_POST['adminCNewPass']);


                if ($adminCurrentPass == $adminCPass) {
                    if ($adminNewPass == $adminCNewPass) {

                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE users SET password = ?, cpassword = ? WHERE userId = ? AND userUniqueId = ?");
                        $stmt->execute([$adminNewPass, $adminCNewPass, $userId, $newUserUniqueId]);

                        if ($stmt) {

                            $connection = $this->connect();
                            $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                            $stmt->execute([$userId]);
                            $data = $stmt->fetch(); 
                            $datacount = $stmt->rowCount();

                            if($datacount > 0) {
                                $this->setUserDetails($data);
                            } else {
                                return false;
                            }

                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                            $activityDone = "Update: Password"; 
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$activityUniqueId, $data['userUniqueId'], $activityDone, 3]);

                            if ($stmt) {
                                echo "<script>
                                    swal('Success!', 'New password saved!', 'success').then(function() {
                                        window.location = document.referrer;
                                    });
                                </script>";
                            }
                            
                        }
                    
                    } else {
                        echo "<script>
                            swal('Danger!', 'New password did not match!', 'warning').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                } else {
                    echo "<script>
                        swal('Danger!', 'Your current password did not match!', 'warning').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                }

            }
    
            $this->disconnect(); 

        }

        public function userInfoSaved() {

            if (isset($_POST['userInfoSaved'])) {

                $userId = $_POST['userId'];
                $newUserUniqueId = $_POST['newUserUniqueId'];
                $userFname = $_POST['userFname'];
                $userLname = $_POST['userLname'];
                $userAge = $_POST['userAge'];
                $userBirthday = $_POST['userBirthday'];
                $userAddress = $_POST['userAddress'];
                $userContactNo = $_POST['userContactNo'];
                $userGender = $_POST['userGender'];
                $userUsername = $_POST['userUsername'];
                $userEmail = $_POST['userEmail'];

                if ($this->checkUsername($userUsername, $userId, $newUserUniqueId) == 0) {
                    if ($this->checkEmail($userEmail, $userId, $newUserUniqueId) == 0) {

                        if (empty($_FILES["imageUAdmin"]["name"])) {
                            $target_file = $_POST['default-photo'];
                        } else {
                            $target_dir = "uploads/";
                            $target_dir_move = "../uploads/";
                            $target_file = $target_dir . basename($_FILES["imageUAdmin"]["name"]);
                            $target_file_move = $target_dir_move . basename($_FILES["imageUAdmin"]["name"]);
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            move_uploaded_file($_FILES["imageUAdmin"]["tmp_name"], $target_file_move);
                        }
                        
                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE users SET firstName = ?, lastName = ?, age = ?, birthday = ?, address = ?, contactNo = ?, gender = ?, userProfileImg = ? WHERE userId = ? AND userUniqueId = ?");
                        $stmt->execute([$userFname, $userLname, $userAge, $userBirthday, $userAddress, $userContactNo, $userGender, $target_file, $userId, $newUserUniqueId]);

                        if ($stmt) {

                            $connection = $this->connect();
                            $stmt = $connection->prepare("SELECT * FROM users WHERE userId = ?");
                            $stmt->execute([$userId]);
                            $data = $stmt->fetch(); 
                            $datacount = $stmt->rowCount();

                            if($datacount > 0) {
                                $this->setUserDetails($data);
                            } else {
                                return false;
                            }

                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                            $activityDone = "Update: Profile details"; 
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$activityUniqueId, $data['userUniqueId'], $activityDone, 3]);

                            if ($stmt) {
                                echo "<script>
                                    swal('Successful!', 'New user information saved!', 'success').then(function() {
                                        window.location = document.referrer;
                                    });
                                </script>";
                            }
                            
                        } 
                    } else {
                        echo "<script>
                            swal('Error!', 'Email already exists!', 'error').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                } else {
                    echo "<script>
                        swal('Error!', 'Username already exists!', 'error').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                }

            }
    
            $this->disconnect(); 

        }

        public function checkUsername($userUsername, $userId, $newUserUniqueId) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT username FROM users WHERE username = ? AND userId != ? AND userUniqueId != ?");
            $stmt->execute([$userUsername, $userId, $newUserUniqueId]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function checkEmail($email, $userId, $newUserUniqueId) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT email FROM users WHERE email = ? AND userId != ? AND userUniqueId != ?");
            $stmt->execute([$email, $userId, $newUserUniqueId]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

    }

    $classSignIn = New signin();

?>