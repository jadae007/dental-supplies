<!-- Modal -->
<div class="modal fade" id="typeManagementModal" tabindex="-1" aria-labelledby="typeManagementModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" id="from">
        <div class="modal-header">
          <h5 class="modal-title" id="typeManagementModalLabel"></h5>
          <button type="button" id="closeTypeManagementModal" class="close" aria-label="Close" onclick="closeModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" id="typeId" name="typeId">
          <div class="form-group">
            <label for="modalSelectGroup">กลุ่ม</label>
            <select class="form-control" id="modalSelectGroup" name="modalSelectGroup">
            </select>
          </div>
          <div class="form-group">
            <label for="typeName">ประเภท</label>
            <input type="text" class="form-control" id="typeName" name="typeName" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="submit" value="">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>