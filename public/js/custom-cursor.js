(function () {
	'use strict';

	if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;

	var root = document.getElementById('custom-cursor');
	var dot = document.getElementById('custom-cursor-dot');
	var ring = document.getElementById('custom-cursor-ring');
	if (!root || !dot || !ring) return;

	var trailDots = root.querySelectorAll('.custom-cursor-trail-dot');
	var trail = [];
	for (var t = 0; t < trailDots.length; t++) {
		trail.push({ el: trailDots[t], x: -100, y: -100 });
	}

	var mouseX = -100;
	var mouseY = -100;
	var ringX = -100;
	var ringY = -100;
	var visible = false;
	var rafId = null;
	var inHero = false;

	var hoverSelector = 'a, button, .btn, .shell-btn, input, textarea, select, label, [role="button"], .owl-prev, .owl-next, .fh5co-nav-toggle, .hud-btn, .site-nav__toggle';

	function isPreloaderActive() {
		return document.documentElement.classList.contains('dev-preloader-active') ||
			document.getElementById('dev-preloader');
	}

	function setVisible(show) {
		if (show === visible) return;
		visible = show;
		root.classList.toggle('custom-cursor-visible', show);
		document.body.classList.toggle('custom-cursor-on', show);
	}

	function setHeroMode(on) {
		if (on === inHero) return;
		inHero = on;
		root.classList.toggle('custom-cursor-hud', on);
	}

	function onMouseMove(e) {
		if (isPreloaderActive()) return;

		mouseX = e.clientX;
		mouseY = e.clientY;

		dot.style.transform = 'translate3d(' + mouseX + 'px, ' + mouseY + 'px, 0) translate(-50%, -50%)';

		if (!visible) setVisible(true);
		if (!rafId) rafId = requestAnimationFrame(tick);
	}

	function tick() {
		ringX += (mouseX - ringX) * 0.14;
		ringY += (mouseY - ringY) * 0.14;
		ring.style.transform = 'translate3d(' + ringX + 'px, ' + ringY + 'px, 0) translate(-50%, -50%)';

		var prevX = ringX;
		var prevY = ringY;
		for (var i = 0; i < trail.length; i++) {
			var lerp = 0.1 - i * 0.015;
			trail[i].x += (prevX - trail[i].x) * lerp;
			trail[i].y += (prevY - trail[i].y) * lerp;
			trail[i].el.style.transform =
				'translate3d(' + trail[i].x + 'px, ' + trail[i].y + 'px, 0) translate(-50%, -50%)';
			prevX = trail[i].x;
			prevY = trail[i].y;
		}

		var stillMoving =
			Math.abs(mouseX - ringX) > 0.3 ||
			Math.abs(mouseY - ringY) > 0.3 ||
			(trail.length && Math.abs(trail[trail.length - 1].x - ringX) > 0.5);

		if (stillMoving) {
			rafId = requestAnimationFrame(tick);
		} else {
			rafId = null;
		}
	}

	function updateHoverState(e) {
		if (!visible || !e.target.closest) return;
		root.classList.toggle('custom-cursor-hover', !!e.target.closest(hoverSelector));
		setHeroMode(!!e.target.closest('#home-section.hero-hud'));
	}

	function onMouseLeave() {
		setVisible(false);
		root.classList.remove('custom-cursor-hover');
		setHeroMode(false);
		if (rafId) {
			cancelAnimationFrame(rafId);
			rafId = null;
		}
	}

	document.addEventListener('mousemove', function (e) {
		onMouseMove(e);
		updateHoverState(e);
	}, { passive: true });
	document.addEventListener('mouseleave', onMouseLeave);
})();
