<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>คลังเวชภัณฑ์ทันตกรรม KNH</title>

  <?php
  require_once("link.php");
  require_once("script.php");
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php require_once("components/navbar.php"); ?>
    <?php require_once("components/sidebar.php"); ?>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">จัดการกลุ่มเวชภัณฑ์</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">จัดการกลุ่มเวชภัณฑ์</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  กลุ่มเวชภัณฑ์
                </div>
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-12 text-right">
                    <button class="btn btn-success" id="btnAddGroup" onclick="openModalAdd()">เพิ่มกลุ่ม</button>
                    </div>
                  </div>
                  <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-12">
                    <table class="table table-hover" id="tableGroup">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อกลุ่ม</th>
                        <th scope="col">อักษรเริ่มต้น</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                  </table>
                    </div>
                  </div>
            
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php
     require_once("components/footer.php");
     require_once("components/groupManagementModal.php");
    ?>
  </div>
  <script src="ajax/groupManagement.js"></script>
</body>

</html>