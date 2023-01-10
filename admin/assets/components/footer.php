<!-- Footer -->
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
<script type="text/javascript" src="../assets/vendor/bootstrap/js/bootstrap.popper.min.js"></script>
<script type="text/javascript" src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datatables Links JS (Bootstrap) -->
<script type="text/javascript" src="../assets/vendor/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="assets/js/highcharts.js"></script>
<script type="text/javascript" src="assets/js/accessibility.js"></script>

<!-- Chart JS -->
<script type="text/javascript" src="assets/js/chart.min.js"></script>

<!-- Counterup JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>

<script>
    // TODO Add active class on the selected page
        <?php $route = isset($_GET['route']) ? $_GET['route'] :'home'; ?>
        $('.nav-<?php echo $route; ?>').addClass('active');
    // TODO End of adding active class on the selected page

    // TODO Add active class on the selected page
        <?php $view = isset($_GET['view']) ? $_GET['view'] :''; ?>
        $('.nav-<?php echo $view; ?>').addClass('active');
    // TODO End of adding active class on the selected page

    // TODO Add active class on the selected page
    <?php $type = isset($_GET['type']) ? $_GET['type'] :''; ?>
        $('.nav-<?php echo $type; ?>').addClass('active');
    // TODO End of adding active class on the selected page
</script>

<script src="assets/js/script.js"></script>

<?php if(isset($_SESSION['status']) && $_SESSION['status'] !='') { ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "<?php echo $_SESSION['statustext']; ?>",
            // text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Okay",
        });
    </script> 
<?php unset($_SESSION['status']); } ?>