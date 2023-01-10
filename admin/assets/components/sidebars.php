<?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route']  == "order") { ?>
    <div class="sidenavbar" id="sidenavbar">
        <nav class="sidenavbar-content">
            <div> 
                <a href="index.php?route=home" class="sidenavbar-logo">
                    <img class="sidenavbar-img" id="sidenavbar-img" src="<?php echo $companyLogo ?? ""; ?>" alt="">
                    <span class="sidenavbar-title mt-5"></span>
                </a>
                <div class="sidenavbar-menus">
                    <a href="#" class="sidenavbar-menu nav-order" data-bs-toggle="tooltip" data-bs-placement="right" title="Order"> 
                        <i class="fa-solid fa-box fa-fw nav-icon"></i> 
                        <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;"><?php echo $_GET['on'] ?? "" ?></span> 
                    </a>
                </div>
            </div>
            <?php if (isset($_GET['approved']) && !empty($_GET['approved']) && $_GET['approved'] == "true") { ?>  
                <a href="index.php?route=orders&view=approved" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Approved Orders"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } elseif (isset($_GET['delivered']) && !empty($_GET['delivered']) && $_GET['delivered'] == "true") { ?>  
                <a href="index.php?route=orders&view=delivered" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Delivered Orders"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } elseif (isset($_GET['returned']) && !empty($_GET['returned']) && $_GET['returned'] == "true") { ?>  
                <a href="index.php?route=orders&view=returned" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Returned Orders"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } else { ?>
                <a href="index.php?route=orders" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Orders"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } ?>
        </nav>
    </div>
<?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route']  == "service") { ?>
    <div class="sidenavbar" id="sidenavbar">
        <nav class="sidenavbar-content">
            <div> 
                <a href="index.php?route=home" class="sidenavbar-logo">
                    <img class="sidenavbar-img" id="sidenavbar-img" src="<?php echo $companyLogo ?? ""; ?>" alt="">
                    <span class="sidenavbar-title mt-5"></span>
                </a>
                <div class="sidenavbar-menus">
                    <a href="#" class="sidenavbar-menu nav-service" data-bs-toggle="tooltip" data-bs-placement="right" title="Service Installation"> 
                        <i class="fa-solid fa-screwdriver-wrench fa-fw nav-icon"></i> 
                        <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;"><?php echo $_GET['on'] ?? "" ?></span> 
                    </a>
                </div>
            </div>
            <?php if (isset($_GET['assigned']) && !empty($_GET['assigned']) && $_GET['assigned'] == "true") { ?>  
                <a href="index.php?route=services&view=assigned" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Assigned Service Installation Requests"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } elseif (isset($_GET['declined']) && !empty($_GET['declined']) && $_GET['declined'] == "true") { ?>  
                <a href="index.php?route=services&view=declined" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Declined Service Installation Requests"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } elseif (isset($_GET['done']) && !empty($_GET['done']) && $_GET['done'] == "true") { ?>  
                <a href="index.php?route=services&view=done" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Done Service Installation Requests"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } else { ?>
                <a href="index.php?route=services" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Service Installation"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } ?>
        </nav>
    </div>
<?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route']  == "account") { ?>
    <div class="sidenavbar" id="sidenavbar">
        <nav class="sidenavbar-content">
            <div> 
                <a href="index.php?route=home" class="sidenavbar-logo">
                    <img class="sidenavbar-img" id="sidenavbar-img" src="<?php echo $companyLogo ?? ""; ?>" alt="">
                    <span class="sidenavbar-title mt-5"></span>
                </a>
                <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view']  == "my-info" || $_GET['view']  == "change-my-password") { 
                    if (!empty($userdetails)) {
                        $myUID = $userdetails['userUniqueId'];
                        $myFirstName = $userdetails['firstName'];
                        $myLastName = $userdetails['lastName'];
                    }
                ?>
                    <div class="sidenavbar-menus">
                        <a href="index.php?route=account&view=my-info&uid=<?php echo $myUID; ?>&un=<?php echo $myFirstName ." ". $myLastName; ?>" class="sidenavbar-menu nav-my-info" data-bs-toggle="tooltip" data-bs-placement="right" title="My Account"> 
                            <i class="fa-solid fa-user-pen fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;"><?php echo $myFirstName ?? ""; ?> <?php echo $myLastName ?? ""; ?></span> 
                        </a>
                    </div>

                    <div class="sidenavbar-menus">
                        <a href="index.php?route=account&view=change-my-password&uid=<?php echo $myUID; ?>&un=<?php echo $myFirstName ." ". $myLastName; ?>" class="sidenavbar-menu nav-change-my-password" data-bs-toggle="tooltip" data-bs-placement="right" title="Change My Password"> 
                            <i class="fa-solid fa-lock fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Change My Password</span> 
                        </a>
                    </div>
                <?php } else { 
                    include_once('../classes/configurationClass.php'); 
                    if (isset($_GET['uid']) && !empty($_GET['uid'])){
                        $userUniqueId = $_GET['uid'];
                        $datas = $classConfiguration->getUser($userUniqueId);
                    }
                    if (!empty($datas)) {
                        foreach ($datas as $data) {
                            $userUID = $data['userUniqueId'];
                            $userFname = $data['firstName'];
                            $userLname = $data['lastName'];
                        }
                    }
                ?>
                    <div class="sidenavbar-menus">
                        <a href="index.php?route=account&view=info&uid=<?php echo $userUID; ?>&un=<?php echo $userFname ." ". $userLname; ?>" class="sidenavbar-menu nav-info" data-bs-toggle="tooltip" data-bs-placement="right" title="Account"> 
                            <i class="fa-solid fa-user-pen fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;"><?php echo $userFname ?? ""; ?> <?php echo $userLname ?? ""; ?></span> 
                        </a>
                    </div>

                    <div class="sidenavbar-menus">
                        <a href="index.php?route=account&view=change-password&uid=<?php echo $userUID; ?>&un=<?php echo $userFname ." ". $userLname; ?>" class="sidenavbar-menu nav-change-password" data-bs-toggle="tooltip" data-bs-placement="right" title="Change Password"> 
                            <i class="fa-solid fa-lock fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Change Password</span> 
                        </a>
                    </div>
                <?php } ?>
            </div>
            
            <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view']  == "my-info" ||  $_GET['view']  == "change-my-password") { ?>
                <?php if ($userdetails['userType'] == "Head Admin") { ?>
                    <a href="index.php?route=configuration" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Configuration"> 
                        <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                        <span class="sidenavbar-menu-title">Back</span> 
                    </a>
                <?php } else { ?>
                    <a href="index.php?route=home" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Dashboard"> 
                        <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                        <span class="sidenavbar-menu-title">Back</span> 
                    </a>
                <?php } ?>
            <?php } else { ?>
                <a href="index.php?route=configuration&view=accounts" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Configuration"> 
                    <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                    <span class="sidenavbar-menu-title">Back</span> 
                </a>
            <?php } ?>
        </nav>
    </div>
