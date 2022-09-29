<x-layout-admin>
    <!-- Header -->
    <x-title-admin><b><i class="fa fa-image"></i> Danh Sách Ảnh</b></x-title-admin>

    {{-- Content --}}
    <div>
        <form action="/admin/khach-hang/{{$customer->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-flex justify-content-center">
                <h5 for="image" class="mr-2">Thêm Ảnh: </h5>
                <input type="hidden" name="customer_id" value="{{$customer->id}}" >
                <input type="hidden" name="slug" value="{{$customer->slug}}" >
                <input type="file" id="image" name="name[]" multiple>
                <button type="submit" class="btn btn-primary">Thêm Ảnh</button>
            </div>
        </form>
    </div>

    @if (session()->has('success'))
    <div>
        <p class="text-center" style="color:red"> {{session('success')}}</p>
    </div>
    @endif

    <hr>

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
            @if ($images->count())
                @foreach ($images as $image)
                <tr>
                    <td>
                        {{$image->id}}
                    </td>
                    <td>
                    <div class="d-flex align-items-center">
                        <img
                            src="/{{$customer->slug}}/{{$image->name}}"
                            alt=""
                            style="width: 60px;"
                            class="mr-4"
                            />
                        <div class="ms-3">
                        <p class="fw-bold mb-1">{{$image->name}}</p>
                        </div>
                    </div>
                    </td>
                    <td>
                        <a href="#" class="btn btn-link btn-rounded" data-toggle="modal" data-target="#exampleModal{{$image->id}}">Xóa</a>
                    </td>
                    @include('admins.modal.delete-image')
                </tr>
                @endforeach
            @else
                <h3 class="text-center">Hiện Tại Chưa Có Ảnh Nào Vui Lòng Thêm Ảnh</h3>
            @endif
        </tbody>
    </table>
</x-layout-admin>
