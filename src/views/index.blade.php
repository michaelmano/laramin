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
			<h4>Login Page example.</h4>
			<a href="/laramin/login">View login page.</a>
		</div>
	</div>
@endsection