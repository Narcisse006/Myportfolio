<div id="dev-preloader" class="dev-preloader show" role="dialog" aria-label="Chargement du portfolio" aria-busy="true">
	<div class="dev-preloader-inner">
		<div class="dev-terminal">
			<div class="dev-terminal-header">
				<span class="dev-dot dev-dot-red" aria-hidden="true"></span>
				<span class="dev-dot dev-dot-yellow" aria-hidden="true"></span>
				<span class="dev-dot dev-dot-green" aria-hidden="true"></span>
				<span class="dev-terminal-title">portfolio@narcisse — zsh</span>
			</div>
			<div class="dev-terminal-body">
				<p class="dev-line dev-line-1"><span class="dev-prompt">$</span> cd ~/portfolio</p>
				<p class="dev-line dev-line-2"><span class="dev-prompt">$</span> php artisan serve</p>
				<p class="dev-line dev-line-3"><span class="dev-prompt">&gt;</span> Chargement des assets<span class="dev-dots"><span>.</span><span>.</span><span>.</span></span></p>
				<p class="dev-line dev-line-4"><span class="dev-prompt">&gt;</span> <span id="dev-preloader-status">Initialisation du portfolio</span><span class="dev-cursor" aria-hidden="true">_</span></p>
				<p class="dev-line dev-line-5 dev-line-success"><span class="dev-prompt">✓</span> Prêt — bienvenue</p>
			</div>
		</div>
		<div class="dev-progress-wrap" aria-hidden="true">
			<div class="dev-progress-track">
				<div class="dev-progress-bar" id="dev-progress-bar"></div>
			</div>
			<span class="dev-progress-label" id="dev-progress-label">0%</span>
		</div>
		<div class="dev-preloader-brand">
			<img src="{{ asset('images/icon.png') }}" alt="" width="36" height="36" class="dev-preloader-icon">
			<span class="dev-preloader-name">Narcisse<span class="dev-accent">.</span>dev</span>
		</div>
	</div>
</div>
