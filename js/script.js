$("#bt_login").click(function(){
    login();
});

$("#bt_reset").click(function(){
     reset();
});

$("#bt_addstaff").click(function(){
     add_staff();
});

function login(){
    
    if(!$("#admission_no").val()){
        alert("Please enter correct Register Number.")
        return false;
   }

   if(!$("#password").val()){
        alert("Please enter password.")
        return false;
   }

   var data_frm = new FormData($("form#login")[0]);
   $.ajax({
        url: "api/userlogin.php",
        type: "POST",
        data: data_frm,
        processData: false,
        contentType: false,
        success: function(data) {
          //    var details = JSON.parse(data);
             if (data["status"] == 200) {
               // alert( data["message"]);
               if(data["user_type"] == "Admin"){
                    window.location.replace("admin/admin-home.php");
               }else if(data["user_type"] == "Student"){
                    window.location.replace("student/calendar.php");
               }else if(data["user_type"] == "Parent"){
                    window.location.replace("parent/calendar.php");
               }
                      
             } else {
                alert( data["message"]);

             }
        },
        error: function() {
             alert("E3: Login Error.");
             return false;
        }
   });

}

function reset(){
     var data_frm = new FormData($("form#resetpassword")[0]);
     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("login.php");

               } else {
                    alert(details["message"]);
               }
          },
          error: function() {
               alert("E2: Login Error.");
               return false;
          }
     });
}

function add_staff(){
     var data_frm = new FormData($("form#staffinfo")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("index.php");

               } else {
                    alert(details["message"]);
               }
          },
          error: function() {
               alert("E2: Login Error.");
               return false;
          }
     });
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

$("#bt_ownerregister").click(function(){
     signup();
 });
 

$("#bt_register").click(function(){
    signup();
});

function signup(){
    var data_frm = new FormData($("form#register")[0]);
    $.ajax({
         url: "api/common.php",
         type: "POST",
         data: data_frm,
         processData: false,
         contentType: false,
         success: function(data) {
            var details = JSON.parse(data);

            if (details["status"] == "200") {
                  alert(details["message"]);
                  window.location.replace("login.php");

            } else {
                 alert(details["message"]);
            }
         },
         error: function() {
              alert("E1: Signup Error.");
              return false;
         }
    });
}

$("#bt_owner_register").click(function(){
     owner_signup();
 });
 
 function owner_signup(){
     var data_frm = new FormData($("form#ownerregister")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
             var details = JSON.parse(data);
 
             if (details["status"] == "200") {
                   alert(details["message"]);
                   window.location.replace("login.php");
 
             } else {
                  alert(details["message"]);
             }
          },
          error: function() {
               alert("E1: Signup Error.");
               return false;
          }
     });
 }
 
 $('#profilepic').change(function(){
     const file = this.files[0];
     if (file){
       let reader = new FileReader();
       reader.onload = function(event){
         $('#profile_pic').attr('src', event.target.result);
       }
       reader.readAsDataURL(file);
     }
 });

 $('#storepic').change(function(){
     const file = this.files[0];
     if (file){
       let reader = new FileReader();
       reader.onload = function(event){
         $('#store_pic').attr('src', event.target.result);
       }
       reader.readAsDataURL(file);
     }
 });

 $('#bannerpic').change(function(){
     const file = this.files[0];
     if (file){
       let reader = new FileReader();
       reader.onload = function(event){
         $('#banner_pic').attr('src', event.target.result);
       }
       reader.readAsDataURL(file);
     }
 });

 $('#pic').change(function(){
     const file = this.files[0];
     if (file){
       let reader = new FileReader();
       reader.onload = function(event){
         $('#img_pic').attr('src', event.target.result);
       }
       reader.readAsDataURL(file);
     }
 });

 $("#ownerupdateprofile").click(function(){
     owner_update_profile();
 });

 $("#updateprofile").click(function(){
     update_profile();
 });

 function update_profile(){
     var data_frm = new FormData($("form#profileinfo")[0]);
     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);
  
               if (details["status"] == "200") {
                      alert( details["message"]);
                 
                    window.location.replace("profile.php");
               } else {
                  alert( details["message"]);
  
               }
          },
          error: function() {
               alert("E3: Login Error.");
               return false;
          }
     });
 }

 function owner_update_profile(){
     var data_frm = new FormData($("form#profileinfo")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);
  
               if (details["status"] == "200") {
                      alert( details["message"]);
                 
                    window.location.replace("profile.php");
               } else {
                  alert( details["message"]);
  
               }
          },
          error: function() {
               alert("E3: Login Error.");
               return false;
          }
     });
 }

 $("#addnewstore").click(function(){
     addnewstore();
 });

 function addnewstore(){
     var data_frm = new FormData($("form#storeinfo")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);
  
               if (details["status"] == "200") {
                    alert( details["message"]);
                    window.location.replace("index.php");
               } else {
                  alert( details["message"]);
  
               }
          },
          error: function() {
               alert("E3: Login Error.");
               return false;
          }
     });
 }

 $("#bt_service").click(function(){
     addnewservice();
 });

 function addnewservice(){
     var data_frm = new FormData($("form#serviceinfo")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);
  
               if (details["status"] == "200") {
                    alert( details["message"]);
                    window.location.replace("services.php");
               } else {
                  alert( details["message"]);
  
               }
          },
          error: function() {
               alert("E3: Login Error.");
               return false;
          }
     });
 }

