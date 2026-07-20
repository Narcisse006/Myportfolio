@php
	$pageTitle = $pageTitle ?? 'Narcisse OGOUDIKPE — Développeur Laravel';
	$pageDescription = $pageDescription ?? 'Portfolio de Narcisse OGOUDIKPE, développeur Laravel junior à Porto-Novo. Applications web métier, API REST, projets et contact.';
	$pageUrl = $pageUrl ?? url()->current();
	$pageImage = $pageImage ?? asset('images/hero1.webp');
@endphp
<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<link rel="canonical" href="{{ $pageUrl }}">

<meta property="og:type" content="website">
<meta property="og:locale" content="fr_FR">
<meta property="og:site_name" content="Narcisse OGOUDIKPE">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $pageUrl }}">
<meta property="og:image" content="{{ $pageImage }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $pageImage }}">
