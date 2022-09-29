<x-layout-admin>
    <!-- Header -->
    <x-title-admin><b><i class="fa fa-users"></i> Danh Sách Khách Hàng</b></x-title-admin>

    <div class="mb-4 ml-2">
        <a href="/admin/khach-hang/them-moi" class="btn btn-primary">Thêm Khách Hàng</a>
    </div>
    {{-- Content --}}
    @if (session()->has('success'))
    <div>
        <p class="text-center" style="color:red"> {{session('success')}}</p>
    </div>
    @endif
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr>
            <th>Tên</th>
            <th>Danh Mục</th>
            <th>Thay Đổi</th>
            <th>Thêm Ảnh</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img
                        src="/{{$customer->slug}}/{{$customer->image}}"
                        alt="{{$customer->name}}"
                        style="width: 60px;"
                        class="mr-4"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$customer->name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <p class="fw-bold">{{$customer->category->name}}</p>
                    </div>
                </td>
                <td>
                    <a href="/admin/khach-hang/{{$customer->id}}/edit" class="btn btn-link btn-rounded">Thay Đổi</a>
                </td>
                <td>
                    <a href="/admin/khach-hang/{{$customer->slug}}" class="btn btn-link btn-rounded">Thêm Ảnh</a>
                </td>
                <td>
                    <a href="#" class="btn btn-link btn-rounded" data-toggle="modal" data-target="#exampleModal{{$customer->id}}">Xóa</a>
                </td>
                <!-- Modal -->

                @include('admins.modal.delete')
              </tr>
            @endforeach
        </tbody>
      </table>
      {{-- Pagination --}}
      {{$customers->links()}}
</x-layout-admin>
