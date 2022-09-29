<x-layout-admin>
    <div class="ml-4">
        <x-title-admin><b><i class="fa fa-users"></i> Thêm Mới 1 Danh Mục</b></x-title-admin>
        {{-- Content --}}
        @if (session()->has('success'))
        <div>
            <p> {{session('success')}}</p>
        </div>
        @endif
        <form action="/admin/danh-muc/them-moi" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <label>Tên Danh Mục</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Tên"/>
                @error('name')
                    <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                @enderror
            </div>

            <!-- Slug input -->
            <div class="form-outline mb-4">
                <label>Slug (Đây là đường dẫn sau phần / ví dụ: khach-hang-a)</label>
                <input type="text" name="slug" class="form-control" value="{{old('slug')}}" placeholder="Slug (Đây là đường dẫn sau phần / ví dụ: khach-hang-a)"/>
                @error('slug')
                    <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm Mới</button>
        </form>
    </div>
</x-layout-admin>
