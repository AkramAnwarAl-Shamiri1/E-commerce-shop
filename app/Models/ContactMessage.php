<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    // اسم الجدول في قاعدة البيانات
    protected $table = 'contacts';

    // الحقول التي يمكن تعبئتها جماعياً
    protected $fillable = ['name', 'email', 'message'];
}
