<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function home() {
        return view('shop.home');
    }

    public function products() {
        return view('shop.products');
    }

    public function productDetails() {
        return view('shop.product-details');
    }

    public function cart() {
        return view('shop.cart');
    }

    public function aboutUs() {
        return view('shop.about-us');
    }

    public function contact() {
        return view('shop.contact');
    }
    public function send(Request $request)
{
    $request->validate([
        'name' => 'required|max:100',
        'email' => 'required|email',
        'subject' => 'required|max:150',
        'message' => 'required',
    ]);

    // هنا يمكنك إرسال الإيميل أو حفظ البيانات في قاعدة البيانات
    // على سبيل المثال، مجرد رسالة نجاح مؤقتة:
    return back()->with('success', 'Your message has been sent successfully!');
}

}
