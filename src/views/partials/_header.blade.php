<header class="Header">
	<div class="Row">
		<div class="Cell Cell--8/12@xs">
			{{ config('app.name') ?? 'Laramin' }} - Dashboard
		</div>
		<div class="Cell Cell--align-right Cell--4/12@xs">
			<laramin-navigation-burger @toggle-navigation="toggleNavigation"></laramin-navigation-burger>
		</div>
	</div>
</header>