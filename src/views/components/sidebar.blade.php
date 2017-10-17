<laramin-sidebar :open="navigationOpen" :user="{{ Auth::user() }}" @loading="loading = true">
	@foreach(Config::get('laramin.sidebar_links') as $link)
		<laramin-sidebar-item url="{{ $link['url'] }}" icon="{{ $link['icon'] }}">{{ $link['name'] }}</laramin-sidebar-item>
	@endforeach
	
	<li class="Navigation__list-item">
		<a href="#" class="Navigation__list-link" @click="showModal('bcm-ticket')">
			<i class="Navigation__list-icon fa fa-info-circle"></i>
			Help
		</a>
	</li>

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
</laramin-sidebar>