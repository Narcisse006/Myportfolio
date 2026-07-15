 (function($) {

	"use strict";

	var translations = {
		fr: {
			labels: {
				'nav.home': 'Accueil',
				'nav.expertise': 'Expertise',
				'nav.about': 'À propos',
				'nav.skills': 'Compétences',
				'nav.projects': 'Projets',
				'nav.contact': 'Contact',
				'nav.portfolio': 'Portfolio',
				'nav.cv': 'CV',
				'highlights.subheading': 'Mon approche',
				'highlights.heading': 'Ce que je mets en place sur vos projets',
				'highlights.paragraph': 'Pas de chiffres gonflés, des compétences concrètes que vous retrouverez dans le code et en production.',
				'highlights.card1.title': 'Backend Laravel',
				'highlights.card1.desc': 'Architecture MVC, routes REST, logique métier structurée et code maintenable.',
				'highlights.card2.title': 'Sécurité & rôles',
				'highlights.card2.desc': 'Authentification, middleware, permissions et validation des données côté serveur.',
				'highlights.card3.title': 'Données fiables',
				'highlights.card3.desc': 'Modélisation MySQL, migrations, relations Eloquent et requêtes optimisées.',
				'highlights.card4.title': 'Mise en ligne',
				'highlights.card4.desc': 'Versioning Git, tests manuels, déploiement et suivi après livraison.',
				'hero.role': 'Développeur Laravel Junior',
				'hero.title1': 'Spécialisé en applications web métier',
				'hero.desc1': 'Conception de solutions robustes avec authentification, gestion de rôles utilisateurs et bases de données relationnelles.',
				'hero.cv': 'Voir mon CV',
				'hero.slide2.role': 'Backend Laravel | API REST | Gestion de données',
				'hero.slide2.title': 'Je transforme des besoins métiers en solutions web performantes',
				'hero.slide2.desc1': 'CRUD sécurisés, dashboards administrateurs, systèmes multi-rôles et architecture structurée.',
				'about.profile': 'Profil professionnel',
				'about.intro1': 'Développeur Laravel junior basé à Porto-Novo, je construis des applications web orientées métier : tableaux de bord, CRUD sécurisés, API REST et gestion fine des accès utilisateurs.',
				'about.intro2': 'Je privilégie un code lisible, une base de données bien modélisée et une livraison progressive, de la maquette fonctionnelle jusqu’au déploiement. Disponible pour un stage ou une collaboration.',
				'about.download': 'Voir mon CV',
				'about.contact': 'Me contacter',
				'about.offCodeHeading': 'En dehors du code',
				'about.info.location': 'Localisation :',
				'about.info.email': 'Email :',
				'about.info.phone': 'Téléphone :',
				'about.info.github': 'GitHub :',
				'about.info.status': 'Statut :',
				'about.status.available': 'Disponible',
				'about.interest.music': 'Musique',
				'about.interest.travel': 'Voyage',
				'about.interest.movies': 'Films',
				'about.interest.sports': 'Sports',
				'skills.subheading': 'Compétences techniques',
				'skills.heading': 'Stack & niveau de maîtrise',
				'skills.paragraph': 'Évaluation honnête de mon niveau actuel, lobjectif est de montrer où je suis solide et où je continue à progresser.',
				'skills.card1.title': 'Backend (spécialité)',
				'skills.card2.title': 'Complémentaires',
				'skills.card3.title': 'Outils & environnement',
				'projects.subheading': 'Réalisations',
				'projects.heading': 'Projets sélectionnés',
				'projects.paragraph': 'Un aperçu de ce que j’ai construit, du site vitrine à l’application métier complète. Le code et les détails sont disponibles sur GitHub.',
				'projects.category.frontend': 'Front-end',
				'projects.category.phpmysql': 'PHP · MySQL',
				'projects.category.laravel': 'Laravel',
				'projects.category.laravelAdmin': 'Laravel · Admin',
				'projects.description.time': 'Site e-commerce vitrine pour montres haut de gamme, design soigné et navigation fluide.',
				'projects.description.forum': 'Plateforme d’échange entre développeurs : publications, réponses et espace communautaire.',
				'projects.description.stock': 'Application métier avec caisse intégrée, gestion des produits et suivi des ventes.',
				'projects.description.colis': 'Système de tracking pour transporteur : statuts, tableau de bord et interface admin.',
				'projects.github': 'Voir sur GitHub',
				'projects.more': 'Tous mes projets sur GitHub',
				'contact.subheading': 'Contact',
				'contact.heading': 'Parlons de votre projet',
				'contact.paragraph': 'Stage, collaboration ou simple question, écrivez-moi via le formulaire ou contactez-moi directement sur WhatsApp.',
				'contact.form.name': 'Nom',
				'contact.form.name.placeholder': 'Votre nom',
				'contact.form.email': 'Email',
				'contact.form.email.placeholder': 'votre@email.com',
				'contact.form.subject': 'Sujet',
				'contact.form.subject.placeholder': 'Ex. Proposition de stage',
				'contact.form.message': 'Message',
				'contact.form.message.placeholder': 'Décrivez votre besoin en quelques lignes…',
				'contact.form.submit': 'Envoyer le message',
				'contact.sidebar.title': 'Coordonnées',
				'contact.sidebar.location': 'Localisation',
				'contact.sidebar.email': 'Email',
				'contact.sidebar.phone': 'Téléphone',
				'contact.sidebar.github': 'GitHub',
				'contact.whatsapp': 'Discuter sur WhatsApp',
				'contact.note': 'Réponse habituelle sous 24–48 h.',
				'footer.tagline': 'Développeur Laravel junior, applications web métier, API REST et solutions sécurisées. Disponible pour un stage ou une collaboration.',
				'footer.cv': 'Voir mon CV',
				'footer.navigation': 'Navigation',
				'footer.contactTitle': 'Me contacter',
				'footer.networks': 'Réseaux',
				'footer.follow': 'Suivez mon parcours et mes projets en ligne.',
				'footer.copy': 'Tous droits réservés.',
				'footer.designed': 'Conçu avec',
				'footer.by': 'par',
				'cv.nav.portfolio': 'Portfolio',
				'cv.nav.cv': 'CV',
				'cv.nav.contact': 'Contact',
				'cv.toast': 'Lien copié dans le presse-papiers',
				'cv.title': 'Mon CV professionnel',
				'cv.intro': 'Consultez mon parcours ci-dessous. Une fois le document parcouru, vous pouvez le télécharger ou le partager avec votre équipe.',
				'cv.download': 'Télécharger le PDF',
				'cv.share': 'Partager',
				'cv.back': 'Retour au portfolio',
				'cv.hint': 'Sur mobile, l’aperçu peut être limité — utilisez le bouton de téléchargement si besoin.',
				'cv.interested': 'Intéressé par mon profil ?',
				'cv.contact': 'Me contacter',
			},
			switchLabel: 'EN',
			switchTitle: 'English',
			documentTitle: 'Narcisse OGOUDIKPE — Portfolio',
			pageTitles: {
				'home-section': 'Accueil',
				'highlights-section': 'Expertise',
				'about-section': 'À propos',
				'skills-section': 'Compétences',
				'projects-section': 'Projets',
				'contact-section': 'Contact',
			}
		},
		en: {
			labels: {
				'nav.home': 'Home',
				'nav.expertise': 'Expertise',
				'nav.about': 'About',
				'nav.skills': 'Skills',
				'nav.projects': 'Projects',
				'nav.contact': 'Contact',
				'nav.portfolio': 'Portfolio',
				'nav.cv': 'CV',
				'highlights.subheading': 'My approach',
				'highlights.heading': 'What I deliver on your projects',
				'highlights.paragraph': 'No inflated numbers, concrete skills you will find in the code and in production.',
				'highlights.card1.title': 'Laravel Backend',
				'highlights.card1.desc': 'MVC architecture, REST routes, structured business logic and maintainable code.',
				'highlights.card2.title': 'Security & roles',
				'highlights.card2.desc': 'Authentication, middleware, permissions and server-side data validation.',
				'highlights.card3.title': 'Reliable data',
				'highlights.card3.desc': 'MySQL modeling, migrations, Eloquent relations and optimized queries.',
				'highlights.card4.title': 'Deployment',
				'highlights.card4.desc': 'Git versioning, manual testing, deployment and post-delivery monitoring.',
				'hero.role': 'Laravel Junior Developer',
				'hero.title1': 'Specialized in business web applications',
				'hero.desc1': 'Building robust solutions with authentication, role management and relational databases.',
				'hero.cv': 'View my resume',
				'hero.slide2.role': 'Laravel Backend | REST API | Data Management',
				'hero.slide2.title': 'I turn business needs into high-performance web solutions',
				'hero.slide2.desc1': 'Secure CRUD, admin dashboards, multi-role systems and structured architecture.',
				'about.profile': 'Professional profile',
				'about.intro1': 'Laravel junior developer based in Porto-Novo, I build business-focused web applications: dashboards, secure CRUD, REST APIs and fine-grained access control.',
				'about.intro2': 'I favor readable code, a well-modeled database and progressive delivery, from functional prototype to deployment. Available for internships or collaboration.',
				'about.download': 'View my resume',
				'about.contact': 'Contact me',
				'about.offCodeHeading': 'Outside of code',
				'about.info.location': 'Location:',
				'about.info.email': 'Email:',
				'about.info.phone': 'Phone:',
				'about.info.github': 'GitHub:',
				'about.info.status': 'Status:',
				'about.status.available': 'Available',
				'about.interest.music': 'Music',
				'about.interest.travel': 'Travel',
				'about.interest.movies': 'Movies',
				'about.interest.sports': 'Sports',
				'skills.subheading': 'Technical skills',
				'skills.heading': 'Stack & proficiency',
				'skills.paragraph': 'An honest assessment of my current level, showing where I am strong and where I continue to improve.',
				'skills.card1.title': 'Backend (specialty)',
				'skills.card2.title': 'Additional skills',
				'skills.card3.title': 'Tools & environment',
				'projects.subheading': 'Achievements',
				'projects.heading': 'Selected Projects',
				'projects.paragraph': 'A look at what I built, from brochure sites to full business applications. Code and details are available on GitHub.',
				'projects.category.frontend': 'Front-end',
				'projects.category.phpmysql': 'PHP · MySQL',
				'projects.category.laravel': 'Laravel',
				'projects.category.laravelAdmin': 'Laravel · Admin',
				'projects.description.time': 'E-commerce showcase site for premium watches, clean design and smooth navigation.',
				'projects.description.forum': 'Developer exchange platform: posts, replies and community space.',
				'projects.description.stock': 'Business application with integrated checkout, product management and sales tracking.',
				'projects.description.colis': 'Shipping tracking system for carriers: statuses, dashboard and admin interface.',
				'projects.github': 'View on GitHub',
				'projects.more': 'All my projects on GitHub',
				'contact.subheading': 'Contact',
				'contact.heading': 'Let’s talk about your project',
				'contact.paragraph': 'Internship, collaboration or a quick question, write to me using the form or contact me directly on WhatsApp.',
				'contact.form.name': 'Name',
				'contact.form.name.placeholder': 'Your name',
				'contact.form.email': 'Email',
				'contact.form.email.placeholder': 'your@email.com',
				'contact.form.subject': 'Subject',
				'contact.form.subject.placeholder': 'e.g. Internship proposal',
				'contact.form.message': 'Message',
				'contact.form.message.placeholder': 'Describe your needs in a few lines…',
				'contact.form.submit': 'Send message',
				'contact.sidebar.title': 'Contact details',
				'contact.sidebar.location': 'Location',
				'contact.sidebar.email': 'Email',
				'contact.sidebar.phone': 'Phone',
				'contact.sidebar.github': 'GitHub',
				'contact.whatsapp': 'Chat on WhatsApp',
				'contact.note': 'Typical response within 24–48h.',
				'footer.tagline': 'Laravel junior developer, business web applications, REST APIs and secure solutions. Available for internships or collaboration.',
				'footer.cv': 'View my resume',
				'footer.navigation': 'Navigation',
				'footer.contactTitle': 'Contact me',
				'footer.networks': 'Networks',
				'footer.follow': 'Follow my work and projects online.',
				'footer.copy': 'All rights reserved.',
				'footer.designed': 'Designed with',
				'footer.by': 'by',
				'cv.nav.portfolio': 'Portfolio',
				'cv.nav.cv': 'CV',
				'cv.nav.contact': 'Contact',
				'cv.toast': 'Link copied to clipboard',
				'cv.title': 'My professional resume',
				'cv.intro': 'Review my background below. Once you have browsed the document, you can download or share it with your team.',
				'cv.download': 'Download PDF',
				'cv.share': 'Share',
				'cv.back': 'Back to portfolio',
				'cv.hint': 'On mobile, preview may be limited — use the download button if needed.',
				'cv.interested': 'Interested in my profile?',
				'cv.contact': 'Contact me',
			},
			switchLabel: 'FR',
			switchTitle: 'Français',
			documentTitle: 'Narcisse OGOUDIKPE — Portfolio',
			pageTitles: {
				'home-section': 'Home',
				'highlights-section': 'Expertise',
				'about-section': 'About',
				'skills-section': 'Skills',
				'projects-section': 'Projects',
				'contact-section': 'Contact',
			}
		}
	};

	function translatePage(lang) {
		var translation = translations[lang] || translations.fr;
		document.documentElement.lang = lang;
		localStorage.setItem('siteLang', lang);

		document.querySelectorAll('[data-i18n]').forEach(function (node) {
			var key = node.getAttribute('data-i18n');
			if (key && translation.labels[key] !== undefined) {
				node.textContent = translation.labels[key];
			}
		});

		document.querySelectorAll('[data-i18n-html]').forEach(function (node) {
			var key = node.getAttribute('data-i18n-html');
			if (key && translation.labels[key] !== undefined) {
				node.innerHTML = translation.labels[key];
			}
		});

		document.querySelectorAll('[data-i18n-placeholder]').forEach(function (node) {
			var key = node.getAttribute('data-i18n-placeholder');
			if (key && translation.labels[key] !== undefined) {
				node.placeholder = translation.labels[key];
			}
		});

		document.querySelectorAll('[data-i18n-toast]').forEach(function (node) {
			var key = node.getAttribute('data-i18n-toast');
			if (key && translation.labels[key] !== undefined) {
				node.dataset.i18nToast = translation.labels[key];
			}
		});

		Object.keys(translation.pageTitles).forEach(function (sectionId) {
			var section = document.getElementById(sectionId);
			if (section) {
				section.setAttribute('data-page-title', translation.pageTitles[sectionId]);
			}
		});

		var toggle = document.getElementById('lang-toggle');
		if (toggle) {
			toggle.textContent = translation.switchLabel;
			toggle.title = translation.switchTitle;
		}

		if (translation.documentTitle) {
			document.title = translation.documentTitle;
		}
	}

	function initLanguageSwitcher() {
		var savedLang = localStorage.getItem('siteLang') || 'fr';
		translatePage(savedLang);

		var toggle = document.getElementById('lang-toggle');
		if (!toggle) return;

		toggle.addEventListener('click', function (event) {
			event.preventDefault();
			var current = document.documentElement.lang || 'fr';
			translatePage(current === 'fr' ? 'en' : 'fr');
		});
	}

	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader (ancien spinner — ignoré si preloader dev présent)
	var loader = function() {
		if ($('#dev-preloader').length > 0) return;
		setTimeout(function() {
			if ($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();



   // Burger Menu
	var burgerMenu = function() {

		$('body').on('click', '.js-fh5co-nav-toggle', function(event){

			event.preventDefault();

			if ( $('#ftco-nav').is(':visible') ) {
				$(this).removeClass('active');
			} else {
				$(this).addClass('active');	
			}

			
			
		});

	};
	burgerMenu();


	var onePageClick = function() {


		$(document).on('click', 'a[href^="#"]', function (event) {
	    var href = $.attr(this, 'href');
	    if (!href || href === '#' || href.length < 2) return;

	    var target = $(href);
	    if (!target.length) return;

	    event.preventDefault();

	    $('html, body').animate({
	        scrollTop: target.offset().top - 70
	    }, 500, function() {
	    	if (history.pushState) {
				history.pushState(null, null, href);
			} else {
				window.location.hash = href;
			}
	    });
		});

	};

	onePageClick();
	initLanguageSwitcher();
	

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			autoplay: true,
			autoplaySpeed:2000,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});
	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	

	var counter = function() {
		
		$('#section-counter, .hero-wrap, .ftco-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();


	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();

	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });

})(jQuery);



$(function() {

  $(".progress").each(function() {

    var value = $(this).attr('data-value');
    var left = $(this).find('.progress-left .progress-bar');
    var right = $(this).find('.progress-right .progress-bar');

    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      } else {
        right.css('transform', 'rotate(180deg)')
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
      }
    }

  })

  function percentageToDegrees(percentage) {

    return percentage / 100 * 360

  }

});

