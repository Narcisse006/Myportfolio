<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Narcisse OGOUDIKPE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Portfolio de Narcisse OGOUDIKPE, développeur Laravel junior à Porto-Novo. Applications web métier, API REST, projets et contact.">

	@include('partials.favicon')

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	
	<link rel="stylesheet" href="css/flaticon.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<link rel="stylesheet" href="css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

	@include('partials.custom-cursor')

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="#home-section">Narcisse<span>.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="#home-section" class="nav-link"><span data-i18n="nav.home">Accueil</span></a></li>
					<li class="nav-item"><a href="#highlights-section" class="nav-link"><span data-i18n="nav.expertise">Expertise</span></a></li>
					<li class="nav-item"><a href="#about-section" class="nav-link"><span data-i18n="nav.about">À propos</span></a></li>
					<li class="nav-item"><a href="#skills-section" class="nav-link"><span data-i18n="nav.skills">Compétences</span></a></li>
					<li class="nav-item"><a href="#projects-section" class="nav-link"><span data-i18n="nav.projects">Projets</span></a></li>
					<li class="nav-item"><a href="#contact-section" class="nav-link"><span data-i18n="nav.contact">Contact</span></a></li>
					<li class="nav-item"><a href="#" id="lang-toggle" class="nav-link" title="English">EN</a></li>
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
					<div class="one-third order-md-last img" style="background-image:url(images/hero1.png);">
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
								Conception de solutions robustes avec authentification,
								gestion de rôles utilisateurs et bases de données relationnelles.
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
					<div class="one-third order-md-last img" style="background-image:url(images/hero2.png);">
						<div class="overlay"></div>
						<div class="overlay-1"></div>
					</div>
					<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading" data-i18n="hero.slide2.role">
								Backend Laravel | API REST | Gestion de données
							</span>
							<h1 class="mb-4 mt-3" data-i18n-html="hero.slide2.title">
								Je transforme des besoins métiers en <span>solutions web performantes</span>
							</h1>
							<p data-i18n="hero.slide2.desc1">
								CRUD sécurisés, dashboards administrateurs, systèmes multi-rôles et architecture structurée.
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

	<section class="ftco-section bg-light py-5" id="highlights-section" data-page-title="Expertise">
		<div class="container">
			<div class="row justify-content-center mb-4 pb-2">
				<div class="col-md-8 text-center ftco-animate">
					<span class="subheading" data-i18n="highlights.subheading">Mon approche</span>
					<h2 class="mb-3"><strong data-i18n="highlights.heading">Ce que je mets en place sur vos projets</strong></h2>

					<p class="mb-0" data-i18n="highlights.paragraph">Pas de chiffres gonflés, des compétences concrètes que vous retrouverez dans le code et en production.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0 ftco-animate">
					<div class="highlight-card h-100 text-center p-4">
						<div class="highlight-icon mx-auto mb-3">
							<i class="fab fa-laravel"></i>
						</div>
						<h4 class="font-weight-bold mb-2" data-i18n="highlights.card1.title">Backend Laravel</h4>
						<p class="mb-0" data-i18n="highlights.card1.desc">Architecture MVC, routes REST, logique métier structurée et code maintenable.</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0 ftco-animate">
					<div class="highlight-card h-100 text-center p-4">
						<div class="highlight-icon mx-auto mb-3">
							<i class="fas fa-shield-alt"></i>
						</div>
						<h4 class="font-weight-bold mb-2" data-i18n="highlights.card2.title">Sécurité & rôles</h4>
						<p class="mb-0" data-i18n="highlights.card2.desc">Authentification, middleware, permissions et validation des données côté serveur.</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0 ftco-animate">
					<div class="highlight-card h-100 text-center p-4">
						<div class="highlight-icon mx-auto mb-3">
							<i class="fas fa-database"></i>
						</div>
						<h4 class="font-weight-bold mb-2" data-i18n="highlights.card3.title">Données fiables</h4>
						<p class="mb-0" data-i18n="highlights.card3.desc">Modélisation MySQL, migrations, relations Eloquent et requêtes optimisées.</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="highlight-card h-100 text-center p-4">
						<div class="highlight-icon mx-auto mb-3">
							<i class="fas fa-rocket"></i>
						</div>
						<h4 class="font-weight-bold mb-2" data-i18n="highlights.card4.title">Mise en ligne</h4>
						<p class="mb-0" data-i18n="highlights.card4.desc">Versioning Git, tests manuels, déploiement et suivi après livraison.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="about-section" data-page-title="À propos">
	<div class="container">
		<div class="row d-flex no-gutters">

			<!-- IMAGE -->
			<div class="col-md-6 col-lg-5 d-flex">
				<div class="img-about img d-flex align-items-stretch">
					<div class="overlay"></div>
					<div class="img d-flex align-self-stretch align-items-center"
						style="background-image:url(images/Moi2.png); background-size: cover; background-position: center;">
					</div>
				</div>
			</div>

			<!-- TEXTE -->
			<div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
				<div class="py-md-5">
					<div class="row justify-content-start pb-3">
						<div class="col-md-12 heading-section ftco-animate">

							<span class="subheading" data-i18n="about.profile">Profil professionnel</span>

							<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">
								Narcisse OGOUDIKPE
							</h2>

							<p data-i18n="about.intro1">
								Développeur <strong>Laravel junior</strong> basé à Porto-Novo, je construis des
								applications web orientées métier : tableaux de bord, CRUD sécurisés,
								API REST et gestion fine des accès utilisateurs.
							</p>

							<p data-i18n="about.intro2">
								Je privilégie un code lisible, une base de données bien modélisée
								et une livraison progressive, de la maquette fonctionnelle jusqu’au déploiement.
								<strong>Disponible pour un stage ou une collaboration.</strong>
							</p>

							<div class="about-tags mt-3 mb-4">
								<span class="about-tag">Laravel</span>
								<span class="about-tag">PHP</span>
								<span class="about-tag">API REST</span>
								<span class="about-tag">MySQL</span>
								<span class="about-tag">Bootstrap</span>
							</div>

							<ul class="about-info mt-4 px-md-0 px-2">
								<li class="d-flex"><span data-i18n="about.info.location">Localisation :</span> <span>Porto-Novo, Bénin</span></li>
								<li class="d-flex"><span data-i18n="about.info.email">Email :</span> <span><a href="mailto:ogoudikpenarcisse@gmail.com">ogoudikpenarcisse@gmail.com</a></span></li>
								<li class="d-flex"><span data-i18n="about.info.phone">Téléphone :</span> <span><a href="" target="_blank" rel="noopener">+226 77 50 30 15</a> <br> <a href="">+229 0199 0510 03</a></span></li>
								<li class="d-flex"><span data-i18n="about.info.github">GitHub :</span> <span><a href="https://github.com/Narcisse006" target="_blank" rel="noopener">Narcisse006</a></span></li>
								<li class="d-flex"><span data-i18n="about.info.status">Statut :</span> <span class="text-primary font-weight-bold" data-i18n="about.status.available">Disponible</span></li>
							</ul>

							<p class="mt-4 mb-4">
								<a href="{{ route('cv') }}" class="btn btn-primary py-3 px-4 mr-2 mb-2" data-i18n="about.download">Voir mon CV</a>
								<a href="#contact-section" class="btn btn-outline-primary py-3 px-4 mb-2" data-i18n="about.contact">Me contacter</a>
							</p>

						</div>
					</div>
					<div class="col-md-12 ftco-animate">
						<p class="mb-3 font-weight-bold" style="font-size: 15px; color: #666;" data-i18n="about.offCodeHeading">En dehors du code</p>
						<div class="my-interest d-lg-flex w-100">
							<div class="interest-wrap d-flex align-items-center">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="flaticon-listening"></span>
								</div>
								<div class="text" data-i18n="about.interest.music">Musique</div>
							</div>
							<div class="interest-wrap d-flex align-items-center">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="flaticon-suitcases"></span>
								</div>
								<div class="text" data-i18n="about.interest.travel">Voyage</div>
							</div>
							<div class="interest-wrap d-flex align-items-center">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="flaticon-video-player"></span>
								</div>
								<div class="text" data-i18n="about.interest.movies">Films</div>
							</div>
							<div class="interest-wrap d-flex align-items-center">
								<div class="icon d-flex align-items-center justify-content-center">
									<span class="flaticon-football"></span>
								</div>
								<div class="text" data-i18n="about.interest.sports">Sports</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</section>
	
