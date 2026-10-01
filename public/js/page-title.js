(function () {
	'use strict';

	var suffix = ' | Narcisse OGOUDIKPE';
	var sections = document.querySelectorAll('[data-page-title]');
	if (!sections.length) return;

	var SECTION_PATHS = {
		'home-section': '/',
		'about-section': '/about',
		'projects-section': '/projects',
		'case-study-section': '/projects',
		'skills-section': '/skills',
		'contact-section': '/contact'
	};

	var PATH_SECTIONS = {
		'/': 'home-section',
		'/about': 'about-section',
		'/projects': 'projects-section',
		'/skills': 'skills-section',
		'/contact': 'contact-section'
	};

	var currentId = null;
	var visibleSections = new Map();
	var scrollingProgrammatically = false;
	var scrollTimer = null;

	function setTitle(pageName) {
		document.title = pageName + suffix;
	}

	function pathForSection(id) {
		return SECTION_PATHS[id] || '/';
	}

	function isSectionPath(pathname) {
		return Object.prototype.hasOwnProperty.call(PATH_SECTIONS, pathname);
	}

	function normalizePath(pathname) {
		if (!pathname || pathname === '') return '/';
		if (pathname.length > 1 && pathname.charAt(pathname.length - 1) === '/') {
			return pathname.slice(0, -1);
		}
		return pathname;
	}

	function updateUrl(path, replace) {
		var next = path || '/';
		if (window.location.pathname === next && !window.location.hash) return;
		if (history.pushState) {
			if (replace) {
				history.replaceState(null, null, next);
			} else {
				history.pushState(null, null, next);
			}
		}
	}

	function applySection(section, options) {
		options = options || {};
		var name = section.getAttribute('data-page-title');
		var id = section.id;
		if (!name || id === currentId) {
			if (options.forceUrl) {
				updateUrl(pathForSection(id), options.replace !== false);
			}
			return;
		}
		currentId = id;
		setTitle(name);
		if (options.skipUrl) return;
		updateUrl(pathForSection(id), options.replace !== false);
	}

	function scrollToSection(section, done) {
		if (!section) {
			if (done) done();
			return;
		}
		scrollingProgrammatically = true;
		var top = Math.max(0, section.getBoundingClientRect().top + window.pageYOffset - 78);
		var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
		if (reduced || typeof window.jQuery === 'undefined') {
			window.scrollTo(0, top);
			scrollingProgrammatically = false;
			if (done) done();
			return;
		}
		window.jQuery('html, body').stop(true).animate({ scrollTop: top }, 720, 'swing', function () {
			window.clearTimeout(scrollTimer);
			scrollTimer = window.setTimeout(function () {
				scrollingProgrammatically = false;
			}, 120);
			if (done) done();
		});
	}

	function pickActiveSection() {
		if (scrollingProgrammatically) return;
		var bestId = null;
		var bestRatio = 0;
		visibleSections.forEach(function (ratio, id) {
			if (ratio > bestRatio) {
				bestRatio = ratio;
				bestId = id;
			}
		});

		if (bestId) {
			applySection(document.getElementById(bestId), { replace: true });
		}
	}

	var observer = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				visibleSections.set(entry.target.id, entry.intersectionRatio);
			} else {
				visibleSections.delete(entry.target.id);
			}
		});
		pickActiveSection();
	}, {
		rootMargin: '-20% 0px -35% 0px',
		threshold: [0, 0.15, 0.35, 0.55, 0.75, 1]
	});

	sections.forEach(function (section) {
		observer.observe(section);
	});

	function navigateToSection(section, push) {
		if (!section) return;
		applySection(section, { replace: !push, forceUrl: true });
		scrollToSection(section);
	}

	document.addEventListener('click', function (event) {
		var link = event.target.closest('a[href]');
		if (!link) return;
		if (event.defaultPrevented || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
		if (link.target === '_blank' || link.hasAttribute('download')) return;

		var href = link.getAttribute('href');
		if (!href || href === '#') return;

		var url;
		try {
			url = new URL(link.href, window.location.href);
		} catch (err) {
			return;
		}

		if (url.origin !== window.location.origin) return;

		var path = normalizePath(url.pathname);
		var sectionId = null;

		if (url.hash && url.hash.length > 1) {
			var hashId = url.hash.slice(1);
			if (document.getElementById(hashId) && SECTION_PATHS[hashId]) {
				sectionId = hashId;
			}
		}

		if (!sectionId && isSectionPath(path) && isSectionPath(normalizePath(window.location.pathname))) {
			sectionId = PATH_SECTIONS[path];
		}

		if (!sectionId) return;

		var section = document.getElementById(sectionId);
		if (!section || !section.hasAttribute('data-page-title')) return;

		event.preventDefault();
		event.stopPropagation();
		navigateToSection(section, true);
	}, true);

	window.addEventListener('popstate', function () {
		var path = normalizePath(window.location.pathname);
		var sectionId = PATH_SECTIONS[path];
		if (!sectionId) return;
		var section = document.getElementById(sectionId);
		if (!section) return;
		applySection(section, { skipUrl: true });
		scrollToSection(section);
	});

	var initialPath = normalizePath(window.location.pathname);
	if (PATH_SECTIONS[initialPath] && initialPath !== '/') {
		var initialSection = document.getElementById(PATH_SECTIONS[initialPath]);
		if (initialSection) {
			scrollingProgrammatically = true;
			applySection(initialSection, { replace: true, forceUrl: true });
			window.setTimeout(function () {
				scrollToSection(initialSection);
			}, 40);
		}
	} else if (window.location.hash) {
		var hashSection = document.querySelector(window.location.hash);
		if (hashSection && hashSection.hasAttribute('data-page-title')) {
			applySection(hashSection, { replace: true, forceUrl: true });
		}
	}
})();
