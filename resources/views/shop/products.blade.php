<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>المنتجات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>المنتجات</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('products.create') }}" class="btn btn-primary">إنشاء منتج جديد</a>
            <a href="{{ url('/') }}" class="btn btn-secondary">العودة للصفحة الرئيسية</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4">
                <div class="card mb-3 h-100">
                   
 @if($product->image)
    <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
@endif


                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text"><strong>السعر:</strong> {{ $product->price }} USD</p>
                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">عرض</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-secondary btn-sm">تعديل</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">لا توجد منتجات حتى الآن.</div>
            </div>
        @endforelse
    </div>
</div>
</body>
</html>
