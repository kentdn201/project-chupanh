<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="thu-vien-anh" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ isset($currentCategory) ? $currentCategory->name : 'Thư Viện Ảnh'}}
    </a>
    <div class="dropdown-menu" style="overflow:auto; max-height:200px" aria-labelledby="navbarDropdownMenuLink">
        @foreach ($categories as $category)
            <a
                class="dropdown-item"
                style="{{ isset($currentCategory) && $currentCategory->is($category) ? 'background-color:gray; color: white': ''}}"
                href="/?danh-muc={{ $category->slug }}&{{ http_build_query(request()->except('danh-muc'))}}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</li>
