<div id="visits"></div>
<p> 
    Service Installation
    Footers
    Checkout
    Manage Account
    Add Upload Proof
</p>
<script>
function cb(response) {
    document.getElementById('visits').innerText = response.value;
}
</script>
<script async src="https://api.countapi.xyz/hit/mysite.com/index.php?route=test&callback=cb"></script>



<?php if ($totalBalance > 0) { ?>
    <div class="d-flex justify-content-start mb-4">
        <button type="button" class="btn btn-success d-flex align-items-center fw-bold me-2" data-bs-toggle="modal" data-bs-target="#uploadProofImgs"><i class="bx bxs-plus-square fs-4 me-2"></i><strong>Add Payment</strong></button>
    </div>
<?php } ?>



<div class="modal fade" id="uploadProofImgs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border border-success border-4">
            <div class="modal-body">

            <?php $classOrders->uploadPaymentProof(); ?>

                <form method="post" enctype="multipart/form-data" id="formUpdateProd">

                    <div class="alert alert-success d-flex align-items-center">
                        <i class="bx bxs-plus-square fs-4 me-2"></i>
                        <div>
                            <strong>Add Payment</strong>
                        </div>
                    </div>

                    <div class="upload-photo d-flex justify-content-center">
                        <div class="upload-photo-proof">
                            <div class="preview-photo-proof">
                                <div class="preview">
                                    <img src="uploads/payment-proof-default-img.png" id="photo-previewer-proof">
                                    <input type="file" id="file-preview-proof" accept="image/*" name="uploadPProof" onchange="previewPaymentProof(event);">
                                    <label for="file-preview-proof"><i class=""></i>Choose Image</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="paymentId" id="paymentId">
                    <input type="text" name="" id="" value="<?php echo $newOrderId ?? ""; ?>">
                    <input type="text" name="" id="" value="<?php echo $newOrderNo ?? ""; ?>">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary d-flex align-items-center" name="uploadPaymentProof"><i class="bx bx-upload fs-5"></i>&nbsp<strong>&nbsp&nbsp&nbspUpload&nbsp&nbsp&nbsp</strong></button>
                        <button type="button" class="btn btn-danger d-flex align-items-center" data-bs-dismiss="modal"><i class="bx bx-x-circle fs-5"></i>&nbsp<strong>&nbspCancel&nbsp</strong></button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
</div>



public function uploadPaymentProof() {

if (isset($_POST['uploadPaymentProof'])){
    $paymentId = $_POST['paymentId'];
    date_default_timezone_set('Asia/Manila');
    $uploadDateTime = date('Y-m-d H:i:s');

    if (!empty($_FILES["uploadPProof"]["name"])) { 
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["uploadPProof"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["uploadPProof"]["tmp_name"], $target_file);

        $connection = $this->connect();
        $stmt = $connection->prepare("INSERT INTO payments (orderId, orderNo, paymentProofImg, paymentProofDate) VALUES (?, ?, ?, ?)");
        $stmt->execute([$target_file, $uploadDateTime, $paymentId]);
            
        if ($stmt) {
            echo "<script>
                swal('Successful!', 'Proof of payment uploaded successfully!', 'success').then(function() {
                    window.location = document.referrer;
                });
            </script>";
        }
    } else {
        echo "<script>
            swal('Warning!', 'Please upload your proof of payment!', 'warning').then(function() {
                window.location = document.referrer;
            });
        </script>";
    }

}

$this->disconnect(); 

}




<?php if (empty($info['paymentProofImg'])) { ?>
    <td class="d-none">uploads/payment-proof-default-img.png</td>
<?php } else { ?>
    <td class="d-none"><?php echo $info['paymentProofImg']; ?></td>
<?php } ?>
<?php if (empty($info['paymentProofImg'])) { ?>
    <td class="text-center bg-danger text-light">No proof of payment yet! Please upload now.</td>
<?php } else { ?>
    <td class="text-center"><img src="<?php echo $info['paymentProofImg']; ?>" width="150" height="150" alt=""></td>
<?php } ?>
<td class="text-center">
    <button type="button" class="uploadProofImgs btn btn-success fw-bold me-2">
        <div class="d-flex align-items-center">
            <i class="bx bx-upload fs-4 me-2" title="Upload Payment Proof" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
            <?php if (empty($info['paymentProofImg'])) { ?>
                Upload Proof
            <?php } else { ?>
                Change Proof
            <?php } ?>
        </div>    
    </button>
</td>


//TODO Javascript for Adding Proof Payment
// $('.uploadProofImgs').on('click',function() {
//     $('#userOrdersPaymentTable').on('click', '.uploadProofImgs', function() {
//         $('#uploadProofImgs').modal('show');

//         $tr = $(this).closest('tr');
//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();

//         $('#paymentId').val(data[0]);   
//         $('#photo-previewer-proof').attr('src', (data[4]));
            
//     });
// });
//TODO End of Javascript for Adding Proof of Payment\









<h1>404 Page</h1>


<?php 
    $URL = explode("/",$_SERVER['QUERY_STRING']);  

    echo $_SERVER['QUERY_STRING'];

    $return = substr(md5(uniqid(mt_rand() . time(), true)), 0, 8);

    echo $return;
 
    $monday = strtotime('last monday', strtotime('tomorrow'));
    $sunday = strtotime('+6 days', $monday);
    echo "<P>". date('d-F-Y', $monday) . " to " . date('d-M-Y', $sunday) . "</P>";

?>