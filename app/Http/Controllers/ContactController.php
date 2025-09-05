<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; // استدعاء الموديل الخاص بالرسائل

class ContactController extends Controller
{
    // عرض نموذج الاتصال
    public function showForm()
    {
        return view('shop.contact');
    }


    public function submit(Request $request)
    {
        // التحقق من البيانات في السيرفر
        $validated = $request->validate([
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'message' => 'required|max:500',
        ]);

        // حفظ البيانات في جدول contacts
        ContactMessage::create($validated);

        // الرد على AJAX بالنجاح
        return response()->json([
            'success' => true,
            'message' => '✅ تم إرسال رسالتك بنجاح'
        ]);
    }
}
