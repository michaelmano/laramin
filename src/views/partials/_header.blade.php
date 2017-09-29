<header class="Header">
	{{ config('app.name') ?? 'Laramin' }} - Dashboard
	<laramin-navigation-burger @toggle-navigation="toggleNavigation"></laramin-navigation-burger>
</header>