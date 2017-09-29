<header class="Header">
	{{ config('app.name') ?? 'Laramin' }} - Dashboard
	<button class="Button Button--alpha" @click="showModal('bcm-ticket')">Submit a ticket to BCM</button>
	<laramin-navigation-burger @toggle-navigation="toggleNavigation"></laramin-navigation-burger>
	<laramin-modal ref="bcm-ticket" @close="hideModal" :animation-in="'flipInX'" :animation-out="'flipOutX'">
		<template slot="title">Having an issue?</template>
		<template slot="body">
			<p>Form Here.</p>
		</template>
		<p slot="footer">We will get back to you as soon as possible.</p>
	</laramin-modal>
</header>