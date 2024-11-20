<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formularz Kontaktowy</title>
</head>
<body>
<h1>Formularz Kontaktowy - Zgłoszenie</h1>
<p><strong>Imię:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Opis:</strong> {{ $data['message'] }}</p>
</body>
</html>
