<x-layout-admin>
    <div class="ml-4">
        <x-title-admin><b><i class="fa fa-users"></i> Thêm Khách Hàng</b></x-title-admin>
        {{-- Content --}}
        @if (session()->has('success'))
        <div>
            <p> {{session('success')}}</p>
        </div>
        @endif
        <form action="/admin/khach-hang/them-moi" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
                <label>Tên</label>
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

            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{$category->name}}
                    </option>
                @endforeach
                </select>
            </div>

            <div class="form-outline mb-4">
                <label>Thêm Ảnh</label>
                <input type="file" name="image" class="form-control"/>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Mới</button>
        </form>
    </div>
</x-layout-admin>
