(function () {
	'use strict';

	var suffix = ' | Narcisse OGOUDIKPE';
	var sections = document.querySelectorAll('[data-page-title]');
	if (!sections.length) return;

	var currentId = null;
	var visibleSections = new Map();

	function setTitle(pageName) {
		document.title = pageName + suffix;
	}

	function applySection(section) {
		var name = section.getAttribute('data-page-title');
		var id = section.id;
		if (!name || id === currentId) return;
		currentId = id;
		setTitle(name);
		var hash = '#' + id;
		if (location.hash !== hash) {
			if (history.replaceState) {
				history.replaceState(null, null, hash);
			} else {
				location.hash = hash;
			}
		}
	}

	function pickActiveSection() {
		var bestId = null;
		var bestRatio = 0;
		visibleSections.forEach(function (ratio, id) {
			if (ratio > bestRatio) {
				bestRatio = ratio;
				bestId = id;
			}
		});
		if (bestId) {
			applySection(document.getElementById(bestId));
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

	document.querySelectorAll('a[href^="#"]').forEach(function (link) {
		link.addEventListener('click', function () {
			var hash = this.getAttribute('href');
			if (!hash || hash.length < 2) return;
			var section = document.getElementById(hash.slice(1));
			if (section && section.hasAttribute('data-page-title')) {
				applySection(section);
			}
		});
	});

	if (location.hash) {
		var initial = document.querySelector(location.hash);
		if (initial && initial.hasAttribute('data-page-title')) {
			applySection(initial);
		}
	}
})();
