<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>نموذج الاتصال</title>
<style>
    body {
        font-family: Tahoma, sans-serif;
        background-color: #f2f5f7;
        padding: 30px;
    }
    .container {
        max-width: 600px;
        background: #fff;
        padding: 40px 30px;
        margin: 50px auto;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
        color: #333;
    }
    input, textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        margin-top: 5px;
        margin-bottom: 10px;
        transition: 0.3s;
    }
    input:focus, textarea:focus {
        border-color: #3498db;
        outline: none;
    }
    .btn-group {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }
    button, .btn-home {
        flex: 1;
        padding: 12px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
        text-align: center;
        text-decoration: none;
    }
    button {
        background-color: #28a745;
        color: #fff;
    }
    button:hover {
        background-color: #218838;
    }
    .btn-home {
        background-color: #6c757d;
        color: #fff;
        display: inline-block;
    }
    .btn-home:hover {
        background-color: #5a6268;
    }
    .error {
        color: #dc3545;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .success {
        color: #28a745;
        font-size: 16px;
        text-align: center;
        margin-bottom: 20px;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container">
    <h2>نموذج الاتصال</h2>

    <div id="successMsg" class="success" style="display:none;"></div>

    <form id="contactForm" novalidate>
        <label for="name">الاسم</label>
        <input type="text" id="name" name="name" placeholder="أدخل اسمك">
        <div class="error" id="nameError"></div>

        <label for="email">البريد الإلكتروني</label>
        <input type="text" id="email" name="email" placeholder="example@mail.com">
        <div class="error" id="emailError"></div>

        <label for="message">الرسالة</label>
        <textarea id="message" name="message" rows="5" placeholder="اكتب رسالتك هنا..."></textarea>
        <div class="error" id="messageError"></div>

        <div class="btn-group">
            <button type="submit">إرسال الرسالة</button>
            <a href="{{ url('/') }}" class="btn-home">العودة للصفحة الرئيسية</a>
        </div>
    </form>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    document.getElementById('nameError').textContent = "";
    document.getElementById('emailError').textContent = "";
    document.getElementById('messageError').textContent = "";
    document.getElementById('successMsg').style.display = "none";

    let valid = true;

    const name = document.getElementById('name').value.trim();
    if(name.length < 3){
        document.getElementById('nameError').textContent = "⚠️ الاسم يجب أن يكون 3 أحرف على الأقل";
        valid = false;
    }

    const email = document.getElementById('email').value.trim();
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,}$/i;
    if(!emailPattern.test(email)){
        document.getElementById('emailError').textContent = "⚠️ الرجاء إدخال بريد إلكتروني صحيح";
        valid = false;
    }

    const message = document.getElementById('message').value.trim();
    if(message.length === 0){
        document.getElementById('messageError').textContent = "⚠️ الرسالة مطلوبة";
        valid = false;
    } else if(message.length > 500){
        document.getElementById('messageError').textContent = "⚠️ الرسالة لا يجب أن تتجاوز 500 حرف";
        valid = false;
    }

    if(valid){
        fetch("{{ route('contact.submit') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ name, email, message })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                document.getElementById('successMsg').textContent = data.message;
                document.getElementById('successMsg').style.display = "block";
                document.getElementById('contactForm').reset();
            }
        })
        .catch(err => {
            console.error(err);
            alert("حدث خطأ أثناء إرسال الرسالة، حاول مرة أخرى.");
        });
    }
});
</script>

</body>
</html>
