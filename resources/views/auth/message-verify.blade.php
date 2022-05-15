<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Tokyo">
  <meta name="keywords" content="pharmacy online">
  <meta name="description" content="pharmacy online">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Tajawal', sans-serif;">
  <div style=" width: 100%; display: flex; justify-content: center; align-items: center; margin-top: 30px;height: 300px; background-image: url('https://i.ibb.co/Bzv2hnJ/message.png'); background-repeat: no-repeat; background-position: left; background-size: 30%">
      <div>
        <h1 style="color: #3869BA; font-size: 30px"> مرحباً بك
          <span style="color: #588FF4">
            @if(isset(Auth::user()->name)) {{ Auth::user()->name }} @endif
          </span>
          في صيدلية أونلاين</h1>
        <p style="margin-bottom: 20px"> نحن سعداء بإنظمامك لنا تبقى خطوة
          لاكمال عملية التسجيل يرجى الضغط على الرابط التالي لتفعيل حسابك </p>
        <a style="background: #3869BA; padding: 10px 20px; border-radius: 8px; color: #fff2f2; text-decoration: none" href="{{ $url }}">اضغط هنا لتفعيل حسابك</a>

      </div>
{{--    <img src="https://i.ibb.co/Bzv2hnJ/message.png" style="po" alt="message" border="0" />--}}
  </div>
</body>
</html>
