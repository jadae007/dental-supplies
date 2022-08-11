<!-- Modal -->
<div class="modal fade" id="groupManagementModal" tabindex="-1" aria-labelledby="groupManagementModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" id="from">
      <div class="modal-header">
        <h5 class="modal-title" id="groupManagementModalLabel"></h5>
        <button type="button" id="closeGroupManagementModal" class="close" aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="groupName">ชื่อกลุ่ม</label>
          <input type="text" class="form-control" id="groupName" name="groupName" required>
          <input type="hidden" class="form-control" id="groupId" name="groupId">
        </div>
        <div class="form-group">
          <label for="startLetter">อักษรเริ่มต้น</label>
          <input type="text" class="form-control" id="startLetter" name="startLetter" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="submit" value="">บันทึก</button>
      </div>
      </form>
    </div>
  </div>
</div>