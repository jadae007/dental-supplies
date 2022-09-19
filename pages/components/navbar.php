 <?php
  require_once("query/auth/checkLogin.php");
  ?>
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="./" class="nav-link">Home</a>
       <input type="hidden" name="navUserId" id="navUserId" value="<?php echo $_SESSION['loginId']; ?>">
     </li>
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <?php echo $_SESSION['fullname']; ?><span>
           <i class="fas fa-caret-down"></i>
         </span>
       </a>
       <div class="dropdown-menu">
         <a href="#" class="dropdown-item">
           <i class="fas fa-address-card mr-2"></i> Profile
         </a>

         <div class="dropdown-divider"></div>
         <a href="query/auth/logout" class="dropdown-item">
           <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
         </a>
       </div>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#" role="button" onclick="showCart();">
         <i class="fas fa-shopping-cart"></i><span class="badge badge-light" id="cardCount">0</span>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link" data-widget="fullscreen" href="#" role="button">
         <i class="fas fa-expand-arrows-alt"></i>
       </a>
     </li>
   </ul>
 </nav>
 <!-- /.navbar -->
 <!-- Modal Cart -->
 <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="cartModalLabel">ตะกร้าาาาาา</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <table class="show-cart table" id="cartTable">

         </table>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" id="removeAll" onclick="removeAllItem();">ลบทั้งหมด</button>
         <button type="button" class="btn btn-primary" id="cutStock" onclick="cutStock();">เบิกเวชภัณฑ์</button>
       </div>
     </div>
   </div>
 </div>

 <script>
   const showCart = () => {
     $("#cartTable").children().remove()
     let cart = sessionStorage.getItem("cart") ? JSON.parse(sessionStorage.getItem("cart")) : null;
     console.log(cart)
     let cartLength = cart == null ? 0 : cart.length;
     $("#cardCount").text(cartLength)
     if (cart) {
       if (cartLength != 0) {
         $("#removeAll").prop("disabled", false);
         $("#cutStock").prop("disabled", false);
       } else {
         $("#removeAll").prop("disabled", true);
         $("#cutStock").prop("disabled", true);
       }

       let cartTable = ""
       cart.forEach((element, index) => {
         cartTable += `
      <tr>
             <td>${element.itemName}</td>
             <td>
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                   <button class="btn btn-outline-danger" type="button" id="button-decrease_${index}" onclick="decreaseItem(${index});">-</button>
                 </div>
                 <input type="number" class="form-control input-cart" id="input_${index}" value="${element.quantity}">
                 <div class="input-group-append">
                   <button class="btn btn-outline-success" type="button" id="button-increase_${index}"  onclick="increaseItem(${index});">+</button>
                 </div>
               </div>
             </td>
             <td>
               <button type="button" class="btn btn-danger" onclick="removeItem('${index}')">Remove</button>
             </td>
           </tr>
      `
       });
       $("#cartTable").append(cartTable)
     } else {
       $("#removeAll").prop("disabled", true);
       $("#cutStock").prop("disabled", true);
     }
     $("#cartModal").modal("show")
   }
   const countCart = () => {
     let cart = sessionStorage.getItem("cart") ? JSON.parse(sessionStorage.getItem("cart")).length : 0;
     $("#cardCount").text(cart)
   }
   countCart();

   const decreaseItem = (index) => {
     let val = $(`#input_${index}`).val()
     val = Number(val)
     if (val - 1 == 0) return removeItem(index);
     $(`#input_${index}`).val(val - 1)
     let cart = JSON.parse(sessionStorage.getItem("cart"));
     cart[index].quantity = val - 1
     sessionStorage.setItem("cart", JSON.stringify(cart))
   }

   const increaseItem = (index) => {
     let val = Number($(`#input_${index}`).val())
     $(`#input_${index}`).val(val + 1)
     let cart = JSON.parse(sessionStorage.getItem("cart"));
     cart[index].quantity = val + 1
     sessionStorage.setItem("cart", JSON.stringify(cart))
   }

   const removeItem = (index) => {
     let cart = JSON.parse(sessionStorage.getItem("cart"));
     cart.splice(index, 1)
     sessionStorage.setItem("cart", JSON.stringify(cart))
     showCart();
   }

   const removeAllItem = () => {
     sessionStorage.removeItem("cart");
     $("#cartTable").children().remove();
     $("#cardCount").text("0")
   }

   const cutStock = () => {
     let cart = JSON.parse(sessionStorage.getItem("cart"));
     $.ajax({
       type: "POST",
       url: "query/cutStock",
       data: {
         data: cart,
       },
       success: function(response) {
         const {
           status,
           message
         } = JSON.parse(response);
         if (Boolean(status)) {
           tata.success("successfully.", message, configTata);
           removeAllItem();
           $("#cartModal").modal("hide")
           let group = $("#groupSelect").val();
           let type = $("#typeSelect").val();
           listItems(`${group}`, `${type}`);
         } else {
           tata.error("Failed.", message, configTata);
         }
       }
     });
   }
 </script>