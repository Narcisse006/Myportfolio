<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@include('partials.seo', [
		'seoTitle' => 'Narcisse OGOUDIKPE | Full-Stack Developer - Portfolio',
		'seoDescription' => 'Narcisse OGOUDIKPE, Full-Stack Developer à Porto-Novo. Applications web métier, API REST, Laravel, sécurité et collaborations. Portfolio et CV.',
		'seoCanonical' => url('/'),
	])
	@include('partials.favicon')

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Share+Tech+Mono&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://stackpath.bootstrapcdn.com">
	<link rel="preconnect" href="https://cdnjs.cloudflare.com">

	<link rel="preload" as="image" type="image/webp" href="{{ asset('images/hero/ironman-hero-832.webp') }}" imagesrcset="{{ asset('images/hero/ironman-hero-480.webp') }} 480w, {{ asset('images/hero/ironman-hero-832.webp') }} 832w" imagesizes="(max-width: 768px) 55vw, (max-width: 1024px) 70vw, min(42vw, 520px)" fetchpriority="high">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}?v=26">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	@include('partials.custom-cursor')

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target site-nav" id="ftco-navbar">
		<div class="container site-nav__inner">
			<a class="navbar-brand site-nav__brand" href="#home-section">Narcisse<span class="site-nav__dot">.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle site-nav__toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Ouvrir le menu">
				<span class="site-nav__burger" aria-hidden="true"><span></span><span></span><span></span></span>
			</button>

			<div class="collapse navbar-collapse site-nav__collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto site-nav__list">
					<li class="nav-item"><a href="#home-section" class="nav-link site-nav__link"><span data-i18n="nav.home">Accueil</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link site-nav__link"><span data-i18n="nav.about">À propos</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link site-nav__link"><span data-i18n="nav.projects">Projets</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link site-nav__link"><span data-i18n="nav.contact">Contact</span></a></li>
					<li class="nav-item nav-item-lang">
						<a href="#" id="lang-toggle" class="nav-link lang-toggle site-nav__lang" title="English" aria-label="Changer de langue">
							<span class="lang-toggle-label">EN</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section id="home-section" class="hero-hud" data-page-title="Accueil">
		{{-- Calque 0 : fond grille + radar + lignes techniques --}}
		<div class="hud-bg" aria-hidden="true">
			<div class="hud-grid"></div>
			<div class="hud-radar"></div>
			<div class="hud-lines">
				<span class="hud-line hud-line--h hud-line--h1"></span>
				<span class="hud-line hud-line--h hud-line--h2"></span>
				<span class="hud-line hud-line--v hud-line--v1"></span>
				<span class="hud-line hud-line--v hud-line--v2"></span>
			</div>
		</div>

		{{-- Calque 1 : anneaux (inclinaison 3D sur le parent, rotation sur les enfants) --}}
		<div class="hud-stage" aria-hidden="true">
			<div class="hud-ring hud-ring--outer">
				<svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" focusable="false">
					<circle cx="200" cy="200" r="188" fill="none" stroke="currentColor" stroke-width="1" stroke-dasharray="2 6" opacity="0.45"/>
					<circle cx="200" cy="200" r="176" fill="none" stroke="currentColor" stroke-width="0.6" opacity="0.3"/>
					{{-- Marqueurs cardinaux --}}
					<line x1="200" y1="8" x2="200" y2="22" stroke="currentColor" stroke-width="1.5"/>
					<line x1="200" y1="378" x2="200" y2="392" stroke="currentColor" stroke-width="1.5"/>
					<line x1="8" y1="200" x2="22" y2="200" stroke="currentColor" stroke-width="1.5"/>
					<line x1="378" y1="200" x2="392" y2="200" stroke="currentColor" stroke-width="1.5"/>
					<text x="200" y="36" text-anchor="middle" fill="currentColor" font-size="10" font-family="monospace" opacity="0.7">0°</text>
					<text x="364" y="204" text-anchor="middle" fill="currentColor" font-size="9" font-family="monospace" opacity="0.55">90°</text>
					<text x="200" y="372" text-anchor="middle" fill="currentColor" font-size="9" font-family="monospace" opacity="0.55">180°</text>
					<text x="36" y="204" text-anchor="middle" fill="currentColor" font-size="9" font-family="monospace" opacity="0.55">270°</text>
				</svg>
			</div>
			<div class="hud-ring hud-ring--inner">
				<svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" focusable="false">
					<circle cx="200" cy="200" r="142" fill="none" stroke="currentColor" stroke-width="1" stroke-dasharray="8 4 2 4" opacity="0.5"/>
					<circle cx="200" cy="200" r="130" fill="none" stroke="currentColor" stroke-width="0.5" opacity="0.25"/>
					{{-- Petits ticks --}}
					<line x1="200" y1="54" x2="200" y2="64" stroke="currentColor" stroke-width="1.2"/>
					<line x1="200" y1="336" x2="200" y2="346" stroke="currentColor" stroke-width="1.2"/>
					<line x1="54" y1="200" x2="64" y2="200" stroke="currentColor" stroke-width="1.2"/>
					<line x1="336" y1="200" x2="346" y2="200" stroke="currentColor" stroke-width="1.2"/>
					<circle cx="200" cy="58" r="2.5" fill="currentColor" opacity="0.7"/>
					<circle cx="342" cy="200" r="2.5" fill="currentColor" opacity="0.7"/>
				</svg>
			</div>
		</div>

		{{-- Calque 2 : particules (dessinées en JS) --}}
		<canvas class="hud-particles" aria-hidden="true"></canvas>

		{{-- Calque 2b : slogan watermark (derrière Iron Man, explique la métaphore) --}}
		<p class="hud-watermark" aria-hidden="true" data-i18n="hero.watermark">
			ENGINEERING · PRECISION · SYSTEMS
		</p>

		{{-- Calque 3 : Iron Man + lueur arc reactor --}}
		<figure class="hud-figure">
			<picture>
				<source
					type="image/webp"
					srcset="{{ asset('images/hero/ironman-hero-480.webp') }} 480w, {{ asset('images/hero/ironman-hero-832.webp') }} 832w"
					sizes="(max-width: 768px) 55vw, (max-width: 1024px) 70vw, min(42vw, 520px)"
				>
				<img
					src="{{ asset('images/hero/ironman-hero.png') }}"
					alt="Iron Man — armure Mark, symbole de précision et d'ingénierie"
					class="hud-img"
					width="832"
					height="1248"
					fetchpriority="high"
					decoding="async"
				>
			</picture>
			<span class="hud-reactor" aria-hidden="true"></span>
		</figure>

		{{-- Calque 4 : panneaux de données (décoratifs, anglais fixe) --}}
		<ul class="hud-panels" aria-hidden="true">
			<li class="hud-panel hud-panel--1" style="--depth: 0.6">
				<span class="hud-panel-label">STATUS</span>
				<span class="hud-panel-value">AVAILABLE</span>
			</li>
			<li class="hud-panel hud-panel--2" style="--depth: 0.9">
				<span class="hud-panel-label">POWER</span>
				<span class="hud-panel-value">100%</span>
			</li>
			<li class="hud-panel hud-panel--3" style="--depth: 0.5">
				<span class="hud-panel-label">AI</span>
				<span class="hud-panel-value">JARVIS ACTIVE</span>
			</li>
			<li class="hud-panel hud-panel--4" style="--depth: 0.75">
				<span class="hud-panel-label">ID</span>
				<span class="hud-panel-value">NARCISSE OGOUDIKPE — CONFIRMED</span>
			</li>
		</ul>

		<aside class="hud-mission" aria-hidden="true">
			<span class="hud-panel-label" data-i18n="hero.missionLabel">MISSION</span>
			<span class="hud-panel-value" data-i18n="hero.mission">SHIP CLEAN SYSTEMS</span>
		</aside>

		{{-- Calque 10 : identité + CTA (toujours devant) --}}
		<div class="hud-identity">
			<h1 class="hud-name">NARCISSE OGOUDIKPE</h1>
			<p class="hud-title" data-i18n="hero.title">FULL-STACK DEVELOPER</p>
			<p class="hud-stack" data-i18n="hero.stack">Laravel · PHP · MySQL · Git</p>
			<div class="hud-actions">
				<a href="#projects-section" class="hud-btn hud-btn--primary" data-i18n="pro.cv">Voir mes projets</a>
				<a href="#contact-section" class="hud-btn hud-btn--ghost" data-i18n="about.contact">Me contacter</a>
			</div>
		</div>

		<a href="#about-section" class="hud-scroll" aria-label="Continuer vers À propos">
			<span class="hud-scroll__code" aria-hidden="true">01</span>
			<span class="hud-scroll__label" data-i18n="hero.scroll">ENGAGE</span>
			<span class="hud-scroll__chevron" aria-hidden="true"></span>
		</a>
	</section>

	<section class="about-section shell-about" id="about-section" data-page-title="À propos">
		@include('partials.shell-surface-icons')
		<div class="container">
			<header class="shell-about__header">
				<p class="shell-readout" aria-hidden="true">
					<span class="shell-readout__code">01</span>
					<span class="shell-readout__sep">·</span>
					<span class="shell-readout__key">STATUS</span>
					<span class="shell-readout__value">AVAILABLE</span>
				</p>
				<span class="shell-about__eyebrow" data-i18n="about.profile">À propos</span>
				<h2 class="shell-about__heading" data-i18n="about.heading">Qui je suis</h2>
				<p class="shell-about__lead" data-i18n="about.lead">
					Full-Stack Developer : backends clairs, applications métier et livraison jusqu’en production.
				</p>
			</header>

			<div class="shell-about__intro">
				<div class="shell-about__copy">
					<span class="shell-about__hello" data-i18n="about.hello">Bonjour</span>
					<p class="shell-about__badge">
						<span class="shell-about__badge-dot" aria-hidden="true"></span>
						<span data-i18n="pro.available">Disponible pour missions & collaborations</span>
					</p>
					<h3 class="shell-about__name">Narcisse OGOUDIKPE</h3>
					<p class="shell-about__role" data-i18n-html="about.roleLine">
						FULL-STACK DEVELOPER <br>
						<span class="shell-profile__location">Disponible · remote ou présentiel</span>
					</p>
					<p class="shell-about__text" data-i18n="about.intro1">
						Formé chez Simplon, j’ai construit des applications concrètes :
						gestion de stock, suivi de colis, forum. Mon fil rouge, c’est le backend Laravel.
					</p>
					<p class="shell-about__text" data-i18n="about.intro2">
						Ce qui m’intéresse : comprendre le besoin, structurer la base de données,
						et livrer une interface claire jusqu’au déploiement.
					</p>
					<div class="shell-about__actions">
						<a href="#projects-section" class="shell-btn shell-btn--primary" data-i18n="pro.cv">Voir mes projets</a>
						<a href="{{ route('cv') }}" class="shell-btn shell-btn--ghost" data-i18n="about.download">Voir mon CV</a>
					</div>
				</div>

				<figure class="shell-about__media mb-0">
					<span class="shell-about__corners" aria-hidden="true"></span>
					<picture>
						<source srcset="{{ asset('images/profile/moi2.webp') }}" type="image/webp">
						<img
							src="{{ asset('images/profile/moi2.jpg') }}"
							alt="Narcisse OGOUDIKPE"
							class="shell-about__img"
							width="400"
							height="520"
							loading="lazy"
							decoding="async"
						>
					</picture>
				</figure>
			</div>

			<div class="shell-about__cards">
				<article class="shell-about__card">
					<span class="shell-about__card-num" aria-hidden="true">01</span>
					<h3 class="shell-about__card-title" data-i18n="highlights.card1.title">Backend Laravel</h3>
					<p class="shell-about__card-text" data-i18n="highlights.card1.desc">Architecture MVC, routes REST, logique métier structurée et code maintenable.</p>
				</article>
				<article class="shell-about__card">
					<span class="shell-about__card-num" aria-hidden="true">02</span>
					<h3 class="shell-about__card-title" data-i18n="highlights.card2.title">Sécurité & rôles</h3>
					<p class="shell-about__card-text" data-i18n="highlights.card2.desc">Authentification, middleware, permissions et validation des données côté serveur.</p>
				</article>
				<article class="shell-about__card">
					<span class="shell-about__card-num" aria-hidden="true">03</span>
					<h3 class="shell-about__card-title" data-i18n="highlights.card3.title">Données fiables</h3>
					<p class="shell-about__card-text" data-i18n="highlights.card3.desc">Modélisation MySQL, migrations, relations Eloquent et requêtes optimisées.</p>
				</article>
				<article class="shell-about__card">
					<span class="shell-about__card-num" aria-hidden="true">04</span>
					<h3 class="shell-about__card-title" data-i18n="highlights.card4.title">Mise en ligne</h3>
					<p class="shell-about__card-text" data-i18n="highlights.card4.desc">Versioning Git, tests manuels, déploiement et suivi après livraison.</p>
				</article>
			</div>
		</div>
	</section>

	<section class="shell-projects" id="projects-section" data-page-title="Projets">
		@include('partials.shell-surface-icons')
		<div class="container">
			<header class="shell-projects__header">
				<p class="shell-readout" aria-hidden="true">
					<span class="shell-readout__code">02</span>
					<span class="shell-readout__sep">·</span>
					<span class="shell-readout__key">TARGET</span>
					<span class="shell-readout__value">PROJECTS</span>
				</p>
				<span class="shell-projects__eyebrow" data-i18n="projects.subheading">Réalisations</span>
				<h2 class="shell-projects__heading" data-i18n="projects.heading">Projets sélectionnés</h2>
				<p class="shell-projects__lead" data-i18n="projects.paragraph">
					Surtout des applications Laravel métier. Le code est disponible sur GitHub.
				</p>
			</header>

			<div class="shell-projects__grid">
				@forelse ($projects as $project)
				<article class="shell-project">
					<div class="shell-project__media" @if ($project->image_url) style="background-image: url('{{ $project->image_url }}');" @endif>
						<span class="shell-project__media-overlay" aria-hidden="true"></span>
					</div>
					<div class="shell-project__body">
						<span class="shell-project__cat">{{ $project->tech_stack[0] ?? 'Projet' }}</span>
						<h3 class="shell-project__title">{{ $project->title }}</h3>
						<p class="shell-project__desc">{{ $project->description }}</p>
						@if (!empty($project->tech_stack))
						<div class="shell-project__tags">
							@foreach ($project->tech_stack as $tech)
							<span class="shell-project__tag">{{ $tech }}</span>
							@endforeach
						</div>
						@endif
						<div class="shell-project__actions">
							@if ($project->url)
							<a href="{{ $project->url }}" target="_blank" rel="noopener" class="shell-project__link">
								<span data-i18n="projects.view">Voir le projet</span>
								<i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
							@endif
							@if ($project->github_url)
							<a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="shell-project__link shell-project__link--ghost">
								<i class="fab fa-github" aria-hidden="true"></i>
								<span data-i18n="projects.github">GitHub</span>
							</a>
							@endif
						</div>
					</div>
				</article>
				@empty
				<p class="shell-projects__empty mb-0">Aucun projet publié pour le moment.</p>
				@endforelse
			</div>

			@if ($projects->isNotEmpty())
			<div class="shell-projects__more">
				<a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener" class="shell-btn shell-btn--ghost">
					<i class="fab fa-github" aria-hidden="true"></i>
					<span data-i18n="projects.more">Tous mes projets sur GitHub</span>
				</a>
			</div>
			@endif
		</div>
	</section>

	<section class="shell-case" id="case-study-section" data-page-title="Étude de cas">
		@include('partials.shell-surface-icons')
		<div class="container">
			<header class="shell-case__header">
				<p class="shell-readout" aria-hidden="true">
					<span class="shell-readout__code">03</span>
					<span class="shell-readout__sep">·</span>
					<span class="shell-readout__key">ANALYSIS</span>
					<span class="shell-readout__value">CASE</span>
				</p>
				<span class="shell-case__eyebrow" data-i18n="casestudy.subheading">Étude de cas</span>
				<h2 class="shell-case__heading" data-i18n="casestudy.heading">Gestion de stock</h2>
				<p class="shell-case__lead" data-i18n="casestudy.intro">
					Comment j’ai conçu une application métier Laravel pour suivre les produits,
					enregistrer les ventes et sécuriser l’accès admin.
				</p>
			</header>

			<div class="shell-case__layout">
				<div
					class="shell-case__visual"
					style="background-image: url({{ asset('images/stock.jpg') }});"
					role="img"
					aria-label="Aperçu du projet Gestion de stock"
				>
					<span class="shell-case__corners" aria-hidden="true"></span>
				</div>

				<div class="shell-case__panel">
					<div class="shell-case__tags">
						<span class="shell-case__tag">Laravel</span>
						<span class="shell-case__tag">MySQL</span>
						<span class="shell-case__tag">Bootstrap</span>
						<span class="shell-case__tag">Eloquent</span>
					</div>

					<div class="shell-case__block">
						<h3 class="shell-case__label" data-i18n="casestudy.problemLabel">Contexte</h3>
						<p class="shell-case__text" data-i18n="casestudy.problem">
							Remplacer un suivi manuel peu fiable par un outil simple : catalogue produits,
							caisse, et stock toujours à jour après chaque vente.
						</p>
					</div>

					<div class="shell-case__block">
						<h3 class="shell-case__label" data-i18n="casestudy.solutionLabel">Ce que j’ai livré</h3>
						<ul class="shell-case__list">
							<li data-i18n="casestudy.item1">CRUD produits / catégories avec validation serveur</li>
							<li data-i18n="casestudy.item2">Caisse et décrément automatique du stock</li>
							<li data-i18n="casestudy.item3">Authentification et espace administrateur</li>
							<li data-i18n="casestudy.item4">Schéma MySQL relationnel via migrations Eloquent</li>
						</ul>
					</div>

					<div class="shell-case__actions">
						<a href="https://github.com/Narcisse006/ProjetGestionDeStock" target="_blank" rel="noopener" class="shell-btn shell-btn--primary">
							<i class="fab fa-github" aria-hidden="true"></i>
							<span data-i18n="casestudy.cta">Voir le code sur GitHub</span>
						</a>
						<a href="#projects-section" class="shell-btn shell-btn--ghost" data-i18n="casestudy.back">
							Voir les autres projets
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	
	<section class="skills-section shell-skills" id="skills-section" data-page-title="Compétences">
		@include('partials.shell-surface-icons')
		<div class="container">
			<header class="shell-skills__header">
				<p class="shell-readout" aria-hidden="true">
					<span class="shell-readout__code">04</span>
					<span class="shell-readout__sep">·</span>
					<span class="shell-readout__key">STACK</span>
					<span class="shell-readout__value">SYSTEMS</span>
				</p>
				<span class="shell-skills__eyebrow" data-i18n="skills.subheading">Compétences</span>
				<h2 class="shell-skills__heading" data-i18n="skills.heading">Ma stack technique</h2>
				<p class="shell-skills__lead" data-i18n="skills.paragraph">
					Le cœur de mon travail, c’est le backend Laravel.
					Le reste sert à livrer une interface claire et un projet propre jusqu’en production.
				</p>
			</header>
		</div>

		{{-- Marquee infini : 1 groupe unique par rangée, cloné en JS jusqu’à couvrir > 2 viewports --}}
		<div class="skills-marquee" aria-label="Stack technique">
			<div class="skills-marquee__row skills-marquee__row--left">
				<p class="skills-marquee__label">
					<span data-i18n="skills.card1.title">Backend</span>
					<span aria-hidden="true"> · </span>
					<span data-i18n="skills.card3.title">Outils</span>
				</p>
				<div class="skills-marquee__viewport">
					<div class="skills-marquee__track" data-marquee-dir="left">
						<ul class="skills-marquee__group">
							<li class="skill-tile"><i class="fa-brands fa-php" aria-hidden="true"></i><span>PHP</span></li>
							<li class="skill-tile"><i class="fa-brands fa-laravel" aria-hidden="true"></i><span>Laravel</span></li>
							<li class="skill-tile"><i class="fa-solid fa-plug" aria-hidden="true"></i><span>API REST</span></li>
							<li class="skill-tile"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i><span>Auth & Middleware</span></li>
							<li class="skill-tile"><i class="fa-solid fa-user-shield" aria-hidden="true"></i><span>Gestion de rôles</span></li>
							<li class="skill-tile"><i class="fa-solid fa-sitemap" aria-hidden="true"></i><span>Architecture MVC</span></li>
							<li class="skill-tile"><i class="fa-solid fa-database" aria-hidden="true"></i><span>MySQL</span></li>
							<li class="skill-tile"><i class="fa-solid fa-lock" aria-hidden="true"></i><span>Sécurité</span></li>
							<li class="skill-tile"><i class="fa-brands fa-python" aria-hidden="true"></i><span>Python</span></li>
							<li class="skill-tile"><i class="fa-brands fa-git-alt" aria-hidden="true"></i><span>Git & GitHub</span></li>
							<li class="skill-tile"><i class="fa-solid fa-flask" aria-hidden="true"></i><span>Postman</span></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="skills-marquee__row skills-marquee__row--right">
				<p class="skills-marquee__label">
					<span data-i18n="skills.card2.title">Front & UI</span>
					<span aria-hidden="true"> · </span>
					<span data-i18n="skills.card3.title">Outils</span>
				</p>
				<div class="skills-marquee__viewport">
					<div class="skills-marquee__track" data-marquee-dir="right">
						<ul class="skills-marquee__group">
							<li class="skill-tile"><i class="fa-brands fa-html5" aria-hidden="true"></i><span>HTML5 / CSS3</span></li>
							<li class="skill-tile"><i class="fa-brands fa-bootstrap" aria-hidden="true"></i><span>Bootstrap</span></li>
							<li class="skill-tile"><i class="fa-solid fa-mobile-screen" aria-hidden="true"></i><span>Responsive</span></li>
							<li class="skill-tile"><i class="fa-solid fa-code" aria-hidden="true"></i><span>Blade</span></li>
							<li class="skill-tile"><i class="fa-brands fa-figma" aria-hidden="true"></i><span>Figma</span></li>
							<li class="skill-tile"><i class="fa-brands fa-wordpress" aria-hidden="true"></i><span>WordPress</span></li>
							<li class="skill-tile"><i class="fa-solid fa-mobile" aria-hidden="true"></i><span>Flutter</span></li>
							<li class="skill-tile"><i class="fa-solid fa-cloud-arrow-up" aria-hidden="true"></i><span>Déploiement</span></li>
							<li class="skill-tile"><i class="fa-brands fa-linux" aria-hidden="true"></i><span>Linux</span></li>
							<li class="skill-tile"><i class="fa-solid fa-fire" aria-hidden="true"></i><span>Firebase</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	

	<section class="shell-contact contact-section" id="contact-section" data-page-title="Contact">
		@include('partials.shell-surface-icons')
		<div class="container">
			<header class="shell-contact__header">
				<p class="shell-readout" aria-hidden="true">
					<span class="shell-readout__code">05</span>
					<span class="shell-readout__sep">·</span>
					<span class="shell-readout__key">UPLINK</span>
					<span class="shell-readout__value">CONTACT</span>
				</p>
				<span class="shell-contact__eyebrow" data-i18n="contact.subheading">Contact</span>
				<h2 class="shell-contact__heading" data-i18n="contact.heading">Parlons de votre projet</h2>
				<p class="shell-contact__lead" data-i18n="contact.paragraph">
					Mission, collaboration ou simple question : écrivez-moi via le formulaire
					ou contactez-moi directement sur WhatsApp.
				</p>
			</header>

			<div id="contact-feedback" class="contact-feedback">
				@if(session('success'))
				<div class="alert alert-success contact-alert d-flex align-items-start justify-content-between" role="status" data-contact-flash="success" data-contact-message="{{ e(session('success')) }}">
					<span class="contact-alert-text"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i>{{ session('success') }}</span>
					<button type="button" class="contact-alert-close" aria-label="Fermer" data-dismiss-contact-alert>&times;</button>
				</div>
				@endif

				@if(session('error'))
				<div class="alert alert-danger contact-alert d-flex align-items-start justify-content-between" role="alert" data-contact-flash="error">
					<span class="contact-alert-text"><i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>{{ session('error') }}</span>
					<button type="button" class="contact-alert-close" aria-label="Fermer" data-dismiss-contact-alert>&times;</button>
				</div>
				@endif

				@if($errors->any())
				<div class="alert alert-warning contact-alert d-flex align-items-start justify-content-between" role="alert">
					<span class="contact-alert-text"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i><strong>Le formulaire contient des erreurs.</strong> Corrigez les champs indiqués ci-dessous.</span>
					<button type="button" class="contact-alert-close" aria-label="Fermer" data-dismiss-contact-alert>&times;</button>
				</div>
				@endif
			</div>

			<div class="shell-contact__layout">
				<aside class="shell-contact__aside">
					<h3 class="shell-contact__aside-title" data-i18n="contact.sidebar.title">Coordonnées</h3>

					<ul class="shell-contact__info">
						<li>
							<span class="shell-contact__info-icon" aria-hidden="true"><i class="fa fa-map-marker"></i></span>
							<div>
								<span class="shell-contact__info-label" data-i18n="contact.sidebar.location">Zone</span>
								<p data-i18n="contact.sidebar.locationValue">Afrique de l’Ouest · Remote</p>
							</div>
						</li>
						<li>
							<span class="shell-contact__info-icon" aria-hidden="true"><i class="fa fa-envelope"></i></span>
							<div>
								<span class="shell-contact__info-label" data-i18n="contact.sidebar.email">Email</span>
								<p><a href="mailto:{{ config('portfolio.email') }}">{{ config('portfolio.email') }}</a></p>
							</div>
						</li>
						<li>
							<span class="shell-contact__info-icon" aria-hidden="true"><i class="fa fa-phone"></i></span>
							<div>
								<span class="shell-contact__info-label" data-i18n="contact.sidebar.phone">Téléphone</span>
								<p><a href="tel:{{ config('portfolio.phone_bj.tel') }}">{{ config('portfolio.phone_bj.display') }}</a></p>
							</div>
						</li>
						<li>
							<span class="shell-contact__info-icon" aria-hidden="true"><i class="fab fa-github"></i></span>
							<div>
								<span class="shell-contact__info-label" data-i18n="contact.sidebar.github">GitHub</span>
								<p><a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener">Narcisse006</a></p>
							</div>
						</li>
					</ul>

					<div class="shell-contact__aside-foot">
						<a href="{{ config('portfolio.whatsapp.url') }}" target="_blank" rel="noopener" class="shell-btn shell-btn--ghost shell-contact__whatsapp" data-i18n="contact.whatsapp">
							<i class="fab fa-whatsapp" aria-hidden="true"></i>
							Discuter sur WhatsApp
						</a>
						<p class="shell-contact__note" data-i18n="contact.note">
							Réponse habituelle sous 24–48 h.
						</p>
					</div>
				</aside>

				<form action="{{ route('contact.store') }}" method="POST" class="shell-contact__form contact-form" novalidate>
					@csrf
					<div class="contact-hp" aria-hidden="true">
						<label for="company_website">Site web</label>
						<input type="text" name="company_website" id="company_website" value="" tabindex="-1" autocomplete="off">
					</div>

					<div class="shell-contact__fields">
						<div class="shell-contact__field">
							<label class="shell-contact__label" for="name"><span data-i18n="contact.form.name">Nom</span></label>
							<input type="text" name="name" id="name" class="shell-contact__input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.name.placeholder" value="{{ old('name') }}">
							@error('name')
								<span class="contact-error">{{ $message }}</span>
							@enderror
						</div>
						<div class="shell-contact__field">
							<label class="shell-contact__label" for="email"><span data-i18n="contact.form.email">Email</span></label>
							<input type="email" name="email" id="email" class="shell-contact__input form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.email.placeholder" value="{{ old('email') }}">
							@error('email')
								<span class="contact-error">{{ $message }}</span>
							@enderror
						</div>
						<div class="shell-contact__field shell-contact__field--full">
							<label class="shell-contact__label" for="subject"><span data-i18n="contact.form.subject">Sujet</span></label>
							<input type="text" name="subject" id="subject" class="shell-contact__input form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.subject.placeholder" value="{{ old('subject') }}">
							@error('subject')
								<span class="contact-error">{{ $message }}</span>
							@enderror
						</div>
						<div class="shell-contact__field shell-contact__field--full">
							<label class="shell-contact__label" for="message"><span data-i18n="contact.form.message">Message</span></label>
							<textarea name="message" id="message" rows="6" class="shell-contact__input form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.message.placeholder">{{ old('message') }}</textarea>
							@error('message')
								<span class="contact-error">{{ $message }}</span>
							@enderror
						</div>
						<div class="shell-contact__field shell-contact__field--full shell-contact__submit">
							<button type="submit" class="shell-btn shell-btn--primary">
								<i class="fa fa-paper-plane" aria-hidden="true"></i>
								<span data-i18n="contact.form.submit">Envoyer le message</span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>

	<footer class="site-footer" id="footer">
		@include('partials.shell-surface-icons')
		<div class="container site-footer__inner">
			<div class="site-footer__grid">
				<div class="site-footer__brand">
					<a class="site-footer__logo" href="#home-section">Narcisse<span class="site-footer__dot">.</span></a>
					<p class="site-footer__tagline" data-i18n="footer.tagline">
						Full-Stack Developer : applications web métier,
						API REST et outils sécurisés. Ouvert aux missions et collaborations.
					</p>
					<a href="{{ route('cv') }}" class="shell-btn shell-btn--ghost" data-i18n="footer.cv">Voir mon CV</a>
				</div>

				<div class="site-footer__col">
					<h2 class="site-footer__label" data-i18n="footer.navigation">Navigation</h2>
					<ul class="site-footer__nav">
						<li><a href="#home-section"><span data-i18n="nav.home">Accueil</span></a></li>
						<li><a href="#about-section"><span data-i18n="nav.about">À propos</span></a></li>
						<li><a href="#projects-section"><span data-i18n="nav.projects">Projets</span></a></li>
						<li><a href="#contact-section"><span data-i18n="nav.contact">Contact</span></a></li>
						<li><a href="{{ route('cv') }}"><span data-i18n="nav.cv">CV</span></a></li>
					</ul>
				</div>

				<div class="site-footer__col">
					<h2 class="site-footer__label" data-i18n="footer.contactTitle">Me contacter</h2>
					<ul class="site-footer__contact">
						<li data-i18n="contact.sidebar.locationValue">Afrique de l’Ouest · Remote</li>
						<li>
							<a href="mailto:{{ config('portfolio.email') }}">{{ config('portfolio.email') }}</a>
						</li>
						<li>
							<a href="tel:{{ config('portfolio.phone_bj.tel') }}">{{ config('portfolio.phone_bj.display') }}</a>
						</li>
					</ul>
					<ul class="site-footer__social">
						<li>
							<a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener" aria-label="GitHub">
								<i class="fab fa-github" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="https://www.linkedin.com/in/narcisse-ogoudikpe-831bb8344/" target="_blank" rel="noopener" aria-label="LinkedIn">
								<i class="fa-brands fa-linkedin" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="https://web.facebook.com/profile.php?id=100094312132255" target="_blank" rel="noopener" aria-label="Facebook">
								<i class="fab fa-facebook-f" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="site-footer__bottom">
				<p class="site-footer__copy mb-0">
					&copy; {{ date('Y') }} Narcisse OGOUDIKPE. <span data-i18n="footer.copy">Tous droits réservés.</span>
				</p>
				<p class="site-footer__credits mb-0">
					<span data-i18n="footer.designed">Conçu avec</span>
					<span class="site-footer__heart" aria-hidden="true">◆</span>
					<span data-i18n="footer.by">par</span>
					<a href="#home-section">Narcisse</a>
				</p>
			</div>
		</div>
	</footer>
		
		


		<script src="{{ asset('js/jquery.min.js') }}" defer></script>
		<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}" defer></script>
		<script src="{{ asset('js/popper.min.js') }}" defer></script>
		<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
		<script src="{{ asset('js/jquery.easing.1.3.js') }}" defer></script>
		<script src="{{ asset('js/jquery.waypoints.min.js') }}" defer></script>
		<script src="{{ asset('js/jquery.stellar.min.js') }}" defer></script>
		<script src="{{ asset('js/jquery.magnific-popup.min.js') }}" defer></script>
		<script src="{{ asset('js/main.js') }}?v=13" defer></script>
		<script src="{{ asset('js/custom-cursor.js') }}?v=3" defer></script>
		<script src="{{ asset('js/page-title.js') }}" defer></script>

		@if($errors->any() || session('success') || session('error'))
		<script>
		document.addEventListener('DOMContentLoaded', function () {
			var el = document.getElementById('contact-section');
			if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
		});
		</script>
		@endif

		<script>
		(function () {
			var STORAGE_KEY = 'portfolioContactSuccess';
			var feedback = document.getElementById('contact-feedback');
			if (!feedback) return;

			function dismissAlert(alertEl) {
				if (!alertEl) return;
				if (alertEl.getAttribute('data-contact-flash') === 'success' || alertEl.classList.contains('alert-success')) {
					try { sessionStorage.removeItem(STORAGE_KEY); } catch (e) {}
				}
				alertEl.remove();
			}

			function bindDismiss(alertEl) {
				var btn = alertEl.querySelector('[data-dismiss-contact-alert]');
				if (btn) {
					btn.addEventListener('click', function () { dismissAlert(alertEl); });
				}
			}

			function showPersistedSuccess(message) {
				if (feedback.querySelector('.alert-success')) return;
				var alertEl = document.createElement('div');
				alertEl.className = 'alert alert-success contact-alert d-flex align-items-start justify-content-between';
				alertEl.setAttribute('role', 'status');
				alertEl.innerHTML =
					'<span class="contact-alert-text"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i></span>' +
					'<button type="button" class="contact-alert-close" aria-label="Fermer" data-dismiss-contact-alert>&times;</button>';
				alertEl.querySelector('.contact-alert-text').appendChild(document.createTextNode(message));
				feedback.insertBefore(alertEl, feedback.firstChild);
				bindDismiss(alertEl);
			}

			var flashSuccess = feedback.querySelector('[data-contact-flash="success"]');
			var flashError = feedback.querySelector('[data-contact-flash="error"]');
			if (flashError) {
				try { sessionStorage.removeItem(STORAGE_KEY); } catch (e) {}
			}
			if (flashSuccess) {
				var msg = flashSuccess.getAttribute('data-contact-message') || flashSuccess.textContent.trim();
				try { sessionStorage.setItem(STORAGE_KEY, msg); } catch (e) {}
				bindDismiss(flashSuccess);
			} else if (!flashError) {
				try {
					var saved = sessionStorage.getItem(STORAGE_KEY);
					if (saved) {
						showPersistedSuccess(saved);
					}
				} catch (e) {}
			}

			feedback.querySelectorAll('.contact-alert').forEach(bindDismiss);

			var form = document.querySelector('#contact-section .contact-form');
			if (form) {
				form.addEventListener('submit', function () {
					try { sessionStorage.removeItem(STORAGE_KEY); } catch (e) {}
				});
			}
		})();
		</script>

		<script>
		(function () {
			var skillBars = document.querySelectorAll('#skills-section .progress-bar[data-width]');
			if (!skillBars.length) return;
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting) return;
					var bar = entry.target;
					bar.style.width = bar.getAttribute('data-width') + '%';
					observer.unobserve(bar);
				});
			}, { threshold: 0.2 });
			skillBars.forEach(function (bar) { observer.observe(bar); });
		})();
		</script>
		
	</body>
	</html>