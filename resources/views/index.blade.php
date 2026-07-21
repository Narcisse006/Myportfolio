<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@include('partials.seo', [
		'seoTitle' => 'Narcisse OGOUDIKPE | Développeur Laravel - Portfolio',
		'seoDescription' => 'Narcisse OGOUDIKPE, développeur Laravel junior à Porto-Novo. Applications web métier, API REST, sécurité et collaborations. Portfolio et CV.',
		'seoCanonical' => url('/'),
	])
	@include('partials.favicon')

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://stackpath.bootstrapcdn.com">
	<link rel="preconnect" href="https://cdnjs.cloudflare.com">

	<link rel="preload" as="image" href="{{ asset('images/hero1.jpg') }}" fetchpriority="high">
	<link rel="preload" as="image" href="{{ asset('images/hero2.jpg') }}">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	@include('partials.custom-cursor')

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="#home-section">Narcisse<span>.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span data-i18n="nav.home">Accueil</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span data-i18n="nav.projects">Projets</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span data-i18n="nav.about">À propos</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span data-i18n="nav.contact">Contact</span></a></li>
					<li class="nav-item nav-item-lang">
						<a href="#" id="lang-toggle" class="nav-link lang-toggle" title="English" aria-label="Changer de langue">
							<i class="fa fa-globe" aria-hidden="true"></i>
							<span class="lang-toggle-label">EN</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section id="home-section" class="hero" data-page-title="Accueil">
	<div class="home-slider owl-carousel">
		<div class="slider-item">
			<div class="overlay"></div>
			<div class="container-fluid px-md-0">
				<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
					<div class="one-third order-md-last img" style="background-image: url({{ asset('images/hero1.jpg') }}); background-size: cover; background-position: center;">
						<div class="overlay"></div>
						<div class="overlay-1"></div>
					</div>
					<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading" data-i18n="hero.role">Développeur Laravel Junior</span>
							<h1 class="mb-4 mt-3" data-i18n-html="hero.title1">
								Spécialisé en <span>applications web métier</span>
							</h1>
							<p data-i18n="hero.desc1">
								Je développe des applications Laravel pour des besoins concrets en entreprise.
							</p>
							<a href="{{ route('cv') }}" class="btn btn-primary btn-outline-primary" data-i18n="hero.cv">
								Voir mon CV
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slider-item">
			<div class="overlay"></div>
			<div class="container-fluid px-md-0">
				<div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
					<div class="one-third order-md-last img" style="background-image: url({{ asset('images/hero2.jpg') }}); background-size: cover; background-position: center;">
						<div class="overlay"></div>
						<div class="overlay-1"></div>
					</div>
					<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading" data-i18n="hero.slide2.role">
								Missions · Collaborations · Remote
							</span>
							<h1 class="mb-4 mt-3" data-i18n-html="hero.slide2.title">
								Du besoin métier au <span>produit livré</span>
							</h1>
							<p data-i18n="hero.slide2.desc1">
								Code clair, livraisons progressives, projets concrets visibles sur GitHub.
							</p>
							<a href="{{ route('cv') }}" class="btn btn-primary btn-outline-primary" data-i18n="hero.cv">
								Voir mon CV
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	<section class="pro-section" id="pro-section" data-page-title="Professionnel">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 mb-4 mb-lg-0">
					<figure class="profile-media mb-0">
						<img
							src="{{ asset('images/nessi.jpeg') }}"
							alt="Narcisse OGOUDIKPE, portrait professionnel"
							class="profile-media-img"
							width="707"
							height="1280"
							loading="lazy"
							decoding="async"
						>
					</figure>
				</div>
				<div class="col-lg-7">
					<div class="profile-copy profile-copy--pro">
						<span class="profile-eyebrow" data-i18n="pro.subheading">Ce que je propose</span>
						<p class="profile-badge mb-3">
							<span class="profile-badge-dot" aria-hidden="true"></span>
							<span data-i18n="pro.available">Disponible pour missions & collaborations</span>
						</p>
						<h2 class="profile-title mb-3" data-i18n="pro.heading">Des applications Laravel utiles pour votre métier</h2>
						<p class="profile-text mb-4" data-i18n="pro.lead">
							Je conçois des backends clairs et des outils concrets :
							gestion, suivi, espaces admin et API. Du besoin jusqu’à une base solide en production.
						</p>
						<ul class="profile-list mb-4">
							<li data-i18n="pro.point1">Applications métier (stock, suivi, administration)</li>
							<li data-i18n="pro.point2">API REST, authentification et gestion des rôles</li>
							<li data-i18n="pro.point3">Code structuré, MySQL propre, livraison remote-friendly</li>
						</ul>
						<div class="profile-actions">
							<a href="#projects-section" class="btn btn-primary py-3 px-4 mr-2 mb-2" data-i18n="pro.cv">Voir mes projets</a>
							<a href="#contact-section" class="btn btn-outline-primary py-3 px-4 mb-2" data-i18n="pro.contact">Parler d’un projet</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-project" id="projects-section" data-page-title="Projets">
		<div class="container px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-10 heading-section text-center ftco-animate">
					<span class="subheading" data-i18n="projects.subheading">Réalisations</span>
					<h2 class="mb-4" data-i18n="projects.heading">Projets sélectionnés</h2>
					<p class="mb-0" data-i18n="projects.paragraph">
							Surtout des applications Laravel métier. Le code est disponible sur GitHub.
						</p>
				</div>
			</div>
			<div class="row">

					<div class="col-12 col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url({{ asset('images/stock.jpg') }});"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.laravel">Laravel</span>
							<h3 class="mb-2">Gestion de stock</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.stock">Application métier avec caisse intégrée, gestion des produits et suivi des ventes.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">Laravel</span>
								<span class="project-tag">Bootstrap</span>
								<span class="project-tag">MySQL</span>
							</div>
							<a href="https://github.com/Narcisse006/ProjetGestionDeStock" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
						</div>
					</article>
				</div>

					<div class="col-12 col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url({{ asset('images/coli.jpg') }});"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.laravelAdmin">Laravel · Admin</span>
							<h3 class="mb-2">Suivi de colis</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.colis">Système de tracking pour transporteur : statuts, tableau de bord et interface admin.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">Laravel</span>
								<span class="project-tag">AdminLTE</span>
								<span class="project-tag">Bootstrap</span>
							</div>
							<a href="https://github.com/Narcisse006/Projet_suivi_colis" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
						</div>
					</article>
				</div>

					<div class="col-12 col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url({{ asset('images/forum.jpg') }});"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.phpmysql">PHP · MySQL</span>
							<h3 class="mb-2">Forum Dev</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.forum">Plateforme d’échange entre développeurs : publications, réponses et espace communautaire.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">PHP POO</span>
								<span class="project-tag">MySQL</span>
							</div>
							<a href="https://github.com/Narcisse006/forum" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
						</div>
					</article>
				</div>

					<div class="col-12 col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url({{ asset('images/time.jpg') }});"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.frontend">Front-end</span>
							<h3 class="mb-2">TimeLux</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.time">Site e-commerce vitrine pour montres haut de gamme, design soigné et navigation fluide.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">HTML5</span>
								<span class="project-tag">CSS3</span>
							</div>
							<a href="https://github.com/Narcisse006/Projet_perso_site" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
						</div>
					</article>
				</div>

			</div>
			<div class="row justify-content-center mt-2">
				<div class="col-md-8 text-center ftco-animate">
					<a href="https://github.com/Narcisse006" target="_blank" rel="noopener" class="btn btn-primary py-3 px-5">
						<i class="fab fa-github mr-2"></i> <span data-i18n="projects.more">Tous mes projets sur GitHub</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light" id="case-study-section" data-page-title="Étude de cas">
		<div class="container">
			<div class="row justify-content-center pb-4">
				<div class="col-md-10 heading-section text-center ftco-animate">
					<span class="subheading" data-i18n="casestudy.subheading">Étude de cas</span>
					<h2 class="mb-3" data-i18n="casestudy.heading">Gestion de stock</h2>
					<p class="mb-0" data-i18n="casestudy.intro">
						Comment j’ai conçu une application métier Laravel pour suivre les produits,
						enregistrer les ventes et sécuriser l’accès admin.
					</p>
				</div>
			</div>

			<div class="row align-items-center">
				<div class="col-lg-5 mb-4 mb-lg-0 ftco-animate">
					<div
						class="case-study-visual"
						style="background-image: url({{ asset('images/stock.jpg') }});"
						role="img"
						aria-label="Aperçu du projet Gestion de stock"
					></div>
				</div>

				<div class="col-lg-7 ftco-animate">
					<div class="case-study-panel">
						<p class="case-study-meta mb-4">
							<span class="project-tag">Laravel</span>
							<span class="project-tag">MySQL</span>
							<span class="project-tag">Bootstrap</span>
							<span class="project-tag">Eloquent</span>
						</p>

						<div class="case-study-block mb-4">
							<h3 class="case-study-title" data-i18n="casestudy.problemLabel">Contexte</h3>
							<p class="mb-0" data-i18n="casestudy.problem">
								Remplacer un suivi manuel peu fiable par un outil simple : catalogue produits,
								caisse, et stock toujours à jour après chaque vente.
							</p>
						</div>

						<div class="case-study-block mb-4">
							<h3 class="case-study-title" data-i18n="casestudy.solutionLabel">Ce que j’ai livré</h3>
							<ul class="case-study-list mb-0">
								<li data-i18n="casestudy.item1">CRUD produits / catégories avec validation serveur</li>
								<li data-i18n="casestudy.item2">Caisse et décrément automatique du stock</li>
								<li data-i18n="casestudy.item3">Authentification et espace administrateur</li>
								<li data-i18n="casestudy.item4">Schéma MySQL relationnel via migrations Eloquent</li>
							</ul>
						</div>

						<div class="case-study-actions">
							<a href="https://github.com/Narcisse006/ProjetGestionDeStock" target="_blank" rel="noopener" class="btn btn-primary py-3 px-4 mr-2 mb-2">
								<i class="fab fa-github mr-2"></i>
								<span data-i18n="casestudy.cta">Voir le code sur GitHub</span>
							</a>
							<a href="#projects-section" class="btn btn-outline-primary py-3 px-4 mb-2" data-i18n="casestudy.back">
								Voir les autres projets
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	
	<section class="expertise-section" id="highlights-section" data-page-title="Expertise">
		<div class="container">
			<div class="row align-items-end mb-5">
				<div class="col-lg-5 mb-4 mb-lg-0">
					<span class="profile-eyebrow" data-i18n="highlights.subheading">Expertise</span>
					<h2 class="profile-title mb-0" data-i18n="highlights.heading">Ce que j’apporte sur un projet</h2>
				</div>
				<div class="col-lg-6 offset-lg-1">
					<p class="expertise-lead mb-0" data-i18n="highlights.paragraph">
						Quatre piliers que je mets en pratique sur mes projets, pas une liste de buzzwords.
					</p>
				</div>
			</div>

			<div class="expertise-grid">
				<article class="expertise-item">
					<span class="expertise-num" aria-hidden="true">01</span>
					<div class="expertise-body">
						<h3 class="expertise-item-title" data-i18n="highlights.card1.title">Backend Laravel</h3>
						<p class="expertise-item-text" data-i18n="highlights.card1.desc">Architecture MVC, routes REST, logique métier structurée et code maintenable.</p>
					</div>
				</article>
				<article class="expertise-item">
					<span class="expertise-num" aria-hidden="true">02</span>
					<div class="expertise-body">
						<h3 class="expertise-item-title" data-i18n="highlights.card2.title">Sécurité & rôles</h3>
						<p class="expertise-item-text" data-i18n="highlights.card2.desc">Authentification, middleware, permissions et validation des données côté serveur.</p>
					</div>
				</article>
				<article class="expertise-item">
					<span class="expertise-num" aria-hidden="true">03</span>
					<div class="expertise-body">
						<h3 class="expertise-item-title" data-i18n="highlights.card3.title">Données fiables</h3>
						<p class="expertise-item-text" data-i18n="highlights.card3.desc">Modélisation MySQL, migrations, relations Eloquent et requêtes optimisées.</p>
					</div>
				</article>
				<article class="expertise-item">
					<span class="expertise-num" aria-hidden="true">04</span>
					<div class="expertise-body">
						<h3 class="expertise-item-title" data-i18n="highlights.card4.title">Mise en ligne</h3>
						<p class="expertise-item-text" data-i18n="highlights.card4.desc">Versioning Git, tests manuels, déploiement et suivi après livraison.</p>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section class="skills-section" id="skills-section" data-page-title="Compétences">
		<div class="container">
			<div class="row align-items-end mb-5">
				<div class="col-lg-5 mb-4 mb-lg-0">
					<span class="profile-eyebrow" data-i18n="skills.subheading">Compétences</span>
					<h2 class="profile-title mb-0" data-i18n="skills.heading">Ma stack technique</h2>
				</div>
				<div class="col-lg-6 offset-lg-1">
					<p class="skills-lead mb-0" data-i18n="skills.paragraph">
						Le cœur de mon travail, c’est le backend Laravel.
						Le reste sert à livrer une interface claire et un projet propre jusqu’en production.
					</p>
				</div>
			</div>

			<div class="skills-grid">
				<article class="skills-group">
					<span class="skills-level" data-i18n="skills.level.strong">Solide</span>
					<h3 class="skills-group-title" data-i18n="skills.card1.title">Backend</h3>
					<div class="skills-tags">
						<span class="profile-tag">PHP</span>
						<span class="profile-tag">Laravel</span>
						<span class="profile-tag">API REST</span>
						<span class="profile-tag">Auth & Middleware</span>
						<span class="profile-tag">Gestion de rôles</span>
						<span class="profile-tag">Architecture MVC</span>
						<span class="profile-tag">MySQL</span>
						<span class="profile-tag">Sécurité & validation</span>
					</div>
				</article>

				<article class="skills-group">
					<span class="skills-level" data-i18n="skills.level.comfortable">À l’aise</span>
					<h3 class="skills-group-title" data-i18n="skills.card2.title">Front & UI</h3>
					<div class="skills-tags">
						<span class="profile-tag">HTML5 / CSS3</span>
						<span class="profile-tag">Bootstrap</span>
						<span class="profile-tag">Responsive design</span>
						<span class="profile-tag">Blade</span>
						<span class="profile-tag">Figma</span>
					</div>
				</article>

				<article class="skills-group">
					<span class="skills-level" data-i18n="skills.level.comfortable">À l’aise</span>
					<h3 class="skills-group-title" data-i18n="skills.card3.title">Outils</h3>
					<div class="skills-tags">
						<span class="profile-tag">Git & GitHub</span>
						<span class="profile-tag">Postman</span>
						<span class="profile-tag">Déploiement</span>
						<span class="profile-tag">Linux</span>
					</div>
				</article>
			</div>
		</div>
	</section>

	

	

	<section class="about-section" id="about-section" data-page-title="À propos">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7 order-2 order-lg-1">
					<div class="profile-copy profile-copy--about">
						<span class="profile-eyebrow" data-i18n="about.profile">À propos</span>
						<h2 class="profile-title mb-2">Narcisse OGOUDIKPE</h2>
						<p class="profile-role mb-4" data-i18n-html="about.roleLine">
							Développeur Laravel Junior <br>
							<span class="profile-location">Disponible · remote ou présentiel</span>
						</p>
	

						<p class="profile-text" data-i18n="about.intro1">
							Formé chez Simplon, j’ai construit des applications concrètes :
							gestion de stock, suivi de colis, forum. Mon fil rouge, c’est le backend Laravel.
						</p>
						<p class="profile-text mb-4" data-i18n="about.intro2">
							Ce qui m’intéresse : comprendre le besoin, structurer la base de données,
							et livrer une interface claire jusqu’au déploiement.
						</p>

						<div class="profile-tags mb-4">
							<span class="profile-tag">Laravel</span>
							<span class="profile-tag">PHP</span>
							<span class="profile-tag">API REST</span>
							<span class="profile-tag">MySQL</span>
							<span class="profile-tag">Bootstrap</span>
						</div>

						<ul class="profile-meta mb-4">
							<li>
								<span data-i18n="about.info.email">Email</span>
								<a href="mailto:ogoudikpenarcisse@gmail.com">ogoudikpenarcisse@gmail.com</a>
							</li>
							<li>
								<span data-i18n="about.info.phone">Téléphone</span>
								<a href="tel:+2290199051003">+229 01 99 05 10 03</a>
								<span class="profile-meta-sep">·</span>
								<a href="tel:+22677503015">+226 77 50 30 15</a>
							</li>
							<li>
								<span data-i18n="about.info.github">GitHub</span>
								<a href="https://github.com/Narcisse006" target="_blank" rel="noopener">Narcisse006</a>
							</li>
						</ul>

						<div class="profile-actions">
							<a href="{{ route('cv') }}" class="btn btn-primary py-3 px-4 mr-2 mb-2" data-i18n="about.download">Voir mon CV</a>
							<a href="#contact-section" class="btn btn-outline-primary py-3 px-4 mb-2" data-i18n="about.contact">Me contacter</a>
						</div>
					</div>
				</div>
				<div class="col-lg-5 order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="about-portrait">
						<span class="about-portrait-ring" aria-hidden="true"></span>
						<figure class="about-portrait-frame mb-0">
							<img
								src="{{ asset('images/Moi2.jpg') }}"
								alt="Narcisse OGOUDIKPE"
								class="about-portrait-img"
								width="400"
								height="400"
								loading="lazy"
								decoding="async"
							>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section contact-section ftco-no-pb" id="contact-section" data-page-title="Contact">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-9 heading-section text-center ftco-animate">
					<span class="subheading" data-i18n="contact.subheading">Contact</span>
					<h2 class="mb-4" data-i18n="contact.heading">Parlons de votre projet</h2>
					<p class="mb-0" data-i18n="contact.paragraph">
							Mission, collaboration ou simple question : écrivez-moi via le formulaire
							ou contactez-moi directement sur WhatsApp.
						</p>
				</div>
			</div>

			<div class="row block-9">
				<div class="col-12 col-lg-8 mb-4 mb-lg-0">

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

					<form action="{{ route('contact.store') }}" method="POST" class="contact-form-card bg-light p-4 p-md-5 contact-form" novalidate>
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="contact-label" for="name"><span data-i18n="contact.form.name">Nom</span></label>
									<input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.name.placeholder" value="{{ old('name') }}">
									@error('name')
										<span class="contact-error">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="contact-label" for="email"><span data-i18n="contact.form.email">Email</span></label>
									<input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.email.placeholder" value="{{ old('email') }}">
									@error('email')
										<span class="contact-error">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="contact-label" for="subject"><span data-i18n="contact.form.subject">Sujet</span></label>
									<input type="text" name="subject" id="subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.subject.placeholder" value="{{ old('subject') }}">
									@error('subject')
										<span class="contact-error">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="contact-label" for="message"><span data-i18n="contact.form.message">Message</span></label>
									<textarea name="message" id="message" cols="30" rows="6" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" placeholder="" data-i18n-placeholder="contact.form.message.placeholder">{{ old('message') }}</textarea>
									@error('message')
										<span class="contact-error">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-0">
									<button type="submit" class="btn btn-primary py-3 px-5">
										<i class="fa fa-paper-plane mr-2"></i> <span data-i18n="contact.form.submit">Envoyer le message</span>
									</button>
								</div>
							</div>
						</div>
					</form>

				</div>

				<div class="col-12 col-lg-4 pl-lg-4">
					<div class="contact-sidebar ftco-animate">
						<h3 class="contact-sidebar-title mb-4" data-i18n="contact.sidebar.title">Coordonnées</h3>

						<div class="contact-info-item d-flex mb-4">
							<div class="contact-info-icon">
								<i class="fa fa-map-marker"></i>
							</div>
							<div>
								<span class="contact-info-label" data-i18n="contact.sidebar.location">Zone</span>
								<p class="mb-0" data-i18n="contact.sidebar.locationValue">Afrique de l’Ouest · Remote</p>
							</div>
						</div>

						<div class="contact-info-item d-flex mb-4">
							<div class="contact-info-icon">
								<i class="fa fa-envelope"></i>
							</div>
							<div>
								<span class="contact-info-label" data-i18n="contact.sidebar.email">Email</span>
								<p class="mb-0"><a href="mailto:ogoudikpenarcisse@gmail.com">ogoudikpenarcisse@gmail.com</a></p>
							</div>
						</div>

						<div class="contact-info-item d-flex mb-4">
							<div class="contact-info-icon">
								<i class="fa fa-phone"></i>
							</div>
							<div>
								<span class="contact-info-label" data-i18n="contact.sidebar.phone">Téléphone</span>
								<p class="mb-0">
									<a href="tel:+2290199051003">+229 01 99 05 10 03</a>
								</p>
							</div>
						</div>

						<div class="contact-info-item d-flex mb-4">
							<div class="contact-info-icon">
								<i class="fab fa-github"></i>
							</div>
							<div>
								<span class="contact-info-label" data-i18n="contact.sidebar.github">GitHub</span>
								<p class="mb-0"><a href="https://github.com/Narcisse006" target="_blank" rel="noopener">Narcisse006</a></p>
							</div>
						</div>

						<a href="https://wa.me/22677503015?text=Bonjour%20Narcisse%2C%20je%20souhaite%20vous%20contacter%20concernant%20" target="_blank" rel="noopener" class="btn btn-outline-primary btn-block py-3 mb-3" data-i18n="contact.whatsapp">
							<i class="fab fa-whatsapp mr-2"></i> Discuter sur WhatsApp
						</a>
						<p class="contact-note mb-0" data-i18n="contact.note">
							<i class="fa fa-clock-o portfolio-accent mr-1"></i>
							Réponse habituelle sous 24–48 h.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