<?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route']  == "report") { ?>
    <div class="sidenavbar" id="sidenavbar">
        <nav class="sidenavbar-content">
            <div> 
                <a href="index.php?route=home" class="sidenavbar-logo">
                    <img class="sidenavbar-img" id="sidenavbar-img" src="<?php echo $companyLogo ?? ""; ?>" alt="">
                    <span class="sidenavbar-title mt-5"></span>
                </a>

                <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view']  == "inventory" || $_GET['view'] == "stocks") { ?>

                    <?php if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] !== "good" && $_GET['type'] !== "critical" && $_GET['type'] !== "stockout" && $_GET['type'] !== "fast-moving" && $_GET['type'] !== "slow-moving") { 
                        echo "<script>
                            window.location.assign('index.php?route=404');
                        </script>";
                    } else { ?>  
                        
                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=inventory" class="sidenavbar-menu nav-inventory" data-bs-toggle="tooltip" data-bs-placement="right" title="Product Inventory Report"> 
                                <i class="fa-solid fa-warehouse fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Product Inventory Report</span> 
                            </a>
                        </div>

                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=stocks&type=good" class="sidenavbar-menu nav-good" data-bs-toggle="tooltip" data-bs-placement="right" title="Good Stock Products Report"> 
                                <i class="fa-solid fa-battery-full fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Good Stock Products Report</span> 
                            </a>
                        </div>

                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=stocks&type=critical" class="sidenavbar-menu nav-critical" data-bs-toggle="tooltip" data-bs-placement="right" title="Critical Stock Products Report"> 
                                <i class="fa-solid fa-battery-quarter fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Critical Stock Products Report</span> 
                            </a>
                        </div>

                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=stocks&type=stockout" class="sidenavbar-menu nav-stockout" data-bs-toggle="tooltip" data-bs-placement="right" title="Out of Stock Products Report"> 
                                <i class="fa-solid fa-battery-empty fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Out of Stock Products Report</span> 
                            </a>
                        </div>

                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=stocks&type=fast-moving" class="sidenavbar-menu nav-fast-moving" data-bs-toggle="tooltip" data-bs-placement="right" title="Fast-moving Stock Products Report"> 
                                <i class="fa-solid fa-arrow-trend-up fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Fast-moving Products Report</span> 
                            </a>
                        </div>
 
                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=stocks&type=slow-moving" class="sidenavbar-menu nav-slow-moving" data-bs-toggle="tooltip" data-bs-placement="right" title="Slow-moving Stock Products Report"> 
                                <i class="fa-solid fa-arrow-trend-down fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Slow-moving Products Report</span> 
                            </a>
                        </div>

                    <?php } ?>    

                <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "transaction-logs" || $_GET['view'] == "sales") { ?>  

                    <?php if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] !== "weekly" && $_GET['type'] !== "monthly" && $_GET['type'] !== "yearly") { 
                        echo "<script>
                            window.location.assign('index.php?route=404');
                        </script>";
                    } else { ?>  

                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=transaction-logs" class="sidenavbar-menu nav-transaction-logs" data-bs-toggle="tooltip" data-bs-placement="right" title="Transaction Logs Report"> 
                                <i class="fa-solid fa-handshake-angle fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Transaction Logs Report</span> 
                            </a>
                        </div>
                   
                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=sales&type=weekly" class="sidenavbar-menu nav-weekly" data-bs-toggle="tooltip" data-bs-placement="right" title="Weekly Sales Report"> 
                                <i class="fa-solid fa-calendar-week fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Weekly Sales Report</span> 
                            </a>
                        </div>
                    
                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=sales&type=monthly" class="sidenavbar-menu nav-monthly" data-bs-toggle="tooltip" data-bs-placement="right" title="Monthly Sales Report"> 
                                <i class="fa-solid fa-calendar-days fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Monthly Sales Report</span> 
                            </a>
                        </div>
                    
                        <div class="sidenavbar-menus">
                            <a href="index.php?route=report&view=sales&type=yearly" class="sidenavbar-menu nav-yearly" data-bs-toggle="tooltip" data-bs-placement="right" title="Yearly Sales Report"> 
                                <i class="fa-solid fa-calendar fa-fw nav-icon"></i> 
                                <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Yearly Sales Report</span> 
                            </a>
                        </div>

                    <?php } ?>  
                
                <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "orders" || $_GET['view'] == "payments" || $_GET['view'] == "delivered-orders") { ?>  

                    <div class="sidenavbar-menus">
                        <a href="index.php?route=report&view=orders" class="sidenavbar-menu nav-orders" data-bs-toggle="tooltip" data-bs-placement="right" title="Orders Report"> 
                            <i class="fa-solid fa-box fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Orders Report</span> 
                        </a>
                    </div>

                    <div class="sidenavbar-menus">
                        <a href="index.php?route=report&view=payments" class="sidenavbar-menu nav-payments" data-bs-toggle="tooltip" data-bs-placement="right" title="Payments Report"> 
                            <i class="fa-solid fa-credit-card fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Payments Report</span> 
                        </a>
                    </div>

                    <div class="sidenavbar-menus">
                        <a href="index.php?route=report&view=delivered-orders" class="sidenavbar-menu nav-delivered-orders" data-bs-toggle="tooltip" data-bs-placement="right" title="Delivered Orders Report"> 
                            <i class="fa-solid fa-truck-fast fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Delivered Orders Report</span> 
                        </a>
                    </div>

                <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "services" || $_GET['view'] == "assigned-service") { ?>  

                    <div class="sidenavbar-menus">
                        <a href="index.php?route=report&view=services" class="sidenavbar-menu nav-services" data-bs-toggle="tooltip" data-bs-placement="right" title="Services Installation Requests Report"> 
                            <i class="fa-solid fa-screwdriver-wrench fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Service Inst Report</span> 
                        </a>
                    </div>

                    <div class="sidenavbar-menus">
                        <a href="index.php?route=report&view=assigned-service" class="sidenavbar-menu nav-assigned-service" data-bs-toggle="tooltip" data-bs-placement="right" title="Assigned Service Installation Requests Report"> 
                            <i class="fa-solid fa-clipboard-check fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning" style="font-size: 0.75rem;">Assigned Service Inst Report</span> 
                        </a>
                    </div>
                    
                <?php } else { 
                    echo "<script>
                        window.location.assign('index.php?route=404');
                    </script>";
                } ?>

            </div>

            <a href="index.php?route=reports" class="sidenavbar-menu" data-bs-toggle="tooltip" data-bs-placement="right" title="Back to Reports"> 
                <i class="fa-solid fa-circle-arrow-left fa-fw nav-icon"></i> 
                <span class="sidenavbar-menu-title">Back</span> 
            </a>
        </nav>
    </div>
