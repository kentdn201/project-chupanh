<x-layout-admin>
    <div class="ml-4">
        <x-title-admin><b><i class="fa fa-users"></i> Thông Tin Danh Mục: {{ $category->name }}</b></x-title-admin>
        {{-- Content --}}
        @if (session()->has('success'))
        <div>
            <p> {{session('success')}}</p>
        </div>
        @endif
        <form action="/admin/danh-muc/{{$category->id}}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Name input -->
            <div class="form-outline mb-4">
                <label>Tên</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $category->name )}}" placeholder="Tên" required/>
                @error('name')
                    <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                @enderror
            </div>

            <!-- Slug input -->
            <div class="form-outline mb-4">
                <label>Slug (Đây là đường dẫn sau phần / ví dụ: khach-hang-a)</label>
                <input type="text" name="slug" class="form-control" value="{{old('slug', $category->slug )}}" placeholder="Slug (Đây là đường dẫn sau phần / ví dụ: khach-hang-a)" required/>
                @error('slug')
                    <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thay Đổi</button>
        </form>
    </div>
</x-layout-admin>