function store_status(status, id){
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: {
                    action: "update_store_status", 
                    status: status, 
                    id: id,
               },
        
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {
     
                    alert( details["message"]);
                    window.location.replace("mystores.php");
     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
     
}

$("#bt_category").click(function(){
     addnewcategory();
 });

function addnewcategory(){
     var data_frm = new FormData($("form#categoryinfo")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);
  
               if (details["status"] == "200") {
                    alert( details["message"]);
                    window.location.replace("index.php");
               } else {
                  alert( details["message"]);
  
               }
          },
          error: function() {
               alert("E3: Login Error.");
               return false;
          }
     });
}

$("#setstorename").on('change keyup paste', function() {
     $("#displaystorename").text($(this).val());
});

$('#setstorelogo').change(function(){
     const file = this.files[0];
     if (file){
       let reader = new FileReader();
       reader.onload = function(event){
         $('#displaystorelogo').attr('src', event.target.result);
       }
       reader.readAsDataURL(file);
     }
 });

 $('#setstorebanner').change(function(){
     const file = this.files[0];
     if (file){
       let reader = new FileReader();
       reader.onload = function(event){
         $('#displaystorebanner').attr('src', event.target.result);
       }
       reader.readAsDataURL(file);
     }
 });

 $("#bt_request_new_store").click(function(){
     request_new_store();
 });

 function request_new_store()
 {
     var data_frm = new FormData($("form#newstoreinfo")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    alert( details["message"]);
                    window.location.replace("mystores.php");
               } else {
                  alert( details["message"]);
  
               }
          },
          error: function() {
               alert("E3: Login Error.");
               return false;
          }
     });
 }

 function updatestaffinfo(form){
     var data_frm = new FormData($("form#"+form)[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    alert( details["message"]);
                    window.location.replace("staff.php");
               } else {
                  alert( details["message"]);
  
               }
          },
          error: function() {
               alert("E3: Login Error.");
               return false;
          }
     });
 }

function redirect(page){
     window.location.replace(page);
}

 function viewgallery(storeid){
     redirect("gallery.php?store="+storeid);
 }

 $('#Orderlist-tab a').on('click', function (e) {
     e.preventDefault()

     var category = $(this).data("category");
     var store = $(this).data("store");
     var type = $(this).data("type");

     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: {
                    action: "store_listings", 
                    category: category, 
                    store: store,
                    type: type,

               },
        
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {
                    $("#list-StoreServicesContainer").html("");

                    $("#list-StoreServicesContainer").html(details["HTML"]);
     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
     
     $(this).tab('show')
})

$('#Homelist-tab a').on('click', function (e) {
     e.preventDefault()

     var category = $(this).data("category");
     var store = $(this).data("store");
     var type = $(this).data("type");

     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: {
                    action: "store_listings", 
                    category: category, 
                    store: store,
                    type: type,

               },
        
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {
                    $("#list-HomeServicesContainer").html("");

                    $("#list-HomeServicesContainer").html(details["HTML"]);
     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
     
     $(this).tab('show')
})


 $('#checkpriceatstore').click(function() {
     if (this.checked) {
          $('#getpriceatstore').removeAttr('disabled');
     } else {
         $('#getpriceatstore').prop('disabled', true); // If checked disable item                   
     }
 });

 $('#checkpriceathome').click(function() {
     if (this.checked) {
          $('#getpriceathome').removeAttr('disabled');
     } else {
         $('#getpriceathome').prop('disabled', true); // If checked disable item                   
     }
 });

function add_to_cart(store,service,user,type)
{
     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: {
                    action: "add_to_cart", 
                    user: user, 
                    store: store,
                    service: service,
                    type: type,

               },
        
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {

                    $("#bt_cart_"+details["service"]).css("display", "none");
                    $("#bt_cart_remove_"+details["service"]).css("display", "inline-block");
                    $("#cart-count-no").text(details["count"]);

     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
}

function remove_from_cart(store,service,user)
{

     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: {
                    action: "remove_from_cart", 
                    user: user, 
                    store: store,
                    service: service,
               },
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {

                    $("#bt_cart_"+details["service"]).css("display", "inline-block");
                    $("#bt_cart_remove_"+details["service"]).css("display", "none");
                    $("#cart-count-no").text(details["count"]);

     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
}

function remove_from_mycart(store,service,user)
{

     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: {
                    action: "remove_from_cart", 
                    user: user, 
                    store: store,
                    service: service,
               },
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {
                    $("#bt_mycart_remove_"+details["service"]).remove();
                    $("#bt_cart_"+details["service"]).css("display", "inline-block");
                    $("#bt_cart_remove_"+details["service"]).css("display", "none");
                    $("#cart-count-no").text(details["count"]);
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
}

function assignStaff(order_id, e){

     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: {
                    action: "assign_staff", 
                    order_id: order_id, 
                    staff: e.value,
               },
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("orders.php");

     
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
}

function updateProgress(order_id, staff, e){

     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: {
                    action: "update_progress", 
                    order_id: order_id, 
                    progress: e.value,
                    staff: staff,
               },
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("index.php");
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
}

function storerequest(store_id, e){

     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: {
                    action: "update_store", 
                    store_id: store_id, 
                    status: e.value,
               },
          success: function(data) {
               var details = JSON.parse(data);
     
               if (details["status"] == "200") {

                    alert(details["message"]);
                    window.location.replace("request.php");
               } else {
                    alert( details["message"]);
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
}
