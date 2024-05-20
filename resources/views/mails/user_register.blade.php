<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        p {
            font-size: 12px;
        }

        .signature {
            font-style: italic;
        }
    </style>
</head>
<body>
<div>
  
    <p>Merhaba {{$user->fullname}}, Kaydınız başarıyla oluşturuldu. 😉 </p>
    <p>Kaydınızı aktileştirmek için <a href="{{config('app.url')}}/user/activate/{{$user->activation_code}}">tıklayın</a></p>
    <p class="signature">Mailtrap</p>
</div>
</body>
</html>