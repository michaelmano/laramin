<header class="Header">
	{{ config('app.name') ?? 'Laramin' }} - Dashboard
	<button class="Button Button--alpha" @click="showModal('bcm-ticket')">Submit a ticket to {{ Config::get('laramin.project_manager.name') }}</button>
	<laramin-navigation-burger @toggle-navigation="toggleNavigation"></laramin-navigation-burger>
	<laramin-modal ref="bcm-ticket" @close="hideModal" :animation-in="'flipInX'" :animation-out="'flipOutX'">
		<template slot="title">Having an issue?</template>
		<template slot="body">
			<p>You can get in contact with {{ Config::get('laramin.project_manager.name') }} via the contact form below or by calling <a href="tel:{{ Config::get('laramin.project_manager.phone') }}">{{ Config::get('laramin.project_manager.phone') }}</a>.</p>
			<form v-on:submit.prevent="contactProjectManager" class="Form Box" method="POST" action="{{ route('laramin.contact') }}">
				{{ csrf_field() }}
				<fieldset class="Form__fieldset">
					<label class="Form__label" for="message">Message</label>
					<textarea v-model="form.message" class="Form__input Form__input--textarea" name="message" id="message" name="message" required></textarea>
				</fieldset>
				<fieldset class="Form__fieldset">
					<button class="Button" type="submit" :disabled="!form.message">Submit</button>
				</fieldset>
			</form>
		</template>
		<p slot="footer">We will get back to you as soon as possible.</p>
	</laramin-modal>
</header>