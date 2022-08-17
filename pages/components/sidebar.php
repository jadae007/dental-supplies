<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="./" class="brand-link">
    <img src="../dist/img/dentalLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" style="font-size:16px ;">Dental Supplies KNH</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Medical Supplies</li>
        <li class="nav-item">
          <a href="test" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              รายการเวชภัณฑ์
              <!-- <span class="badge badge-info right">2</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
              <a href="pages/mailbox/mailbox.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>GG</p>
              </a>
            </li>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link disabled text-muted">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Mailbox
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/mailbox/mailbox.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inbox</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/compose.html" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Compose</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/read-mail.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Read</p>
              </a>
            </li>
          </ul>
        </li>
        <?php if($_SESSION['role'] <= 1 ){ ?>
        <li class="nav-header">Management</li>
        <li class="nav-item">
          <a href="medSupplyManagement" class="nav-link" id="sideBarmedSupplyManagement">
            <i class="nav-icon fas fa-list"></i>
            <p>จัดการเวชภัณฑ์</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="groupManagement" class="nav-link" id="sideBarGroupManagement">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>จัดการกลุ่ม</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="typeManagement" class="nav-link" id="sideBarTypeManagement">
            <i class="nav-icon fas fa-stream"></i>
            <p>จัดการประเภท</p>
          </a>
        </li>
        <li class="nav-header">Users Management</li>
        <li class="nav-item">
          <a href="userManagement" class="nav-link" id="sideBarUserManagement">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>จัดการผู้ใช้งาน</p>
          </a>
        </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>