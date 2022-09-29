<link rel="stylesheet" href="/css/homepage/homepage.css">

@admin
    @include('admins.index')
@else
<x-layout>
    {{-- Carosel của trang --}}
    @if (request('search') || request('danh-muc'))
    @else
        @include('components.carousel')
    @endif
        <h2 class="title-content text-center text-uppercase mt-2 mb-2">
            @if (request('search'))
                <p>Tìm Kiếm</p>
            @else
                <a href="?danh-muc=ca-nhan" style="text-decoration:none">
                    Các bộ ảnh
                </a>
            @endif
        </h2>
        @if ($customers->count())
        <div class="picture-main">
            <div class="row">
                {{-- Một thẻ cho từng bộ ảnh --}}
                    @foreach ($customers as $customer)
                        <x-image-item :customer="$customer"/>
                    @endforeach
                {{-- End Content --}}
            </div>
        </div>
            {{ $customers->links()}}
        @else
        <h3 class="text-center">Hiện tại chưa có bộ ảnh nào vui lòng quay lại vào lúc khác!</h3>
        @endif
</x-layout>
@endadmin
