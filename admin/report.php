<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>
        <?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "inventory") { ?>
            Product Inventory Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "good") { ?>
            Good Stock Products Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "critical") { ?>
            Critical Stock Products Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "stockout") { ?>
            Out of Stock Products Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "fast-moving") { ?>
            Fast-moving Stock Products Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "slow-moving") { ?>
            Slow-moving Stock Products Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "transaction-logs") { ?>
            Transaction Logs Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "weekly" && isset($_GET['sp']) && !empty($_GET['sp']) && isset($_GET['title']) && !empty($_GET['title'])) { ?>
            <?php echo $_GET['title']; ?>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "monthly" && isset($_GET['sp']) && !empty($_GET['sp']) && isset($_GET['title']) && !empty($_GET['title'])) { ?>
            <?php echo $_GET['title']; ?>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "yearly" && isset($_GET['sp']) && !empty($_GET['sp']) && isset($_GET['title']) && !empty($_GET['title'])) { ?>
            <?php echo $_GET['title']; ?>
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "sales" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "weekly") { ?>
            Weekly Sales Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "sales" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "monthly") { ?>
            Monthly Sales Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "sales" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "yearly") { ?>
            Yearly Sales Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "orders") { ?>
           Orders Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "payments") { ?>
           Payments Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "delivered-orders") { ?>
           Delivered Orders Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "services") { ?>
           Service Installation Requests Report
        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "assigned-service") { ?>
           Assigned Service Installation Requests Report
        <?php } else { ?>
           Report
        <?php } ?>
    </title>
