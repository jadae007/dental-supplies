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
    <input type="hidden" name="orderId" id="orderId" value="<?php echo $_GET['orderId']; ?>">
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Order Detail</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">รายละเอียดการเบิกเวชภัณฑ์</li>
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
                <div class="card-header" id="cardHeader">
                  รายละเอียด
                </div>
                <div class="card-body">
                  <div class="row mb-5 mt-4">
                  <button type="button" class="btn btn-danger" onclick="window.location.href=`historyOrder`">กลับ</button>
                  </div>
                <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="detailTable">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">ชื่อ</th>
                              <th scope="col">จำนวน</th>
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
 <script src="ajax/orderDetail.js"></script>
</body>

</html>