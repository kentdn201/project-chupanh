<x-layout-admin>
    <!-- Header -->
    <x-title-admin><b><i class="fa fa-users"></i> Danh Sách Danh Mục</b></x-title-admin>

    <div class="mb-4 ml-2">
        <a href="/admin/danh-muc/them-moi" class="btn btn-primary">Thêm Danh Mục</a>
    </div>

    @if (session()->has('success'))
    <div>
        <p class="text-center" style="color:red"> {{session('success')}}</p>
    </div>
    @endif
    {{-- Content --}}
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr>
            <th>Tên</th>
            <th>Thay Đổi</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$category->name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                    <a href="/admin/danh-muc/{{$category->id}}/edit" class="btn btn-link btn-rounded">Thay Đổi</a>
                </td>
                <td>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($customers as $customer)
                        @if ($customer->category->id == $category->id)
                           @php
                               $count = $count + 1;
                           @endphp
                        @endif
                    @endforeach
                    @if ($count == 0)
                        <a href="#" class="btn btn-link btn-rounded" data-toggle="modal" data-target="#exampleModal{{$category->id}}">Xóa</a>
                    @endif
                </td>
                <!-- Modal -->

                @include('admins.modal.delete-category')
              </tr>
            @endforeach
        </tbody>
      </table>
</x-layout-admin>
