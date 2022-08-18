<!-- Modal -->
<div class="modal fade" id="medSupplyManagementModal" tabindex="-1" aria-labelledby="medSupplyManagementModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" id="form">
        <div class="modal-header">
          <h5 class="modal-title" id="medSupplyManagementModalLabel"></h5>
          <button type="button" id="closemedSupplyManagementModal" class="close" aria-label="Close" onclick="closeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="productBarcode" class="col-sm-2 col-form-label">Barcode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="productBarcode" name="productBarcode">
            </div>
          </div>
          <div class="form-group row">
            <label for="itemName" class="col-sm-2 col-form-label">ชื่อ</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="itemName" name="itemName">
            </div>
          </div>
          <div class="form-group row">
            <label for="group" class="col-sm-2 col-form-label">กลุ่ม</label>
            <div class="col-sm-4">
            <select class="form-control" id="modalSelectGroup" name="modalSelectGroup">
              <option value="1">test</option>
            </select>
            </div>
            <label for="type" class="col-sm-2 col-form-label ml-1">ประเภท</label>
            <div class="col-sm">
            <select class="form-control" id="modalSelectType" name="modalSelectType">
              <option value="1">test</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="itemDetail" class="col-sm-2 col-form-label">รายละเอียด</label>
            <div class="col-sm-10">
            <textarea class="form-control" id="itemDetail" name="itemDetail" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="itemBrand" class="col-sm-2 col-form-label">ยี่ห้อ</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="itemBrand" name="itemBrand">
            </div>
          </div>
          <div class="form-group row">
            <label for="sellerCompany" class="col-sm-2 col-form-label">บริษัทผู้ขาย</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="sellerCompany" name="sellerCompany">
            </div>
          </div>
          <div class="form-group row">
            <label for="unitCount" class="col-sm-2 col-form-label">หน่วยนับ</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="unitCount" name="unitCount">
            </div>
            <label for="price" class="col-sm-2 col-form-label">ราคา/หน่วยนับ</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="price" name="price">
            </div>
          </div>
          <div class="form-group row">
            <label for="lowerLimit" class="col-sm-2 col-form-label">ปริมาณขั้นต่ำ</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="lowerLimit" name="lowerLimit">
            </div>
            <label for="upperLimit" class="col-sm-2 col-form-label">ปริมาณขั้นสูง</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="upperLimit" name="upperLimit">
            </div>
          </div>
          <div class="form-group row">
            <label for="storageLocation" class="col-sm-2 col-form-label">ตำแหน่งจัดเก็บ</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="storageLocation" name="storageLocation">
            </div>
          </div>
          <div class="form-group row">
            <label for="amount" class="col-sm-2 col-form-label">จำนวน</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="amount" name="amount">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="submit" value="">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>