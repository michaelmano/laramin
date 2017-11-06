Laramin
=======

Laramin is a dashboard template designed with material in mind.
I created Laramin to get your laravel project up and running without spending to much time worrying about designing an admin panel and logic to handle related assets like tag inputs.

**Laramin does not handle any backend logic.**

## Table of Contents
- [Installing](#installing)
	* [Routes](#routes)
	* [Login Form](#login-form)
- [Config](#config)
	* [Menu](#menu)
	* [Project Manager](#project-manager)
- [Elements and Layouts](#elements-and-layouts)
	* [Default Blade](#default-blade)
	* [Grid System](#grid-system)
	* [Kitchen Sink](#kitchen-sink)
	* [Tags](#tags)
	* [Cards](#cards)
	* [Forms](#forms)
	* [Utility Helpers](#utility-helpers)
- [Vue Components](#vue-components)
	* [Modals](#modals)
	* [Image Cropper](#image-cropper)
	* [Flash Messages](#flash-messages)
	* [Loading Overlay](#loading-overlay)
	* [Tabs](#tabs)
	* [Tags Input](#tags-input)
	* [Tooltips](#tooltips)
- [Laravel Components](#laravel-components)
	* [Delete Item](#delete-item)
- [Vanilla JavaScript](#vanilla-javascript)
	* [Sortable Items](#sortable-items)


## Installing
Once you have a Laravel project up and running you can install laramin with composer `composer require michaelmano/laramin` and then adding it to your service providers under `config/app.php`

`Michaelmano\Laramin\LaraminServiceProvider::class,`

and then publish the assets with

`php artisan vendor:publish --provider="Michaelmano\Laramin\LaraminServiceProvider"`

I highly suggest not editing the files under `public/michaelmano/laramin` as Laramin is still in beta and there will be many updates.

### Routes
As Laramin is an admin panel I will start with `php artisan make:auth` and then edit my route service provider `app/Providers/RouteServiceProvider.php` and adding the below inside of mapWebRoutes.
```
protected function mapWebRoutes()
{
	Route::middleware('web')
			->namespace($this->namespace)
			->group(base_path('routes/web.php'));

	Route::middleware('web')
			->namespace($this->namespace)
			->group(base_path('routes/dashboard.php'));
}
```
and then creating a file called dashboard.php inside of the routes folder and here is where I will create all of my dashboard routes.
```
<?php

Route::group([
    'middleware' => 'auth',
    'namespace' => 'Dashboard',
    'prefix' => 'dashboard',
    'as' => 'dashboard.'
], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('/pages', 'PageController');
    Route::resource('/posts', 'PostController');
    Route::resource('/faqs', 'FaqController');
});
```
To stop user registration I will edit `app/Http/Controllers/Auth/RegisterController.php` and add a new public function to the bottom called forbidden
```
public function forbidden()
{
	abort(403);
}
```
Then edit `web/routes.php` file and add
```
Route::get('register', 'Auth\RegisterController@forbidden');
```
However if your project uses registration you can set up your own middleware to handle the dashboard.
I will also search for `protected $redirectTo = '/home';` in the project and replace it wil `protected $redirectTo = '/dashboard';`

### Login Form
![login](https://github.com/michaelmano/laramin/raw/develop/documentation/images/login.png)

Now overwrite the login page under `resources/views/auth/login.blade.php` with the following.
```
@extends('laramin::layouts.login')

@section('login-form')
	<form class="Form Box Box--padded animated zoomIn"method="POST" action="{{ route('login') }}">
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
			<a class="Button Button--text-link" href="{{ route('password.request') }}">Forgot password?</a>
		</fieldset>
	</form>
@endsection
```

## Config
The config can be found in your project under `config/laramin.php`
### Menu
You can set the menu up by editing the config and this layout uses font-awesome, The user avatar will be a font awesome user icon unless your user object has a $user->avatar which points to a image URL.

```
'sidebar_links' => [
	[
		'url' => '/dashboard',
		'name' => 'Dashboard',
		'icon' => 'fa-window-maximize',
	],
	[
		'url' => '/dashboard/pages',
		'name' => 'Pages',
		'icon' => 'fa-file-text',
	],
	[
		'url' => '/dashboard/posts',
		'name' => 'Posts',
		'icon' => 'fa-newspaper-o',
	],
	[
		'url' => '/dashboard/faqs',
		'name' => 'FAQ\'s',
		'icon' => 'fa-question',
	],
],
```
### Project Manager
The project manager is used to create a help form which a client may use to send them an email or get their contact details, If you remove the values the help button will not show.

![project-manager](https://github.com/michaelmano/laramin/raw/develop/documentation/images/project-manager.png)
```
'project_manager' => [
	'name' => 'John Smith',
	'email' => 'jsmith@example.com',
	'phone' => '555 55 555',
	'contact_finalised_message' => 'Thank you for contacting us, we will get back to you as soon as possible.',
],
```

## Elements and Layouts

### Default Blade
```
@extends('laramin::layouts.standard')
@push('styles')
	You can push any overrides or additional styles here.
@endpush
@section('standard-content')
	Content here
@endsection
@push('scripts')
	You can push any javascript here.
@endpush
```
This is the blade i use for everything.

### Grid System
Laramin uses [Buzuki](https://buzuki.pixls.com.au/) a mobile-first, responsive BEM flavoured flexbox css grid system.

### Kitchen Sink

If your project is set to local environment laramin has 1 route which you can view for all elements you can use in the system with the code also shown. you can access it from `http://your-domain.tld/laramin`

### Box
The box element is just an element with a box-shadow, You can also add a modifier class of `Box--padded` which will add padding to the Box, 

### Masonry
The Masonry of laramin uses css grids, no JavaScript at all.
The code below uses the Masonry elements with the [Cards](#cards)

![masonry](https://github.com/michaelmano/laramin/raw/develop/documentation/images/masonry.png)
```
<div class="Masonry__panel">
	<div class="Box Card">
		<header class="Card__header">
			<h5 class="Heading util-breakaway-bottom-2"><a href="{{ route('dashboard.posts.edit', $post) }}">{{ $post->title }}</a></h5>
			<small class="Heading__meta"><strong>Slug: </strong>{{ $post->slug }}</small>
		</header>
		<div class="Card__content">
			{{ $post->body }}
		</div>
		<footer class="Card__footer Row Row--valign-center">
			<div class="Cell Cell--12/12@xs Cell--4/12@xl">
				<a href="{{ route('dashboard.posts.edit', $post) }}" class="Button Button--round"><i class="fa fa-pencil"></i></a>
				@include('laramin::components.confirm-delete', [
					'value' => $post->title,
					'url' => route('dashboard.posts.destroy', $post),
					'remove' => '.Masonry__panel'
				])
			</div>
			<div class="Cell Cell--12/12@xs Cell--8/12@xl Cell--align-right@xl">
				@foreach($post->tags as $tag)
					<div class="Tag">
						<div class="Tag__name">{{ $tag->name }}</div>
					</div>
				@endforeach
			</div>
		</footer>
	</div>
</div>
```
### Tags
![tags](https://github.com/michaelmano/laramin/raw/develop/documentation/images/tags.png)

The tags can be specified like so: 

```
<div class="Tag">
	<div class="Tag__name">Tag with info</div>
	<div class="Tag__info">v2</div>
</div>
<div class="Tag">
	<div class="Tag__name">Tag without info</div>
</div>
	
<div class="Tag">
	<div class="Tag__name">Tag with delete</div>
	<div class="Tag__remove"><i class="fa fa-times"></i></div>
</div>
```

### Cards
![cards](https://github.com/michaelmano/laramin/raw/develop/documentation/images/cards.png)

The card component has 3 elements, The Header, Content and Footer, Below I am putting the title of the post in the header with a slug as a heading meta, then we have the post content as Card__content
and in the footer I am rendering the [Delete Item](#delete-item) laravel component in the footer with the post [Tags](#tags).
```
<div class="Box Card">
    <header class="Card__header">
        <h5 class="Heading util-breakaway-bottom-2"><a href="{{ route('dashboard.posts.edit', $post) }}">{{ $post->title }}</a></h5>
        <small class="Heading__meta"><strong>Slug: </strong>{{ $post->slug }}</small>
    </header>
    <div class="Card__content">
        {{ $post->body }}
    </div>
    <footer class="Card__footer Row Row--valign-center">
        <div class="Cell Cell--12/12@xs Cell--4/12@xl">
            <a href="{{ route('dashboard.posts.edit', $post) }}" class="Button Button--round"><i class="fa fa-pencil"></i></a>
            @include('laramin::components.confirm-delete', [
                'value' => $post->title,
                'url' => route('dashboard.posts.destroy', $post),
                'remove' => '.Masonry__panel'
            ])
        </div>
        <div class="Cell Cell--12/12@xs Cell--8/12@xl Cell--align-right@xl">
            @foreach($post->tags as $tag)
                <div class="Tag">
                    <div class="Tag__name">{{ $tag->name }}</div>
                </div>
            @endforeach
        </div>
    </footer>
</div>
```
### Forms
![forms](https://github.com/michaelmano/laramin/raw/develop/documentation/images/forms.png)
```
<form enctype="multipart/form-data" class="Form" method="POST" action="{{ route('login') }}">
	<fieldset class="Form__fieldset">
		<label class="Form__label" for="fullName">Text</label>
		<input class="Form__input Form__input--text" name="fullName" id="fullName" type="text" required>
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
```

### Utility Helpers

## Margins
`util-breakaway-${top/right/bottom/left}-${0/1/2/3/4/5/6/7/8}-${5}` can be used like so `util-breakaway-bottom-0` to remove margins off the bottom or `util-breakaway-top-1-5` to add 1.5rem margin to the top.

## Vue Components

### Modals
![modals](https://github.com/michaelmano/laramin/raw/develop/documentation/images/modals.png)
```
<button class="Button" @click="showModal('modal')">Show Modal</button>
<laramin-modal ref="modal" @close="hideModal">
	<template slot="title">Modal</template>
	<template slot="body">
		<p>Modal Body Content</p>
	</template>
	<p slot="footer">Footer Content</p>
</laramin-modal>
```

The button on click will trigger a function called showModal() which takes 1 paramer, the reference of the modal which must also be unique `ref="modal"` and the modal can be passed a prop for the animation you wish to use
`<laramin-modal ref="name" @close="hideModal" animation-in="flipInX" animation-out="flipOutX">` by default the animations are `bounceInLeft` and `bounceOutRight`

### Image Cropper
`<laramin-crop image="http://via.placeholder.com/1920x800" :min-width="1920" :min-height="800" name="image"></laramin-crop>`

The name and image are required, the name will set the name of the file input and also create a hidden input called `${name}`_dimentions which you can use in the back end of your application to crop the uploaded image.

The min-height and min-width props are to set the aspect ratio of the image and will create a flash error message and resets the file input if the user tries to select an image under those dimentions and also make sure that the cropper is at that aspect ratio `width / height`

The image you pass will be the default image and the cropper will not be enabled until the user selects one with the upload button.

Below is an example of a trait I have used to manage media which also uses the [Intervention Image package.](http://image.intervention.io/)
```
<?php

namespace App\Traits;

use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait MediaManager
{
    public function uploadImage($data)
    {
        $dimentions = json_decode($data['dimentions'], true);
        $width = floor($dimentions['width']);
        $height = floor($dimentions['height']);
        $x = floor($dimentions['x']);
        $y = floor($dimentions['y']);
        $size = $data['size'] ?? '1920, 800';

        $image_name = 'images/'.implode('-', [$this->id, Carbon::now()->timestamp, str_random(10)]).'.'.$data['image']->getClientOriginalExtension();

        $img = Image::make(file_get_contents($data['image']));
        $img->crop($width, $height, $x, $y);
        $img->resize($size);
        $img->stream();

        Storage::put('public/'.$image_name, $img);

        return $image_name;
    }

    public function deleteImage($location)
    {
        if (!empty($location) && Storage::exists('public/'.$location)) {
            return Storage::delete('public/'.$location);
        }
    }
}
```
Now just use the trait in your model like so:
```
<?php

namespace App;

use App\Traits\MediaManager;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use MediaManager;
}
```

In the controller all you have to do is check if the update has the image fields.

```
<?php

namespace App\Http\Controllers\Dashboard;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function update(Page $page, Request $request)
    {
        if ($request->has(['image', 'image_dimentions'])) {
            $data = [
                'image' => $request->file('image'),
                'dimentions' => $request->get('image_dimentions')
            ];
            $page->deleteImage($page->feature_image);
            $page->feature_image = $page->uploadImage($data);
            $page->save();
        }
        $page->update($request->only('title', 'body'));

        return back()->withMessage('The page has been updated.');
    }
}

```

### Flash Messages
The flash messages can be passed 2 ways, One is if you set a session variable called message (or the errors that laravel passes on form fields).
The second way is if you are using javascript you can push to the laramin object like so `laramin.messages.push({type: 'error', 'message'});` and there are 2 types. `error` and `success`.

### Loading Overlay
The loading overlay can be triggered like the above flash messages. `laramin.loading = true;` however you must also disable this when you have finished loading `laramin.loading = false;` unless you are waiting for a page reload. 
Below is how I have set up the sortable items with a promis.
```
let promises = [];
laramin.loading = true;
Q.each(sortableInput, (sortableInput, index) => {
	let promise = axios.post(sortableInput.form.action, {
		_method: 'PATCH',
		order: index+1
	});
	promises.push(promise);
});
Promise.all(promises).then(() => {
	laramin.loading = false;
});
```
So I have set the window to loading, created a promis and then when they have all completed I set the loading back to false.

### Tabs
![tabs](https://github.com/michaelmano/laramin/raw/develop/documentation/images/tabs.png)
The tabs component is quite easy to use.
```
<laramin-tabs>
	<laramin-tab name="Tab 1">
		<p>Content for tab 1</p>
	</laramin-tab>
	<laramin-tab name="Tab 2">
		<p>Content for tab 2</p>
	</laramin-tab>
</laramin-tabs>
```
This will create the tabs component but also allow you to link to a specific tab on a page by using the name as a hash, e.g. `http://site-url.com/page-url#tab-2` which will open tab 2 instead of 1.

### Tags Input
```
<laramin-tags-input
	name="tags[]"
	:autocomplete="['Suggestion 1',' Suggestion 2', 'Suggestion 3']"
	:tags="['tag1', 'tag2', 'tag3']">
</laramin-tags-input>`
```

Which will create the input and add auto complete suggestions and default tags to be pre filled. The name prop will also create hidden inputs with the values in the tags input. e.g. tag1, tag2, tag3 which you can use like so.

```
<?php

namespace App\Http\Controllers\Dashboard;

use App\Post;
use App\Tag;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function update(Post $post)
    {
        $tags = collect(request('tags'))->map(function ($tag) {
            return Tag::firstOrCreate(['name' => ucfirst($tag)])->id;
        });
        $post->tags()->sync($tags);
        $post->update(request()->except('_token', '_method', 'tags'));

        return back()->withMessage('The post has been updated');
    }
}

```
### Tooltips
Tool tips are self explanatory. `<laramin-tooltip tooltip="test tooltip">This will show test tool tip on hover.</laramin-tooltip>`

## Laravel Components
### Delete Item
```
@include('laramin::components.confirm-delete', [
	'value' => $page->title,
	'url' => route('dashboard.pages.destroy', $page),
	'delete_text' => 'Delete Page',
	'remove' => '.Masonry__panel'
])
```
This will create a button with the text `Delete Page` if you do not pass `delete_text` it will just show a trash can that when clicked will show a modal window with an input where you have to pass the value in before you can delete it e.g. the page title.
The remove will remove first parent with the class as this is done via ajax.

## Vanilla JavaScript

### Sortable Items
![sortable](https://github.com/michaelmano/laramin/raw/develop/documentation/images/sortable.png)

To use sortable you would have a field called order on your modal and then when rendering you would do it like so:
```
<div class="Row js-sortable">
	@foreach($faqs as $faq)
		<div class="Cell Cell--12/12@xs js-sortable-item">
			<div class="Box Card">
				<header class="Card__header">
					<h6 class="Heading"><a href="{{ route('dashboard.faqs.edit', $faq) }}">{{ $faq->title }}</a></h6>
				</header>
				<div class="Card__content">
					{{ $faq->body }}
				</div>
				<footer class="Card__footer Row Row--valign-center">
					<div class="Cell Cell--align-left Cell--6/12@xs">
						<button class="Button Button--round js-sortable-tile"><i class="fa fa-arrows"></i></button>
						<form action="{{ route('dashboard.faqs.update', $faq) }}" method="POST">
							<input class="js-sortable-input" type="hidden" value="{{ $faq->order }}">
						</form>
					</div>
					<div class="Cell Cell--align-right Cell--6/12@xs">
						<a href="{{ route('dashboard.faqs.edit', $faq) }}" class="Button Button--round"><i class="fa fa-pencil"></i></a>
						@include('laramin::components.confirm-delete', [
							'value' => $faq->title,
							'url' => route('dashboard.faqs.destroy', $faq),
							'remove' => '.js-sortable-item'
						])
					</div>
				</footer>
			</div>
		</div>
	@endforeach
</div>
```
This will render each item and each item will have a hidden form which will change the value of the order input and post it to the route you specify when dragged. The item will only change order if you drag it by the sortable button `<button class="Button Button--round js-sortable-tile"><i class="fa fa-arrows"></i></button>`