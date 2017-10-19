@if ($value && $url)
	@if (isset($delete_text))
		<a @click="showModal('delete-{{ str_slug($value,$url) }}')" class="Link Link--no-underline Link--kilo"><i class="fa fa-trash"></i> {{ $delete_text }}</a>
	@else
		<button @click="showModal('delete-{{ str_slug($value,$url) }}')" class="Button Button--kilo Button--round"><i class="fa fa-trash"></i></button>
	@endif
	<laramin-modal ref="delete-{{ str_slug($value,$url) }}" @close="hideModal">
		<template slot="title">{{ $value }}</template>
		<template slot="body">
			To delete this item you must type the title in the input.
				<fieldset class="Form__fieldset util-breakaway-top-1">
					<input class="Form__input Form__input--text" name="delete" @input="deleteItemInput">
				</fieldset>
		</template>
		<p slot="footer">
			<button v-if="deleteItem === '{{ $value }}'" class="Button Button--kilo" @click="submitDeleteItem('{{ $url }}', '{{ isset($remove) ? $remove : '' }}')">Delete</button>
		</p>
	</laramin-modal>
@endif