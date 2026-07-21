<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nouveau message | Portfolio Narcisse</title>
</head>
<body style="margin:0; padding:0; background-color:#eef1f4; font-family:'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color:#2c2c2c; -webkit-text-size-adjust:100%;">
	<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#eef1f4; padding:32px 12px;">
		<tr>
			<td align="center">
				<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:560px; background-color:#ffffff; border-radius:14px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.08);">
					{{-- Header --}}
					<tr>
						<td style="background:linear-gradient(135deg, #52a6c4 0%, #3d8fad 100%); padding:28px 28px 24px;">
							<p style="margin:0 0 6px; font-size:12px; letter-spacing:0.12em; text-transform:uppercase; color:rgba(255,255,255,0.85); font-weight:600;">
								Portfolio Narcisse
							</p>
							<h1 style="margin:0; font-size:22px; line-height:1.3; color:#ffffff; font-weight:700;">
								Nouveau message reçu
							</h1>
							<p style="margin:10px 0 0; font-size:14px; color:rgba(255,255,255,0.9);">
								Quelqu’un vient de vous écrire via le formulaire de contact.
							</p>
						</td>
					</tr>

					{{-- Meta --}}
					<tr>
						<td style="padding:28px 28px 8px;">
							<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e8ecef; border-radius:10px; background:#f8fafb;">
								<tr>
									<td style="padding:14px 16px; border-bottom:1px solid #e8ecef;">
										<p style="margin:0 0 4px; font-size:11px; letter-spacing:0.06em; text-transform:uppercase; color:#52a6c4; font-weight:700;">Nom</p>
										<p style="margin:0; font-size:15px; color:#1a1a1a; font-weight:600;">{{ $name }}</p>
									</td>
								</tr>
								<tr>
									<td style="padding:14px 16px; border-bottom:1px solid #e8ecef;">
										<p style="margin:0 0 4px; font-size:11px; letter-spacing:0.06em; text-transform:uppercase; color:#52a6c4; font-weight:700;">Email</p>
										<p style="margin:0; font-size:15px;">
											<a href="mailto:{{ $email }}" style="color:#1a1a1a; font-weight:600; text-decoration:none;">{{ $email }}</a>
										</p>
									</td>
								</tr>
								<tr>
									<td style="padding:14px 16px;">
										<p style="margin:0 0 4px; font-size:11px; letter-spacing:0.06em; text-transform:uppercase; color:#52a6c4; font-weight:700;">Sujet</p>
										<p style="margin:0; font-size:15px; color:#1a1a1a; font-weight:600;">{{ $subject }}</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					{{-- Message --}}
					<tr>
						<td style="padding:20px 28px 8px;">
							<p style="margin:0 0 10px; font-size:11px; letter-spacing:0.06em; text-transform:uppercase; color:#52a6c4; font-weight:700;">Message</p>
							<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td style="padding:16px 18px; background:#f4f8fa; border-left:4px solid #52a6c4; border-radius:0 10px 10px 0;">
										<p style="margin:0; font-size:15px; line-height:1.7; color:#333333; white-space:pre-wrap;">{{ $messageContent }}</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					{{-- CTA --}}
					<tr>
						<td style="padding:24px 28px 8px;" align="center">
							<a href="mailto:{{ $email }}?subject=Re:%20{{ rawurlencode($subject) }}"
							   style="display:inline-block; padding:12px 22px; background-color:#52a6c4; color:#ffffff; text-decoration:none; font-size:14px; font-weight:700; border-radius:8px;">
								Répondre à {{ $name }}
							</a>
						</td>
					</tr>

					{{-- Footer --}}
					<tr>
						<td style="padding:24px 28px 28px;">
							<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tr>
									<td style="border-top:1px solid #e8ecef; padding-top:16px;">
										<p style="margin:0; font-size:12px; color:#888888; text-align:center;">
											Reçu le {{ now()->timezone(config('app.timezone'))->format('d/m/Y à H:i') }}
										</p>
										<p style="margin:6px 0 0; font-size:12px; color:#aaaaaa; text-align:center;">
											Message envoyé depuis ton portfolio Narcisse.
										</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
