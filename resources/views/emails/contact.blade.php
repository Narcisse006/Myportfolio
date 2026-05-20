<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Nouveau message — Portfolio</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2 style="color: #52a6c4;">Nouveau message depuis le portfolio</h2>

    <p><strong>Nom :</strong> {{ $name }}</p>
    <p><strong>Email :</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
    <p><strong>Sujet :</strong> {{ $subject }}</p>
    <p><strong>Message :</strong></p>
    <p style="white-space: pre-wrap; background: #f5f5f5; padding: 12px; border-radius: 4px;">{{ $messageContent }}</p>

    <hr>
    <p style="font-size: 12px; color: #666;">Reçu le {{ now()->format('d/m/Y à H:i') }}</p>
</body>
</html>