<section class="ftco-section bg-light" id="skills-section" data-page-title="Compétences">
	<div class="container">

		<div class="row justify-content-center pb-5">
			<div class="col-md-10 heading-section text-center ftco-animate">
					<span class="subheading" data-i18n="skills.subheading">Compétences techniques</span>
					<h2 class="mb-4" data-i18n="skills.heading">Stack & niveau de maîtrise</h2>
					<p class="mb-0" data-i18n="skills.paragraph">
						Évaluation honnête de mon niveau actuel, l'objectif est de montrer
						où je suis solide et où je continue à progresser.
						</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mb-4 ftco-animate">
				<div class="skill-card bg-white p-4 shadow rounded h-100">
					<h5 class="font-weight-bold mb-4 text-dark">
						<i class="fab fa-laravel mr-2 portfolio-accent"></i> <span data-i18n="skills.card1.title">Backend (spécialité)</span>
					</h5>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>PHP</span><span>90%</span></div>
						<div class="progress"><div class="progress-bar" data-width="90" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Laravel</span><span>88%</span></div>
						<div class="progress"><div class="progress-bar" data-width="88" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>API REST</span><span>80%</span></div>
						<div class="progress"><div class="progress-bar" data-width="80" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Auth & Middleware</span><span>85%</span></div>
						<div class="progress"><div class="progress-bar" data-width="85" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Gestion de rôles</span><span>78%</span></div>
						<div class="progress"><div class="progress-bar" data-width="78" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Architecture MVC</span><span>85%</span></div>
						<div class="progress"><div class="progress-bar" data-width="85" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-0">
						<div class="d-flex justify-content-between"><span>Sécurité & validation</span><span>75%</span></div>
						<div class="progress"><div class="progress-bar" data-width="75" style="width:0%"></div></div>
					</div>
				</div>
			</div>

			<div class="col-md-4 mb-4 ftco-animate">
				<div class="skill-card bg-white p-4 shadow rounded h-100">
					<h5 class="font-weight-bold mb-4 text-dark">
						<i class="fas fa-layer-group mr-2 portfolio-accent"></i> <span data-i18n="skills.card2.title">Complémentaires</span>
					</h5>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Python</span><span>60%</span></div>
						<div class="progress"><div class="progress-bar" data-width="60" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>WordPress</span><span>65%</span></div>
						<div class="progress"><div class="progress-bar" data-width="65" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Flutter</span><span>50%</span></div>
						<div class="progress"><div class="progress-bar" data-width="50" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>HTML5 / CSS3</span><span>85%</span></div>
						<div class="progress"><div class="progress-bar" data-width="85" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Bootstrap</span><span>80%</span></div>
						<div class="progress"><div class="progress-bar" data-width="80" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-0">
						<div class="d-flex justify-content-between"><span>Responsive design</span><span>82%</span></div>
						<div class="progress"><div class="progress-bar" data-width="82" style="width:0%"></div></div>
					</div>
				</div>
			</div>

			<div class="col-md-4 mb-4 ftco-animate">
				<div class="skill-card bg-white p-4 shadow rounded h-100">
					<h5 class="font-weight-bold mb-4 text-dark">
						<i class="fas fa-toolbox mr-2 portfolio-accent"></i> <span data-i18n="skills.card3.title">Outils & environnement</span>
					</h5>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>MySQL</span><span>85%</span></div>
						<div class="progress"><div class="progress-bar" data-width="85" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Git & GitHub</span><span>80%</span></div>
						<div class="progress"><div class="progress-bar" data-width="80" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Figma</span><span>65%</span></div>
						<div class="progress"><div class="progress-bar" data-width="65" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Firebase</span><span>60%</span></div>
						<div class="progress"><div class="progress-bar" data-width="60" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-3">
						<div class="d-flex justify-content-between"><span>Postman</span><span>75%</span></div>
						<div class="progress"><div class="progress-bar" data-width="75" style="width:0%"></div></div>
					</div>
					<div class="skill-item mb-0">
						<div class="d-flex justify-content-between"><span>Déploiement</span><span>70%</span></div>
						<div class="progress"><div class="progress-bar" data-width="70" style="width:0%"></div></div>
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
							Un aperçu de ce que j’ai construit, du site vitrine à l’application métier complète.
							Le code et les détails sont disponibles sur GitHub.
						</p>
				</div>
			</div>
			<div class="row">

				<div class="col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url(images/time.jpg);"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.frontend">Front-end</span>
							<h3 class="mb-2">TimeLux</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.time">Site e-commerce vitrine pour montres haut de gamme, design soigné et navigation fluide.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">HTML5</span>
								<span class="project-tag">CSS3</span>
							</div>
							<a href="https://github.com/Narcisse006" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
						</div>
					</article>
				</div>

				<div class="col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url(images/forum.jpg);"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.phpmysql">PHP · MySQL</span>
							<h3 class="mb-2">Forum Dev</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.forum">Plateforme d’échange entre développeurs : publications, réponses et espace communautaire.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">PHP POO</span>
								<span class="project-tag">MySQL</span>
							</div>
							<a href="https://github.com/Narcisse006" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
						</div>
					</article>
				</div>

				<div class="col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url(images/stock.jpg);"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.laravel">Laravel</span>
							<h3 class="mb-2">Gestion de stock</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.stock">Application métier avec caisse intégrée, gestion des produits et suivi des ventes.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">Laravel</span>
								<span class="project-tag">Bootstrap</span>
								<span class="project-tag">MySQL</span>
							</div>
							<a href="https://github.com/Narcisse006" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
						</div>
					</article>
				</div>

				<div class="col-md-6 col-lg-3 mb-4 ftco-animate">
					<article class="project-card h-100 shadow-sm">
						<div class="project-card-img" style="background-image: url(images/coli.jpg);"></div>
						<div class="project-card-body p-4">
							<span class="project-category" data-i18n="projects.category.laravelAdmin">Laravel · Admin</span>
							<h3 class="mb-2">Suivi de colis</h3>
							<p class="project-desc mb-3" data-i18n="projects.description.colis">Système de tracking pour transporteur : statuts, tableau de bord et interface admin.</p>
							<div class="project-tags mb-3">
								<span class="project-tag">Laravel</span>
								<span class="project-tag">AdminLTE</span>
								<span class="project-tag">Bootstrap</span>
							</div>
							<a href="https://github.com/Narcisse006" target="_blank" rel="noopener" class="project-link"><span data-i18n="projects.github">Voir sur GitHub</span> <i class="fa fa-arrow-right ml-1"></i></a>
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

	
	<section class="ftco-section contact-section ftco-no-pb" id="contact-section" data-page-title="Contact">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-9 heading-section text-center ftco-animate">
					<span class="subheading" data-i18n="contact.subheading">Contact</span>
					<h2 class="mb-4" data-i18n="contact.heading">Parlons de votre projet</h2>
					<p class="mb-0" data-i18n="contact.paragraph">
							Stage, collaboration ou simple question, écrivez-moi via le formulaire
							ou contactez-moi directement sur WhatsApp.
						</p>
				</div>
			</div>

			<div class="row block-9">
				<div class="col-lg-8 mb-4 mb-lg-0">

					@if(session('success'))
					<div class="alert alert-success contact-alert ftco-animate" role="alert">
						<i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
					</div>
					@endif

					@if(session('error'))
					<div class="alert alert-danger contact-alert ftco-animate" role="alert">
						<i class="fa fa-exclamation-circle mr-2"></i>{{ session('error') }}
					</div>
					@endif

					@if($errors->any())
					<div class="alert alert-warning contact-alert ftco-animate" role="alert">
						<i class="fa fa-exclamation-triangle mr-2"></i>
						<strong>Le formulaire contient des erreurs.</strong> Corrigez les champs indiqués ci-dessous.
					</div>
					@endif

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

				<div class="col-lg-4 pl-lg-4">
					<div class="contact-sidebar ftco-animate">
						<h3 class="contact-sidebar-title mb-4" data-i18n="contact.sidebar.title">Coordonnées</h3>

						<div class="contact-info-item d-flex mb-4">
							<div class="contact-info-icon">
								<i class="fa fa-map-marker"></i>
							</div>
							<div>
								<span class="contact-info-label" data-i18n="contact.sidebar.location">Localisation</span>
								<p class="mb-0">Porto-Novo, Bénin</p>
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
									<a href="tel:+2290199051003" target="_blank" rel="noopener">+229 99 05 10 03</a>
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
							Développeur Laravel junior, applications web métier,
							API REST et solutions sécurisées. Disponible pour un stage ou une collaboration.
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
							<li><a href="#highlights-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.expertise">Expertise</span></a></li>
							<li><a href="#about-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.about">À propos</span></a></li>
							<li><a href="#skills-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.skills">Compétences</span></a></li>
							<li><a href="#projects-section"><span class="fa fa-chevron-right mr-2"></span><span data-i18n="nav.projects">Projets</span></a></li>
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
								Porto-Novo, Bénin
							</li>
							<li>
								<a href="mailto:ogoudikpenarcisse@gmail.com">
									<span class="fa fa-envelope mr-2"></span>
									Mon mail
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
								<a href="https://www.instagram.com/ol_cheg/" target="_blank" rel="noopener" aria-label="Instagram">
									<i class="fab fa-instagram"></i>
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
		
		


		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/scrollax.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/custom-cursor.js"></script>
		<script src="js/page-title.js"></script>

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