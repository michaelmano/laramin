<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:xlink="http://www.w3.org/1999/xlink">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name') ?? 'Laramin' }} - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('michaelmano/laramin/css/laramin.css') }}">
        @stack('styles')
    </head>
<body class="Body">
    <div id="laramin" class="Laramin">
        <laramin-loader :loading="loading"></laramin-loader>
        @include('laramin::partials._flash')
        @yield('base-header')
        <main class="Main">
            @yield('base-content')
            @if (Config::get('laramin.project_manager'))
            <laramin-modal ref="help-ticket" @close="hideModal" animation-in="{{ Config::get('laramin.project_manager.modal_animation.animation_in') }}" animation-out="{{ Config::get('laramin.project_manager.modal_animation.animation_out') }}">
                <template slot="title">Having an issue?</template>
                <template slot="body">
                    <p>You can get in contact with {{ Config::get('laramin.project_manager.name') }} via the contact form below or by calling <a href="tel:{{ Config::get('laramin.project_manager.phone') }}">{{ Config::get('laramin.project_manager.phone') }}</a>.</p>
                    <form v-on:submit.prevent="contactProjectManager" class="Form Box Box--padded" method="POST" action="{{ route('laramin.contact') }}">
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
            @endif
        </main>
    </div>
</body>

<script src="{{ asset('michaelmano/laramin/js/ckeditor.js') }}"></script>
<script src="{{ asset('michaelmano/laramin/js/laramin.js') }}"></script>
@stack('scripts')
</html>