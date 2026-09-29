@php
	$siteName = 'Narcisse OGOUDIKPE';
	$pageTitle = $seoTitle ?? $siteName;
	$pageDescription = $seoDescription ?? 'Portfolio de Narcisse OGOUDIKPE, développeur Laravel junior. Applications web métier, API REST, projets et collaborations.';
	$canonical = $seoCanonical ?? url()->current();
	$ogImage = $seoImage ?? asset('images/Moi2.jpg');
	$ogType = $seoType ?? 'website';
@endphp

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="author" content="Narcisse OGOUDIKPE">
<meta name="google-site-verification" content="TL-3KRW7hnVXSn5JWTUtonUuqAKRrc3kXecTySGnRpc">
<meta name="robots" content="index, follow, max-image-preview:large">
<link rel="canonical" href="{{ $canonical }}">

<meta property="og:type" content="{{ $ogType }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:locale" content="fr_FR">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $ogImage }}">

<script type="application/ld+json">
{!! json_encode([
	'@context' => 'https://schema.org',
	'@type' => 'Person',
	'name' => 'Narcisse OGOUDIKPE',
	'url' => url('/'),
	'image' => asset('images/Moi2.jpg'),
	'jobTitle' => 'Développeur Laravel',
	'description' => 'Développeur Laravel junior : applications web métier, API REST, sécurité et bases de données.',
	'email' => 'mailto:ogoudikpenarcisse@gmail.com',
	'address' => [
		'@type' => 'PostalAddress',
		'addressLocality' => 'Porto-Novo',
		'addressCountry' => 'BJ',
	],
	'sameAs' => [
		'https://github.com/Narcisse006',
		'https://www.linkedin.com/in/narcisse-ogoudikpe-831bb8344/',
		'https://web.facebook.com/profile.php?id=100094312132255',
	],
	'knowsAbout' => ['Laravel', 'PHP', 'API REST', 'MySQL', 'Bootstrap'],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
