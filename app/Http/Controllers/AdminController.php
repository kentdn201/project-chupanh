<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AdminController extends Controller
{
    // Hàm Hiển Thị Trang Login
    public function loginPage()
    {
        return view('admins.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Đăng nhập thành công
        if(auth()->attempt($attributes)) {
            return redirect('/');
        }

        // Nếu k đăng nhập được
        throw ValidationException::withMessages([
            'email' => 'Địa chỉ email sai hoặc không tồn tại trong hệ thống',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function customers()
    {
        if(auth()->user()?->username != 'thang23494')
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('admins.khach-hang', [
            'customers' => Customer::latest()->filter(
                request(['search'])
                )->paginate(9)->withQueryString(),
        ]);
    }

    public function addCustomer()
    {
        if(auth()->user()?->username != 'thang23494')
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('admins.addCustomer', [
            'categories' => Category::all()
        ]);
    }

    public function storeCustomer()
    {
        $input=request()->all();
        $path = $input['slug'];

        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'slug' => ['required', Rule::unique('customers', 'slug')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'image' => 'required|image'
        ]);

        if($file=request()->file('image')){
            $name=$file->getClientOriginalName();
            $file->move($path,$name);
        }

        $attributes['image'] = request()->file('image')->getClientOriginalName();

        Customer::create($attributes);

        session()->flash('success', 'Thêm Thành Công');

        return back();
    }

    public function lienHeAdmin()
    {
        return view('admins.lien-he-admin', [
            'contacts' => Contact::all()
        ]);
    }

    public function showOne(Customer $customer)
    {
        return view('admins.show', [
            'images' => $customer->images,
            'customer' => $customer
        ]);
    }

    public function storeImage()
    {
        $input=request()->all();

        $path = $input['slug'];

        $images=array();
        if($files=request()->file('name')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move($path,$name);
                $images[]=$name;
            }
        }

        foreach($images as $image)
        {
            Image::insert( [
                'name'=>  $image,
                'customer_id' =>$input['customer_id'],
            ]);
        }

        session()->flash('success', 'Thêm Thành Công');

        return back();
    }

    // hàm hiển thị thông tin khách hàng
    // Edit function
    public function showCustomer(Customer $customer)
    {
        return view('admins.edit', [
            'customer' => $customer,
            'categories' => Category::all()
        ]);
    }

    public function update(Customer $customer)
    {
        $input=request()->all();
        $path = $input['slug'];


        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'slug' => ['required', Rule::unique('customers', 'slug')->ignore($customer->id)],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'image' => 'image'
        ]);

        if(isset($attributes['image'])){
            $attributes['image'] = request()->file('image')->getClientOriginalName();

            if($file=request()->file('image')){
                $name=$file->getClientOriginalName();
                $file->move($path,$name);
            }

        }

        $customer->update($attributes);

        session()->flash('success', 'Update Thành Công');

        return back();
    }

    // Xóa 1 khách hàng
    public function destroy(Customer $customer)
    {
        $customer->delete();

        session()->flash('success', 'Xóa Thành Công');

        return back();
    }

    // Xóa 1 hình ảnh
    public function destroyImage(Image $image)
    {
        $image->delete();

        session()->flash('success', 'Xóa Thành Công');

        return back();
    }

    // Xóa 1 contact
    public function destroyContact(Contact $contact)
    {
        $contact->delete();

        session()->flash('success', 'Xóa Thành Công');

        return back();
    }

    // Danh Mục: Category
    public function categories()
    {
        if(auth()->user()?->username != 'thang23494')
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('admins.danh-muc', [
            'customers' => Customer::all(),
            'categories' => Category::all()
        ]);
    }

    public function addNewCategoryPage()
    {
        return view('admins.addCategory');
    }

    public function storeCategory()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'slug' => ['required', Rule::unique('categories', 'slug')],
        ]);

        Category::create($attributes);

        session()->flash('success', 'Thêm Thành Công');

        return back();
    }

    public function editCategoryPage(Category $category)
    {
        return view('admins.editCategory', [
            'category' => $category,
        ]);
    }

    public function updateCategory(Category $category)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
        ]);

        $category->update($attributes);

        session()->flash('success', 'Update Thành Công');

        return back();
    }

    // Xóa 1 category
    public function destroyCategory(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Xóa Thành Công');

        return back();
    }

    // Hiển thị trang carousel
    public function showCarousel()
    {
        return view('admins.carousel', [
            'carousels' => Carousel::all()
        ]);
    }

    // Thêm Carousel
    public function storeCarousel()
    {
        dd(request()->all());
        $path = 'carousel';

        $images=array();
        if($files=request()->file('name')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move($path,$name);
                $images[]=$name;
            }
        }

        foreach($images as $image)
        {
            Carousel::insert( [
                'name'=>  $image,
            ]);
        }

        session()->flash('success', 'Thêm Thành Công');

        return back();
    }

    // Xóa 1 carousel
    public function destroyCarousel(Carousel $carousel)
    {
        $carousel->delete();

        session()->flash('success', 'Xóa Thành Công');

        return back();
    }
}
