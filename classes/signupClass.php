<?php 
    class signup extends dbh {

        public function signUp() {

            if (isset($_POST['signUp'])){
                $userUniqueId = md5(uniqid(mt_rand() . time(), true));
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $age = $_POST['age'];
                $birthday = $_POST['birthday'];
                $address = $_POST['address'];
                $contactNo = $_POST['contactNo'];
                $gender = $_POST['gender'];
                $password = sha1($_POST['password']);
                $cpassword = sha1($_POST['cpassword']);
                $username = $_POST['username'];
                $email = $_POST['email'];

                $userCompanyName = $_POST['userCompanyName'];
                $userCompanyAddress = $_POST['userCompanyAddress'];
                $userCompanyPos = $_POST['userCompanyPos'];
                $userCompanyContact = $_POST['userCompanyContact'];
                $userCompanyEmail = $_POST['userCompanyEmail'];

                $userType = "User";
                $array = ["firstName"=>$firstName, "lastName"=>$lastName, "age"=>$age, "birthday"=>$birthday, "address"=>$address, "contactNo"=>$contactNo, "username"=>$username, "email"=>$email, "userCompanyName"=>$userCompanyName, "userCompanyAddress"=>$userCompanyAddress, "userCompanyPos"=>$userCompanyPos, "userCompanyContact"=>$userCompanyContact, "userCompanyEmail"=>$userCompanyEmail];

                if (!empty($firstName) && !empty($lastName) && !empty($age) && !empty($birthday) && !empty($address) && !empty($cpassword) && !empty($gender) && !empty($username) && !empty($password) && !empty($username) && !empty($email) && !empty($userCompanyName) && !empty($userCompanyAddress) && !empty($userCompanyPos) && !empty($userCompanyContact) && !empty($userCompanyEmail)) {
                    if (preg_match_all("/[a-zA-Z]/", $firstName) && preg_match_all("/[a-zA-Z]/", $lastName) && preg_match_all("/[0-9]/", $age) && preg_match_all("/[0-9]/", $contactNo) && preg_match_all("/[0-9]/", $userCompanyContact)) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            if (filter_var($userCompanyEmail, FILTER_VALIDATE_EMAIL)) {
                                if ($password == $cpassword) {
                                    if ($this->checkUsername($username) == 0) {
                                        if ($this->checkEmail($email) == 0) {
                                            if (!empty($_FILES["imageCompany"]["name"])) {
                                                
                                                $c_target_dir = "uploads/";
                                                $c_target_file = $c_target_dir . basename($_FILES["imageCompany"]["name"]);
                                                $c_imageFileType = strtolower(pathinfo($c_target_file,PATHINFO_EXTENSION));
                                                move_uploaded_file($_FILES["imageCompany"]["tmp_name"], $c_target_file);

                                                if (empty($_FILES["imageUser"]["name"])) {
                                                    $target_file = $_POST['default-photo'];
                                                } else {
                                                    $target_dir = "uploads/";
                                                    $target_file = $target_dir . basename($_FILES["imageUser"]["name"]);
                                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                                    move_uploaded_file($_FILES["imageUser"]["tmp_name"], $target_file);
                                                }
                                                
                                                $connection = $this->connect();
                                                $stmt = $connection->prepare("INSERT INTO users (userUniqueId, firstName, lastName, userType, age, birthday, address, contactNo, gender, username, password, cpassword, email, userCName, userCAddress, userCPosition, userCNo, userCEmail, userProfileImg, userCId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                                $stmt->execute([$userUniqueId, $firstName, $lastName, $userType, $age, $birthday, $address, $contactNo, $gender, $username, $password, $cpassword, $email, $userCompanyName, $userCompanyAddress, $userCompanyPos, $userCompanyContact, $userCompanyEmail, $target_file,  $c_target_file]);
                                                
                                                // use PHPMailerPHPMailerPHPMailer;
                                                // use PHPMailerPHPMailerException;

                                                include_once('./assets/components/head.php');
                                                include_once ('./PHPMailer/src/Exception.php');
                                                include_once ('./PHPMailer/src/PHPMailer.php');
                                                include_once ('./PHPMailer/src/SMTP.php');
                                                
                                                $mail = new PHPMailer\PHPMailer\PHPMailer();

                                                try {
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    // $mail->SMTPDebug = 3;
                                                    $mail->SMTPAuth = true;
                                                    // Gmail ID which you want to use as SMTP server
                                                    $mail->Username = 'ph.starseiki@gmail.com';
                                                    // Gmail Password
                                                    $mail->Password = 'yumhpzyiyzxgixrl';
                                                    $mail->SMTPSecure = 'tls';
                                                    $mail->Port = 587;
                                              
                                                    // Email ID from which you want to send the email
                                                    $mail->setFrom('ph.starseiki@gmail.com');
                                                    // Recipient Email ID where you want to receive emails
                                                    $mail->addAddress($email);
                                              
                                                    $mail->isHTML(true);
                                                    $mail->Subject = 'Account Verification for Star Seiki Ph Store';
                                                    // $mail->Body = "<h3 class='text-primary bg-warning'>Name : $firstName <br>Email : $email <br>Message : asdasd</h3><button style='background-color: red; width: 200px; padding: 20px; text-transform: uppercase; color: blue;'>Verify</button>";
                                                    $mail->Body = 
                                                        '<div>
                                                            <div style="display: flex; justify-content: center; align-items: center; gap: 20px; margin-block-end: 35px;">
                                                                <h2 style="letter-spacing: 2px; text-transform: uppercase; font-weight: 600; color: green;">Star Seiki Ph</h2>
                                                            </div>
                                                    
                                                            <div style="margin-inline-start: 20px; margin-block-end: 20px;">
                                                                <h1>Hi <strong>'.$firstName.',</strong></h1>
                                                            </div>
                                                            
                                                            <div style="margin-inline-start: 50px; margin-block-end: 30px;">
                                                                <p>You registered an account on Star Seiki Ph Store, before being able to use your account you need to verify that this is your email address by clicking verify button.</p>
                                                            </div>
                                                    
                                                            <div style="display: flex; justify-content: center; margin-block-end: 50px;">
                                                                <a href="https://eins-shop-ph.store/index.php?route=verify&uid='.$userUniqueId.'" style="text-decoration: none; background-color: green; padding: 12px 20px; width: 100px; text-align: center; font-weight: 700; border-radius: 5px; color: #fff;">Verify</a>
                                                            </div>

                                                            <div style="margin-inline-start: 20px;">
                                                                <p>
                                                                    <strong>Address:</strong> Innorev Bldg. Phase 6A Lot 3281-I SEZ Laguna Technopark, Binan, Laguna 4024, Philippines <br>
                                                                    <strong>Tel No.:</strong> (049)544-0652 & (049)502-7953 <br>
                                                                    <strong>Offical Email:</strong> jenna@star-seiki.com.ph <br>
                                                                </p>
                                                            </div>
                                                        </div>';
                                                    
                                              
                                                    $mail->send();

                                                    // $output = '<div class="alert alert-success">
                                                    //             <h5>Thankyou! for contacting us, Well get back to you soon!</h5>
                                                    //           </div>';
                                                    $_SESSION['success'] = "Successfully created an account!, please verify your account in your email account provided";

                                                } catch (Exception $e) {

                                                    // $output = '<div class="alert alert-danger">
                                                    //         <h5>' . $e->getMessage() . '</h5>
                                                    //         </div>';

                                                    $_SESSION['error'] = "Error!" . $e->getMessage();
                                                }


                                                // $_SESSION['success'] = "Successfully created an account!";
            
                                                unset($array);
                                            } else {
                                                $_SESSION['error'] = "Plase attach your company identification!";
                                                $_SESSION['userdetails'] = $array;
                                            }
                                        } else {
                                            $_SESSION['error'] = "Email already exists!";
                                            $_SESSION['userdetails'] = $array; 
                                        }
                                    } else {
                                        $_SESSION['error'] = "Username already exists!";
                                        $_SESSION['userdetails'] = $array; 
                                    }
                                } else {
                                    $_SESSION['error'] = "Password does not match!";
                                    $_SESSION['userdetails'] = $array; 
                                }  
                            } else {
                                $_SESSION['error'] = "Invalid company email format!";
                                $_SESSION['userdetails'] = $array; 
                            }    
                        } else {
                            $_SESSION['error'] = "Invalid email format!";
                            $_SESSION['userdetails'] = $array; 
                        }
                    } else {
                        $_SESSION['error'] = "Some fields contains invalid input!";
                        $_SESSION['userdetails'] = $array;
                    }
                } else {
                    $_SESSION['error'] = "Please fill out all fields!";
                    $_SESSION['userdetails'] = $array;
                }
                
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


    }

    $classSignUp = New signup();

?>