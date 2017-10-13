@extends('laramin::layouts.standard')

@section('standard-content')
	<div class="Content">
		<div class="Row">
			<div class="Cell Cell--12/12@xs"><h1 class="Heading">Welcome to the Laramin Dashboard</h1></div>
		</div>
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
				<form enctype="multipart/form-data" class="Form" method="POST" action="{{ route('login') }}">

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="fullName">Text</label>
						<input class="Form__input Form__input--text" name="fullName" id="fullName" type="text" placeholder="Jane Doe" required autofocus>
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="phone">Phone</label>
						<input class="Form__input Form__input--tel" name="phone" id="phone" type="tel" required>
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="comment">Textarea</label>
						<textarea class="Form__input Form__input--textarea"></textarea>
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="date">Date</label>
						<input class="Form__input Form__input--date" type="date">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="checkbox">Checkbox
							<input class="Form__input Form__input--checkbox" name="checkbox" id="checkbox" type="checkbox">
						</label>
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="radio">Radio
							<input class="Form__input Form__input--radio" name="radio" id="radio" type="radio">
						</label>
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="color">Color</label>
						<input class="Form__input Form__input--color" name="color" id="color" type="color">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="email">Email</label>
						<input class="Form__input Form__input--email" name="email" id="email" type="email">
					</fieldset>

					<fieldset class="Form__fieldset">
						<input type="file" name="file[]" id="file" class="Form__input Form__input--file" data-multiple-caption="{count} files selected" multiple />
						<label for="file"><i class="fa fa-upload"></i> <span>Choose a file&hellip;</span></label>
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="month">Month</label>
						<input class="Form__input Form__input--month" name="month" id="month" type="month">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="number">Number</label>
						<input class="Form__input Form__input--number" name="number" id="number" type="number">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="password">Password</label>
						<input class="Form__input Form__input--password" name="password" id="password" type="password">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="range">Range</label>
						<input class="Form__input Form__input--range" name="range" id="range" type="range">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="search">Search</label>
						<input class="Form__input Form__input--search" name="search" id="search" type="search">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="time">Time</label>
						<input class="Form__input Form__input--time" name="time" id="time" type="time">
					</fieldset>

					<fieldset class="Form__fieldset">
						<label class="Form__label" for="url">Url</label>
						<input class="Form__input Form__input--url" name="url" id="url" type="url">
					</fieldset>
					
					<fieldset class="Form__fieldset">
						<label class="Form__label" for="week">Week</label>
						<input class="Form__input Form__input--week" name="week" id="week" type="week">
					</fieldset>

					<fieldset class="Form__fieldset">
						<button class="Button" type="submit">Submit</button>
					</fieldset>
				</form>
<pre class="Pre">&lt;form enctype=&quot;multipart/form-data&quot; class=&quot;Form&quot; method=&quot;POST&quot; action=&quot;{{ route('login') }}&quot;&gt;
		
	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;fullName&quot;&gt;Text&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--text&quot; name=&quot;fullName&quot; id=&quot;fullName&quot; type=&quot;text&quot; placeholder=&quot;Jane Doe&quot; required autofocus&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;phone&quot;&gt;Phone&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--tel&quot; name=&quot;phone&quot; id=&quot;phone&quot; type=&quot;tel&quot; required&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;comment&quot;&gt;Textarea&lt;/label&gt;
		&lt;textarea class=&quot;Form__input Form__input--textarea&quot;&gt;&lt;/textarea&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;date&quot;&gt;Date&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--date&quot; type=&quot;date&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;checkbox&quot;&gt;Checkbox
			&lt;input class=&quot;Form__input Form__input--checkbox&quot; name=&quot;checkbox&quot; id=&quot;checkbox&quot; type=&quot;checkbox&quot;&gt;
		&lt;/label&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;radio&quot;&gt;Radio
			&lt;input class=&quot;Form__input Form__input--radio&quot; name=&quot;radio&quot; id=&quot;radio&quot; type=&quot;radio&quot;&gt;
		&lt;/label&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;color&quot;&gt;Color&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--color&quot; name=&quot;color&quot; id=&quot;color&quot; type=&quot;color&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;email&quot;&gt;Email&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--email&quot; name=&quot;email&quot; id=&quot;email&quot; type=&quot;email&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;input type=&quot;file&quot; name=&quot;file[]&quot; id=&quot;file&quot; class=&quot;Form__input Form__input--file&quot; data-multiple-caption=&quot;{count} files selected&quot; multiple /&gt;
		&lt;label for=&quot;file&quot;&gt;&lt;i class=&quot;fa fa-upload&quot;&gt;&lt;/i&gt; &lt;span&gt;Choose a file&amp;hellip;&lt;/span&gt;&lt;/label&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;month&quot;&gt;Month&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--month&quot; name=&quot;month&quot; id=&quot;month&quot; type=&quot;month&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;number&quot;&gt;Number&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--number&quot; name=&quot;number&quot; id=&quot;number&quot; type=&quot;number&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;password&quot;&gt;Password&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--password&quot; name=&quot;password&quot; id=&quot;password&quot; type=&quot;password&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;range&quot;&gt;Range&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--range&quot; name=&quot;range&quot; id=&quot;range&quot; type=&quot;range&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;search&quot;&gt;Search&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--search&quot; name=&quot;search&quot; id=&quot;search&quot; type=&quot;search&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;time&quot;&gt;Time&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--time&quot; name=&quot;time&quot; id=&quot;time&quot; type=&quot;time&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;url&quot;&gt;Url&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--url&quot; name=&quot;url&quot; id=&quot;url&quot; type=&quot;url&quot;&gt;
	&lt;/fieldset&gt;
	
	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;label class=&quot;Form__label&quot; for=&quot;week&quot;&gt;Week&lt;/label&gt;
		&lt;input class=&quot;Form__input Form__input--week&quot; name=&quot;week&quot; id=&quot;week&quot; type=&quot;week&quot;&gt;
	&lt;/fieldset&gt;

	&lt;fieldset class=&quot;Form__fieldset&quot;&gt;
		&lt;button class=&quot;Button&quot; type=&quot;submit&quot;&gt;Submit&lt;/button&gt;
	&lt;/fieldset&gt;
&lt;/form&gt;</pre>
			</div>
		</div>
	</div>
@endsection