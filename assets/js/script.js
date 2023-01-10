//TODO If Account Already Sign In
$(document).ready(function() { 

    var userStatus = $("#userStatus");
    var userIdentificationnn = $("#userIdentification").val();

    function accountAlreadySignIn() {
        $.ajax({
            url: './classes/accountClass.php',
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
                window.location.assign('index.php?route=signout');
            });
        } else if (userIdentificationnn != "" && userStatus.val() > "2") {
            swal('Your account has already Signed In or someone is trying to access your account in another device!', 'Your account will automatically Sign Out!', 'warning').then(function() {
                window.location.assign('index.php?route=signout');
            });
        }
    }, 1000);

});

//TODO JavaScript for Realtime Notification
$(document).ready(function(){

    $('.count-notification').html('');
    $('.recent-notifications').css('display', 'none');
    $('.view-notifications-btn').css('display', 'none');

    //* User Nofitication 
        function loadNotificationByUserId(viewNotification = '') {
            var userIdentification = $("#userIdentification").val();

            $.ajax({
                url: './classes/getNotificationsClass.php',
                // data: "viewNotification=" + viewNotification + "&userId=" + userId,
                data: {viewNotification:viewNotification, userIdentification:userIdentification},
                type: 'post',
                dataType:'json',
                success: function(data) { 
                    $('.notifications').html(data.displayNotification);
                    if (data.unseenNotification > 0) {
                        if (data.unseenNotification >= 99) {
                            $('.count-notification').html("99+");  
                        } else {
                            $('.count-notification').html(data.unseenNotification);
                        }
                    }

                    if (data.totalNotifications > 0) {
                        $('.recent-notifications').css('display', 'block');
                        $('.view-notifications-btn').css('display', 'block');
                    }

                },
            });
        }

        loadNotificationByUserId();

        $(document).on('mouseover', '#notificationsDropdown', function(){ 
            $('.count-notification').html('');
            loadNotificationByUserId('yes');
        });
    //* End of User Nofitication 

    //* Cart Nofitication
        //! Clickable Table Row For Window Location (Cart Notification)
        $('#cartNotificationTable').on('click', 'tbody td', function() {
            window.location = $(this).closest('tr').find('td:eq(0) a').attr('href');
        });

        $('#userOrdersTable').on('click', 'tbody td', function() {
            window.location = $(this).closest('tr').find('td:eq(0) a').attr('href');
        });

        $('#userServiceTable').on('click', 'tbody td', function() {
            window.location = $(this).closest('tr').find('td:eq(0) a').attr('href');
        });

        $('#userNotifTable').on('click', 'tbody td', function() {
            window.location = $(this).closest('tr').find('td:eq(0) a').attr('href');
        });

        $('#userNotificationTable').on('click', 'tbody td', function() {
            window.location = $(this).closest('tr').find('td:eq(0) a').attr('href');
        });
        //! End of Clickable Table Row For Window Location (Cart Notification)
        
        $('.count-items').html('');
        $('.recent-items').css('display', 'none');
        $('.view-cart-btn').css('display', 'none');

        function loadCartItemsByUserId(viewCart = '') {
            var userIdentificationn = $("#userIdentification").val();

            $.ajax({
                url: './classes/getCartItemsClass.php',
                // data: "viewCart=" + viewCart + "&userId=" + userId,
                data: {viewCart:viewCart, userIdentificationn:userIdentificationn},
                type: 'post',
                dataType:'json',
                success: function(data) { 
                    $('.cart-items').html(data.displayCart);
                    if (data.unseenItems > 0) {
                        if (data.unseenItems >= 99) {
                            $('.count-items').html("99+");  
                        } else {
                            $('.count-items').html(data.unseenItems);  
                        }
                    } 
                    
                    if (data.totalItems > 0) {
                        $('.total-items').html(data.totalItems + " item(s) on cart");
                        $('.recent-items').css('display', 'block');
                        $('.view-cart-btn').css('display', 'block');
                    } 

                },
            });
        }

        loadCartItemsByUserId();      

        $(document).on('mouseover', '#cartDropdown', function(){ 
            $('.count-items').html('');
            loadCartItemsByUserId('yes');
        });
    //* End of Cart Nofitication 

    setInterval(function() {
        loadNotificationByUserId();
        loadCartItemsByUserId();
    }, 1000);
});
//TODO End of JavaScript for Realtime Notification

