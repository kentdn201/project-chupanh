@props(['customer'])

<div class="col-12 col-md-6 col-lg-4">
    <div class="picture-item">
        <div class="picture-img">
            <a href="/bo-anh/{{$customer->slug}}" style="text-decoration:none">
                <img src="/{{$customer->slug}}/{{$customer->image}}" alt="{{$customer->name}}">
                <p class="sub-text">{{$customer->name}}</p>
            </a>
        </div>
    </div>
</div>
