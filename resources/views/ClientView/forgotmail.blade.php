<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>{{ $data['title'] }}</h2>
    <p>{{ $data['body'] }}</p>
    <p>
        <a href="{{ $data['url'] }}" style="color:blue;">
            Click here to reset your password
        </a>
    </p>
    <p>If you did not request a password reset, ignore this mail.</p>
</body>
</html>
