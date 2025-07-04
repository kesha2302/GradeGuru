<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GradeGuru</title>
</head>

<body>
    <p>Dear {{ $booking->fullname }},</p>
    <p>Thank you for purchasing a plan with GradeGuru. Your payment ID is <strong>{{ $booking->payment_id }}</strong>.</p>
    <p>If you experience any issues, please feel free to contact us.</p>
    <img src="{{ $message->embed(public_path('ClientView/img/guru.png')) }}" alt="GradeGuru"
        style="max-width: 150px;">
</body>

</html>
