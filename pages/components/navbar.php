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
       <a class="nav-link" href="#" role="button">
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