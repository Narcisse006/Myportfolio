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
				'hero.title': 'Je construis des outils métier en Laravel.',
				'hero.stack': 'Laravel · PHP · MySQL · Filament',
				'hero.scroll': 'ENGAGE',
				'hero.watermark': 'ENGINEERING · PRECISION · SYSTEMS',
				'hero.missionLabel': 'MISSION',
				'hero.mission': 'BUILD USEFUL APPS',
				'about.profile': 'À propos',
				'about.heading': 'Qui je suis',
				'about.lead': 'Du schéma MySQL jusqu’à la mise en ligne.',
				'about.hello': 'Bonjour',
				'about.roleLine': 'FULL-STACK DEVELOPER',
				'about.intro1': 'Je code des applications Laravel pour des problèmes précis : une caisse reliée au stock, un suivi de colis pour le transport.',
				'about.intro2': 'J’ai fondé Nessium Academy, où j’enseigne la programmation.',
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
				'pro.available': 'Disponible pour missions et collaborations',
				'pro.heading': 'Des applications Laravel utiles pour votre métier',
				'pro.lead': 'Je conçois des backends clairs et des outils concrets : gestion, suivi, espaces admin et API. Du besoin jusqu’à une base solide en production.',
				'pro.point1': 'Applications métier (stock, suivi, administration)',
				'pro.point2': 'API REST, authentification et gestion des rôles',
				'pro.point3': 'Code structuré, MySQL propre, livraison remote-friendly',
				'pro.cv': 'Voir mes projets',
				'pro.contact': 'Parler d’un projet',
				'skills.subheading': 'Compétences',
				'skills.heading': 'Outils que j’utilise au quotidien',
				'skills.paragraph': 'Laravel, PHP, MySQL, et de quoi mettre en ligne.',
				'skills.card1.title': 'Backend',
				'skills.card2.title': 'Front & UI',
				'skills.card3.title': 'Outils',
				'projects.subheading': 'Réalisations',
				'projects.heading': 'Projets sélectionnés',
				'projects.paragraph': 'Du stock, des colis, la scolarité, les présences, un scanner. Le code est sur GitHub.',
				'projects.category.frontend': 'Front-end',
				'projects.category.phpmysql': 'PHP · MySQL',
				'projects.category.laravel': 'Laravel',
				'projects.category.laravelAdmin': 'Laravel · Admin',
				'projects.description.time': 'Site de montres haut de gamme, avec fiches produit et navigation. Réalisé en HTML et CSS.',
				'projects.description.forum': 'Un espace où les développeurs publient et se répondent. Chacun a un compte, et l’accès passe par une authentification.',
				'projects.description.stock': 'La caisse, le catalogue et le stock sont dans la même application. Une vente met les quantités à jour tout de suite.',
				'projects.description.colis': 'Suivi des colis pour une société de transport. Le statut de chaque envoi se lit sur un tableau de bord, et se met à jour depuis l’admin.',
				'projects.view': 'En ligne',
				'projects.github': 'GitHub',
				'projects.gallery': 'Voir les captures',
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
				'contact.heading': 'Écrivez-moi.',
				'contact.paragraph': 'Une mission, une collaboration, ou une question. Formulaire ou WhatsApp, je réponds sous 24 à 48 h.',
				'contact.form.name': 'Nom',
				'contact.form.name.placeholder': 'Votre nom',
				'contact.form.email': 'Email',
				'contact.form.email.placeholder': 'votre@email.com',
				'contact.form.subject': 'Sujet',
				'contact.form.subject.placeholder': 'Ex. Demande de collaboration',
				'contact.form.message': 'Message',
				'contact.form.message.placeholder': 'Décrivez votre besoin en quelques lignes…',
				'contact.form.submit': 'Envoyer le message',
				'contact.form.sending': 'Envoi en cours…',
				'contact.sidebar.title': 'Coordonnées',
				'contact.sidebar.location': 'Adresse',
				'contact.sidebar.locationValue': 'Bénin',
				'contact.sidebar.email': 'Email',
				'contact.sidebar.phone': 'Téléphone',
				'contact.sidebar.github': 'GitHub',
				'contact.whatsapp': 'Discuter sur WhatsApp',
				'contact.note': 'Réponse habituelle sous 24–48 h.',
				'footer.tagline': 'Développeur Laravel. Pour une mission ou une collaboration, écrivez-moi.',
				'footer.cv': 'Voir mon CV',
				'footer.navigation': 'Navigation',
				'footer.contactTitle': 'Me contacter',
				'footer.networks': 'Réseaux',
				'footer.follow': 'Suivez mon parcours et mes projets en ligne.',
				'footer.copy': 'Tous droits réservés.',
				'footer.designed': 'Conçu avec',
				'footer.by': 'par',
				'ai.toggle': 'Assistant',
				'ai.title': 'Assistant Narcisse',
				'ai.online': 'En ligne',
				'ai.welcome': 'Bonjour ! Posez-moi une question sur le profil, les projets ou la disponibilité de Narcisse.',
				'ai.inputLabel': 'Votre message',
				'ai.placeholder': 'Écrivez votre message...',
				'ai.send': 'Envoyer',
				'ai.thinking': 'Analyse en cours…',
				'ai.error': 'Une erreur est survenue. Réessayez ou utilisez le formulaire de contact.',
				'ai.actionWhatsapp': 'Discuter sur WhatsApp',
				'ai.actionsIntro': 'Vous pouvez contacter Narcisse sur WhatsApp.',
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
				'cv.availability': 'Ouvert aux missions',
				'cv.profile': 'Profil',
				'cv.profile.p1': 'Développeur web spécialisé en PHP et Laravel. Je construis des applications métier concrètes : stock, suivi de colis, forums, avec une base de données claire.',
				'cv.profile.p2': 'Disponible pour des missions et des collaborations, sur du Laravel.',
				'cv.profile.p3': 'Formé chez Simplon Burkina (2024–2025). Projets et code disponibles sur GitHub.',
				'cv.projects': 'Projets réalisés',
				'cv.project.stock.title': 'Gestion de stock avec caisse',
				'cv.project.colis.title': 'Suivi de colis',
				'cv.project.forum.title': 'Forum pour développeurs',
				'cv.project.time.title': 'TimeLux : site vitrine',
				'cv.edu.simplon.title': 'Simplon Burkina',
				'cv.edu.ltp.title': 'Lycée Technique Professionnel d’Agbokou',
				'cv.project.stock': 'La caisse, le catalogue et le stock sont dans la même application. Une vente met les quantités à jour tout de suite.',
				'cv.project.forum': 'Un espace où les développeurs publient et se répondent. Chacun a un compte, et l’accès passe par une authentification.',
				'cv.project.colis': 'Suivi des colis pour une société de transport. Le statut de chaque envoi se lit sur un tableau de bord, et se met à jour depuis l’admin.',
				'cv.project.time': 'Site de montres haut de gamme, avec fiches produit et navigation. Réalisé en HTML et CSS.',
				'cv.project.blog': 'CRUD complet, authentification sécurisée et interface d’administration.',
				'cv.project.vitrine': 'Développement frontend + backend simple, intégration responsive.',
				'cv.education': 'Formation',
				'cv.edu.simplon.role': 'Certification en Développement Web',
				'cv.edu.simplon.desc': 'PHP, Laravel, Python, Java, Dart, Flutter, WordPress, HTML, CSS, MySQL. Travail collaboratif (Git, Trello), responsive design et bonnes pratiques.',
				'cv.edu.ltp.role': 'DTI : Installation & Maintenance Informatique',
				'cv.edu.ltp.desc': 'Maintenance informatique, réseaux de base, initiation à la programmation.',
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
				'hero.title': 'I build business tools in Laravel.',
				'hero.stack': 'Laravel · PHP · MySQL · Filament',
				'hero.scroll': 'ENGAGE',
				'hero.watermark': 'ENGINEERING · PRECISION · SYSTEMS',
				'hero.missionLabel': 'MISSION',
				'hero.mission': 'BUILD USEFUL APPS',
				'about.profile': 'About',
				'about.heading': 'Who I am',
				'about.lead': 'From the MySQL schema through to going live.',
				'about.hello': 'Hello',
				'about.roleLine': 'FULL-STACK DEVELOPER',
				'about.intro1': 'I code Laravel apps for specific problems: a register tied to stock, and parcel tracking for transport.',
				'about.intro2': 'I founded Nessium Academy, where I teach programming.',
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
				'pro.available': 'Available for missions and collaborations',
				'pro.heading': 'Laravel apps that serve your business',
				'pro.lead': 'I build clear backends and concrete tools: management, tracking, admin spaces and APIs. From the need to a solid production foundation.',
				'pro.point1': 'Business apps (stock, tracking, admin)',
				'pro.point2': 'REST APIs, authentication and role management',
				'pro.point3': 'Structured code, clean MySQL, remote-friendly delivery',
				'pro.cv': 'See my projects',
				'pro.contact': 'Discuss a project',
				'skills.subheading': 'Skills',
				'skills.heading': 'Tools I use every day',
				'skills.paragraph': 'Laravel, PHP, MySQL, and what it takes to ship.',
				'skills.card1.title': 'Backend',
				'skills.card2.title': 'Front & UI',
				'skills.card3.title': 'Tools',
				'projects.subheading': 'Achievements',
				'projects.heading': 'Selected Projects',
				'projects.paragraph': 'Stock, parcels, school records, attendance, a scanner. The code is on GitHub.',
				'projects.category.frontend': 'Front-end',
				'projects.category.phpmysql': 'PHP · MySQL',
				'projects.category.laravel': 'Laravel',
				'projects.category.laravelAdmin': 'Laravel · Admin',
				'projects.description.time': 'A site for high-end watches, with product pages and navigation. Built in HTML and CSS.',
				'projects.description.forum': 'A place where developers post and reply to each other. Everyone has an account, and access goes through authentication.',
				'projects.description.stock': 'The register, the catalog and the stock live in the same app. A sale updates the quantities right away.',
				'projects.description.colis': 'Parcel tracking for a transport company. Each shipment status shows on a dashboard, and is updated from the admin.',
				'projects.view': 'Live',
				'projects.github': 'GitHub',
				'projects.gallery': 'View screenshots',
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
				'contact.heading': 'Write to me.',
				'contact.paragraph': 'A mission, a collaboration, or a question. Form or WhatsApp, I reply within 24 to 48 hours.',
				'contact.form.name': 'Name',
				'contact.form.name.placeholder': 'Your name',
				'contact.form.email': 'Email',
				'contact.form.email.placeholder': 'your@email.com',
				'contact.form.subject': 'Subject',
				'contact.form.subject.placeholder': 'e.g. Collaboration request',
				'contact.form.message': 'Message',
				'contact.form.message.placeholder': 'Describe your needs in a few lines…',
				'contact.form.submit': 'Send message',
				'contact.form.sending': 'Sending…',
				'contact.sidebar.title': 'Contact details',
				'contact.sidebar.location': 'Address',
				'contact.sidebar.locationValue': 'Benin',
				'contact.sidebar.email': 'Email',
				'contact.sidebar.phone': 'Phone',
				'contact.sidebar.github': 'GitHub',
				'contact.whatsapp': 'Chat on WhatsApp',
				'contact.note': 'Typical response within 24–48h.',
				'footer.tagline': 'Laravel developer. For a mission or a collaboration, write to me.',
				'footer.cv': 'View my resume',
				'footer.navigation': 'Navigation',
				'footer.contactTitle': 'Contact me',
				'footer.networks': 'Networks',
				'footer.follow': 'Follow my work and projects online.',
				'footer.copy': 'All rights reserved.',
				'footer.designed': 'Designed with',
				'footer.by': 'by',
				'ai.toggle': 'Assistant',
				'ai.title': 'Assistant Narcisse',
				'ai.online': 'Online',
				'ai.welcome': 'Hi! Ask me about Narcisse’s profile, projects or availability.',
				'ai.inputLabel': 'Your message',
				'ai.placeholder': 'Write your message...',
				'ai.send': 'Send',
				'ai.thinking': 'Thinking…',
				'ai.error': 'Something went wrong. Try again or use the contact form.',
				'ai.actionWhatsapp': 'Chat on WhatsApp',
				'ai.actionsIntro': 'You can reach Narcisse on WhatsApp.',
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
				'cv.availability': 'Open to missions',
				'cv.profile': 'Profile',
				'cv.profile.p1': 'Web developer specialized in PHP and Laravel. I build concrete business apps: stock, parcel tracking, forums, with a clear database.',
				'cv.profile.p2': 'Available for missions and collaborations, on Laravel.',
				'cv.profile.p3': 'Trained at Simplon Burkina (2024–2025). Projects and code available on GitHub.',
				'cv.projects': 'Selected projects',
				'cv.project.stock.title': 'Stock management with checkout',
				'cv.project.colis.title': 'Parcel tracking',
				'cv.project.forum.title': 'Developer forum',
				'cv.project.time.title': 'TimeLux: showcase site',
				'cv.edu.simplon.title': 'Simplon Burkina',
				'cv.edu.ltp.title': 'Agbokou Technical High School',
				'cv.project.stock': 'The register, the catalog and the stock live in the same app. A sale updates the quantities right away.',
				'cv.project.forum': 'A place where developers post and reply to each other. Everyone has an account, and access goes through authentication.',
				'cv.project.blog': 'Full CRUD, secure authentication and admin interface.',
				'cv.project.vitrine': 'Full frontend + simple backend, responsive integration.',
				'cv.project.colis': 'Parcel tracking for a transport company. Each shipment status shows on a dashboard, and is updated from the admin.',
				'cv.project.time': 'A site for high-end watches, with product pages and navigation. Built in HTML and CSS.',
				'cv.education': 'Education',
				'cv.edu.simplon.role': 'Web Development Certification',
				'cv.edu.simplon.desc': 'PHP, Laravel, Python, Java, Dart, Flutter, WordPress, HTML, CSS, MySQL. Collaborative work (Git, Trello), responsive design and best practices.',
				'cv.edu.ltp.role': 'DTI : IT Installation & Maintenance',
				'cv.edu.ltp.desc': 'Computer maintenance, basic networking, introduction to programming.',
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
			var flag = toggle.querySelector('.lang-toggle-flag');
			if (label) {
				label.textContent = translation.switchLabel;
			} else {
				toggle.textContent = translation.switchLabel;
			}
			if (flag) {
				// Drapeau de la langue cible (FR → affiche UK, EN → affiche FR)
				flag.textContent = lang === 'fr' ? '🇬🇧' : '🇫🇷';
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

		window.portfolioI18n = {
			aiThinking: translation.labels['ai.thinking'] || 'Analyse en cours…',
			aiError: translation.labels['ai.error'] || 'Une erreur est survenue. Réessayez ou utilisez le formulaire de contact.',
			labels: translation.labels || {}
		};
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

			var sectionPaths = {
				'/': true,
				'/about': true,
				'/projects': true,
				'/skills': true,
				'/contact': true
			};
			var currentPath = window.location.pathname.replace(/\/$/, '') || '/';
			var nextPath = url.pathname.replace(/\/$/, '') || '/';
			if (sectionPaths[currentPath] && sectionPaths[nextPath]) return;

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
	initProjectGalleries();
	initAiChat();

	function initProjectGalleries() {
		if (typeof window.jQuery === 'undefined' || !window.jQuery.fn || !window.jQuery.fn.magnificPopup) {
			return;
		}

		var $ = window.jQuery;
		$('.shell-project__media').each(function () {
			var $media = $(this);
			if (! $media.find('a.shell-project__gallery-item').length) {
				return;
			}

			$media.magnificPopup({
				delegate: 'a.shell-project__gallery-item',
				type: 'image',
				tLoading: 'Chargement…',
				mainClass: 'mfp-fade shell-project-lightbox',
				removalDelay: 200,
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [1, 1]
				},
				image: {
					tError: 'Impossible de charger cette capture.'
				}
			});
		});
	}

	function initAiChat() {
		var root = document.getElementById('ai-chat');
		if (!root) return;

		var toggle = document.getElementById('ai-chat-toggle');
		var panel = document.getElementById('ai-chat-panel');
		var closeBtn = document.getElementById('ai-chat-close');
		var form = document.getElementById('ai-chat-form');
		var input = document.getElementById('ai-chat-input');
		var messages = document.getElementById('ai-chat-messages');
		var sendBtn = form ? form.querySelector('.ai-chat__send') : null;
		var endpoint = root.getAttribute('data-endpoint');
		var busy = false;

		function csrfToken() {
			var meta = document.querySelector('meta[name="csrf-token"]');
			return meta ? meta.getAttribute('content') : '';
		}

		function openChat() {
			root.classList.add('is-open');
			panel.hidden = false;
			toggle.setAttribute('aria-expanded', 'true');
			window.setTimeout(function () {
				if (input) input.focus();
			}, 40);
		}

		function closeChat() {
			root.classList.remove('is-open');
			panel.hidden = true;
			toggle.setAttribute('aria-expanded', 'false');
			toggle.focus();
		}

		function appendBubble(text, kind, actions) {
			var bubble = document.createElement('div');
			bubble.className = 'ai-chat__bubble ai-chat__bubble--' + kind;

			var textNode = document.createElement('div');
			textNode.className = 'ai-chat__bubble-text';
			textNode.textContent = text;
			bubble.appendChild(textNode);

			if (kind === 'bot' && actions && actions.length) {
				appendActions(bubble, actions);
			}

			messages.appendChild(bubble);
			messages.scrollTop = messages.scrollHeight;
			return bubble;
		}

		function appendActions(bubble, actions, intro) {
			var existing = bubble.querySelector('.ai-chat__actions');
			if (existing) {
				existing.remove();
			}
			var existingIntro = bubble.querySelector('.ai-chat__actions-intro');
			if (existingIntro) {
				existingIntro.remove();
			}

			var labels = (window.portfolioI18n && window.portfolioI18n.labels) || {};
			var introText = labels['ai.actionsIntro'] || intro || 'Vous pouvez contacter Narcisse sur WhatsApp.';

			if (introText) {
				var introNode = document.createElement('p');
				introNode.className = 'ai-chat__actions-intro';
				introNode.textContent = introText;
				bubble.appendChild(introNode);
			}

			var row = document.createElement('div');
			row.className = 'ai-chat__actions';

			actions.forEach(function (action) {
				if (!action || !action.url) return;

				var link = document.createElement('a');
				link.className = 'ai-chat__action';
				if (action.type) {
					link.className += ' ai-chat__action--' + action.type;
				}
				link.href = action.url;

				if (action.type === 'whatsapp') {
					var icon = document.createElement('i');
					icon.className = 'fab fa-whatsapp';
					icon.setAttribute('aria-hidden', 'true');
					link.appendChild(icon);
					link.appendChild(document.createTextNode(
						' ' + (labels['ai.actionWhatsapp'] || action.label || 'Discuter sur WhatsApp')
					));
				} else {
					link.textContent = action.label || action.type || 'Lien';
				}

				if (action.external || action.type === 'whatsapp') {
					link.target = '_blank';
					link.rel = 'noopener noreferrer';
				}

				row.appendChild(link);
			});

			if (row.childNodes.length) {
				bubble.appendChild(row);
			}
		}

		function setBubbleContent(bubble, text, actions, isError, actionsIntro) {
			bubble.textContent = '';
			var textNode = document.createElement('div');
			textNode.className = 'ai-chat__bubble-text';
			textNode.textContent = text;
			bubble.appendChild(textNode);

			if (actions && actions.length) {
				appendActions(bubble, actions, actionsIntro);
			}

			if (isError) {
				bubble.classList.add('ai-chat__bubble--error');
			} else {
				bubble.classList.remove('ai-chat__bubble--error');
			}
		}

		toggle.addEventListener('click', function () {
			if (root.classList.contains('is-open')) {
				closeChat();
			} else {
				openChat();
			}
		});

		closeBtn.addEventListener('click', closeChat);

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && root.classList.contains('is-open')) {
				closeChat();
			}
		});

		form.addEventListener('submit', function (event) {
			event.preventDefault();
			if (busy || !endpoint) return;

			var text = (input.value || '').trim();
			if (text.length < 2) return;

			busy = true;
			if (sendBtn) sendBtn.disabled = true;
			appendBubble(text, 'user');
			input.value = '';
			var thinking = appendBubble(
				(window.portfolioI18n && window.portfolioI18n.aiThinking) || 'Analyse en cours…',
				'bot'
			);

			fetch(endpoint, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'Accept': 'application/json',
					'X-CSRF-TOKEN': csrfToken(),
					'X-Requested-With': 'XMLHttpRequest'
				},
				credentials: 'same-origin',
				body: JSON.stringify({ message: text })
			})
				.then(function (response) {
					return response.json().then(function (payload) {
						return { ok: response.ok, status: response.status, payload: payload };
					});
				})
				.then(function (result) {
					var reply = (result.payload && result.payload.reply) ||
						(result.payload && result.payload.message) ||
						((window.portfolioI18n && window.portfolioI18n.aiError) || 'Une erreur est survenue. Réessayez ou utilisez le formulaire de contact.');
					var actions = (result.ok && result.payload && result.payload.actions) || null;
					var actionsIntro = (result.ok && result.payload && result.payload.actions_intro) || null;
					setBubbleContent(thinking, reply, actions, !result.ok, actionsIntro);
				})
				.catch(function () {
					setBubbleContent(
						thinking,
						(window.portfolioI18n && window.portfolioI18n.aiError) ||
							'Une erreur est survenue. Réessayez ou utilisez le formulaire de contact.',
						null,
						true
					);
				})
				.finally(function () {
					busy = false;
					if (sendBtn) sendBtn.disabled = false;
					messages.scrollTop = messages.scrollHeight;
					input.focus();
				});
		});
	}

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

	    // Les sections à data-page-title sont gérées par page-title.js (URLs propres).
	    if (target[0].hasAttribute('data-page-title')) return;

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

