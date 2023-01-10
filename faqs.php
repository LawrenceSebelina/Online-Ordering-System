<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Frequently Asked Questions</title>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once('assets/components/header.php'); ?>
    <?php 
        include_once('classes/configurationClass.php'); 
        $datas = $classConfiguration->getFaqsPage();
    ?>
    
    <main class="form-faqs flex-shrink-0 bg-light bg-opacity-75 mb-3">
        <div class="container">
            <div class="card shadow pe-5 px-5 pb-3 pt-3 bg-light bg-opacity-75">
                <h3 class="mb-3 fw-bold">Frequently Asked Questions</h1>

                <?php if (!empty($datas)) { ?>
                    <?php foreach ($datas as $data) { ?>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item mb-2 border border-3 border-success">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-<?php echo $data['faqOrdering'] ?? ""; ?>" aria-expanded="true" aria-controls="panelsStayOpen-<?php echo $data['faqOrdering']; ?>">
                                        <?php echo $data['faqOrdering'] ?? ""; ?>  <?php echo $data['faqQuestion'] ?? ""; ?>
                                    </button>
                                </h2>

                                <div id="panelsStayOpen-<?php echo $data['faqOrdering'] ?? ""; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-<?php echo $data['faqOrdering'] ?? ""; ?>">
                                    <div class="accordion-body">
                                        <?php echo $data['faqAnswer'] ?? ""; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </main>
    
    <?php include_once('assets/components/footer.php'); ?>
    
</body>
</html>


<!-- RewriteEngine on
RewriteCond %{THE_REQUEST} /([^.]+)\.php [NC]
RewriteRule ^ /%1 [NC,L,R]
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^ %{REQUEST_URI}.php [NC,L] -->

