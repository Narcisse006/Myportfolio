<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	@include('partials.seo', [
		'seoTitle' => 'CV | Narcisse OGOUDIKPE - Full-Stack Developer',
		'seoDescription' => 'CV de Narcisse OGOUDIKPE, Full-Stack Developer. Parcours, compétences, projets et téléchargement PDF.',
		'seoCanonical' => url('/cv'),
	])
	@include('partials.favicon')

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Rajdhani:wght@500;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}?v=39">
</head>
<body class="cv-page-body shell-cv">

	@include('partials.custom-cursor')

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target site-nav scrolled awake" id="ftco-navbar">
		<div class="container site-nav__inner">
			<a class="navbar-brand site-nav__brand" href="{{ route('home') }}">Narcisse<span class="site-nav__dot">.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle site-nav__toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Ouvrir le menu">
				<span class="site-nav__burger" aria-hidden="true"><span></span><span></span><span></span></span>
			</button>
			<div class="collapse navbar-collapse site-nav__collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto site-nav__list">
					<li class="nav-item"><a href="{{ route('home') }}" class="nav-link site-nav__link"><span data-i18n="cv.nav.portfolio">Portfolio</span></a></li>
					<li class="nav-item active"><a href="{{ route('cv') }}" class="nav-link site-nav__link"><span data-i18n="cv.nav.cv">CV</span></a></li>
					<li class="nav-item"><a href="{{ route('contact') }}" class="nav-link site-nav__link"><span data-i18n="cv.nav.contact">Contact</span></a></li>
					<li class="nav-item nav-item-lang">
						<a href="#" id="lang-toggle" class="nav-link lang-toggle site-nav__lang" title="English" aria-label="Passer en anglais">
							<span class="lang-toggle-flag" aria-hidden="true">🇬🇧</span>
							<span class="lang-toggle-label">EN</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="cv-page-section shell-cv__page">
		<div class="shell-cv__atmosphere" aria-hidden="true"></div>
		@include('partials.shell-surface-icons')

		<div class="container shell-cv__container">
			<header class="shell-cv__top">
				<div class="shell-cv__top-copy">
					<span class="shell-cv__eyebrow" data-i18n="cv.eyebrow">Curriculum vitae</span>
					<p class="shell-cv__lead" data-i18n="cv.intro">
						Parcours présenté en page web. Téléchargez le PDF si vous préférez le partager hors ligne.
					</p>
				</div>
				<div class="shell-cv__actions">
					<a href="{{ $pdfUrl }}" class="shell-btn shell-btn--primary" download>
						<i class="fa fa-download" aria-hidden="true"></i>
						<span data-i18n="cv.download">Télécharger le PDF</span>
					</a>
					<button type="button" class="shell-btn shell-btn--ghost" id="cv-share-btn">
						<i class="fa fa-share-alt" aria-hidden="true"></i>
						<span data-i18n="cv.share">Partager</span>
					</button>
					<a href="{{ route('home') }}" class="shell-btn shell-btn--ghost">
						<i class="fa fa-arrow-left" aria-hidden="true"></i>
						<span data-i18n="cv.back">Portfolio</span>
					</a>
				</div>
			</header>

			<article class="shell-cv__dossier" aria-label="CV de Narcisse OGOUDIKPE">
				<div class="shell-cv__identity">
					<figure class="shell-cv__media">
						<span class="shell-cv__corners" aria-hidden="true"></span>
						<span class="shell-cv__glow" aria-hidden="true"></span>
						<picture>
							<source srcset="{{ asset('images/profile/Nessi.webp') }}" type="image/webp">
							<img
								class="shell-cv__photo"
								src="{{ asset('images/profile/Nessi.jpg') }}"
								alt="Portrait de Narcisse OGOUDIKPE"
								width="960"
								height="960"
								loading="eager"
								decoding="async"
							>
						</picture>
					</figure>

					<div class="shell-cv__id-panel">
						<div class="shell-cv__id-meta">
							<span class="shell-cv__badge">
								<span class="shell-cv__badge-dot" aria-hidden="true"></span>
								<span data-i18n="cv.availability">Ouvert aux missions</span>
							</span>
							<p class="shell-cv__role" data-i18n="cv.role">FULL-STACK DEVELOPER</p>
							<h1 class="shell-cv__name">Narcisse OGOUDIKPE</h1>
						</div>

						<ul class="shell-cv__contacts">
							<li>
								<a href="mailto:{{ config('portfolio.email') }}">
									<span class="shell-cv__contact-icon" aria-hidden="true"><i class="fa fa-envelope"></i></span>
									<span>{{ config('portfolio.email') }}</span>
								</a>
							</li>
							<li>
								<a href="tel:{{ config('portfolio.phone_bj.tel') }}">
									<span class="shell-cv__contact-icon" aria-hidden="true"><i class="fa fa-phone"></i></span>
									<span>{{ config('portfolio.phone_bj.display') }}</span>
								</a>
							</li>
							<li>
								<a href="{{ config('portfolio.whatsapp.url') }}" target="_blank" rel="noopener">
									<span class="shell-cv__contact-icon" aria-hidden="true"><i class="fab fa-whatsapp"></i></span>
									<span>{{ config('portfolio.phone_bf.display') }}</span>
								</a>
							</li>
							<li>
								<a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener">
									<span class="shell-cv__contact-icon" aria-hidden="true"><i class="fab fa-github"></i></span>
									<span>github.com/Narcisse006</span>
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="shell-cv__body">
					<div class="shell-cv__main">
						<section class="shell-cv__block">
							<h2 class="shell-cv__heading" data-i18n="cv.profile">Profil</h2>
							<div class="shell-cv__prose">
								<p data-i18n="cv.profile.p1">
									Développeur web spécialisé en PHP et Laravel. Je construis des applications métier
									concrètes : stock, suivi de colis, forums, avec une base de données claire.
								</p>
								<p data-i18n="cv.profile.p2">
									Disponible pour des missions et des collaborations, sur du Laravel.
								</p>
								<p class="mb-0" data-i18n="cv.profile.p3">
									Formé chez Simplon Burkina (2024–2025). Projets et code disponibles sur GitHub.
								</p>
							</div>
						</section>

						<section class="shell-cv__block">
							<h2 class="shell-cv__heading" data-i18n="cv.projects">Projets réalisés</h2>

							<article class="shell-cv__entry">
								<div class="shell-cv__entry-top">
									<h3 class="shell-cv__entry-title" data-i18n="cv.project.stock.title">Gestion de stock avec caisse</h3>
									<span class="shell-cv__tag">Laravel</span>
								</div>
								<p class="shell-cv__entry-text" data-i18n="cv.project.stock">
									La caisse, le catalogue et le stock sont dans la même application.
									Une vente met les quantités à jour tout de suite.
								</p>
							</article>

							<article class="shell-cv__entry">
								<div class="shell-cv__entry-top">
									<h3 class="shell-cv__entry-title" data-i18n="cv.project.colis.title">Suivi de colis</h3>
									<span class="shell-cv__tag">Laravel · Admin</span>
								</div>
								<p class="shell-cv__entry-text" data-i18n="cv.project.colis">
									Suivi des colis pour une société de transport.
									Le statut de chaque envoi se lit sur un tableau de bord, et se met à jour depuis l’admin.
								</p>
							</article>

							<article class="shell-cv__entry">
								<div class="shell-cv__entry-top">
									<h3 class="shell-cv__entry-title" data-i18n="cv.project.forum.title">Forum pour développeurs</h3>
									<span class="shell-cv__tag">PHP · MySQL</span>
								</div>
								<p class="shell-cv__entry-text" data-i18n="cv.project.forum">
									Un espace où les développeurs publient et se répondent.
									Chacun a un compte, et l’accès passe par une authentification.
								</p>
							</article>

							<article class="shell-cv__entry">
								<div class="shell-cv__entry-top">
									<h3 class="shell-cv__entry-title" data-i18n="cv.project.time.title">TimeLux : site vitrine</h3>
									<span class="shell-cv__tag">HTML · CSS</span>
								</div>
								<p class="shell-cv__entry-text mb-0" data-i18n="cv.project.time">
									Site de montres haut de gamme, avec fiches produit et navigation.
									Réalisé en HTML et CSS.
								</p>
							</article>
						</section>

						<section class="shell-cv__block">
							<h2 class="shell-cv__heading" data-i18n="cv.education">Formation</h2>

							<article class="shell-cv__entry">
								<div class="shell-cv__entry-top">
									<h3 class="shell-cv__entry-title" data-i18n="cv.edu.simplon.title">Simplon Burkina</h3>
									<span class="shell-cv__tag">2024 – 2025</span>
								</div>
								<p class="shell-cv__entry-role" data-i18n="cv.edu.simplon.role">Certification en Développement Web</p>
								<p class="shell-cv__entry-text" data-i18n="cv.edu.simplon.desc">
									PHP, Laravel, Python, Java, Dart, Flutter, WordPress, HTML, CSS, MySQL.
									Travail collaboratif (Git, Trello), responsive design et bonnes pratiques.
								</p>
							</article>

							<article class="shell-cv__entry">
								<div class="shell-cv__entry-top">
									<h3 class="shell-cv__entry-title" data-i18n="cv.edu.ltp.title">Lycée Technique Professionnel d’Agbokou</h3>
									<span class="shell-cv__tag">2021 – 2024</span>
								</div>
								<p class="shell-cv__entry-role" data-i18n="cv.edu.ltp.role">DTI : Installation & Maintenance Informatique</p>
								<p class="shell-cv__entry-text mb-0" data-i18n="cv.edu.ltp.desc">
									Maintenance informatique, réseaux de base, initiation à la programmation.
								</p>
							</article>
						</section>
					</div>

					<aside class="shell-cv__aside">
						<section class="shell-cv__panel">
							<h2 class="shell-cv__heading" data-i18n="cv.skills">Compétences</h2>

							<div class="shell-cv__skill-group">
								<h3 class="shell-cv__skill-label" data-i18n="cv.skills.backend">Backend</h3>
								<div class="shell-cv__chips">
									<span>PHP (POO)</span>
									<span>Laravel</span>
									<span>MySQL</span>
									<span>API REST</span>
									<span data-i18n="cv.skills.auth">Auth & rôles</span>
									<span>CRUD</span>
								</div>
							</div>

							<div class="shell-cv__skill-group">
								<h3 class="shell-cv__skill-label" data-i18n="cv.skills.frontend">Frontend</h3>
								<div class="shell-cv__chips">
									<span>HTML / CSS</span>
									<span>Bootstrap</span>
									<span>Responsive</span>
									<span data-i18n="cv.skills.react">Notions React</span>
								</div>
							</div>

							<div class="shell-cv__skill-group">
								<h3 class="shell-cv__skill-label" data-i18n="cv.skills.tools">Outils & méthodes</h3>
								<div class="shell-cv__chips">
									<span>Git / GitHub</span>
									<span>Trello</span>
									<span>Agile</span>
									<span>Figma / Canva</span>
								</div>
							</div>
						</section>

						<section class="shell-cv__panel">
							<h2 class="shell-cv__heading" data-i18n="cv.languages">Langues</h2>
							<ul class="shell-cv__list">
								<li><span data-i18n="cv.lang.fr">Français</span> <em data-i18n="cv.lang.fr.level">courant</em></li>
								<li><span data-i18n="cv.lang.en">Anglais</span> <em data-i18n="cv.lang.en.level">intermédiaire</em></li>
								<li><span data-i18n="cv.lang.fon">Fon</span> <em data-i18n="cv.lang.fon.level">courant</em></li>
							</ul>
						</section>

						<section class="shell-cv__panel">
							<h2 class="shell-cv__heading" data-i18n="cv.interests">Centres d’intérêt</h2>
							<ul class="shell-cv__list shell-cv__list--plain mb-0">
								<li data-i18n="cv.i1">Veille technologique & hackathons</li>
								<li data-i18n="cv.i2">Création de contenu (vidéo / design)</li>
								<li data-i18n="cv.i3">Technologies web & innovation</li>
							</ul>
						</section>
					</aside>
				</div>
			</article>

			<div class="shell-cv__cta">
				<p data-i18n="cv.interested">Intéressé par mon profil ?</p>
				<a href="{{ route('contact') }}" class="shell-btn shell-btn--primary" data-i18n="cv.contact">
					Me contacter
				</a>
			</div>
		</div>
	</section>

	<footer class="site-footer" id="footer">
		<div class="container site-footer__inner">
			<div class="site-footer__bottom">
				<p class="site-footer__copy mb-0">
					&copy; {{ date('Y') }} Narcisse OGOUDIKPE. <span data-i18n="footer.copy">Tous droits réservés.</span>
				</p>
				<p class="site-footer__credits mb-0">
					<a href="{{ route('home') }}">Portfolio</a>
					<span class="site-footer__heart" aria-hidden="true">·</span>
					<a href="{{ route('contact') }}"><span data-i18n="cv.nav.contact">Contact</span></a>
				</p>
			</div>
		</div>
	</footer>

	<link rel="prefetch" href="{{ $pdfUrl }}" as="document">

	<div id="cv-toast" class="cv-toast" role="status" aria-live="polite" hidden></div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}?v=22"></script>
	<script src="{{ asset('js/custom-cursor.js') }}?v=3"></script>
	<script>
	(function () {
		var pageUrl = @json($pageUrl);
		var shareTitle = 'CV | Narcisse OGOUDIKPE';
		var shareText = 'Full-Stack Developer : découvrez mon CV.';
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
