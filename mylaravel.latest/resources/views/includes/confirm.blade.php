<div class="modal fade in modal-confirm" id="modal-default">
    <div class="modal-dialog" style="width: 28em;">
        <div class="modal-content">
            <form method="post" action="" id="form-confirm">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Xoá</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xoá không ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary btn-click-delete">Xóa</button>
                </div>
            </form>
        </div>
      </div>
  </div>
  
