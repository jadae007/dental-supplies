<?php
require_once("query/auth/checkAdmin.php");
?>
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
  <input type="hidden" name="myRole" id="myRole" value="<?php echo $_SESSION['role']; ?>">
  <div class="wrapper">
    <?php
    require_once("components/navbar.php");
    require_once("components/sidebar.php");
    ?>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">จัดการเวชภัณฑ์</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">เบิกเวชภัณฑ์</li>
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
                  Medical Supplies
                </div>
                <div class="card-body">
                  <div class="row mb-4">
                    <div class="col-4"></div>
                    <div class="col-4">
                      <div class="form-group row">
                        <label for="groupSelect" class="col-sm-2 col-form-label">กลุ่ม</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="groupSelect" name="groupSelect">
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="typeSelect" class="col-sm-2 col-form-label">ประเภท</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="typeSelect" name="typeSelect">
                            <option value="all">ทั้งหมด</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="supplyTable">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">ชื่อเวชภัณฑ์</th>
                              <th scope="col">กลุ่ม</th>
                              <th scope="col">ประเภท</th>
                              <th scope="col">หน่วยนับ</th>
                              <th scope="col">จำนวน</th>
                              <th scope="col">ราคา/หน่วยนับ</th>
                              <th scope="col">วันหมดอายุ</th>
                              <th scope="col" class="text-center">เพิ่มลงตะกร้า</th>
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
        </div>
      </section>
    </div>
    <?php
    require_once("components/footer.php");
    require_once("components/medSupplyManagementModal.php");
    ?>
  </div>

  <!-- Modal add -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">เบิกเวชภัณฑ์</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">จำนวน</label>
            <div class="col-sm-10">
              <input type="hidden" id="idCart">
              <input type="hidden" id="itemName">
              <input type="hidden" id="maxQuantity">
              <input type="number" class="form-control" min="1" max="9999" id="quantity" name="quantity">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnAddCart" class="btn btn-primary">เพิ่มลงตะกร้า</button>
        </div>
      </div>
    </div>
  </div>
  <script src="ajax/main.js"></script>
</body>

</html>