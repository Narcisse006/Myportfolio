(function () {
	'use strict';

	var STORAGE_KEY = 'portfolio-preloader-done';
	var MIN_DURATION = 3000;
	var preloader = document.getElementById('dev-preloader');

	if (!preloader) return;

	var progressBar = document.getElementById('dev-progress-bar');
	var progressLabel = document.getElementById('dev-progress-label');
	var statusEl = document.getElementById('dev-preloader-status');
	var statuses = [
		'Initialisation du portfolio',
		'Montage des vues Blade',
		'Injection des compétences Laravel',
		'Optimisation de l\'expérience'
	];
	var statusIndex = 0;
	var startTime = Date.now();
	var progress = 0;
	var progressTimer = null;
	var statusTimer = null;

	function setBodyLocked(locked) {
		document.documentElement.classList.toggle('dev-preloader-active', locked);
		document.body.classList.toggle('dev-preloader-active', locked);
	}

	function hidePreloader() {
		preloader.classList.remove('show');
		preloader.classList.add('dev-preloader-hide');
		preloader.setAttribute('aria-busy', 'false');
		setBodyLocked(false);
		setTimeout(function () {
			preloader.remove();
		}, 500);
	}

	function skipPreloader() {
		setBodyLocked(false);
		preloader.remove();
	}

	function finish() {
		if (progressBar) progressBar.style.width = '100%';
		if (progressLabel) progressLabel.textContent = '100%';
		clearInterval(progressTimer);
		clearInterval(statusTimer);
		sessionStorage.setItem(STORAGE_KEY, '1');
		setTimeout(hidePreloader, 350);
	}

	function waitAndFinish() {
		var elapsed = Date.now() - startTime;
		var remaining = Math.max(0, MIN_DURATION - elapsed);
		setTimeout(finish, remaining);
	}

	function runProgress() {
		progressTimer = setInterval(function () {
			if (progress >= 92) return;
			progress += Math.random() * 8 + 2;
			if (progress > 92) progress = 92;
			if (progressBar) progressBar.style.width = progress + '%';
			if (progressLabel) progressLabel.textContent = Math.round(progress) + '%';
		}, 180);
	}

	function runStatusCycle() {
		if (!statusEl) return;
		statusTimer = setInterval(function () {
			statusIndex = (statusIndex + 1) % statuses.length;
			statusEl.textContent = statuses[statusIndex];
		}, 520);
	}

	if (sessionStorage.getItem(STORAGE_KEY)) {
		skipPreloader();
		return;
	}

	setBodyLocked(true);
	runProgress();
	runStatusCycle();

	if (document.readyState === 'complete') {
		waitAndFinish();
	} else {
		window.addEventListener('load', waitAndFinish);
	}
})();
