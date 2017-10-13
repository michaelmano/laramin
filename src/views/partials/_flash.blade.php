<div class="Flash">
@if(!$errors->isEmpty())
	@foreach ($errors->all() as $error)
		<laramin-flash type="error" message="{{ $error }}"></laramin-flash>
	@endforeach
@endif
<laramin-flash v-for="(message, index) in messages" :key="index" :type="message.type" :message="message.message"></laramin-flash>
</div>