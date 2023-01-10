<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "accounts") { ?>
            Manage Accounts
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "contactus") { ?>
            Manage Contact Us
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "faqs") { ?>
            Manage Frequently Asked Questions
        <?php } else { ?>
            Configuration
        <?php } ?>
    </title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php'); 
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/signupClass.php'); 
        include_once('../classes/configurationClass.php'); 
        $userId = $userdetails['userId'];
        $datas = $classConfiguration->getCompanyInfo();
        $details = $classConfiguration->getContactUs();
        $stmts = $classConfiguration->getFaqs();
        $infos = $classConfiguration->getUsers($userId);
        $userLogs = $classConfiguration->getUserLogs();

        if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "configuration") {
            if ($userdetails['userType'] != "Head Admin") {
                echo "<script>
                    swal('Warning!', 'You are not allowed to access this page!', 'warning').then(function() {
                    window.location.assign('index.php?route=home');
                });
                </script>";
            }
        }

        if (!empty($datas)) {
            foreach ($datas as $data) {
                $companyInfoId = $data['companyInfoId'];
                $companyName = $data['companyName'];
                $companyNameAlt = $data['companyNameAlt'];
                $companyAddress = $data['companyAddress'];
                $companyTelephone = $data['companyTelephone'];
                $companyFax = $data['companyFax'];
                $companyEmail = $data['companyEmail'];
                $companyBusiness = $data['companyBusiness'];
                $companyResArea = $data['companyResArea'];
                $companyFounded = $data['companyFounded'];
                $companyOwner = $data['companyOwner'];
                $companyFilStaff = $data['companyFilStaff'];
                $companyJpnStaff = $data['companyJpnStaff'];
                $companyLogo = $data['companyLogo'];
                $companyLogoAlt = $data['companyLogoAlt'];
            }
        }
    ?>
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">
    
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "user-logs") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>User Logs Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=configuration" class="btn btn-success d-flex align-items-center fw-bold me-2" style="font-size: 0.8rem;" title="Back to Company Info" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=accounts" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage Accounts" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-users-gear fs-5 me-2"></i>Manage Accounts</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=contactus" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="View Contact Us" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-address-book fs-5 me-2"></i>View Contact Us</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=faqs" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage FAQs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-question fs-5 me-2"></i>Manage FAQs</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=account&view=my-info&uid=<?php echo $userdetails['userUniqueId']; ?>&un=<?php echo $userdetails['firstName'] ." ". $userdetails['lastName']; ?>" class="btn btn-primary d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="My Profle" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-user fs-5 me-2"></i>My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-book-open fa-fw fs-4 me-2"></i>View User Logs</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>User Type</th>
                                        <th>Action Taken</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Time</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if(!empty($userLogs)) { ?>
                                    <?php foreach ($userLogs as $userLog) { ?>
                                    <tr>
                                        <?php if ($userLog['userUniqueId'] == $userdetails['userUniqueId']) { ?>
                                            <td><?php echo $userLog['firstName']." ". $userLog['lastName']; ?> (You)</td>
                                        <?php } else { ?>
                                            <td><?php echo $userLog['firstName']." ". $userLog['lastName']; ?></td>
                                        <?php } ?>
                                        <td><?php echo $userLog['userType']; ?></td>
                                        <td><?php echo $userLog['activityDone']; ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($userLog['activityDate'])); ?></td>
                                        <td class="text-center"><?php echo date('h:i a', strtotime($userLog['activityDate'])); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>     
                </div>

            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "accounts") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Admin Accounts Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=configuration" class="btn btn-success d-flex align-items-center fw-bold me-2" style="font-size: 0.8rem;" title="Back to Company Info" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=user-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="User Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>User Logs</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=contactus" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="View Contact Us" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-address-book fs-5 me-2"></i>View Contact Us</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=faqs" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage FAQs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-question fs-5 me-2"></i>Manage FAQs</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=account&view=my-info&uid=<?php echo $userdetails['userUniqueId']; ?>&un=<?php echo $userdetails['firstName'] ." ". $userdetails['lastName']; ?>" class="btn btn-primary d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="My Profle" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-user fs-5 me-2"></i>My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-users-gear fa-fw fs-4 me-2"></i>Manage Admin Accounts</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <div class="d-flex justify-content-start mb-4">
                                <button type="button" class="btn btn-success d-flex align-items-center fw-bold me-2" data-bs-toggle="modal" data-bs-target="#addNewAdmin"><i class="fa-solid fa-user-plus fs-5 me-2"></i>Add New Admin</button>
                            </div>

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Signup Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($infos)) { ?>
                                    <?php foreach ($infos as $info) { ?>
                                        <tr>
                                            <td class="d-none"><?php echo $info['userId']; ?></td>
                                            <td class="d-none"><?php echo $info['userUniqueId']; ?></td>
                                            <td class="d-none"><?php echo $info['firstName'] ." ". $info['lastName']; ?></td>
                                            <td><img src="<?php echo "../" . $info['userProfileImg']; ?>" class="bg-light" width="80" height="80" alt=""></td>
                                            <td>
                                                <a href="index.php?route=account&view=info&uid=<?php echo $info['userUniqueId']; ?>&un=<?php echo $info['firstName'] ." ". $info['lastName']; ?>"><?php echo $info['firstName'] ." ". $info['lastName']; ?></a>
                                            </td>
                                            <td><?php echo $info['username']; ?></td>
                                            <td><?php echo $info['email']; ?></td>
                                            <td><?php echo $info['userType']; ?></td>
                                            <td><?php echo $info['userDate']; ?></td>
                                            <td><button type="button" class="deleteAdminAccounts btn btn-danger" title="Delete Account" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-trash-can fs-5 align-middle"></i></button></td>
                                        </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <?php include_once('assets/components/configurationModals.php'); ?>

                    </div>     
                </div>

            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "faqs") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Frequently Asked Questions Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=configuration" class="btn btn-success d-flex align-items-center fw-bold me-2" style="font-size: 0.8rem;" title="Back to Company Info" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=accounts" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage Accounts" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-users-gear fs-5 me-2"></i>Manage Accounts</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=contactus" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="View Contact Us" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-address-book fs-5 me-2"></i>View Contact Us</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=account&view=my-info&uid=<?php echo $userdetails['userUniqueId']; ?>&un=<?php echo $userdetails['firstName'] ." ". $userdetails['lastName']; ?>" class="btn btn-primary d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="My Profle" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-user fs-5 me-2"></i>My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-circle-question fa-fw fs-4 me-2"></i>Manage Frequently Asked Questions</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <div class="d-flex justify-content-start mb-4">
                                <button type="button" class="btn btn-success d-flex align-items-center fw-bold me-2" data-bs-toggle="modal" data-bs-target="#addNewFaq"><i class="fa-solid fa-square-plus fs-5 me-2"></i>Add New FAQ</button>
                            </div>

                            <div class="d-flex justify-content-center mb-4 row row-cols-sm-1 row-cols-md-2 g-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col d-flex align-items-center justify-content-start">
                                            <i class="fa-solid fa-square fs-1 me-2 text-warning text-opacity-50"></i> <span class="fw-bold">— Not Displayed on FAQs Page</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div><em><p style="font-size: 0.7rem;">(Update the FAQs Order between (1-5) to displayed on FAQs Page.)</p></em></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col d-flex align-items-center justify-content-start">
                                        <i class="fa-solid fa-square fs-1 me-2 text-info text-opacity-50"></i> <span class="fw-bold">— Displayed on FAQs Page</span>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div><em><p style="font-size: 0.7rem;">(There are only limit of 5 FAQs to be displayed on FAQs Page.)</p></em></div>
                                    </div>
                                </div>
                            </div>

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>FAQs Order</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($stmts)) { ?>
                                    <?php foreach ($stmts as $stmt) { ?>
                                        <?php if ($stmt['faqOrdering'] > 0) { ?>
                                            <tr class="bg-info bg-opacity-50">
                                                <td class="d-none"><?php echo $stmt['faqId']; ?></td>
                                                <td class="d-none"><?php echo $stmt['faqOrdering']; ?></td>

                                                <?php if ($stmt['faqOrdering'] == 1) { ?>
                                                    <td>Display as First FAQs</td>
                                                <?php } elseif ($stmt['faqOrdering'] == 2) { ?>
                                                    <td>Display as Second FAQs</td>
                                                <?php } elseif ($stmt['faqOrdering'] == 3) { ?>
                                                    <td>Display as Third FAQs</td>
                                                <?php } elseif ($stmt['faqOrdering'] == 4) { ?>
                                                    <td>Display as Fourth FAQs</td>
                                                <?php } elseif ($stmt['faqOrdering'] == 5) { ?>
                                                    <td>Display as Fifth FAQs</td>
                                                <?php } ?>

                                                <td><?php echo $stmt['faqQuestion']; ?></td>
                                                <td><?php echo $stmt['faqAnswer']; ?></td>
                                                <td class="text-center" style="width: 6.6rem;">
                                                    <button type="button" class="updateFaqs btn btn-primary" title="Edit FAQ" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-pen-to-square fs-5 align-middle"></i></button>
                                                    <button type="button" class="deleteFaqs btn btn-danger" title="Delete FAQ" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-trash-can fs-5 align-middle"></i></button>
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr class="bg-warning bg-opacity-50">
                                                <td class="d-none"><?php echo $stmt['faqId']; ?></td>
                                                <td class="d-none"><?php echo $stmt['faqOrdering']; ?></td>
                                                <td>Not Displayed</td>
                                                <td><?php echo $stmt['faqQuestion']; ?></td>
                                                <td><?php echo $stmt['faqAnswer']; ?></td>
                                                <td class="text-center" style="width: 6.6rem;">
                                                    <button type="button" class="updateFaqs btn btn-primary" title="Edit FAQ" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-pen-to-square fs-5 align-middle"></i></button>
                                                    <button type="button" class="deleteFaqs btn btn-danger" title="Delete FAQ" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-trash-can fs-5 align-middle"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <?php include_once('assets/components/configurationModals.php'); ?>

                    </div>     
                </div>

            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "contactus") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Contact Us Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=configuration" class="btn btn-success d-flex align-items-center fw-bold me-2" style="font-size: 0.8rem;" title="Back to Company Info" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=accounts" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage Accounts" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-users-gear fs-5 me-2"></i>Manage Accounts</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=faqs" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage FAQs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-question fs-5 me-2"></i>Manage FAQs</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=account&view=my-info&uid=<?php echo $userdetails['userUniqueId']; ?>&un=<?php echo $userdetails['firstName'] ." ". $userdetails['lastName']; ?>" class="btn btn-primary d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="My Profle" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-user fs-5 me-2"></i>My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-address-book fs-5 me-2"></i>Manage Contact Us</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Inquiry</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($details)) { ?>
                                    <?php foreach ($details as $detail) { ?>
                                        <tr>
                                            <td><?php echo $detail['cuFirstName'] . " " . $detail['cuLastName']; ?></td>
                                            <td><?php echo $detail['cuEmail']; ?></td>
                                            <td class="text-end"><?php echo $detail['cuContactNo']; ?></td>
                                            <td><?php echo $detail['cuInquiry']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>     
                </div>

            </div>

        <?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && !isset($_GET['view']) && empty($_GET['view']) && $_GET['route'] == "configuration") { ?>
    
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Configuration Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=accounts" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage Accounts" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-users-gear fs-5 me-2"></i>Manage Accounts</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=contactus" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="View Contact Us" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-address-book fs-5 me-2"></i>View Contact Us</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=configuration&view=faqs" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="Manage FAQs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-question fs-5 me-2"></i>Manage FAQs</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2">
                                <a href="index.php?route=configuration&view=user-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="User Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>User Logs</a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 col-xl-2">
                                <a href="index.php?route=account&view=my-info&uid=<?php echo $userdetails['userUniqueId']; ?>&un=<?php echo $userdetails['firstName'] ." ". $userdetails['lastName']; ?>" class="btn btn-primary d-flex align-items-center fw-bold me-2 w-100" style="font-size: 0.8rem;" title="My Profle" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-user fs-5 me-2"></i>My Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-building fa-fw fs-4 me-2"></i>Update Company Information</div>
                </div>

                <?php $classConfiguration->companyInfoSaved(); ?>

                <div class="card"> 
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-light bg-opacity-25 overflow-auto">
                        <form method="post" enctype="multipart/form-data">

                            <input type="hidden" name="companyInfoId" id="companyInfoId" value="<?php echo $companyInfoId ?? ""; ?>">

                            <div class="row mb-2">
                                <div class="col">
                                    <h6 class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0">Company Logo</h6>
                                    <div class="upload-photo d-flex justify-content-center">
                                        <div class="preview-photo-logo">
                                            <div class="preview">
                                                <img src="<?php echo "../" . $companyLogo ?? ""; ?>" id="photo-previewer-logo">
                                                <input type="file" id="file-preview-logo" accept="image/*" name="imageLogo" onchange="previewImageLogo(event);">

                                                <input type="hidden" value="<?php echo $companyLogo ?? ""; ?>" name="default-logo">

                                                <label for="file-preview-logo">Upload Photo</label>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col">
                                    <h6 class="text-center bg-success bg-opacity-25 fw-bold fs-4 p-0">Company Logo Alt</h6>
                                    <div class="upload-photo d-flex justify-content-center">
                                        <div class="preview-photo-logo-alt">
                                            <div class="preview">
                                                <img src="<?php echo "../" . $companyLogoAlt ?? ""; ?>" id="photo-previewer-logo-alt">
                                                <input type="file" id="file-preview-logo-alt" accept="image/*" name="imageLogoAlt" onchange="previewImageLogoAlt(event);">

                                                <input type="hidden" value="<?php echo $companyLogoAlt ?? ""; ?>" name="default-logo-alt">
                                                
                                                <label for="file-preview-logo-alt">Upload Photo</label>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <input type="hidden" name="companyUserUID" value="<?php echo $userdetails['userUniqueId'] ?? ""; ?>">
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-user-tie fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyOwner" name="companyOwner" placeholder="Company Owner" value="<?php echo $companyOwner ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)">
                                            <label for="companyOwner">Company Owner</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-users fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyFilStaff" name="companyFilStaff" placeholder="No. of Filipino Staff" value="<?php echo $companyFilStaff ?? ""; ?>" pattern="[0-9]+" title="Must contain numbers">
                                            <label for="companyFilStaff">No. of Filipino Staff</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-users fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyJpnStaff" name="companyJpnStaff" placeholder="No. of Japanese Staff" value="<?php echo $companyJpnStaff ?? ""; ?>" pattern="[0-9]+" title="Must contain numbers">
                                            <label for="companyJpnStaff">No. of Japanese Staff</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyFounded" name="companyFounded" placeholder="Founded" value="<?php echo $companyFounded ?? ""; ?>" pattern="[0-9]+" title="Must contain numbers">
                                            <label for="companyFounded">Founded</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name" value="<?php echo $companyName ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)">
                                            <label for="companyName">Company Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyNameAlt" name="companyNameAlt" placeholder="Company Name Alt" value="<?php echo $companyNameAlt ?? ""; ?>" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())">
                                            <label for="companyNameAlt">Company Name Alt</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyAddress" name="companyAddress" placeholder="Company Address" value="<?php echo $companyAddress ?? ""; ?>" pattern="[a-zA-Z0-9-_.,()ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.,())">
                                            <label for="companyAddress">Company Address</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyTelephone" name="companyTelephone" placeholder="Company Contact No." value="<?php echo $companyTelephone ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())">
                                            <label for="companyTelephone">Company Contact No.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-phone fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyFax" name="companyFax" placeholder="Company Fax No." value="<?php echo $companyFax ?? ""; ?>" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())">
                                            <label for="companyFax">Company Fax No.</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-square-envelope fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyEmail" name="companyEmail" placeholder="Company Email Address" value="<?php echo $companyEmail ?? ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)">
                                            <label for="companyEmail">Company Email Address</label>
                                        </div>
                                    </div>
                                </div>  

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-map-location-dot fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="companyResArea" name="companyResArea" placeholder="Company Resposible Area" value="<?php echo $companyResArea ?? ""; ?>" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)">
                                            <label for="companyResArea">Company Resposible Area</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-custom-green text-light"><i class="fa-solid fa-building fa-fw fs-4"></i></span>
                                        <div class="form-floating">
                                            <textarea name="companyBusiness" id="companyBusiness" class="form-control" placeholder="Answer" style="height: 10rem;" pattern="[a-zA-Z0-9-_.ñ\s]+" title="Must contain letters, numbers, and symbols (e.g. -_.)"><?php echo $companyBusiness ?? ""; ?></textarea>
                                            <label for="companyBusiness">Company Business</label>
                                        </div>
                                    </div> 
                                </div> 
                                

                            </div>

                            <div class="d-flex justify-content-end mt-4 row row-cols-1 g-2">
                                <div class="col-xl-2 col-md-3">
                                    <button type="button" class="btn btn-primary fw-bold me-2 w-100 d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#companyInfoSave"><i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i>Save Changes</button>
                                </div>
                            </div>

                            <div class="modal fade" id="companyInfoSave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border border-primary border-4">
                                        <div class="modal-body">
                                            <div class="alert alert-primary d-flex align-items-center">
                                                <i class="fa-solid fa-arrow-up-from-bracket fs-5 me-2"></i>
                                                <div>
                                                    <strong>Save Changes</strong>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <h4>Are you sure you want to save company information changes?</h4>
                                            </div> 

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary d-flex align-items-center" name="companyInfoSaved"><i class="fa-solid fa-circle-check"></i>&nbsp<strong>&nbsp&nbspYes&nbsp&nbsp</strong></button>
                                                <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp<strong>&nbsp&nbspNo&nbsp&nbsp</strong></button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>     
                </div>  

            </div>

        <?php } else { 
            echo "<script>
                window.location.assign('index.php?route=404');
            </script>";
        } ?>
    </main>

    <?php include_once('assets/components/footer.php'); ?>
    
    <script>
        //TODO Javascript for Image Previewer
        function previewImageAdmin(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var previewAdmin = document.getElementById("photo-previewer-admin");
                previewAdmin.src = src;
                previewAdmin.style.display = "block";
            }
        }

        function previewImageLogo(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var previewLogo = document.getElementById("photo-previewer-logo");
                previewLogo.src = src;
                previewLogo.style.display = "block";
            }
        }

        function previewImageLogoAlt(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var previewLogoAlt = document.getElementById("photo-previewer-logo-alt");
                previewLogoAlt.src = src;
                previewLogoAlt.style.display = "block";
            }
        }
        //TODO End of Javascript for Image Previewer
    </script>
</body>
</html>