<x-layout-admin>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>  Tổng Quan</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>{{$customersCount}}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Khách Hàng</h4>
      </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-image w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>{{ $images->count()}}</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Ảnh</h4>
        </div>
      </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5><b><i class="fa fa-bullseye"></i>  Mục Tiêu</b></h5>
    <p>Hướng Tới 40 Khách Hàng</p>
    @php
        $goal = round(($customers->count()) / 40 * 100)
    @endphp
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:{{$goal}}%">{{$goal}}%</div>
    </div>
  </div>
  <hr>
  <br>
</x-layout-admin>