<?php } else { ?>
    <div class="sidenavbar" id="sidenavbar">
        <nav class="sidenavbar-content">
            <div> 
                <a href="index.php?route=home" class="sidenavbar-logo">
                    <img class="sidenavbar-img" id="sidenavbar-img" src="<?php echo $companyLogo ?? ""; ?>" alt="">
                    <span class="sidenavbar-title mt-5"></span>
                </a>
                <div class="sidenavbar-menus">
                    <a href="index.php?route=home" class="sidenavbar-menu nav-home" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"> 
                        <i class="fa-solid fa-gauge fa-fw nav-icon"></i> 
                        <span class="sidenavbar-menu-title text-warning">Dashboard</span> 
                    </a>

                    <?php if ($userdetails['userType'] == "Head Admin") { ?>
                        <a href="index.php?route=inventory" class="sidenavbar-menu nav-inventory" data-bs-toggle="tooltip" data-bs-placement="right" title="Inventory"> 
                            <i class="fa-solid fa-warehouse fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning">Inventory</span> 
                        </a>
                    <?php } ?>

                    <a href="index.php?route=orders" class="sidenavbar-menu nav-orders" data-bs-toggle="tooltip" data-bs-placement="right" title="Orders"> 
                        <i class="fa-solid fa-box fa-fw nav-icon"></i> 
                        <span class="sidenavbar-menu-title text-warning">Orders</span> 
                    </a>

                    <a href="index.php?route=services" class="sidenavbar-menu nav-services" data-bs-toggle="tooltip" data-bs-placement="right" title="Service Installation"> 
                        <i class="fa-solid fa-screwdriver-wrench fa-fw nav-icon"></i> 
                        <span class="sidenavbar-menu-title text-warning">Service Installation</span>
                    </a>

                    <?php if ($userdetails['userType'] == "Head Admin") { ?>
                        <a href="index.php?route=configuration" class="sidenavbar-menu nav-configuration" data-bs-toggle="tooltip" data-bs-placement="right" title="Configuration"> 
                            <i class="fa-solid fa-gear fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning">Configuration</span> 
                        </a>
                    <?php } ?>

                    <?php if ($userdetails['userType'] == "Head Admin") { ?>
                        <a href="index.php?route=reports" class="sidenavbar-menu nav-reports" data-bs-toggle="tooltip" data-bs-placement="right" title="Reports"> 
                            <i class="fa-solid fa-folder-open fa-fw nav-icon"></i> 
                            <span class="sidenavbar-menu-title text-warning">Reports</span> 
                        </a>
                    <?php } ?>
                </div>
            </div>   

        </nav>
    </div>
<?php } ?>