//TODO JavaScript for Show/Unshow Password
function showPassword() {
    var pass = document.getElementById('password');
    var showhide = document.getElementById('show-hide');

    if (showhide.checked == true){
        pass.type = 'text';
    } else {
        pass.type = 'password';
    }
}
//TODO End of JavaScript for Show/Unshow Password

//TODO JavaScript for Datatables Style
$(document).ready(function() {
    $('#example').DataTable({
        // "pageLength" : 5,
        // "lengthMenu": [[5, 10, 25, 100], [5, 10, 25, 100]],
        "ordering": false,
        "searching": false,
        "paging": false,
        "dom":
            "<'row mb-2 mt-4'<'col-sm-6'l>>" +  
            "<'row g-2'<'col-sm-5'i><'col-sm-7'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12'p>>",
        
        "language": {
            "search": '<span class="text-custom-green fw-bold">Search</span>',

            "info": '<span class="text-custom-green fw-bold">Showing</span>' + " _TOTAL_ " + '<span class="text-custom-green fw-bold">item(s)</span>',
            //  _START_ to _END_ of

            "lengthMenu": '<span class="text-custom-green fw-bold">Show</span>' + " _MENU_ " + '<span class="text-custom-green fw-bold">entries</span>',

            "paginate": {
                "next": '<span class="text-custom-green fw-bold">Next</span>' + " " + '<i class="fa-solid fa-circle-chevron-right text-custom-green"></i>',

                "previous": '<i class="fa-solid fa-circle-chevron-left text-custom-green"></i>' + " " +  '<span class="text-custom-green fw-bold">Previous</span>'
            }
        },
    });
});

