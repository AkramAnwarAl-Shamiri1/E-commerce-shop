<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الصفحة الرئيسية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner {
            background: url('https://source.unsplash.com/1200x400/?shop,online') center/cover no-repeat;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 1px 1px 4px #000;
        }
        .product-card img {
            height: 150px;
            object-fit: cover;
        }
        .offer-card {
            border: 2px solid #ff5e5e;
        }
    </style>
</head>
<body class="bg-light">

<!-- بانر ترحيبي -->
<div class="banner">
    <div class="text-center">
        <h1>مرحباً بك في متجرنا الإلكتروني</h1>
        <p>أفضل المنتجات بأفضل الأسعار</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">عرض المنتجات</a>
       <a href="{{ route('contact.form') }}" class="btn btn-success btn-lg">اتصل بنا</a>

    </div>
</div>

<div class="container py-5">
    <!-- أحدث المنتجات -->
    <h2 class="mb-4">أحدث المنتجات</h2>
    <div class="row">
        @foreach(\App\Models\Product::latest()->take(4)->get() as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    @if($product->image)
                           <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
@else

                        <img src="https://via.placeholder.com/300x150?text=No+Image" class="card-img-top" alt="لا توجد صورة">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 60) }}</p>
                        <p class="mt-auto fw-bold">السعر: ${{ $product->price }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary mt-2">عرض التفاصيل</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

   
   

</body>
</html>