</head>
<body id="body" class="body d-flex flex-column h-100">
    <?php 
        include_once('assets/components/header.php');
        include_once('assets/components/sidebars.php'); 
        include_once('../classes/reportsClass.php'); 

        include_once('../classes/configurationClass.php'); 
        $datas = $classConfiguration->getCompanyInfo();

        $userFullName = $userdetails['firstName'] . " ". $userdetails['lastName'] . " (" . $userdetails['userType'] . ") ";
        date_default_timezone_set('Asia/Manila');

        if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "report") {
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

        <?php include_once('reportsContent.php');  ?>

    </main>

    <?php include_once('assets/components/footer.php'); ?>
    
    <script>
        //TODO Javascript for Printable Datatables
            $(document).ready(function() {
                $('#inventory-report, #good-report, #critical-report, #stockout-report, #fm-stock-report, #sm-stock-report, #transaction-logs-report, #orders-report, #payments-report,  #services-report').DataTable({
                    "pageLength" : 5,
                    "lengthMenu": [[5, 10, 25, 100], [5, 10, 25, 100]],
                    "ordering": false,
                    "dom":
                        "<'row g-2 mb-4 mt-4'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'B>>" +  
                        "<'row g-2'<'col-sm-5'i><'col-sm-7'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12'p>>",
                    "language": {
                            "search": '<span class="text-custom-green fw-bold">Search</span>',

                            "info": '<span class="text-custom-green fw-bold">Showing</span>' + " _START_ to _END_ of _TOTAL_ " + '<span class="text-custom-green fw-bold">entries</span>',

                            "lengthMenu": '<span class="text-custom-green fw-bold">Show</span>' + " _MENU_ " + '<span class="text-custom-green fw-bold">entries</span>',

                            "paginate": {
                                "next": '<span class="text-custom-green fw-bold">Next</span>' + " " + '<i class="fa-solid fa-circle-chevron-right text-custom-green"></i>',

                                "previous": '<i class="fa-solid fa-circle-chevron-left text-custom-green"></i>' + " " +  '<span class="text-custom-green fw-bold">Previous</span>'
                            }
                        },
                    buttons: [
                        {
                            extend: 'print',
                            className: 'bg-primary text-light me-2',
                            text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                            messageTop: '<div class="row"><div class="col-md-12 d-flex justify-content-center align-items-center"><img class="img-fluid" width="100" height="100" src="<?php echo $companyLogoAlt ?? ""; ?>" alt=""></div><div class="mb-4 col-md-12 d-flex justify-content-center align-items-center"><strong><?php echo $companyNameAlt ?? ""; ?></strong>    </div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyAddress ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyTelephone ?? ""; ?> & <?php echo $companyFax ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyEmail ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $userFullName ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php echo date('Y-m-d | H:i a') ?? ""; ?></h6></div></div><div class="mb-2 col-md-12 d-flex justify-content-center align-items-center"><h3><strong><?php if (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "inventory") { ?>Product Inventory Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "good") { ?>Good Stock Products Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "critical") { ?>Critical Stock Products Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "stockout") { ?>Out of Stock Products Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "fast-moving") { ?>Fast-moving Stock Products Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "stocks" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "slow-moving") { ?>Slow-moving Stock Products Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "transaction-logs") { ?>Transaction Logs Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "sales" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "weekly") { ?>Weekly Sales Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "sales" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "monthly") { ?>Monthly Sales Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "sales" && isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == "yearly") { ?>Yearly Sales Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "orders") { ?>Orders Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "payments") { ?>Payments Report  <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "delivered-orders") { ?>Delivered Orders Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "services") { ?>Service Installation Requests Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && $_GET['view'] == "assigned-service") { ?>Assigned Service Installation Requests Report<?php } else { ?>Report<?php } ?></strong></h3></div>',
                            title: '',
                        },
                        {
                            extend: 'excel',
                            className: 'bg-success text-light',
                            text: '<div class="d-flex align-items-center"><i class="fa-solid fa-file-excel fs-5 me-2"></i><span class="fw-bold">Excel</span></div>',
                        },
                    ]
                });
            } );

        //TODO End of Javascript for Printable Datatables

        //TODO Javascript for Printable Sales Product Sold
            $(document).ready(function() {
                $('#ws-prod-sold-report, #ms-prod-sold-report, #ys-prod-sold-report').DataTable({
                    "pageLength" : 5,
                    "lengthMenu": [[5, 10, 25, 100], [5, 10, 25, 100]],
                    "ordering": false,
                    "dom":
                        "<'row g-2 mb-4 mt-4'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'B>>" +  
                        "<'row g-2'<'col-sm-5'i><'col-sm-7'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12'p>>",
                    "language": {
                            "search": '<span class="text-custom-green fw-bold">Search</span>',

                            "info": '<span class="text-custom-green fw-bold">Showing</span>' + " _START_ to _END_ of _TOTAL_ " + '<span class="text-custom-green fw-bold">entries</span>',

                            "lengthMenu": '<span class="text-custom-green fw-bold">Show</span>' + " _MENU_ " + '<span class="text-custom-green fw-bold">entries</span>',

                            "paginate": {
                                "next": '<span class="text-custom-green fw-bold">Next</span>' + " " + '<i class="fa-solid fa-circle-chevron-right text-custom-green"></i>',

                                "previous": '<i class="fa-solid fa-circle-chevron-left text-custom-green"></i>' + " " +  '<span class="text-custom-green fw-bold">Previous</span>'
                            }
                        },
                    buttons: [
                        {
                            extend: 'print',
                            className: 'bg-primary text-light me-2',
                            text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                            messageTop: '<div class="row"><div class="col-md-12 d-flex justify-content-center align-items-center"><img class="img-fluid" width="100" height="100" src="<?php echo $companyLogoAlt ?? ""; ?>" alt=""></div><div class="mb-4 col-md-12 d-flex justify-content-center align-items-center"><strong><?php echo $companyNameAlt ?? ""; ?></strong>    </div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyAddress ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyTelephone ?? ""; ?> & <?php echo $companyFax ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyEmail ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $userFullName ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php echo date('Y-m-d | H:i a') ?? ""; ?></h6></div></div><div class="mb-2 col-md-12 d-flex justify-content-center align-items-center"><h3><strong><?php if (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "weekly" && isset($_GET['sp']) && !empty($_GET['sp']) && isset($_GET['title']) && !empty($_GET['title'])) { echo $_GET['title']; ?><?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "monthly" && isset($_GET['sp']) && !empty($_GET['sp']) && isset($_GET['title']) && !empty($_GET['title'])) { echo $_GET['title']; ?><?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "yearly" && isset($_GET['sp']) && !empty($_GET['sp']) && isset($_GET['title']) && !empty($_GET['title'])) { echo $_GET['title']; } ?></strong></h3></div>',
                            title: '',
                        },
                        {
                            extend: 'excel',
                            className: 'bg-success text-light',
                            text: '<div class="d-flex align-items-center"><i class="fa-solid fa-file-excel fs-5 me-2"></i><span class="fw-bold">Excel</span></div>',
                        },
                    ],

                    "footerCallback": function ( row, data, start, end, display ) {
                            
                        var numberRenderer = $.fn.dataTable.render.number( ',', '.', 2, ).display;
                        var api = this.api(), data;
            
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\₱,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
            
                        total = api
                            .column( 4, { search: 'applied' }  )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
            
                        $( api.column( 4 ).footer() ).html(
                            '₱'+ numberRenderer( total ) 
                        );
                    },
                });
            } );

        //TODO End of Javascript for Printable Sales Product Sold

        //TODO Javascript for Printable Datatables and High Charts
            let draw = false;
            init();

            function init() {
                const table = $("#weekly-sales-report, #monthly-sales-report, #yearly-sales-report").DataTable({
                    "pageLength" : 5,
                    "lengthMenu": [[5, 10, 25, 100], [5, 10, 25, 100]],
                    "ordering": false,
                    "dom":
                        "<'row g-2 mb-4 mt-4'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'B>>" +  
                        "<'row g-2'<'col-sm-5'i><'col-sm-7'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12'p>>",
                    buttons: [
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [ 0, 1 ]
                            },
                            className: 'bg-primary text-light me-2',
                            text: '<div class="d-flex align-items-center"><i class="fa-solid fa-print fs-5 me-2"></i><span class="fw-bold">Print</span></div>',
                            messageTop: '<div class="row"><div class="col-md-12 d-flex justify-content-center align-items-center"><img class="img-fluid" width="100" height="100" src="<?php echo $companyLogoAlt ?? ""; ?>" alt=""></div><div class="mb-4 col-md-12 d-flex justify-content-center align-items-center"><strong><?php echo $companyNameAlt ?? ""; ?></strong>    </div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyAddress ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyTelephone ?? ""; ?> & <?php echo $companyFax ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6><?php echo $companyEmail ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Prepared By: <?php echo $userFullName ?? ""; ?></h6></div><div class="col-md-12 d-flex justify-content-center align-items-center"><h6>Date & Time: <?php echo date('Y-m-d | H:i a') ?? ""; ?></h6></div></div><div class="mb-2 col-md-12 d-flex justify-content-center align-items-center"><h3><strong><?php if (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "weekly") { ?>Weekly Sales Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "monthly") { ?>Monthly Sales Report<?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "yearly") { ?>Yearly Sales Report<?php } else { ?>Sales Report<?php } ?></strong></h3></div>',
                            title: '',
                        },
                        {
                            extend: 'excel',
                            className: 'bg-success text-light',
                            text: '<div class="d-flex align-items-center"><i class="fa-solid fa-file-excel fs-5 me-2"></i><span class="fw-bold">Excel</span></div>',
                        },
                    ], 

                    "footerCallback": function ( row, data, start, end, display ) {
                        
                        var numberRenderer = $.fn.dataTable.render.number( ',', '.', 2, ).display;
                        var api = this.api(), data;
            
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\₱,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
            
                        total = api
                            .column( 1, { search: 'applied' }  )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
            
                        $( api.column( 1 ).footer() ).html(
                            '₱'+ numberRenderer( total ) 
                        );
                    },
                });
                const tableData = getTableData(table);
                createHighcharts(tableData);
                setTableEvents(table);
            }

            function getTableData(table) {
                const dataArray = [],
                    salesNameArray = [],
                    salesArray = []
                    ;

                table.rows({ search: "applied" }).every(function() {
                    const data = this.data();
                    salesNameArray.push(data[0]);
                    salesArray.push(parseInt(data[1].replace(/[\₱,]/g, "")));
                });

                dataArray.push(salesNameArray, salesArray);
                return dataArray;
            }

            function createHighcharts(data) {
                Highcharts.setOptions({
                    lang: {
                        thousandsSep: ","
                    }
                });

                Highcharts.chart("chart", {
                    title: {
                        <?php if (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "weekly") { ?>
                            text: "Weekly Sales"
                        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "monthly") { ?>
                            text: "Monthly Sales"
                        <?php } elseif (isset($_GET['view']) && !empty($_GET['view']) && isset($_GET['type']) && !empty($_GET['type']) && $_GET['view'] == "sales" && $_GET['type'] == "yearly") { ?>
                            text: "Yearly Sales"
                        <?php } ?>
                    },
                    subtitle: {
                        text: "Start Seiki Philippines"
                    },
                    xAxis: [
                        {
                            categories: data[0],
                        }
                    ],
                    yAxis: [
                        {
                            title: {
                                text: "Total Sales"
                            }
                        },
                    ],
                    plotOptions: {
                    series: {
                            colorByPoint: true,
                        }
                    },
                    series: [
                        {
                            name: "Total Sales",
                            color: "#0071A7",
                            type: "column",
                            data: data[1],
                            tooltip: {
                                // valueSuffix: "M",
                                valueDecimals: 2,
                                valuePrefix: "₱",
                            }
                        },
                    ],
                    tooltip: {
                        shared: true
                    },
                    legend: {
                        backgroundColor: "#ececec",
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    noData: {
                        style: {
                            fontSize: "16px"
                        }
                    }
                });
            }

            function setTableEvents(table) {
                table.on("page", function() {
                    draw = true;
                });

                table.on("draw", function() {
                    if (draw) {
                    draw = false;
                    } else {
                    const tableData = getTableData(table);
                    createHighcharts(tableData);
                    }
                });
            }
        //TODO End of Javascript for Printable Datatables and High Charts
    </script>


</body>
</html>