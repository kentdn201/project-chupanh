<link rel="stylesheet" href="/css/homepage/homepage.css">

<x-layout>
    <article class="pt-4 pb-4">
        <x-link-header :customer="$customer"/>
            @if ($images->count())
                <section class="home-picture py-3">
                    <div class="picture-main">
                        <div class="row">
                            {{-- Một thẻ cho từng bộ ảnh --}}
                                @foreach ($images as $image)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="picture-item">
                                            <div class="picture-img">
                                                <img src="/{{$customer->slug}}/{{$image->name}}" alt="{{$customer->name}}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            {{-- End Content --}}
                        </div>
                    </div>
                </section>
            @else
                <h3 class="text-center">Hiện tại chưa có ảnh nào được đăng tải vui lòng quay lại vào lúc khác! <a href="/" style="color:brown">Quay Lại Trang Chủ</a></h3>
            @endif
    </article>
</x-layout>
