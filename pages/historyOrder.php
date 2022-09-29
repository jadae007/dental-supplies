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
              <h1 class="m-0">ประวัติการเบิก</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">ประวัติการเบิก</li>
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
                  ประวัติการเบิกเวชภัณฑ์
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                      <form>
                        <div class="form-row align-items-center">
                        <div class="col-sm-3 my-1">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">ตั้งแต่วันที่</div>
                              </div>
                              <input type="date" class="form-control" id="startDate">
                            </div>
                          </div>
                          <div class="col-sm-3 my-1">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">ถึงวันที่</div>
                              </div>
                              <input type="date" class="form-control" id="endDate">
                            </div>
                          </div>
                          <div class="col-auto my-1">
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-2"></div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="historyTable">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Order ID</th>
                              <th scope="col">ชื่อ</th>
                              <th scope="col">นามสกุล</th>
                              <th scope="col">จำนวนรายการ/Order</th>
                              <th scope="col">วันที่เบิก</th>
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
    <?php require_once("components/footer.php") ?>
  </div>
  <script src="ajax/historyOrder.js"></script>
</body>

</html>