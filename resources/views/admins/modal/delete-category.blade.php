<form action="/admin/danh-muc/{{$category->id}}" method="Post" enctype="multipart/form-data">
    @method('delete')
    @csrf

    <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xóa 1 Thông Tin Liên Lạc</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Bạn Có Muốn Xóa Khách Hàng: {{$category->name}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Xóa</button>
            </div>
        </div>
        </div>
    </div>
</form>