<footer class="ftco-footer ftco-section" id="footer">
		<div class="container">
			<div class="row mb-5">

				<div class="col-lg-4 col-md-6 mb-4 mb-md-0">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2 footer-brand">Narcisse<span>.</span></h2>
						<p class="footer-tagline" data-i18n="footer.tagline">
							Développeur Laravel junior : applications web métier,
							API REST et outils sécurisés. Ouvert aux missions et collaborations.
						</p>
						<p class="mb-0">
							<a href="{{ route('cv') }}" class="btn btn-primary btn-sm py-2 px-4" data-i18n="footer.cv">
								<i class="fa fa-file-text-o mr-1"></i> Voir mon CV
							</a>
						</p>
					</div>
				</div>

				<div class="col-lg-2 col-md-6 mb-4 mb-md-0">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2" data-i18n="footer.navigation">Navigation</h2>
						<ul class="list-unstyled footer-nav">
							<li><a href="#home-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.home">Accueil</span></a></li>
							<li><a href="#pro-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.pro">Professionnel</span></a></li>
							<li><a href="#projects-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.projects">Projets</span></a></li>
							<li><a href="#case-study-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="casestudy.subheading">Étude de cas</span></a></li>
							<li><a href="#highlights-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.expertise">Expertise</span></a></li>
							<li><a href="#skills-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.skills">Compétences</span></a></li>
							<li><a href="#about-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.about">À propos</span></a></li>
							<li><a href="{{ route('cv') }}"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.cv">CV</span></a></li>
							<li><a href="#contact-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.contact">Contact</span></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 mb-4 mb-md-0">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2" data-i18n="footer.contactTitle">Me contacter</h2>
						<ul class="list-unstyled footer-contact">
							<li>
								<span class="fa fa-map-marker mr-2"></span>
								<span data-i18n="contact.sidebar.locationValue">Afrique de l’Ouest · Remote</span>
							</li>
							<li>
								<a href="mailto:ogoudikpenarcisse@gmail.com" class="footer-contact-row" title="ogoudikpenarcisse@gmail.com">
									<span class="footer-contact-icon" aria-hidden="true"><span class="fa fa-envelope"></span></span>
									<span class="footer-contact-text">ogoudikpe…@gmail.com</span>
								</a>
							</li>
							<li>
								<a href="tel:+2290199051003" target="_blank" rel="noopener">
									<span class="fa fa-phone mr-2"></span>
									+229 01 99 05 10 03
								</a>
							</li>
							<li>
								<a href="https://github.com/Narcisse006" target="_blank" rel="noopener">
									<span class="fab fa-github mr-2"></span>
									GitHub
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2" data-i18n="footer.networks">Réseaux</h2>
						<p class="footer-tagline mb-3" data-i18n="footer.follow">Suivez mon parcours et mes projets en ligne.</p>
						<ul class="ftco-footer-social list-unstyled">
							<li class="ftco-animate">
								<a href="https://github.com/Narcisse006" target="_blank" rel="noopener" aria-label="GitHub">
									<i class="fab fa-github"></i>
								</a>
							</li>
							<li class="ftco-animate">
								<a href="https://web.facebook.com/profile.php?id=100094312132255" target="_blank" rel="noopener" aria-label="Facebook">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>
							<li class="ftco-animate">
								<a href="https://www.linkedin.com/in/narcisse-ogoudikpe-831bb8344/" target="_blank" rel="noopener" aria-label="Linkedin">
									<i class="fa-brands fa-linkedin"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row footer-bottom">
				<div class="col-md-12 text-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					<p class="footer-copyright mb-1">
							&copy; <script>document.write(new Date().getFullYear());</script> Narcisse OGOUDIKPE. <span data-i18n="footer.copy">Tous droits réservés.</span>
						</p>
					<p class="footer-credits mb-0"><span data-i18n="footer.designed">Conçu avec</span> <i class="fa fa-heart" aria-hidden="true"></i> <span data-i18n="footer.by">par</span> <a href="#home-section">Narcisse</a></p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</div>
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
		<script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
		<script src="{{ asset('js/jquery.magnific-popup.min.js') }}" defer></script>
		<script src="{{ asset('js/scrollax.min.js') }}" defer></script>
		<script src="{{ asset('js/main.js') }}" defer></script>
		<script src="{{ asset('js/custom-cursor.js') }}" defer></script>
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