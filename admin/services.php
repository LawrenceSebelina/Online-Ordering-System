<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "assigned") { ?>
            Assigned Service Installation Requests
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "declined") { ?>
            Declined Service Installation Requests
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "done") { ?>
            Done Service Installation Requests
        <?php } else { ?>
            Service Installation Requests
        <?php } ?>
    </title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php');  
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/servicesClass.php'); 
        $infos = $classServices->getAssignedServiceInst();
        $details = $classServices->getDeclinedServiceInst();
        $datas = $classServices->getOrdersWithServiceInst();
        $stmts = $classServices->getDoneServiceInst();
        $serviceLogs = $classServices->getServiceLogs();
    ?>
    <main class="flex-shrink-0 bg-light bg-opacity-75 main-content">

        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "assigned") { ?>
            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Assigned Service Installation Requests Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=services" class="btn btn-success d-flex align-items-center fw-bold me-2" title="Back to Service Installation Requests" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=declined" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Declined Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-xmark fs-5 me-2"></i>View Declined</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=done" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Done Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Done</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=service-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Service Installation Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Service Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar-check fa-fw fs-4 me-2"></i>Assigned Service Installation Requests (On-going)</div>
                </div>
                
                <div class="d-flex justify-content-start mb-4 row row-cols-1 g-2">
                    <div class="col-md-2">
                        <a href="index.php?route=services" class="btn btn-success d-flex align-items-center fw-bold me-2" title="Back to Service Installation Requests" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                    </div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>Order No</th>
                                        <th>Name</th>
                                        <th>Service Request</th>
                                        <th>Assigned Date</th>
                                        <th>Assigned Time</th>
                                        <th>Marked</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($infos)) { ?>
                                    <?php foreach ($infos as $info) { ?>
                                        <tr>
                                            <td class="d-none"><?php echo $info['orderId']; ?></td>
                                            <td class="d-none"><?php echo $info['orderNo']; ?></td>
                                            <td class="d-none"><?php echo $info['userId']; ?></td>
                                            <td class="d-none"><?php echo $info['serviceId']; ?></td>
                                            <td>
                                                <a href="index.php?route=service&on=<?php echo $info["orderNo"]; ?>&oid=<?php echo $info["orderId"]; ?>&assigned=true"><?php echo $info["orderNo"]; ?></a>
                                            </td>
                                            <td><?php echo $info['firstName'] ." ". $info['lastName'] ; ?></td>
                                            <td><?php echo $info['orderServiceInst'] ; ?></td>
                                            <td><?php echo date('m/d/Y', strtotime($info['serviceAssignDate'])); ?></td>
                                            <td><?php echo date('h:i a', strtotime($info['serviceAssignDate'])); ?></td>
                                            <td class="text-center">
                                                <button type="button" class="assignMarkAsDone btn btn-success fw-bold me-2 w-100">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <i class="fa-solid fa-clipboard-check me-2 fs-5" title="Mark as Done" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Mark as Done
                                                    </div>    
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <?php include_once('assets/components/serviceModals.php'); ?>

                    </div>     
                </div>

            </div>

        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "declined") { ?>

            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Declined Service Installation Requests Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=services" class="btn btn-success d-flex align-items-center fw-bold me-2" title="Back to Service Installation Requests" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=assigned" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Assigned Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-check fs-5 me-2"></i>View Assigned</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=done" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Done Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Done</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=service-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Service Installation Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Service Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-calendar-xmark fs-5 me-2"></i>Declined Service Installation Requests</div>
                </div>
                
                <div class="d-flex justify-content-start mb-4 row row-cols-1 g-2">
                    <div class="col-md-2">
                        <a href="index.php?route=services" class="btn btn-success d-flex align-items-center fw-bold me-2" title="Back to Service Installation Requests" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                    </div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>Order No</th>
                                        <th>Name</th>
                                        <th>Service Request</th>
                                        <th>Declined Date</th>
                                        <th>Declined Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($details)) { ?>
                                    <?php foreach ($details as $detail) { ?>
                                    <tr>
                                        <td class="d-none"><?php echo $detail['orderId']; ?></td>
                                        <td class="d-none"><?php echo $detail['orderNo']; ?></td>
                                        <td class="d-none"><?php echo $detail['userId']; ?></td>
                                        <td class="d-none"><?php echo $detail['serviceId']; ?></td>
                                        <td>
                                            <a href="index.php?route=service&on=<?php echo $detail["orderNo"]; ?>&oid=<?php echo $detail["orderId"]; ?>&declined=true"><?php echo $detail["orderNo"]; ?></a>
                                        </td>
                                        <td><?php echo $detail['firstName'] ." ". $detail['lastName'] ; ?></td>
                                        <td><?php echo $detail['orderServiceInst'] ; ?></td>
                                        <td><?php echo date('m/d/Y', strtotime($detail['serviceAssignDate'])); ?></td>
                                        <td><?php echo date('h:i a', strtotime($detail['serviceAssignDate'])); ?></td>
                                        <td class="text-center">
                                            <button type="button" class="assignDeclinedService btn btn-success fw-bold me-2">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <i class="fa-solid fa-calendar-check me-2 fs-5" title="Assign Service Installation Now" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Reschedule
                                                </div>    
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <?php include_once('assets/components/serviceModals.php'); ?>

                    </div>     
                </div>

            </div>

        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "done") { ?>

            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Done Service Installation Requests Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=services" class="btn btn-success d-flex align-items-center fw-bold me-2" title="Back to Service Installation Requests" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=assigned" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Assigned Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-check fs-5 me-2"></i>View Assigned</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=declined" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Declined Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-xmark fs-5 me-2"></i>View Declined</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=service-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Service Installation Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Service Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>Done Service Installation Requests</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>Name</th>
                                        <th>Service Request</th>
                                        <th>Order Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($stmts)) { ?>
                                    <?php foreach ($stmts as $stmt) { ?>
                                    <tr>
                                        <td>
                                            <a href="index.php?route=service&on=<?php echo $stmt["orderNo"]; ?>&oid=<?php echo $stmt["orderId"]; ?>&done=true"><?php echo $stmt["orderNo"]; ?></a>
                                        </td>
                                        <td><?php echo $stmt['firstName'] ." ". $stmt['lastName'] ; ?></td>
                                        <td><?php echo $stmt['orderServiceInst']; ?></td>
                                        <td><?php echo date('m/d/Y', strtotime($stmt['orderDate'])); ?></td>
                                        <td><?php echo date('m/d/Y h:i a', strtotime($stmt['orderDate'])); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <?php include_once('assets/components/serviceModals.php'); ?>

                    </div>     
                </div>

            </div>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "service-logs") { ?>

            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Service Installation Logs</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-2">
                                <a href="index.php?route=services" class="btn btn-success d-flex align-items-center fw-bold me-2" title="Back to Service Installation Requests" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-circle-arrow-left fs-5 me-2"></i>Back</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=assigned" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Assigned Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-check fs-5 me-2"></i>View Assigned</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=declined" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Declined Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-xmark fs-5 me-2"></i>View Declined</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=done" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Done Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Done</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-book-open fa-fw fs-4 me-2"></i>Service Installation Logs</div>
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

                                    <?php if(!empty($serviceLogs)) { ?>
                                    <?php foreach ($serviceLogs as $serviceLog) { ?>
                                    <tr>
                                        <td><?php echo $serviceLog['firstName']." ". $serviceLog['lastName']; ?></td>
                                        <td><?php echo $serviceLog['userType']; ?></td>
                                        <td><?php echo $serviceLog['activityDone']; ?></td>
                                        <td class="text-center"><?php echo date('m/d/Y', strtotime($serviceLog['activityDate'])); ?></td>
                                        <td class="text-center"><?php echo date('h:i a', strtotime($serviceLog['activityDate'])); ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                    </div>     
                </div>

            </div>

        <?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && !isset($_GET['view']) && empty($_GET['view']) && $_GET['route'] == "services") { ?>

            <div class="container">

                <div class="shadow rounded mb-4">
                    <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25">
                        <div class="border-bottom-custom-green mt-2 mx-2">
                            <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-bars fa-fw fs-4 me-2"></i>Service Installation Requests Menu</div>
                        </div>

                        <div class="d-flex justify-content-start row row-cols-1 g-2 p-2">
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=assigned" class="btn btn-success d-flex align-items-center fw-bold me-2 w-100" title="View Assigned Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-check fs-5 me-2"></i>View Assigned</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=declined" class="btn btn-danger d-flex align-items-center fw-bold me-2 w-100" title="View Declined Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-calendar-xmark fs-5 me-2"></i>View Declined</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=done" class="btn btn-warning d-flex align-items-center fw-bold me-2 w-100" title="View Done Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-clipboard-check fs-5 me-2"></i>View Done</a>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3">
                                <a href="index.php?route=services&view=service-logs" class="btn btn-info d-flex align-items-center fw-bold me-2 w-100" title="View Service Installation Logs" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="fa-solid fa-book-open fs-5 me-2"></i>View Service Logs</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom-custom-green mb-4">
                    <div class="card-header fw-bold text-uppercase d-flex align-items-center justify-content-start pb-2 text-custom-green"><i class="fa-solid fa-screwdriver-wrench fa-fw fs-4 me-2"></i>Service Installation Requests</div>
                </div>

                <div class="card">
                    <div class="shadow rounded">
                        <div class="card-body border border-light border-5 rounded bg-success bg-opacity-25 overflow-auto">

                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th class="d-none"></th>
                                        <th>Order No</th>
                                        <th>Name</th>
                                        <th>Service Request</th>
                                        <th>Order Date</th>
                                        <th>Time</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($datas)) { ?>
                                    <?php foreach ($datas as $data) { ?>
                                    <tr>
                                        <td class="d-none"><?php echo $data['orderId']; ?></td>
                                        <td class="d-none"><?php echo $data['orderNo']; ?></td>
                                        <td class="d-none"><?php echo $data['userId']; ?></td>
                                        <td>
                                            <a href="index.php?route=service&on=<?php echo $data["orderNo"]; ?>&oid=<?php echo $data["orderId"]; ?>"><?php echo $data["orderNo"]; ?></a>
                                        </td>
                                        <td><?php echo $data['firstName'] ." ". $data['lastName'] ; ?></td>
                                        <td><?php echo $data['orderServiceInst']; ?></td>
                                        <td><?php echo date('m/d/Y', strtotime($data['orderDate'])); ?></td>
                                        <td><?php echo date('h:i a', strtotime($data['orderDate'])); ?></td>
                                        <td class="text-center">
                                            <button type="button" class="assignService btn btn-success fw-bold me-2">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <i class="fa-solid fa-calendar-check me-2 fs-5" title="Assign Service Installation" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>Assign
                                                </div>    
                                            </button>

                                            <button type="button" class="declineService btn btn-danger fw-bold me-2" title="Decline Service Installation">
                                                <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                    <i class="fa-solid fa-calendar-xmark me-2 fs-5"></i>Decline 
                                                </div>  
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <?php include_once('assets/components/serviceModals.php'); ?>

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

</body>
</html>