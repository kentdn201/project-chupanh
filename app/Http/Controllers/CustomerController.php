<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Image;
use App\Rules\PhoneNumber;

class CustomerController extends Controller
{
    public function index() {
        return view('customers.index', [
            'customers' => Customer::latest()->filter(
                request(['search', 'danh-muc'])
                )->paginate(9)->withQueryString(),
            'images' => Image::all(),
            'customersCount' => Customer::count(),
            'carousels' => Carousel::all()
        ]);
    }

    // show only 1 customer
    public function showOne(Customer $customer)
    {
        return view('customers.show', [
            'customer' => $customer,
            'images' => $customer->images,
        ]);
    }

    // Hàm Hiển thị trang bảng giá
    public function showBangGia() {
        return view('/customers.banggia');
    }

    // Hàm hiển thị trang liên hệ
    public function showLienHe() {
        return view('/customers.lienhe');
    }

    public function store() {

        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'number' => ['required', new PhoneNumber],
            'body' => 'required'
        ]);

        Contact::create($attributes);

        session()->flash('success', 'Cảm ơn bạn đã gửi lại thông tin cho chúng tôi, chúng tôi sẽ liên hệ bạn sớm nhất có thể');

        return redirect('/lien-he');
    }
}
