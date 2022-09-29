<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <x-title>Đăng Nhập</x-title>
            <form action="/admin" method="post">
                @csrf

                <div class="d-flex justify-content-center">
                    <div class="form-group col-md-6">
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            id="email"
                            placeholder="Email"
                            required
                            value="{{ old('email')}}"
                        >
                        @error('email')
                            <p class="pl-1" style="color: red; font-size:15px">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="form-group col-md-6">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            id="password"
                            placeholder="Mật Khẩu"
                            required
                        >
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
