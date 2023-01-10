//TODO If Account Already Sign In
$(document).ready(function() { 

    var userIdentificationnn = $("#userIdentification").val();
    var userStatus = $("#userStatus");

    function accountAlreadySignIn() {
        $.ajax({
            url: '../classes/accountClass.php',
            data: {userIdentificationnn:userIdentificationnn},
            type: 'post',
            dataType:'json',
            success: function(data) { 
                if (data.userStatus > 1) {
                    userStatus.val(data.userStatus);
                }
            },
        });
    }

    setInterval(function() {
        accountAlreadySignIn();

        if (userIdentificationnn != "" && userStatus.val() == "0") {
            swal('Your account has already Signed In or someone is trying to access your account in another device!', 'Your account will automatically Sign Out!', 'warning').then(function() {
                window.location.assign('../index.php?route=signout');
            });
        } else if (userIdentificationnn != "" && userStatus.val() > "2") {
            swal('Your account has already Signed In or someone is trying to access your account in another device!', 'Your account will automatically Sign Out!', 'warning').then(function() {
                window.location.assign('../index.php?route=signout');
            });
        }
    }, 1000);

});


//TODO Start JavaScript for SideNav Animation
document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId, sidenavimgId) => {
    const toggleSideNavBar = document.getElementById(toggleId),
    sideNavBar = document.getElementById(navId),
    bodyContent = document.getElementById(bodyId),
    headerContent = document.getElementById(headerId),
    sidenavImg = document.getElementById(sidenavimgId)

    // Validate that all variables exist
    if(toggleSideNavBar && sideNavBar && bodyContent && headerContent){
            toggleSideNavBar.addEventListener('click', ()=>{
            // Show navbar
            sideNavBar.classList.toggle('show-sidenavbar')
            // Change icon
            toggleSideNavBar.classList.toggle('fa-xmark')
            // Add padding to body
            bodyContent.classList.toggle('body-transform')
            // Add padding to header
            headerContent.classList.toggle('body-transform')
            // Change logo layout
            sidenavImg.classList.toggle('sidenavbar-img-change')
            })
        }
    }

    showNavbar('sidenav-toggle-icon','sidenavbar','body','sidenav-header','sidenavbar-img')

    // Active Link
    const linkColor = document.querySelectorAll('.sidenavbar-menu')

    function colorLink(){
        if(linkColor){
            linkColor.forEach(menuIcon => menuIcon.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(menuIcon=> menuIcon.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
});
//TODO End of JavaScript for SideNav Animation

//TODO Tooltips
$(document).ready(function() {
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(tooltipTriggerEl => {
        new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
//TODO End of Tooltips

//TODO JavaScript for Datatables Style
$(document).ready(function() {
    $('#example').DataTable({
        "pageLength" : 5,
        "lengthMenu": [[5, 10, 25, 100], [5, 10, 25, 100]],
        "ordering": false,
        "dom":
            "<'row mb-2 mt-4'<'col-sm-6'l>>" +  
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
    });
} );

$(document).ready(function() {
    $('#example2').DataTable({
        "pageLength" : 5,
        "lengthMenu": [[5, 10, 25, 100], [5, 10, 25, 100]],
        "ordering": false,
        "dom":
            "<'row mb-2 mt-4'<'col-sm-6'l>>" +  
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
    });
} );

$(document).ready(function() {
    $('#example3').DataTable({
        searchPanes: {
            columns: [8],
            initCollapsed: true
        },
        columnDefs: [
            {
                target: 8,
                visible: false,
            },
        ],
        dom: 'Plfrtip',
        "pageLength" : 5,
        "lengthMenu": [[5, 10, 25, 100], [5, 10, 25, 100]],
        "ordering": false,
        "dom":
            "<'row mb-2 mt-4'<'col-sm-6'l>>" +  
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
    });
} );
//TODO End of JavaScript for Datatables Style

//TODO Javascript for Inventory Module
$('.updateProducts').on('click',function() {
    $('#example').on('click', '.updateProducts', function() {
        $('#updateProducts').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#updateProductID').val(data[0]);   
        $('#photo-update-product').attr('src', "../" + (data[2]));
        $('#updateProductPhotoDir').val(data[2]);   
        $('#updateProductDesc').val(data[3]);   
        $('#updateCategory').val(data[4]);
        $('#updateModel').val(data[6]);
        $('#updateWeight').val(data[7]);
        // $('#updateUnit').append(`<option value="${data[8]}" selected>${data[8]}</option>`);

        $('#updateUnit').val(data[8]);
        $('#updateUnitPrice').val(data[9].replace(/[\₱,]/g, '')); 
        $('#updateDetailedDesc').val(data[10]);       
    });
});

//TODO Javascript for Inventory Module
$('.viewProducts').on('click',function() {
    $('#example').on('click', '.viewProducts', function() {
        $('#viewProducts').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#photo-view-product').attr('src', "../" + (data[2]));  
        $('#viewProductDesc').val(data[3]);   
        $('#viewCategory').val(data[5]);
        $('#viewModel').val(data[6]);
        $('#viewWeight').val(data[7]);
        $('#viewUnit').val(data[8]);
        $('#viewUnitPrice').val(data[9].replace(/[\₱,]/g, '')); 
        $('#viewDetailedDesc').val(data[10]);       
    });
});

$('.deleteProducts').on('click',function() {
    $('#example').on('click', '.deleteProducts', function() {
        $('#deleteProducts').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#deleteProductID').val(data[0]);   
        $('#deleteProductDM').val(data[3] + " - (" + data[6] + ")");
        $('#deleteProductDesc').text(data[3]);
            
    });
});

$('.addProductStock').on('click',function() {
    $('#example').on('click', '.addProductStock', function() {
        $('#addProductStock').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
            
        $('#addQtyProductId').val(data[0]);
        $('#addQtyProductDM').val(data[2] + " - (" + data[3] + ")");   
        $('#addCurrentQty').val(data[4]);

    });
});

$('.removeProductStock').on('click',function() {
    $('#example').on('click', '.removeProductStock', function() {
        $('#removeProductStock').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
            
        $('#minusQtyProductId').val(data[0]);
        $('#minusQtyProductDM').val(data[2] + " - (" + data[3] + ")");      
        $('#minusCurrentQty').val(data[4]);

    });
});

$('.updateCategories').on('click',function() {
    $('#example').on('click', '.updateCategories', function() {
        $('#updateCategories').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#updateCategoryID').val(data[0]);   
        $('#updateCategoryName').val(data[1]);   
        $('#updateCategoryDesc').val(data[2]); 
            
    });
});

$('.deleteCategories').on('click',function() {
    $('#example').on('click', '.deleteCategories', function() {
        $('#deleteCategories').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#deleteCategoryID').val(data[0]);
        $('#deleteCategoryDM').val(data[1]);     
        $('#deleteCategoryName').text(data[1]);
            
    });
});
//TODO End of Javascript for Inventory Module

//TODO Javascript for Orders Module
$('.approvedOrder').on('click',function() {
    $('#example').on('click', '.approvedOrder', function() {
        $('#approvedOrder').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#approvedOrderId').val(data[0]);  
        $('#approvedOrderNo').val(data[1]);   
        $('#approvedOrderNoShow').text(data[1]);
        $('#approvedUserId').val(data[2]);
        $('#approvedPaymentType').val(data[4]);   
            
    });
});

$('.setOrderDelivery').on('click',function() {
    $('#example').on('click', '.setOrderDelivery', function() {
        $('#setOrderDelivery').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#setOrderDelId').val(data[0]);  
        $('#setOrderDelNo').val(data[1]);   
        $('#setOrderDelUserId').val(data[2]);
        $('#setOrderDelNoShow').text(data[1]);
            
    });
});

$('.markedDelivered').on('click',function() {
    $('#example').on('click', '.markedDelivered', function() {
        $('#markedDelivered').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#mrkDlvrdOrderId').val(data[0]);  
        $('#mrkDlvrdOrderNo').val(data[1]);   
        $('#mrkDlvrdOrderNoShow').text(data[1]);
        $('#mrkDlvrdUserId').val(data[2]);
        $('#mrkDlvrdDeliverId').val(data[3]);   
            
    });
});

$('.markedReturn').on('click',function() {
    $('#example').on('click', '.markedReturn', function() {
        $('#markedReturn').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#markReturnOrderId').val(data[0]);  
        $('#markReturnOrderNo').val(data[1]);   
        $('#markReturnOrderNoShow').text(data[1]);
        $('#markReturnUserId').val(data[2]);
        $('#markReturnDeliverId').val(data[3]);   
            
    });
});
//TODO End of Javascript for Orders Module

//TODO Javascript for Service Installation Module
$('.assignService').on('click',function() {
    $('#example').on('click', '.assignService', function() {
        $('#assignService').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#assignedOrderId').val(data[0]);  
        $('#assignedOrderNo').val(data[1]);   
        $('#assignedUserId').val(data[2]);
        $('#assignedDesc').val(data[5]);
            
    });
});

$('.declineService').on('click',function() {
    $('#example').on('click', '.declineService', function() {
        $('#declineService').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#declinedOrderId').val(data[0]);  
        $('#declinedOrderNo').val(data[1]);   
        $('#declinedUserId').val(data[2]);
        $('#declinedOrderNoShow').text(data[1]);
            
    });
});

$('.assignDeclinedService').on('click',function() {
    $('#example').on('click', '.assignDeclinedService', function() {
        $('#assignDeclinedService').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#assignedDeclinedOrderId').val(data[0]);  
        $('#assignedDeclinedOrderNo').val(data[1]);   
        $('#assignedDeclinedUserId').val(data[2]);
        $('#assignedDeclinedServId').val(data[3]);
        $('#assignedDeclineDesc').val(data[6]);
    });
});

$('.assignMarkAsDone').on('click',function() {
    $('#example').on('click', '.assignMarkAsDone', function() {
        $('#assignMarkAsDone').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#markedAsDoneOrderId').val(data[0]);  
        $('#markedAsDoneOrderNo').val(data[1]);   
        $('#markedAsDoneOrderNoShow').text(data[1]);   
        $('#markedAsDoneUserId').val(data[2]);
        $('#markedAsDoneServId').val(data[3]);
     
    });
});
//TODO End of Javascript for Service Installation Module

// TODO Javascript for Configuration Module
$('.deleteAdminAccounts').on('click',function() {
    $('#example').on('click', '.deleteAdminAccounts', function() {
        $('#deleteAdminAccounts').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#deleteAdminAccountID').val(data[0]);    
        $('#deleteAdminAccountUID').val(data[1]); 
        $('#deleteAdminAccountShow').text(data[2]); 
        $('#deleteAdminFullName').val(data[2]); 
    });
});

$('.updateFaqs').on('click',function() {
    $('#example').on('click', '.updateFaqs', function() {
        $('#updateFaqs').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#updateFaqId').val(data[0]);   
        $('#updateFaqOrder').val(data[1]);   
        $('#updateFaqQuestion').val(data[3]); 
        $('#updateFaqAnswer').val(data[4]); 
    });
});

$('.deleteFaqs').on('click',function() {
    $('#example').on('click', '.deleteFaqs', function() {
        $('#deleteFaqs').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#deleteFaqId').val(data[0]);    
        $('#deleteFaqQuestion').val(data[3]); 
        $('#deleteFaqQ').val(data[3]); 
        $('#deleteFaqAnswer').val(data[4]); 
    });
});
//TODO End of Javascript for Configuration Module

//TODO End of Javascript for Checking and Adding Other Units
function checkUnit(val){
    var otherUnit = document.getElementById('otherUnit');
    var otherUnitLabel = document.getElementById('otherUnitLabel');

    if (val == 'Others') {
        otherUnit.style.display = 'block';
        otherUnitLabel.style.display = 'block';
    } else {
        otherUnit.style.display = 'none';
        otherUnitLabel.style.display = 'none';
    }      
    
    $('#formAddProd').submit(function() {
        var otherOption = $('#unit').find('option:selected');

        if (otherOption.val() == 'Others') {
            // replace select value with text field value
            otherOption.val($('#otherUnit').val());
        }
    });
}

function undisplayedOtherUnit() {
    var otherUnitDisplayed = document.getElementById('otherUnit');
    var otherUnitLabelDisplayed = document.getElementById('otherUnitLabel');

    if (otherUnitDisplayed.style.display === 'block') {
        otherUnitDisplayed.style.display = 'none';
        otherUnitLabelDisplayed.style.display = 'none';
        $('#unit').val($('#unit option:first').val());
    }
}

//* ======

function updateCheckUnit(val){
    var updateOtherUnit = document.getElementById('updateOtherUnit');
    var updateOtherUnitLabel = document.getElementById('updateUnitLabel');

    if (val == 'Others') {
        updateOtherUnit.style.display = 'block';
        updateOtherUnitLabel.style.display = 'block';
    } else {
        updateOtherUnit.style.display = 'none';
        updateOtherUnitLabel.style.display = 'none';
    }      
    
    $('#formUpdateProd').submit(function() {
        var otherOption = $('#updateUnit').find('option:selected');

        if (otherOption.val() == 'Others') {
            // replace select value with text field value
            otherOption.val($('#updateOtherUnit').val());
        }
    });
}

function updateUndisplayedOtherUnit() {
    var updateOtherUnitDisplayed = document.getElementById('updateOtherUnit');
    var updateOtherUnitLabelDisplayed = document.getElementById('updateUnitLabel');

    if (updateOtherUnitDisplayed.style.display === 'block') {
        updateOtherUnitDisplayed.style.display = 'none';
        updateOtherUnitLabelDisplayed.style.display = 'none';
        $('#updateUnit').val($('#updateUnit option:first').val());
    }
}

// function selectCategory(){
//     var category = $('#category').find('option:selected');
//     var getCategory = document.getElementById("getCategory");
//     if (getCategory.value == "") {
//         getCategory.value = 1;
//     } else {
//         $_SESSION['categoryId'] = getCategory.value = category.val();
//     }

        // document.getElementById("getCategory").value = category.val();
// } 
//TODO End of Javascript for Checking and Adding Other Units