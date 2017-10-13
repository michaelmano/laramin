@extends('laramin::layouts.standard')

@section('standard-content')
	<div class="Content">
		<h1 class="Heading">Welcome to the Laramin Dashboard</h1>
		<div class="Row">
			<div class="Cell Cell--12/12@xs Cell--6/12@lg">
				<div class="Box">
					<h4 class="Heading Heading--no-mt">Tags</h4>
					<div class="Tag">
						<div class="Tag__name">Tag with info</div>
						<div class="Tag__info">v2</div>
					</div>
					<div class="Tag">
						<div class="Tag__name">Tag without info</div>
					</div>
		
					<div class="Tag">
						<div class="Tag__name">Tag with delete <i class="Tag__remove fa fa-times"></i></div>
					</div>
									
<pre class="Pre">&lt;div class=&quot;Tag&quot;&gt;
		&lt;div class=&quot;Tag__name&quot;&gt;Tag with info&lt;/div&gt;
		&lt;div class=&quot;Tag__info&quot;&gt;v2&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;Tag&quot;&gt;
		&lt;div class=&quot;Tag__name&quot;&gt;Tag without info&lt;/div&gt;
	&lt;/div&gt;
		
	&lt;div class=&quot;Tag&quot;&gt;
		&lt;div class=&quot;Tag__name&quot;&gt;Tag with delete &lt;i class=&quot;Tag__remove fa fa-times&quot;&gt;&lt;/i&gt;&lt;/div&gt;
	&lt;/div&gt;</pre>
				</div>
			</div>
			<div class="Cell Cell--12/12@xs Cell--6/12@lg">
				<div class="Box">
					<h4 class="Heading Heading--no-mt">Tag Input</h4>
					<p>If you also pass a :name prop to the component e.g. :name="tags[]" it will create hidden inputs and set the values to the tags.</p>
					<laramin-tags-input :autocomplete="['Suggestion 1',' Suggestion 2', 'Suggestion 3']" :tags="['tag1', 'tag2', 'tag3']"></laramin-tags-input>
					<pre class="Pre">&lt;laramin-tags-input :autocomplete=&quot;['Suggestion 1',' Suggestion 2', 'Suggestion 3']&quot; :tags=&quot;['tag1', 'tag2', 'tag3']&quot;&gt;&lt;/laramin-tags-input&gt;</pre>
				</div>
			</div>
			<div class="Cell Cell--12/12@xs Cell--6/12@lg">
				<div class="Box">
					<h4 class="Heading Heading--no-mt">Modals</h4>
					<button class="Button" @click="showModal('modal')">Show Modal</button>
					<laramin-modal ref="modal" @close="hideModal">
						<template slot="title">Modal</template>
						<template slot="body">
							<p>Modal Body Content</p>
						</template>
						<p slot="footer">Footer Content</p>
					</laramin-modal>
	<pre class="Pre">&lt;button class=&quot;Button&quot; @click=&quot;showModal('modal')&quot;&gt;Show Modal&lt;/button&gt;
&lt;laramin-modal ref=&quot;modal&quot; @close=&quot;hideModal&quot;&gt;
	&lt;template slot=&quot;title&quot;&gt;Modal&lt;/template&gt;
	&lt;template slot=&quot;body&quot;&gt;
		&lt;p&gt;Modal Body Content&lt;/p&gt;
	&lt;/template&gt;
	&lt;p slot=&quot;footer&quot;&gt;Footer Content&lt;/p&gt;
&lt;/laramin-modal&gt;</pre>
				</div>
		</div>
		<div class="Cell Cell--12/12@xs Cell--6/12@lg">
			<div class="Box">
				<h4 class="Heading Heading--no-mt">Form Examples</h4>
				<form class="Form"method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<fieldset class="Form__fieldset">
						<label class="Form__label" for="fullName">Full Name</label>
						<input class="Form__input Form__input--text" name="fullName" id="fullName" type="text" placeholder="Jane Doe" required autofocus>
					</fieldset>
					<fieldset class="Form__fieldset">
						<label class="Form__label" for="phone">Phone</label>
						<input class="Form__input Form__input--tel" name="phone" id="phone" type="tel" required>
					</fieldset>
					<fieldset class="Form__fieldset">
						<button class="Button" type="submit">Submit</button>
					</fieldset>
				</form>
<pre class="Pre">&lt;form class=&quot;Form&quot;method=&quot;POST&quot; action=&quot;{{ route('login') }}&quot;&gt;
	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;fullName&quot;&gt;Full Name&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--text&quot; name=&quot;fullName&quot; id=&quot;fullName&quot; type=&quot;text&quot; placeholder=&quot;Jane Doe&quot; required autofocus&gt;
	&lt;/fieldset&gt;
	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;phone&quot;&gt;Phone&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--tel&quot; name=&quot;phone&quot; id=&quot;phone&quot; type=&quot;tel&quot; required&gt;
	&lt;/fieldset&gt;
	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;button class=&quot;Button&quot; type=&quot;submit&quot;&gt;Submit&lt;/button&gt;
	&lt;/fieldset&gt;
&lt;/form&gt;</pre>
			</div>
		</div>
	</div>
@endsection