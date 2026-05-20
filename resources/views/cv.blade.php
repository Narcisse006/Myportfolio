<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Mon CV — Narcisse OGOUDIKPE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Consultez le CV de Narcisse OGOUDIKPE, développeur Laravel junior. Téléchargement et partage disponibles.">

	@include('partials.favicon')

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="cv-page-body dev-preloader-active">

	@include('partials.preloader')
	@include('partials.custom-cursor')

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand text-white" href="{{ route('home') }}">Narcisse<span>.</span></a>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Menu">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav nav ml-auto">
					<li class="nav-item"><a href="{{ route('home') }}" class="nav-link"><span>Portfolio</span></a></li>
					<li class="nav-item active"><a href="{{ route('cv') }}" class="nav-link"><span>CV</span></a></li>
					<li class="nav-item"><a href="{{ route('home') }}#contact-section" class="nav-link"><span>Contact</span></a></li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="cv-page-section ftco-section">
		<div class="container">
			<div class="row justify-content-center pb-4">
				<div class="col-lg-10 text-center">
					<span class="subheading portfolio-accent">Curriculum vitae</span>
					<h1 class="mb-3">Mon CV professionnel</h1>
					<p class="cv-page-intro">
						Consultez mon parcours ci-dessous. Une fois le document parcouru,
						vous pouvez le télécharger ou le partager avec votre équipe.
					</p>
				</div>
			</div>

			<div class="row justify-content-center mb-4">
				<div class="col-lg-10">
					<div class="cv-actions-bar d-flex flex-wrap justify-content-center align-items-center">
						<a href="{{ $pdfUrl }}" class="btn btn-primary py-3 px-4 mr-2 mb-2" download>
							<i class="fa fa-download mr-2"></i> Télécharger le PDF
						</a>
						<button type="button" class="btn btn-outline-primary py-3 px-4 mr-2 mb-2" id="cv-share-btn">
							<i class="fa fa-share-alt mr-2"></i> Partager
						</button>
						<a href="{{ route('home') }}" class="btn btn-outline-secondary py-3 px-4 mb-2">
							<i class="fa fa-arrow-left mr-2"></i> Retour au portfolio
						</a>
					</div>
					<p class="cv-share-hint text-center mb-0">
						<small class="text-muted">
							<i class="fa fa-info-circle portfolio-accent mr-1"></i>
							Sur mobile, l’aperçu peut être limité — utilisez le bouton de téléchargement si besoin.
						</small>
					</p>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="cv-viewer-wrap">
						<iframe
							src="{{ $pdfUrl }}"
							title="CV de Narcisse OGOUDIKPE — Développeur Laravel"
							class="cv-viewer-frame"
						></iframe>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mt-4">
				<div class="col-lg-10 text-center">
					<p class="mb-3">Intéressé par mon profil ?</p>
					<a href="{{ route('home') }}#contact-section" class="btn btn-primary py-3 px-5">
						Me contacter
					</a>
				</div>
			</div>
		</div>
	</section>

	<div id="cv-toast" class="cv-toast" role="status" aria-live="polite" hidden></div>

	<script src="js/dev-preloader.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/custom-cursor.js"></script>
	<script>
	(function () {
		var pageUrl = @json($pageUrl);
		var shareTitle = 'CV — Narcisse OGOUDIKPE';
		var shareText = 'Développeur Laravel Junior — découvrez mon CV professionnel.';

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
					showToast('Lien copié dans le presse-papiers');
				});
			}
			var input = document.createElement('input');
			input.value = pageUrl;
			document.body.appendChild(input);
			input.select();
			document.execCommand('copy');
			document.body.removeChild(input);
			showToast('Lien copié dans le presse-papiers');
			return Promise.resolve();
		}

		document.getElementById('cv-share-btn').addEventListener('click', function () {
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
	})();
	</script>
</body>
</html>
