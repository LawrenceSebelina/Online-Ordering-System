<?php 
    class configuration extends dbh {

        public function getCompanyInfo() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM companyinfo");
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

        public function companyInfoSaved() {

            if (isset($_POST['companyInfoSaved'])) {
                $companyUserUID = $_POST['companyUserUID'];
                $companyInfoId = $_POST['companyInfoId'];
                $companyName = $_POST['companyName'];
                $companyNameAlt = $_POST['companyNameAlt'];
                $companyOwner = $_POST['companyOwner'];
                $companyTelephone = $_POST['companyTelephone'];
                $companyFax = $_POST['companyFax'];
                $companyAddress = $_POST['companyAddress'];
                $companyEmail = $_POST['companyEmail'];
                $companyResArea = $_POST['companyResArea'];
                $companyFounded = $_POST['companyFounded'];
                $companyBusiness = $_POST['companyBusiness'];
                $companyFilStaff = $_POST['companyFilStaff'];
                $companyJpnStaff = $_POST['companyJpnStaff'];

                if (empty($_FILES["imageLogo"]["name"])) {
                    $target_file = $_POST['default-logo'];
                } else {
                    $target_dir = "assets/images/";
                    $target_dir_move = "../assets/images/";
                    $target_file = $target_dir . basename($_FILES["imageLogo"]["name"]);
                    $target_file_move = $target_dir_move . basename($_FILES["imageLogo"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["imageLogo"]["tmp_name"], $target_file_move);
                }

                if (empty($_FILES["imageLogoAlt"]["name"])) {
                    $target_filex = $_POST['default-logo-alt'];
                } else {
                    $target_loc = "assets/images/";
                    $target_loc_move = "../assets/images/";
                    $target_filex = $target_loc . basename($_FILES["imageLogoAlt"]["name"]);
                    $target_filex_move = $target_loc_move . basename($_FILES["imageLogoAlt"]["name"]);
                    $imageFileTypex = strtolower(pathinfo($target_filex,PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["imageLogoAlt"]["tmp_name"], $target_filex_move);
                }

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE companyinfo SET companyName = ?, companyNameAlt = ?, companyAddress = ?, companyTelephone = ?, companyFax = ?, companyEmail = ?, companyBusiness = ?, companyResArea = ?, companyFounded = ?, companyOwner = ?, companyFilStaff = ?, companyJpnStaff = ?, companyLogo = ?, companyLogoAlt = ? WHERE companyInfoId = ?");
                $stmt->execute([$companyName, $companyNameAlt, $companyAddress, $companyTelephone, $companyFax, $companyEmail, $companyBusiness, $companyResArea, $companyFounded, $companyOwner, $companyFilStaff, $companyJpnStaff, $target_file, $target_filex, $companyInfoId]);

                if ($stmt) {

                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update: Company information"; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $companyUserUID, $activityDone, 3]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'New company information saved!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                } 

            }
    
            $this->disconnect(); 

        }

        public function getUsers($userId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userId != ? AND userType = ? AND userDel = ? ORDER BY userDate DESC");
            $stmt->execute([$userId, "Admin", 0]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function getUser($userUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
            $stmt->execute([$userUniqueId]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }
    
            $this->disconnect(); 

        }

        public function userInfoSaved() {

            if (isset($_POST['userInfoSaved'])) {
                $userInfoSavedUserUID = $_POST['userId'];;
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

                if ($this->userInfoSavedCheckUN($userUsername, $userId, $newUserUniqueId) == 0) {
                    if ($this->userInfoSavedCheckEmail($userEmail, $userId, $newUserUniqueId) == 0) {

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

                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                            $activityDone = "Update: Admin " . $userFname . " " . $userLname . " profile details"; 
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$activityUniqueId, $userInfoSavedUserUID, $activityDone, 3]);

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

        public function userInfoSavedCheckUN($username, $userId, $newUserUniqueId) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT username FROM users WHERE username = ? AND userId != ? AND userUniqueId != ?");
            $stmt->execute([$username, $userId, $newUserUniqueId]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function userInfoSavedCheckEmail($email, $userId, $newUserUniqueId) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT email FROM users WHERE email = ? AND userId != ? AND userUniqueId != ?");
            $stmt->execute([$email, $userId, $newUserUniqueId]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function adminChangePass() {

            if (isset($_POST['adminChangePass'])) {
                $changePassUserUID = $_POST['changePassUserUID']; 
                $userId = $_POST['userId'];
                $newUserUniqueId = $_POST['newUserUniqueId'];
                $adminNewPass = sha1($_POST['adminNewPass']);
                $adminCNewPass = sha1($_POST['adminCNewPass']);
                $changePassFullName = $_POST['changePassFullName'];  

                if ($adminNewPass == $adminCNewPass) {

                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE users SET password = ?, cpassword = ? WHERE userId = ? AND userUniqueId = ?");
                    $stmt->execute([$adminNewPass, $adminCNewPass, $userId, $newUserUniqueId]);

                    if ($stmt) {

                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Update: Admin " . $changePassFullName . " password"; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $changePassUserUID, $activityDone, 3]);

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
                

            }
    
            $this->disconnect(); 

        }

        public function addAdmin() {

            if (isset($_POST['addAdmin'])){
                $addAdminUserUID = $_POST['addAdminUserUID'];
                $adminUniqueId = md5(uniqid(mt_rand() . time(), true));
                $adminFName = $_POST['adminFName'];
                $adminLName = $_POST['adminLName'];
                $adminAge = $_POST['adminAge'];
                $adminBirthday = $_POST['adminBirthday'];
                $adminGender = $_POST['adminGender'];
                $adminAddress = $_POST['adminAddress'];
                $adminContact = $_POST['adminContact'];
                $adminPassword = sha1($_POST['adminPassword']);
                $adminCPassword = sha1($_POST['adminCPassword']);
                $adminUsername = $_POST['adminUsername'];
                $adminEmail = $_POST['adminEmail'];
                $userType = "Admin";

            
                if ($adminPassword == $adminCPassword) {
                    if ($this->checkUsername($adminUsername) == 0) {
                        if ($this->checkEmail($adminEmail) == 0) {

                            if (empty($_FILES["imageAdmin"]["name"])) {
                                $target_file = $_POST['default-photo'];
                            } else {
                                $target_dir = "uploads/";
                                $target_dir_move = "../uploads/";
                                $target_file = $target_dir . basename($_FILES["imageAdmin"]["name"]);
                                $target_file_move = $target_dir_move . basename($_FILES["imageAdmin"]["name"]);
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                move_uploaded_file($_FILES["imageAdmin"]["tmp_name"], $target_file_move);
                            }
                            
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO users (userUniqueId, firstName, lastName, userType, age, birthday, address, contactNo, gender, username, password, cpassword, email, userProfileImg, userVerify) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            $stmt->execute([$adminUniqueId, $adminFName, $adminLName, $userType, $adminAge, $adminBirthday, $adminAddress, $adminContact, $adminGender, $adminUsername, $adminPassword, $adminCPassword, $adminEmail, $target_file, 1]);  
                            
                            if ($stmt) {

                                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                                $activityDone = "Add: New admin " . $adminFName . " " . $adminLName; 
                                $connection = $this->connect();
                                $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                                $stmt->execute([$activityUniqueId, $addAdminUserUID, $activityDone, 3]);

                                if ($stmt) {
                                    echo "<script>
                                        swal('Successful!', 'New admin added!', 'success').then(function() {
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
                } else {
                    echo "<script>
                        swal('Error!', 'Password does not match!', 'error').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                }  
            
            }
    
            $this->disconnect(); 
    
        }

        public function deleteAdminAccount() {

            if (isset($_POST['deleteAdminAccount'])) {
                $deleteAdminUserUID = $_POST['deleteAdminUserUID'];
                $deleteAdminAccountID = $_POST['deleteAdminAccountID'];
                $deleteAdminAccountUID = $_POST['deleteAdminAccountUID'];
                $deleteAdminFullName = $_POST['deleteAdminFullName'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userDel = ? WHERE userId = ? AND userUniqueId = ?");
                $stmt->execute([1, $deleteAdminAccountID, $deleteAdminAccountUID]);  

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Delete: Admin " . $adminFName . " " . $adminLName; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $addAdminUserUID, $activityDone, 3]);

                    if ($stmt) {

                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Remove admin account: " . $deleteAdminFullName; 
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $deleteAdminUserUID, $activityDone, 3]);

                        if ($stmt) {
                            echo "<script>
                                swal('Successful!', 'Admin account removed!', 'success').then(function() {
                                    window.location = document.referrer;
                                });
                            </script>";
                        }
                        
                    }
                    
                } 

            }
    
            $this->disconnect(); 

        }

        public function getUserLogs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT activitylogs.*, users.* FROM activitylogs LEFT JOIN users ON activitylogs.userUniqueId = users.userUniqueId WHERE activityType = ? ORDER BY activityId DESC");
            $stmt->execute([3]);
            $data = $stmt->fetchAll();
            $datacount = $stmt->rowCount();
    
            if($datacount > 0) {
                return $data;
            } else {
                return false;
            }

            $this->disconnect(); 

        }

        public function checkUsername($username) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT username FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function checkEmail($email) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT email FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function submitContactUs() {
            if (isset($_POST['submitContactUs'])) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $contactNo = $_POST['contactNo'];
                $inquiry = $_POST['inquiry'];

                $connection = $this->connect();
                $stmt = $connection->prepare("INSERT INTO contactus (cuFirstName, cuLastName, cuEmail, cuContactNo, cuInquiry) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$firstName, $lastName, $email, $contactNo, $inquiry]);

                if ($stmt) {
                    echo "<script>
                        swal('Successful!', 'Your inquiry submitted!', 'success').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                }
            }
        }

        public function getContactUs() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM contactus ORDER BY cuDate DESC");
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

        public function getFaqs() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM faqs WHERE faqDel = ? ORDER BY faqOrdering DESC");
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

        public function addFaqs() {

            if (isset($_POST['addFaq'])) {
                $addFaqUserUID = $_POST['addFaqUserUID']; 
                $faqQuestion = $_POST['faqQuestion'];
                $faqAnswer = $_POST['faqAnswer'];

                $connection = $this->connect();
                $stmt = $connection->prepare("INSERT INTO faqs (faqQuestion, faqAnswer) VALUES (?, ?)");
                $stmt->execute([$faqQuestion, $faqAnswer]);  

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Add: New FAQ " . $faqQuestion; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $addFaqUserUID, $activityDone, 3]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'New frequently asked question!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }

                } 

            }
    
            $this->disconnect(); 

        }

        public function updateFaqs() {

            if (isset($_POST['updateFaq'])) {
                $updateFaqUserUID = $_POST['updateFaqUserUID'];
                $updateFaqId = $_POST['updateFaqId'];
                $updateFaqOrder = $_POST['updateFaqOrder'];
                $updateFaqQuestion = $_POST['updateFaqQuestion'];
                $updateFaqAnswer = $_POST['updateFaqAnswer'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE faqs SET faqQuestion = ?, faqAnswer = ?, faqOrdering = ? WHERE faqId = ?");
                $stmt->execute([$updateFaqQuestion, $updateFaqAnswer, $updateFaqOrder, $updateFaqId]);  

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update: FAQ " . $updateFaqQuestion; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $updateFaqUserUID, $activityDone, 3]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'FAQs updated!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                } 

            }
    
            $this->disconnect(); 

        }

        public function deleteFaqs() {

            if (isset($_POST['deleteFaq'])) {
                $deleteFaqUserUID = $_POST['deleteFaqUserUID'];
                $deleteFaqQ = $_POST['deleteFaqQ'];
                $deleteFaqId = $_POST['deleteFaqId'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE faqs SET faqDel = ? WHERE faqId = ?");
                $stmt->execute([1, $deleteFaqId]);  

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Delete: FAQ " . $deleteFaqQ; 
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activitylogs (activityUniqueId, userUniqueId, activityDone, activityType) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $deleteFaqUserUID, $activityDone, 3]);

                    if ($stmt) {
                        echo "<script>
                            swal('Successful!', 'FAQs removed!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                    
                } 

            }
    
            $this->disconnect(); 

        }

        public function getFaqsPage() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM faqs WHERE faqOrdering > ? AND faqDel = ? ORDER BY faqOrdering ASC LIMIT 5");
            $stmt->execute([0, 0]);
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

    $classConfiguration = New configuration();

?>