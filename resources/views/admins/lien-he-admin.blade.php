<x-layout-admin>
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-users"></i> Danh Sách Liên Hệ</b></h5>
    </header>
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
            <th>SĐT</th>
            <th>Email</th>
            <th>Nội Dung</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <p class="fw-bold mb-1">{{$contact->name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{$contact->number}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{$contact->email}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{$contact->body}}</p>
                      </div>
                    </div>
                  </td>
                <td>
                    <a href="#" class="btn btn-link btn-rounded" data-toggle="modal" data-target="#exampleModal{{$contact->id}}">Xóa</a>
                </td>
                <!-- Modal -->

                @include('admins.modal.delete-contact')
              </tr>
            @endforeach
        </tbody>
      </table>
      {{-- Pagination --}}
      {{$contacts->links()}}
</x-layout-admin>
