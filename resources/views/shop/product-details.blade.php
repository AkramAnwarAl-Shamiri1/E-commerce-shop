<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تفاصيل المنتج</title>
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
        h3 {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .btn-group a {
            flex: 1;
        }
        .card img {
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }
        .card-body p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
 
   

    <div class="card">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        @endif
        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p><strong>السعر:</strong> {{ $product->price }} USD</p>
            <p><strong>على الخصم:</strong> {{ $product->on_sale ? 'نعم' : 'لا' }}</p>
        </div>
    </div>
     
             <div class="btn-group">
        <a href="{{ route('products.index') }}" class="btn btn-primary">رجوع للقائمة</a>
        <a href="{{ url('/') }}" class="btn btn-secondary">الصفحة الرئيسية</a>
    </div>
</div>
</body>
</html>
