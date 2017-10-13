@extends('laramin::layouts.login')

@section('login-form')
	<form class="Form Box"method="POST" action="{{ route('login') }}">
		{{ csrf_field() }}
		<fieldset class="Form__fieldset">
			<label class="Form__label" for="email">Email address</label>
			<input class="Form__input Form__input--email" name="email" id="email" type="email" placeholder="jane@doe.me" required autofocus>
		</fieldset>
		<fieldset class="Form__fieldset">
			<label class="Form__label" for="password">Password</label>
			<input class="Form__input Form__input--password" name="password" id="password" type="password" required>
		</fieldset>
		<fieldset class="Form__fieldset">
			<button class="Button" type="submit">Login</button>
		</fieldset>
		<fieldset class="Form__fieldset">
			<button class="Button Button--text-link" type="submit">Forgot password?</button>
		</fieldset>
	</form>
@endsection