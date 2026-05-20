(function () {
	'use strict';

	if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;

	var root = document.getElementById('custom-cursor');
	var dot = document.getElementById('custom-cursor-dot');
	var ring = document.getElementById('custom-cursor-ring');
	if (!root || !dot || !ring) return;

	var mouseX = -100;
	var mouseY = -100;
	var ringX = -100;
	var ringY = -100;
	var visible = false;
	var rafId = null;

	var hoverSelector = 'a, button, .btn, input, textarea, select, label, [role="button"], .owl-prev, .owl-next, .fh5co-nav-toggle';

	function isPreloaderActive() {
		return document.documentElement.classList.contains('dev-preloader-active') ||
			document.getElementById('dev-preloader');
	}

	function setVisible(show) {
		if (show === visible) return;
		visible = show;
		root.classList.toggle('custom-cursor-visible', show);
		if (show) {
			document.body.classList.add('custom-cursor-on');
		}
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

		if (Math.abs(mouseX - ringX) > 0.3 || Math.abs(mouseY - ringY) > 0.3) {
			rafId = requestAnimationFrame(tick);
		} else {
			rafId = null;
		}
	}

	function updateHoverState(e) {
		if (!visible || !e.target.closest) return;
		root.classList.toggle('custom-cursor-hover', !!e.target.closest(hoverSelector));
	}

	function onMouseLeave() {
		setVisible(false);
		root.classList.remove('custom-cursor-hover');
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