$(document).ready(function() {
    $('#example2, #userOrdersPaymentTable, #userOrdersItemsTable, #userServiceItemsTable, #userNotifTable').DataTable({
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
    $('#userOrdersTable').DataTable({
        searchPanes: {
            columns: [6],
            initCollapsed: true
        },
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

$(document).ready(function() {
    $('#userServiceTable').DataTable({
        searchPanes: {
            columns: [4],
            initCollapsed: true
        },
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

// TODO Product.php Inc and Dec Quantity
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});

$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});

$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        // alert('Sorry, the minimum value was reached');

        swal('Warning!', 'Sorry, the minimum value was reached!', 'warning').then(function() {
            window.location.assign('index.php?route=home');
        });
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        // alert('Sorry, the maximum value was reached');
        swal('Warning!', 'Sorry, the maximum value was reached!', 'warning').then(function() {
            window.location.assign('index.php?route=home');
        });
        $(this).val($(this).data('oldValue'));
    }
    
    
});

$('.input-number').keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
            // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

// TODO End of Product.php Inc and Dec Quantity

// TODO Cart.php Inc and Dec Quantity
function incrementQuantity(cartId) {
    var cartProductQty = $('#input-quantity-' + cartId);
    var carUnitPrice = $('#input-price-' + cartId);
    // var newProductQty = parseInt($(cartProductQty).val()) + 1;
    
    if(parseInt($(cartProductQty).val()) < cartProductQty.attr('max')) {
        var newProductQty = parseInt($(cartProductQty).val()) + 1;
        var newCartTotal = parseFloat($(carUnitPrice).val().replace(/[\₱,]/g, '')) * newProductQty;
        saveToDatabase(cartId, newProductQty, newCartTotal);

        // console.log(parseInt($(cartProductQty).val()) + " " + cartProductQty.attr('max'));
    }
}

function decrementQuantity(cartId) {
    var cartProductQty = $('#input-quantity-' + cartId);
    var carUnitPrice = $('#input-price-' + cartId);

    if ($(cartProductQty).val() > 1) {
        var newProductQty = parseInt($(cartProductQty).val()) - 1;
        var newCartTotal = parseFloat($(carUnitPrice).val().replace(/[\₱,]/g, '')) * newProductQty;
        saveToDatabase(cartId, newProductQty, newCartTotal); 
    }
}

function saveToDatabase(cartId, saveNewProductQty, newCartTotal) {
    var cartProductQty = $('#input-quantity-' + cartId);
    var cartTotal = $('#input-total-' + cartId);

    $.ajax({
        url: './classes/ajaxClass.php',
        // data: "cartId=" + cartId + "&saveNewProductQty=" + saveNewProductQty + "&newCartTotal=" + newCartTotal,
        data: {cartId:cartId, saveNewProductQty:saveNewProductQty, newCartTotal:newCartTotal},
        type: 'post',
        success: function() { // (response)
            $(cartProductQty).val(saveNewProductQty);
            $(cartTotal).val("₱" + newCartTotal.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            
            var totalPrice = 0;
            var totalQuantity = 0;
            var selectedItemPrice = $('input:checkbox:checked').closest('tr').find('.subTotal').get();
            var selectedQuantity = $('input:checkbox:checked').closest('tr').find('.itemQuantity').get();

            $(selectedItemPrice).each(function() {
                totalPrice += parseFloat($(this).val().replace(/[\₱,]/g, ''));
            });

            $('.totalPrice').text("₱" + totalPrice.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            $('.totalAmount').val(totalPrice);

            $(selectedQuantity).each(function() {
                totalQuantity += parseInt($(this).val());
            });

            $('.totalQuantity').text(totalQuantity);
            $('.totalQuantities').val(totalQuantity);
        }
    });
}
// TODO End of Cart.php Inc and Dec Quantity

// TODO Cart.php Delete Product
$('.deleteProductCart').on('click', function() {
    $('#example').on('click', '.deleteProductCart', function() {

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        var selectedRow = data[1];

        $.ajax({
            url: "./classes/ajaxClass.php",
            data: "selectCartId=" + selectedRow,
            type: 'post',
            success: function() {
                location.reload()
            }
        });
            
    });
});
// TODO End of Cart.php Delete Product

// TODO Cart.php Total, Number of Items Display
$('#example').on('click', function() {
    var countSelected = $('input:checkbox:checked').length;
    $('.selectedItems').text(countSelected + " Item(s): ");
    $('.totalSelectedItems').val(countSelected);

    var totalPrice = 0;
    var totalQuantity = 0;
    var selectedItemPrice = $('input:checkbox:checked').closest('tr').find('.subTotal').get();
    var selectedQuantity = $('input:checkbox:checked').closest('tr').find('.itemQuantity').get();

    $(selectedItemPrice).each(function() {
        totalPrice += parseFloat($(this).val().replace(/[\₱,]/g, ''));
    });

    $('.totalPrice').text("₱" + totalPrice.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    $('.totalAmount').val(totalPrice);

    $(selectedQuantity).each(function() {
        totalQuantity += parseInt($(this).val());
    });

    $('.totalQuantities').val(totalQuantity);

});
// TODO End of Cart.php Total, Number of Items Display

// TODO Product Slider Using Swiper
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiperAlt = new Swiper(".mySwiperAlt", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
});
// TODO End of Product Slider Using Swiper

// TODO Button Back to Top
var backToTopBtn = document.getElementById("btn-back-to-top");

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopBtn.style.display = "block";
    } else {
        backToTopBtn.style.display = "none";
    }
}

backToTopBtn.addEventListener("click", backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

window.onscroll = function () {
    scrollFunction();
};
// TODO End of Button Back to Top