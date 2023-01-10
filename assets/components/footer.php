<?php if (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "home" || $_GET['route'] == "category") { ?>
    <button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top" title="Back to top">
        <i class="fa-solid fa-angles-up fs-4 d-flex align-items-center"></i>
    </button>
<?php } elseif (isset($_GET['route']) && !empty($_GET['route']) && $_GET['route'] == "user") { ?>
    <?php if (isset($_GET['oid']) && !empty($_GET['oid']) && isset($_GET['on']) && !empty($_GET['on'])) { ?>
        <button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top" title="Back to top">
            <i class="fa-solid fa-angles-up fs-4 d-flex align-items-center"></i>
        </button>   
    <?php } ?>
<?php } ?>

<footer class="footer mt-auto py-3">
    <div class="container">
        <div class="row border-bottom">
            <div class="col-md-6">
                <span class="text-start text-light fs-5"><img src="assets/images/logo.png" alt="" height="25" width="50"> | Eins Shop &copy; 2022</span>
            </div>
            <div class="col-md-6">
                <ul class="d-flex justify-content-end list-unstyled">
                    <li class="ms-3 fs-4"><a class="text-light" href="https://m.facebook.com/Star-Seiki-Philippines-Inc-2540833846140438/?tsid=0.5584578887573772&source=result" target="_blank"><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li class="ms-3 fs-4"><a class="text-light" href="mailto: jenna@star-seiki.com.ph"><i class="fa-solid fa-square-envelope"></i></a></li>
                </ul>
            </div>    
        </div>  
    </div>
</footer>

<!-- JQuery Link -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>

<!-- Bootstrap Bundle Link JS -->
<script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.popper.min.js"></script>
<script type="text/javascript" src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datatables Links JS (Bootstrap) -->
<script type="text/javascript" src="assets/vendor/DataTables/datatables.min.js"></script>

<!-- Swiper JS -->
<script type="text/javascript" src="assets/vendor/swiper/js/swiper-bundle.min.js"></script>

<script src="assets/js/script.js"></script>

<script>
    // TODO Add active class on the selected route
        <?php $route = isset($_GET['route']) ? $_GET['route'] :'home'; ?>
        $('.nav-<?php echo $route; ?>').addClass('active');
    // TODO End of adding active class on the selected route

    // TODO Add active class on the selected view
    <?php $view = isset($_GET['view']) ? $_GET['view'] :'profile'; ?>
        $('.nav-<?php echo $view; ?>').addClass('active');
    // TODO End of adding active class on the selected view
</script>