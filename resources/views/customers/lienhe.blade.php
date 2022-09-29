<x-layout>
    <x-title>Liên Hệ</x-title>

    <article>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div>
                            <h4>Thông Tin Liên Hệ Khác Liên Quan</h4>
                            <p>Địa Chỉ: ABC, ABC 123, Hà Nội</p>
                            <p>SĐT: 097655239811</p>
                            <p>Email: win@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 mt-4 mt-lg-0">
                        @if (session()->has('success'))
                            <div>
                                <p> {{session('success')}}</p>
                            </div>

                        @else
                        <div>
                            <h4>Gửi Thông Tin Cho Chúng Tôi</h4>
                            <form action="/lien-he" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Họ Và Tên *" value="{{old('name')}}" required>
                                  </div>
                                    @error('name')
                                        <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                                    @enderror
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="number" placeholder="Số Điện Thoại *" value="{{old('number')}}" required>
                                  </div>
                                    @error('number')
                                        <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                                    @enderror
                                  <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email *" value="{{old('email')}}" required>
                                  </div>
                                    @error('email')
                                        <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                                    @enderror
                                  <div class="form-group">
                                    <textarea type="text" class="form-control" name="body" placeholder="Nội Dung">{{old('body')}}</textarea>
                                  </div>
                                    @error('body')
                                        <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                                    @enderror

                                  <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-secondary mb-2">Gửi Đi</button>
                                  </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </article>
</x-layout>
