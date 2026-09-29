 (function($) {

	"use strict";

	var translations = {
		fr: {
			labels: {
				'nav.home': 'Accueil',
				'nav.expertise': 'Expertise',
				'nav.about': 'À propos',
				'nav.pro': 'Professionnel',
				'nav.skills': 'Compétences',
				'nav.projects': 'Projets',
				'nav.contact': 'Contact',
				'nav.portfolio': 'Portfolio',
				'nav.cv': 'CV',
				'highlights.subheading': 'Expertise',
				'highlights.heading': 'Ce que j’apporte sur un projet',
				'highlights.paragraph': 'Quatre piliers que je mets en pratique sur mes projets, pas une liste de buzzwords.',
				'highlights.card1.title': 'Backend Laravel',
				'highlights.card1.desc': 'Architecture MVC, routes REST, logique métier structurée et code maintenable.',
				'highlights.card2.title': 'Sécurité & rôles',
				'highlights.card2.desc': 'Authentification, middleware, permissions et validation des données côté serveur.',
				'highlights.card3.title': 'Données fiables',
				'highlights.card3.desc': 'Modélisation MySQL, migrations, relations Eloquent et requêtes optimisées.',
				'highlights.card4.title': 'Mise en ligne',
				'highlights.card4.desc': 'Versioning Git, tests manuels, déploiement et suivi après livraison.',
				'hero.title': 'FULL-STACK DEVELOPER',
				'hero.stack': 'Laravel · PHP · MySQL · Git',
				'hero.scroll': 'ENGAGE',
				'hero.watermark': 'ENGINEERING · PRECISION · SYSTEMS',
				'hero.missionLabel': 'MISSION',
				'hero.mission': 'SHIP CLEAN SYSTEMS',
				'about.profile': 'À propos',
				'about.heading': 'Qui je suis',
				'about.lead': 'Full-Stack Developer : backends clairs, applications métier et livraison jusqu’en production.',
				'about.hello': 'Bonjour',
				'about.roleLine': 'FULL-STACK DEVELOPER <br><span class="shell-profile__location">Disponible · remote ou présentiel</span>',
				'about.intro1': 'Formé chez Simplon, j’ai construit des applications concrètes : gestion de stock, suivi de colis, forum. Mon fil rouge, c’est le backend Laravel.',
				'about.intro2': 'Ce qui m’intéresse : comprendre le besoin, structurer la base de données, et livrer une interface claire jusqu’au déploiement.',
				'about.download': 'Voir mon CV',
				'about.contact': 'Me contacter',
				'about.offCodeHeading': 'En dehors du code',
				'about.info.email': 'Email',
				'about.info.phone': 'Téléphone',
				'about.info.github': 'GitHub',
				'about.interest.music': 'Musique',
				'about.interest.travel': 'Voyage',
				'about.interest.movies': 'Films',
				'about.interest.sports': 'Sports',
				'pro.subheading': 'Ce que je propose',
				'pro.available': 'Disponible pour missions & collaborations',
				'pro.heading': 'Des applications Laravel utiles pour votre métier',
				'pro.lead': 'Je conçois des backends clairs et des outils concrets : gestion, suivi, espaces admin et API. Du besoin jusqu’à une base solide en production.',
				'pro.point1': 'Applications métier (stock, suivi, administration)',
				'pro.point2': 'API REST, authentification et gestion des rôles',
				'pro.point3': 'Code structuré, MySQL propre, livraison remote-friendly',
				'pro.cv': 'Voir mes projets',
				'pro.contact': 'Parler d’un projet',
				'skills.subheading': 'Compétences',
				'skills.heading': 'Ma stack technique',
				'skills.paragraph': 'Le cœur de mon travail, c’est le backend Laravel. Le reste sert à livrer une interface claire et un projet propre jusqu’en production.',
				'skills.card1.title': 'Backend',
				'skills.card2.title': 'Front & UI',
				'skills.card3.title': 'Outils',
				'projects.subheading': 'Réalisations',
				'projects.heading': 'Projets sélectionnés',
				'projects.paragraph': 'Surtout des applications Laravel métier. Le code est disponible sur GitHub.',
				'projects.category.frontend': 'Front-end',
				'projects.category.phpmysql': 'PHP · MySQL',
				'projects.category.laravel': 'Laravel',
				'projects.category.laravelAdmin': 'Laravel · Admin',
				'projects.description.time': 'Site e-commerce vitrine pour montres haut de gamme, design soigné et navigation fluide.',
				'projects.description.forum': 'Plateforme d’échange entre développeurs : publications, réponses et espace communautaire.',
				'projects.description.stock': 'Application métier avec caisse intégrée, gestion des produits et suivi des ventes.',
				'projects.description.colis': 'Système de tracking pour transporteur : statuts, tableau de bord et interface admin.',
				'projects.view': 'Voir le projet',
				'projects.github': 'GitHub',
				'projects.more': 'Tous mes projets sur GitHub',
				'casestudy.subheading': 'Étude de cas',
				'casestudy.heading': 'Gestion de stock',
				'casestudy.intro': 'Comment j’ai conçu une application métier Laravel pour suivre les produits, enregistrer les ventes et sécuriser l’accès admin.',
				'casestudy.problemLabel': 'Contexte',
				'casestudy.problem': 'Remplacer un suivi manuel peu fiable par un outil simple : catalogue produits, caisse, et stock toujours à jour après chaque vente.',
				'casestudy.solutionLabel': 'Ce que j’ai livré',
				'casestudy.item1': 'CRUD produits / catégories avec validation serveur',
				'casestudy.item2': 'Caisse et décrément automatique du stock',
				'casestudy.item3': 'Authentification et espace administrateur',
				'casestudy.item4': 'Schéma MySQL relationnel via migrations Eloquent',
				'casestudy.cta': 'Voir le code sur GitHub',
				'casestudy.back': 'Voir les autres projets',
				'contact.subheading': 'Contact',
				'contact.heading': 'Parlons de votre projet',
				'contact.paragraph': 'Mission, collaboration ou simple question : écrivez-moi via le formulaire ou contactez-moi directement sur WhatsApp.',
				'contact.form.name': 'Nom',
				'contact.form.name.placeholder': 'Votre nom',
				'contact.form.email': 'Email',
				'contact.form.email.placeholder': 'votre@email.com',
				'contact.form.subject': 'Sujet',
				'contact.form.subject.placeholder': 'Ex. Demande de collaboration',
				'contact.form.message': 'Message',
				'contact.form.message.placeholder': 'Décrivez votre besoin en quelques lignes…',
				'contact.form.submit': 'Envoyer le message',
				'contact.sidebar.title': 'Coordonnées',
				'contact.sidebar.location': 'Zone',
				'contact.sidebar.locationValue': 'Afrique de l’Ouest · Remote',
				'contact.sidebar.email': 'Email',
				'contact.sidebar.phone': 'Téléphone',
				'contact.sidebar.github': 'GitHub',
				'contact.whatsapp': 'Discuter sur WhatsApp',
				'contact.note': 'Réponse habituelle sous 24–48 h.',
				'footer.tagline': 'Full-Stack Developer : applications web métier, API REST et outils sécurisés. Ouvert aux missions et collaborations.',
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
				'cv.eyebrow': 'Curriculum vitae',
				'cv.documentTitle': 'CV | Narcisse OGOUDIKPE',
				'cv.intro': 'Parcours présenté en page web. Téléchargez le PDF si vous préférez le partager hors ligne.',
				'cv.download': 'Télécharger le PDF',
				'cv.share': 'Partager',
				'cv.back': 'Portfolio',
				'cv.role': 'FULL-STACK DEVELOPER',
				'cv.availability': 'Ouvert aux missions · remote ou présentiel',
				'cv.profile': 'Profil',
				'cv.profile.p1': 'Développeur web spécialisé en PHP et Laravel. Je construis des applications métier concrètes : stock, suivi de colis, forums, avec une base de données claire.',
				'cv.profile.p2': 'Disponible pour missions, collaborations ou projets freelance : backend Laravel, remote ou présentiel.',
				'cv.profile.p3': 'Formé chez Simplon Burkina (2024–2025). Projets et code disponibles sur GitHub.',
				'cv.projects': 'Projets réalisés',
				'cv.project.stock.title': 'Gestion de stock avec caisse',
				'cv.project.colis.title': 'Suivi de colis',
				'cv.project.forum.title': 'Forum pour développeurs',
				'cv.project.time.title': 'TimeLux : site vitrine',
				'cv.edu.simplon.title': 'Simplon Burkina',
				'cv.edu.ltp.title': 'Lycée Technique Professionnel d’Agbokou',
				'cv.project.stock': 'Système complet produits / ventes / caisse, logique métier (entrées, sorties, suivi), base de données et interface d’administration Laravel & Bootstrap.',
				'cv.project.forum': 'Plateforme avec gestion des utilisateurs, publication de messages et système d’authentification.',
				'cv.project.colis': 'Tracking transporteur : statuts, tableau de bord et interface d’administration.',
				'cv.project.time': 'Site e-commerce vitrine pour montres, design soigné et navigation responsive.',
				'cv.project.blog': 'CRUD complet, authentification sécurisée et interface d’administration.',
				'cv.project.vitrine': 'Développement frontend + backend simple, intégration responsive.',
				'cv.education': 'Formation',
				'cv.edu.simplon.role': 'Certification en Développement Web',
				'cv.edu.simplon.desc': 'PHP, Laravel, Python, Java, Dart, Flutter, WordPress, HTML, CSS, MySQL. Travail collaboratif (Git, Trello), responsive design et bonnes pratiques.',
				'cv.edu.ltp.role': 'DTI : Installation & Maintenance Informatique',
				'cv.edu.ltp.desc': 'Maintenance informatique, réseaux de base, initiation à la programmation. Porto-Novo, Bénin.',
				'cv.skills': 'Compétences',
				'cv.skills.backend': 'Backend',
				'cv.skills.frontend': 'Frontend',
				'cv.skills.tools': 'Outils & méthodes',
				'cv.skills.auth': 'Auth & rôles',
				'cv.skills.react': 'Notions React',
				'cv.languages': 'Langues',
				'cv.lang.fr': 'Français',
				'cv.lang.fr.level': 'courant',
				'cv.lang.en': 'Anglais',
				'cv.lang.en.level': 'intermédiaire',
				'cv.lang.fon': 'Fon',
				'cv.lang.fon.level': 'courant',
				'cv.qualities': 'Qualités',
				'cv.q1': 'Rigueur',
				'cv.q2': 'Autonomie',
				'cv.q3': 'Esprit d’analyse',
				'cv.q4': 'Curiosité technique',
				'cv.q5': 'Esprit d’équipe',
				'cv.interests': 'Centres d’intérêt',
				'cv.i1': 'Veille technologique & hackathons',
				'cv.i2': 'Création de contenu (vidéo / design)',
				'cv.i3': 'Technologies web & innovation',
				'cv.interested': 'Intéressé par mon profil ?',
				'cv.contact': 'Me contacter',
			},
			switchLabel: 'EN',
			switchTitle: 'English',
			documentTitle: 'Narcisse OGOUDIKPE | Portfolio',
			pageTitles: {
				'home-section': 'Accueil',
				'about-section': 'À propos',
				'skills-section': 'Compétences',
				'projects-section': 'Projets',
				'case-study-section': 'Étude de cas',
				'contact-section': 'Contact',
			}
		},
		en: {
			labels: {
				'nav.home': 'Home',
				'nav.expertise': 'Expertise',
				'nav.about': 'About',
				'nav.pro': 'Professional',
				'nav.skills': 'Skills',
				'nav.projects': 'Projects',
				'nav.contact': 'Contact',
				'nav.portfolio': 'Portfolio',
				'nav.cv': 'CV',
				'highlights.subheading': 'Expertise',
				'highlights.heading': 'What I bring to a project',
				'highlights.paragraph': 'Four pillars I practice on my projects, not a buzzword list.',
				'highlights.card1.title': 'Laravel Backend',
				'highlights.card1.desc': 'MVC architecture, REST routes, structured business logic and maintainable code.',
				'highlights.card2.title': 'Security & roles',
				'highlights.card2.desc': 'Authentication, middleware, permissions and server-side data validation.',
				'highlights.card3.title': 'Reliable data',
				'highlights.card3.desc': 'MySQL modeling, migrations, Eloquent relations and optimized queries.',
				'highlights.card4.title': 'Deployment',
				'highlights.card4.desc': 'Git versioning, manual testing, deployment and post-delivery monitoring.',
				'hero.title': 'FULL-STACK DEVELOPER',
				'hero.stack': 'Laravel · PHP · MySQL · Git',
				'hero.scroll': 'ENGAGE',
				'hero.watermark': 'ENGINEERING · PRECISION · SYSTEMS',
				'hero.missionLabel': 'MISSION',
				'hero.mission': 'SHIP CLEAN SYSTEMS',
				'about.profile': 'About',
				'about.heading': 'Who I am',
				'about.lead': 'Full-Stack Developer: clear backends, business apps and delivery through to production.',
				'about.hello': 'Hello',
				'about.roleLine': 'FULL-STACK DEVELOPER <br><span class="shell-profile__location">Available · remote or on-site</span>',
				'about.intro1': 'Trained at Simplon, I have built concrete apps: stock management, parcel tracking, forums. Laravel backend is my focus.',
				'about.intro2': 'What drives me: understanding the need, structuring the database, and shipping a clear interface through to deployment.',
				'about.download': 'View my resume',
				'about.contact': 'Contact me',
				'about.offCodeHeading': 'Outside of code',
				'about.info.email': 'Email',
				'about.info.phone': 'Phone',
				'about.info.github': 'GitHub',
				'about.interest.music': 'Music',
				'about.interest.travel': 'Travel',
				'about.interest.movies': 'Movies',
				'about.interest.sports': 'Sports',
				'pro.subheading': 'What I offer',
				'pro.available': 'Available for missions & collaborations',
				'pro.heading': 'Laravel apps that serve your business',
				'pro.lead': 'I build clear backends and concrete tools: management, tracking, admin spaces and APIs. From the need to a solid production foundation.',
				'pro.point1': 'Business apps (stock, tracking, admin)',
				'pro.point2': 'REST APIs, authentication and role management',
				'pro.point3': 'Structured code, clean MySQL, remote-friendly delivery',
				'pro.cv': 'See my projects',
				'pro.contact': 'Discuss a project',
				'skills.subheading': 'Skills',
				'skills.heading': 'My technical stack',
				'skills.paragraph': 'Laravel backend is the core of my work. The rest helps me ship a clear interface and a clean project through to production.',
				'skills.card1.title': 'Backend',
				'skills.card2.title': 'Front & UI',
				'skills.card3.title': 'Tools',
				'projects.subheading': 'Achievements',
				'projects.heading': 'Selected Projects',
				'projects.paragraph': 'Mostly Laravel business apps. Code is available on GitHub.',
				'projects.category.frontend': 'Front-end',
				'projects.category.phpmysql': 'PHP · MySQL',
				'projects.category.laravel': 'Laravel',
				'projects.category.laravelAdmin': 'Laravel · Admin',
				'projects.description.time': 'E-commerce showcase site for premium watches, clean design and smooth navigation.',
				'projects.description.forum': 'Developer exchange platform: posts, replies and community space.',
				'projects.description.stock': 'Business application with integrated checkout, product management and sales tracking.',
				'projects.description.colis': 'Shipping tracking system for carriers: statuses, dashboard and admin interface.',
				'projects.view': 'View project',
				'projects.github': 'GitHub',
				'projects.more': 'All my projects on GitHub',
				'casestudy.subheading': 'Case study',
				'casestudy.heading': 'Stock management',
				'casestudy.intro': 'How I built a Laravel business app to track products, record sales and secure the admin area.',
				'casestudy.problemLabel': 'Context',
				'casestudy.problem': 'Replace unreliable manual tracking with a simple tool: product catalog, checkout, and stock always up to date after each sale.',
				'casestudy.solutionLabel': 'What I delivered',
				'casestudy.item1': 'Product / category CRUD with server-side validation',
				'casestudy.item2': 'Checkout with automatic stock decrement',
				'casestudy.item3': 'Authentication and admin area',
				'casestudy.item4': 'Relational MySQL schema via Eloquent migrations',
				'casestudy.cta': 'View code on GitHub',
				'casestudy.back': 'See other projects',
				'contact.subheading': 'Contact',
				'contact.heading': 'Let’s talk about your project',
				'contact.paragraph': 'Mission, collaboration or a quick question: write via the form or reach me directly on WhatsApp.',
				'contact.form.name': 'Name',
				'contact.form.name.placeholder': 'Your name',
				'contact.form.email': 'Email',
				'contact.form.email.placeholder': 'your@email.com',
				'contact.form.subject': 'Subject',
				'contact.form.subject.placeholder': 'e.g. Collaboration request',
				'contact.form.message': 'Message',
				'contact.form.message.placeholder': 'Describe your needs in a few lines…',
				'contact.form.submit': 'Send message',
				'contact.sidebar.title': 'Contact details',
				'contact.sidebar.location': 'Area',
				'contact.sidebar.locationValue': 'West Africa · Remote',
				'contact.sidebar.email': 'Email',
				'contact.sidebar.phone': 'Phone',
				'contact.sidebar.github': 'GitHub',
				'contact.whatsapp': 'Chat on WhatsApp',
				'contact.note': 'Typical response within 24–48h.',
				'footer.tagline': 'Full-Stack Developer: business web apps, REST APIs and secure tools. Open to missions and collaborations.',
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
				'cv.eyebrow': 'Resume',
				'cv.documentTitle': 'Resume | Narcisse OGOUDIKPE',
				'cv.intro': 'Presented as a web page. Download the PDF if you prefer to share it offline.',
				'cv.download': 'Download PDF',
				'cv.share': 'Share',
				'cv.back': 'Portfolio',
				'cv.role': 'FULL-STACK DEVELOPER',
				'cv.availability': 'Open to missions · remote or on-site',
				'cv.profile': 'Profile',
				'cv.profile.p1': 'Web developer specialized in PHP and Laravel. I build concrete business apps: stock, parcel tracking, forums, with a clear database.',
				'cv.profile.p2': 'Available for missions, collaborations or freelance projects: Laravel backend, remote or on-site.',
				'cv.profile.p3': 'Trained at Simplon Burkina (2024–2025). Projects and code available on GitHub.',
				'cv.projects': 'Selected projects',
				'cv.project.stock.title': 'Stock management with checkout',
				'cv.project.colis.title': 'Parcel tracking',
				'cv.project.forum.title': 'Developer forum',
				'cv.project.time.title': 'TimeLux: showcase site',
				'cv.edu.simplon.title': 'Simplon Burkina',
				'cv.edu.ltp.title': 'Agbokou Technical High School',
				'cv.project.stock': 'Full products / sales / cash system, business logic (stock in/out/tracking), database design and Laravel & Bootstrap admin UI.',
				'cv.project.forum': 'Platform with user management, posts and authentication.',
				'cv.project.blog': 'Full CRUD, secure authentication and admin interface.',
				'cv.project.vitrine': 'Full frontend + simple backend, responsive integration.',
				'cv.project.colis': 'Carrier tracking: statuses, dashboard and admin interface.',
				'cv.project.time': 'Watch e-commerce showcase site, polished design and responsive navigation.',
				'cv.education': 'Education',
				'cv.edu.simplon.role': 'Web Development Certification',
				'cv.edu.simplon.desc': 'PHP, Laravel, Python, Java, Dart, Flutter, WordPress, HTML, CSS, MySQL. Collaborative work (Git, Trello), responsive design and best practices.',
				'cv.edu.ltp.role': 'DTI : IT Installation & Maintenance',
				'cv.edu.ltp.desc': 'Computer maintenance, basic networking, introduction to programming. Porto-Novo, Benin.',
				'cv.skills': 'Skills',
				'cv.skills.backend': 'Backend',
				'cv.skills.frontend': 'Frontend',
				'cv.skills.tools': 'Tools & methods',
				'cv.skills.auth': 'Auth & roles',
				'cv.skills.react': 'React basics',
				'cv.languages': 'Languages',
				'cv.lang.fr': 'French',
				'cv.lang.fr.level': 'fluent',
				'cv.lang.en': 'English',
				'cv.lang.en.level': 'intermediate',
				'cv.lang.fon': 'Fon',
				'cv.lang.fon.level': 'fluent',
				'cv.qualities': 'Strengths',
				'cv.q1': 'Rigor',
				'cv.q2': 'Autonomy',
				'cv.q3': 'Analytical mindset',
				'cv.q4': 'Technical curiosity',
				'cv.q5': 'Team spirit',
				'cv.interests': 'Interests',
				'cv.i1': 'Tech watch & hackathons',
				'cv.i2': 'Content creation (video / design)',
				'cv.i3': 'Web technologies & innovation',
				'cv.interested': 'Interested in my profile?',
				'cv.contact': 'Contact me',
			},
			switchLabel: 'FR',
			switchTitle: 'Français',
			documentTitle: 'Narcisse OGOUDIKPE | Portfolio',
			pageTitles: {
				'home-section': 'Home',
				'about-section': 'About',
				'skills-section': 'Skills',
				'projects-section': 'Projects',
				'case-study-section': 'Case study',
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
			var label = toggle.querySelector('.lang-toggle-label');
			if (label) {
				label.textContent = translation.switchLabel;
			} else {
				toggle.textContent = translation.switchLabel;
			}
			toggle.title = translation.switchTitle;
			toggle.setAttribute('aria-label', translation.switchTitle);
		}

		if (translation.documentTitle) {
			var isCvPage = document.body.classList.contains('cv-page-body');
			if (isCvPage && translation.labels['cv.documentTitle']) {
				document.title = translation.labels['cv.documentTitle'];
			} else {
				document.title = translation.documentTitle;
			}
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

	// i18n d'abord : doit marcher même sans plugins (page CV)
	initLanguageSwitcher();

	/**
	 * Hero HUD — parallaxe + particules.
	 * Un seul pointermove + un seul rAF. Écrit --mx/--my sur #home-section.
	 * Sort immédiatement si le Hero HUD n'est pas sur la page (ex. CV).
	 */
	function initHeroHud() {
		var section = document.getElementById('home-section');
		if (!section || !section.classList.contains('hero-hud')) return;
		if (!section.querySelector('.hud-stage')) return;

		var canvas = section.querySelector('.hud-particles');
		var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		var canParallax = window.matchMedia('(hover: hover) and (pointer: fine)').matches && !reduced;
		var isMobile = window.matchMedia('(max-width: 767.98px)').matches;

		var targetX = 0;
		var targetY = 0;
		var currentX = 0;
		var currentY = 0;
		var rafId = null;
		var visible = true;
		var pageVisible = true;
		var particlesOn = false;
		var particles = [];
		var ctx = null;
		var dpr = 1;
		var pointerInside = false;
		var pointerPx = 0;
		var pointerPy = 0;
		var LERP = 0.08;

		function writeVars() {
			section.style.setProperty('--mx', currentX.toFixed(4));
			section.style.setProperty('--my', currentY.toFixed(4));
		}

		function resizeCanvas() {
			if (!canvas || !ctx) return;
			dpr = Math.min(window.devicePixelRatio || 1, 2);
			var w = section.clientWidth;
			var h = section.clientHeight;
			canvas.width = Math.floor(w * dpr);
			canvas.height = Math.floor(h * dpr);
			canvas.style.width = w + 'px';
			canvas.style.height = h + 'px';
			ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
		}

		function createParticles() {
			particles = [];
			if (reduced || !canvas) return;
			var count = isMobile ? 15 : 40;
			var cx = section.clientWidth * 0.5;
			var cy = section.clientHeight * 0.55;
			for (var i = 0; i < count; i++) {
				var angle = Math.random() * Math.PI * 2;
				var radius = 60 + Math.random() * Math.min(section.clientWidth, section.clientHeight) * 0.32;
				particles.push({
					angle: angle,
					radius: radius,
					speed: 0.002 + Math.random() * 0.004,
					size: 1 + Math.random() * 1.8,
					color: Math.random() > 0.45 ? '#00d4ff' : '#ff6b00',
					ox: cx,
					oy: cy,
					alpha: 0.25 + Math.random() * 0.55
				});
			}
		}

		function drawParticles() {
			if (!ctx || !particlesOn || !particles.length) return;
			var w = section.clientWidth;
			var h = section.clientHeight;
			ctx.clearRect(0, 0, w, h);
			var cx = w * 0.5;
			var cy = h * 0.55;

			for (var i = 0; i < particles.length; i++) {
				var p = particles[i];
				p.angle += p.speed;
				var x = cx + Math.cos(p.angle) * p.radius;
				var y = cy + Math.sin(p.angle) * p.radius * 0.85;

				if (pointerInside) {
					var dx = x - pointerPx;
					var dy = y - pointerPy;
					var dist = Math.sqrt(dx * dx + dy * dy) || 1;
					if (dist < 120) {
						var force = (120 - dist) / 120;
						x += (dx / dist) * force * 28;
						y += (dy / dist) * force * 28;
					}
				}

				ctx.beginPath();
				ctx.fillStyle = p.color;
				ctx.globalAlpha = p.alpha;
				ctx.arc(x, y, p.size, 0, Math.PI * 2);
				ctx.fill();
			}
			ctx.globalAlpha = 1;
		}

		function tick() {
			rafId = null;
			if (!visible || !pageVisible) return;

			if (canParallax) {
				currentX += (targetX - currentX) * LERP;
				currentY += (targetY - currentY) * LERP;
				writeVars();
			}

			drawParticles();

			var moving = Math.abs(targetX - currentX) > 0.001 || Math.abs(targetY - currentY) > 0.001;
			if (moving || particlesOn) {
				rafId = requestAnimationFrame(tick);
			}
		}

		function startLoop() {
			if (rafId == null && visible && pageVisible) {
				rafId = requestAnimationFrame(tick);
			}
		}

		function stopLoop() {
			if (rafId != null) {
				cancelAnimationFrame(rafId);
				rafId = null;
			}
		}

		if (canParallax) {
			section.addEventListener('pointermove', function (e) {
				var rect = section.getBoundingClientRect();
				var nx = ((e.clientX - rect.left) / rect.width) * 2 - 1;
				var ny = ((e.clientY - rect.top) / rect.height) * 2 - 1;
				targetX = Math.max(-1, Math.min(1, nx));
				targetY = Math.max(-1, Math.min(1, ny));
				pointerInside = true;
				pointerPx = e.clientX - rect.left;
				pointerPy = e.clientY - rect.top;
				startLoop();
			}, { passive: true });

			section.addEventListener('pointerleave', function () {
				targetX = 0;
				targetY = 0;
				pointerInside = false;
				startLoop();
			});
		}

		if (canvas && !reduced) {
			ctx = canvas.getContext('2d');
			resizeCanvas();
			createParticles();
			window.addEventListener('resize', function () {
				isMobile = window.matchMedia('(max-width: 767.98px)').matches;
				resizeCanvas();
				createParticles();
			}, { passive: true });

			setTimeout(function () {
				particlesOn = true;
				canvas.classList.add('is-active');
				startLoop();
			}, 1800);
		}

		if ('IntersectionObserver' in window) {
			var io = new IntersectionObserver(function (entries) {
				visible = entries[0] && entries[0].isIntersecting;
				if (visible) startLoop();
				else stopLoop();
			}, { threshold: 0.05 });
			io.observe(section);
		}

		document.addEventListener('visibilitychange', function () {
			pageVisible = document.visibilityState !== 'hidden';
			if (pageVisible) startLoop();
			else stopLoop();
		});
	}

	initHeroHud();

	function initSkillsMarquee() {
		var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		var tracks = document.querySelectorAll('.skills-marquee__track');
		if (!tracks.length) return;

		function setupTrack(track) {
			var viewport = track.parentElement;
			var source = track.querySelector('.skills-marquee__group');
			if (!viewport || !source) return;

			track.classList.remove('is-ready');
			track.querySelectorAll('.skills-marquee__group[data-clone="1"]').forEach(function (node) {
				node.remove();
			});

			if (reduced) {
				track.style.removeProperty('--marquee-distance');
				return;
			}

			var gap = parseFloat(window.getComputedStyle(track).gap) || 16;
			var need = viewport.clientWidth * 2 + source.offsetWidth + gap;
			var guard = 0;

			while (track.scrollWidth < need && guard < 24) {
				var clone = source.cloneNode(true);
				clone.setAttribute('aria-hidden', 'true');
				clone.setAttribute('data-clone', '1');
				track.appendChild(clone);
				guard += 1;
			}

			var distance = source.offsetWidth + gap;
			track.style.setProperty('--marquee-distance', distance + 'px');
			track.classList.add('is-ready');
		}

		function setupAll() {
			tracks.forEach(setupTrack);
		}

		setupAll();

		var resizeTimer;
		window.addEventListener('resize', function () {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(setupAll, 150);
		});
	}

	initSkillsMarquee();

	function prefersReducedMotion() {
		return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	}

	function initShellReveal() {
		var targets = document.querySelectorAll([
			'.shell-about__header',
			'.shell-about__intro > *',
			'.shell-about__card',
			'.shell-projects__header',
			'.shell-project',
			'.shell-case__header',
			'.shell-case__visual',
			'.shell-case__panel',
			'.shell-skills__header',
			'.skills-marquee__row',
			'.shell-contact__header',
			'.shell-contact__aside',
			'.shell-contact__form',
			'.site-footer__brand',
			'.site-footer__col',
			'.shell-cv__top-copy',
			'.shell-cv__actions',
			'.shell-cv__identity',
			'.shell-cv__main',
			'.shell-cv__panel',
			'.shell-cv__cta',
			'.shell-readout'
		].join(','));

		if (!targets.length) return;

		if (prefersReducedMotion() || !('IntersectionObserver' in window)) {
			targets.forEach(function (el) {
				el.classList.add('shell-reveal', 'is-visible');
			});
			return;
		}

		var groupCounts = new WeakMap();

		targets.forEach(function (el) {
			el.classList.add('shell-reveal');
			var parent = el.parentElement;
			if (parent) {
				var index = groupCounts.get(parent) || 0;
				groupCounts.set(parent, index + 1);
				el.style.setProperty('--reveal-delay', (index * 70) + 'ms');
			}
		});

		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (!entry.isIntersecting) return;
				entry.target.classList.add('is-visible');
				io.unobserve(entry.target);
			});
		}, {
			threshold: 0.14,
			rootMargin: '0px 0px -8% 0px'
		});

		targets.forEach(function (el) {
			io.observe(el);
		});
	}

	function initShellPageMotion() {
		document.documentElement.classList.add('shell-page-ready');

		if (prefersReducedMotion()) return;

		var supportsViewTransition = CSS && typeof CSS.supports === 'function'
			&& CSS.supports('view-transition-name', 'none');

		document.addEventListener('click', function (event) {
			var link = event.target.closest('a[href]');
			if (!link) return;
			if (event.defaultPrevented || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
			if (link.target === '_blank' || link.hasAttribute('download')) return;

			var href = link.getAttribute('href');
			if (!href || href.charAt(0) === '#') return;

			var url;
			try {
				url = new URL(link.href, window.location.href);
			} catch (err) {
				return;
			}

			if (url.origin !== window.location.origin) return;
			if (url.pathname === window.location.pathname && url.hash) return;
			if (url.href === window.location.href) return;

			var sameDocument = url.pathname === window.location.pathname
				&& url.search === window.location.search
				&& !url.hash;
			if (sameDocument) return;

			// Chromium : @view-transition navigation:auto gère le cross-document.
			// Autres navigateurs : fade court avant navigation.
			if (supportsViewTransition) return;

			event.preventDefault();
			document.documentElement.classList.add('shell-page-exit');
			window.setTimeout(function () {
				window.location.href = url.href;
			}, 280);
		});
	}

	initShellReveal();
	initShellPageMotion();

	var isTouchLayout = window.matchMedia('(max-width: 991.98px), (hover: none)').matches;

	if (!isTouchLayout && typeof $.fn.stellar === 'function') {
		$(window).stellar({
			responsive: true,
			parallaxBackgrounds: true,
			parallaxElements: true,
			horizontalScrolling: false,
			hideDistantElements: false,
			scrollProperty: 'scroll'
		});
	}


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).on('resize.fh', function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		if ($('#dev-preloader').length > 0) return;
		setTimeout(function() {
			if ($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

   // Burger Menu
	var burgerMenu = function() {

		$('body').on('click', '.js-fh5co-nav-toggle', function(event){

			event.preventDefault();

			var $btn = $(this);
			var open = $('#ftco-nav').hasClass('show') || $('#ftco-nav').is(':visible');

			if ( open && !$btn.hasClass('collapsed') ) {
				$btn.removeClass('active').attr('aria-expanded', 'false');
			} else {
				$btn.addClass('active').attr('aria-expanded', 'true');
			}

		});

		// Fermer le panneau mobile après un clic d’ancre / langue
		$(document).on('click', '#ftco-nav .nav-link', function () {
			if (window.matchMedia('(max-width: 991.98px)').matches) {
				$('#ftco-nav').collapse('hide');
				$('.js-fh5co-nav-toggle').removeClass('active').attr('aria-expanded', 'false');
			}
		});

		$('#ftco-nav').on('hidden.bs.collapse', function () {
			$('.js-fh5co-nav-toggle').removeClass('active').attr('aria-expanded', 'false');
		});

		$('#ftco-nav').on('shown.bs.collapse', function () {
			$('.js-fh5co-nav-toggle').addClass('active').attr('aria-expanded', 'true');
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
	        scrollTop: Math.max(0, target.offset().top - 78)
	    }, 720, 'swing', function() {
	    	if (history.pushState) {
				history.pushState(null, null, href);
			} else {
				window.location.hash = href;
			}
	    });
		});

	};
	onePageClick();

	// scroll
	var scrollWindow = function() {
		var ticking = false;
		$(window).on('scroll', function(){
			var st = $(this).scrollTop();
			if (!ticking) {
				window.requestAnimationFrame(function(){
					var navbar = $('.ftco_navbar'),
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
					ticking = false;
				});
				ticking = true;
			}
		});
	};
	scrollWindow();

	var contentWayPoint = function() {
		if (typeof $.fn.waypoint !== 'function' || !$('.ftco-animate').length) return;
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

