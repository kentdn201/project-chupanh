<link rel="stylesheet" href="/css/header-nav.css">
<style>
    .nav-item {
        padding-left: 30px;
        padding-right: 30px;
    }
</style>

@auth

@else
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        {{-- Trang Chủ --}}
        <li class="nav-item active">
            <a class="nav-link" href="/">Trang Chủ <span class="sr-only">(current)</span></a>
        </li>

        {{-- Dropdown --}}
        <x-category-dropdown/>

        {{-- Bảng Giá  --}}
        <li class="nav-item">
            <a class="nav-link" href="/bang-gia">Bảng Giá</a>
        </li>

        {{-- Liên Hệ --}}
        <li class="nav-item">
            <a class="nav-link" href="/lien-he">Liên Hệ</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="GET" action="/">
        @if (request('danh-muc'))
            <input type="hidden" name="danh-muc" id="category" value="{{request('danh-muc')}}">
        @endif
        <input
            class="form-control mr-sm-2"
            type="text"
            name="search"
            placeholder="Tìm Kiếm"
            value="{{request('search')}}"
        >
      </form>
    </div>
  </nav>
@endauth
