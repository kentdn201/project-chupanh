<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/images/carousel.jpg" class="d-block w-100" alt="...">
      </div>
      @if ($carousels->count())
        @foreach ($carousels as $carousel)
        <div class="carousel-item">
            <img src="/carousel/{{$carousel->name}}" class="d-block w-100" alt="{{$carousel->id}}">
        </div>
        @endforeach
      @endif
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
