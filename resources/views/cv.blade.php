<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@include('partials.seo', [
		'seoTitle' => 'CV | Narcisse OGOUDIKPE - Développeur Laravel',
		'seoDescription' => 'CV de Narcisse OGOUDIKPE, développeur Laravel junior. Parcours, compétences, projets et téléchargement PDF.',
		'seoCanonical' => url('/cv'),
	])
	@include('partials.favicon')

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="cv-page-body">

	@include('partials.custom-cursor')

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand text-white" href="{{ route('home') }}">Narcisse<span>.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Menu">
				<i class="fa fa-bars"></i> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="{{ route('home') }}" class="nav-link"><span data-i18n="cv.nav.portfolio">Portfolio</span></a></li>
					<li class="nav-item active"><a href="{{ route('cv') }}" class="nav-link"><span data-i18n="cv.nav.cv">CV</span></a></li>
					<li class="nav-item"><a href="{{ route('home') }}#contact-section" class="nav-link"><span data-i18n="cv.nav.contact">Contact</span></a></li>
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

	<section class="cv-page-section">
		<div class="container">
			<div class="cv-toolbar">
				<div class="cv-toolbar-copy">
					<span class="cv-toolbar-eyebrow" data-i18n="cv.eyebrow">Curriculum vitae</span>
					<p class="cv-toolbar-text mb-0" data-i18n="cv.intro">
						Parcours présenté en page web. Téléchargez le PDF si vous préférez le partager hors ligne.
					</p>
				</div>
				<div class="cv-toolbar-actions">
					<a href="{{ $pdfUrl }}" class="btn btn-primary py-3 px-4" download>
						<i class="fa fa-download mr-2"></i><span data-i18n="cv.download">Télécharger le PDF</span>
					</a>
					<button type="button" class="btn btn-outline-primary py-3 px-4" id="cv-share-btn">
						<i class="fa fa-share-alt mr-2"></i><span data-i18n="cv.share">Partager</span>
					</button>
					<a href="{{ route('home') }}" class="btn btn-outline-secondary py-3 px-4">
						<i class="fa fa-arrow-left mr-2"></i><span data-i18n="cv.back">Portfolio</span>
					</a>
				</div>
			</div>

			<article class="cv-sheet" aria-label="CV de Narcisse OGOUDIKPE">
				<header class="cv-sheet-header">
					<div class="cv-sheet-identity">
						<figure class="cv-avatar mb-0">
							<img
								src="{{ asset('images/Moi2.jpg') }}"
								alt="Portrait de Narcisse OGOUDIKPE"
								width="120"
								height="120"
								loading="eager"
								decoding="async"
							>
						</figure>
						<div>
							<p class="cv-role mb-1" data-i18n="cv.role">Développeur Laravel Junior</p>
							<h1 class="cv-name">Narcisse OGOUDIKPE</h1>
							<p class="cv-location mb-0">
								<i class="fa fa-briefcase mr-1" aria-hidden="true"></i>
								<span data-i18n="cv.availability">Ouvert aux missions · remote ou présentiel</span>
							</p>
						</div>
					</div>
					<ul class="cv-contacts">
						<li>
							<a href="mailto:ogoudikpenarcisse@gmail.com">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								ogoudikpenarcisse@gmail.com
							</a>
						</li>
						<li>
							<a href="tel:+2290199051003">
								<i class="fa fa-phone" aria-hidden="true"></i>
								+229 01 99 05 10 03
							</a>
						</li>
						<li>
							<a href="https://wa.me/22677503015" target="_blank" rel="noopener">
								<i class="fab fa-whatsapp" aria-hidden="true"></i>
								+226 77 50 30 15
							</a>
						</li>
						<li>
							<a href="https://github.com/Narcisse006" target="_blank" rel="noopener">
								<i class="fab fa-github" aria-hidden="true"></i>
								github.com/Narcisse006
							</a>
						</li>
					</ul>
				</header>

				<div class="cv-sheet-grid">
					<div class="cv-main">
						<section class="cv-block">
							<h2 class="cv-heading" data-i18n="cv.profile">Profil</h2>
							<p data-i18n="cv.profile.p1">
								Développeur web spécialisé en PHP et Laravel. Je construis des applications métier
								concrètes : stock, suivi de colis, forums, avec une base de données claire.
							</p>
							<p data-i18n="cv.profile.p2">
								Disponible pour missions, collaborations ou projets freelance :
								backend Laravel, remote ou présentiel.
							</p>
							<p class="mb-0" data-i18n="cv.profile.p3">
								Formé chez Simplon Burkina (2024–2025). Projets et code disponibles sur GitHub.
							</p>
						</section>

						<section class="cv-block">
							<h2 class="cv-heading" data-i18n="cv.projects">Projets réalisés</h2>

							<article class="cv-entry">
								<div class="cv-entry-top">
									<h3 class="cv-entry-title" data-i18n="cv.project.stock.title">Gestion de stock avec caisse</h3>
									<span class="cv-entry-meta">Laravel</span>
								</div>
								<p class="cv-entry-text" data-i18n="cv.project.stock">
									Système complet produits / ventes / caisse, logique métier (entrées, sorties, suivi),
									base de données et interface d’administration Laravel & Bootstrap.
								</p>
							</article>

							<article class="cv-entry">
								<div class="cv-entry-top">
									<h3 class="cv-entry-title" data-i18n="cv.project.colis.title">Suivi de colis</h3>
									<span class="cv-entry-meta">Laravel · Admin</span>
								</div>
								<p class="cv-entry-text" data-i18n="cv.project.colis">
									Tracking transporteur : statuts, tableau de bord et interface d’administration.
								</p>
							</article>

							<article class="cv-entry">
								<div class="cv-entry-top">
									<h3 class="cv-entry-title" data-i18n="cv.project.forum.title">Forum pour développeurs</h3>
									<span class="cv-entry-meta">PHP · MySQL</span>
								</div>
								<p class="cv-entry-text" data-i18n="cv.project.forum">
									Plateforme avec gestion des utilisateurs, publication de messages
									et système d’authentification.
								</p>
							</article>

							<article class="cv-entry">
								<div class="cv-entry-top">
									<h3 class="cv-entry-title" data-i18n="cv.project.time.title">TimeLux : site vitrine</h3>
									<span class="cv-entry-meta">HTML · CSS</span>
								</div>
								<p class="cv-entry-text mb-0" data-i18n="cv.project.time">
									Site e-commerce vitrine pour montres, design soigné et navigation responsive.
								</p>
							</article>
						</section>

						<section class="cv-block">
							<h2 class="cv-heading" data-i18n="cv.education">Formation</h2>

							<article class="cv-entry">
								<div class="cv-entry-top">
									<h3 class="cv-entry-title" data-i18n="cv.edu.simplon.title">Simplon Burkina</h3>
									<span class="cv-entry-meta">2024 – 2025</span>
								</div>
								<p class="cv-entry-role" data-i18n="cv.edu.simplon.role">Certification en Développement Web</p>
								<p class="cv-entry-text" data-i18n="cv.edu.simplon.desc">
									PHP, Laravel, Python, Java, Dart, Flutter, WordPress, HTML, CSS, MySQL.
									Travail collaboratif (Git, Trello), responsive design et bonnes pratiques.
								</p>
							</article>

							<article class="cv-entry">
								<div class="cv-entry-top">
									<h3 class="cv-entry-title" data-i18n="cv.edu.ltp.title">Lycée Technique Professionnel d’Agbokou</h3>
									<span class="cv-entry-meta">2021 – 2024</span>
								</div>
								<p class="cv-entry-role" data-i18n="cv.edu.ltp.role">DTI : Installation & Maintenance Informatique</p>
								<p class="cv-entry-text mb-0" data-i18n="cv.edu.ltp.desc">
									Maintenance informatique, réseaux de base, initiation à la programmation.
									Porto-Novo, Bénin.
								</p>
							</article>
						</section>
					</div>

					<aside class="cv-aside">
						<section class="cv-block">
							<h2 class="cv-heading" data-i18n="cv.skills">Compétences</h2>

							<div class="cv-skill-group">
								<h3 class="cv-skill-label" data-i18n="cv.skills.backend">Backend</h3>
								<div class="cv-tags">
									<span>PHP (POO)</span>
									<span>Laravel</span>
									<span>MySQL</span>
									<span>API REST</span>
									<span data-i18n="cv.skills.auth">Auth & rôles</span>
									<span>CRUD</span>
								</div>
							</div>

							<div class="cv-skill-group">
								<h3 class="cv-skill-label" data-i18n="cv.skills.frontend">Frontend</h3>
								<div class="cv-tags">
									<span>HTML / CSS</span>
									<span>Bootstrap</span>
									<span>Responsive</span>
									<span data-i18n="cv.skills.react">Notions React</span>
								</div>
							</div>

							<div class="cv-skill-group">
								<h3 class="cv-skill-label" data-i18n="cv.skills.tools">Outils & méthodes</h3>
								<div class="cv-tags">
									<span>Git / GitHub</span>
									<span>Trello</span>
									<span>Agile</span>
									<span>Figma / Canva</span>
								</div>
							</div>
						</section>

						<section class="cv-block">
							<h2 class="cv-heading" data-i18n="cv.languages">Langues</h2>
							<ul class="cv-list">
								<li><span data-i18n="cv.lang.fr">Français</span> <em data-i18n="cv.lang.fr.level">courant</em></li>
								<li><span data-i18n="cv.lang.en">Anglais</span> <em data-i18n="cv.lang.en.level">intermédiaire</em></li>
								<li><span data-i18n="cv.lang.fon">Fon</span> <em data-i18n="cv.lang.fon.level">courant</em></li>
							</ul>
						</section>

						<section class="cv-block cv-block--last">
							<h2 class="cv-heading" data-i18n="cv.interests">Centres d’intérêt</h2>
							<ul class="cv-list cv-list--plain mb-0">
								<li data-i18n="cv.i1">Veille technologique & hackathons</li>
								<li data-i18n="cv.i2">Création de contenu (vidéo / design)</li>
								<li data-i18n="cv.i3">Technologies web & innovation</li>
							</ul>
						</section>
					</aside>
				</div>
			</article>

			<div class="cv-cta text-center">
				<p class="mb-3" data-i18n="cv.interested">Intéressé par mon profil ?</p>
				<a href="{{ route('home') }}#contact-section" class="btn btn-primary py-3 px-5" data-i18n="cv.contact">
					Me contacter
				</a>
			</div>
		</div>
	</section>

	{{-- PDF conservé pour téléchargement uniquement (pas d’iframe) --}}
	<link rel="prefetch" href="{{ $pdfUrl }}" as="document">

	<div id="cv-toast" class="cv-toast" role="status" aria-live="polite" hidden></div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/custom-cursor.js') }}"></script>
	<script>
	(function () {
		var pageUrl = @json($pageUrl);
		var shareTitle = 'CV | Narcisse OGOUDIKPE';
		var shareText = 'Développeur Laravel Junior : découvrez mon CV.';
		var copiedMsg = document.documentElement.lang === 'en'
			? 'Link copied to clipboard'
			: 'Lien copié dans le presse-papiers';

		function showToast(message) {
			var toast = document.getElementById('cv-toast');
			if (!toast) return;
			toast.textContent = message;
			toast.hidden = false;
			toast.classList.add('cv-toast-visible');
			clearTimeout(showToast._timer);
			showToast._timer = setTimeout(function () {
				toast.classList.remove('cv-toast-visible');
				setTimeout(function () { toast.hidden = true; }, 300);
			}, 2800);
		}

		function copyLink() {
			if (navigator.clipboard && navigator.clipboard.writeText) {
				return navigator.clipboard.writeText(pageUrl).then(function () {
					showToast(copiedMsg);
				});
			}
			var input = document.createElement('input');
			input.value = pageUrl;
			document.body.appendChild(input);
			input.select();
			document.execCommand('copy');
			document.body.removeChild(input);
			showToast(copiedMsg);
			return Promise.resolve();
		}

		var shareBtn = document.getElementById('cv-share-btn');
		if (shareBtn) {
			shareBtn.addEventListener('click', function () {
				if (navigator.share) {
					navigator.share({
						title: shareTitle,
						text: shareText,
						url: pageUrl
					}).catch(function (err) {
						if (err && err.name === 'AbortError') return;
						copyLink();
					});
					return;
				}
				copyLink();
			});
		}
	})();
	</script>
</body>
</html>
