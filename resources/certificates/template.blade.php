<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat</title>
    <style>
        body { text-align: center; font-family: sans-serif; padding: 50px; }
        h1 { font-size: 40px; }
        p { font-size: 20px; }
    </style>
</head>
<body>
    <h1>SERTIFIKAT</h1>
    <p>Dengan ini menyatakan bahwa</p>
    <h2>{{ $user->name }}</h2>
    <p>Telah menyelesaikan kursus <strong>{{ $course->title }}</strong> dengan nilai <strong>{{ round($score) }}</strong></p>
    <p>Selamat!</p>
</body>
</html>
