<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>إنشاء منتج</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 700px;
            background: #fff;
            padding: 30px;
            margin-top: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
        .btn-home {
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 25px;
            text-align: center;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>إنشاء منتج جديد</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       
        <div class="mb-3">
            <label class="form-label">الفئة</label>
            <select name="category_id" class="form-control" required>
                <option value="">اختر فئة</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (old('category_id') ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">اسم المنتج</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">الوصف</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">السعر</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', 0) }}" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="on_sale" id="on_sale" {{ old('on_sale') ? 'checked' : '' }}>
            <label class="form-check-label" for="on_sale">على الخصم</label>
        </div>

        <div class="mb-3">
            <label class="form-label">صورة المنتج</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3 d-flex gap-2">
            <button type="submit" class="btn btn-success flex-fill">حفظ المنتج</button>
            <a href="{{ url('/') }}" class="btn btn-secondary flex-fill">العودة للصفحة الرئيسية</a>
        </div>

    </form>
</div>
</body>
</html>
