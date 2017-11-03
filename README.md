Laramin
=======

Laramin is a dashboard template designed with material in mind.
I created Laramin to get your laravel project up and running without spending to much time worrying about designing an admin panel and logic to handle related assets like tag inputs.

**Laramin does not handle any backend logic.**

## Table of Contents
- [Installing](#installing)
	* [Setting up](#setting-up)
- [Elements and Layouts](#elements-and-layouts)
	* [Default Blade](#default-blade)
- [Vue Components](#vue-components)
	* [Image Cropper](#image-cropper)
	* [Flash Messages](#flash-messages)
	* [Loading Overlay](#loading-overlay)
	* [Tabs](#tabs)
	* [Tags Input](#tags-input)
	* [Tooltips](#tooltips)
- [Laravel Components](#laravel-components)
	* [Delete Item](#delete-item)
- [Vanilla JavaScript](#vanilla-javascript)
- [Config](#config)
	* [Menu](#menu)
	* [Project Manager](#project-manager)


## Installing
Once you have a Laravel project up and running you can install laramin with composer `composer require michaelmano/laramin` and then adding it to your service providers under `config/app.php`

`Michaelmano\Laramin\LaraminServiceProvider::class,`

### Setting up
I normally start by editing my route service provider `app/Providers/RouteServiceProvider.php` and adding the below inside of mapWebRoutes.
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

Now to start using laramin I will use the command `php artisan make:auth` to get Laravels authentication scaffolding up and running and then overwrite the login page under `resources/views/auth/login.blade.php` with the following.
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
I will now edit `app/Http/Controllers/Auth/RegisterController.php` and add a new public function to the bottom called forbidden
```
public function forbidden()
{
	abort(403);
}
```
and then edit `web/routes.php` and add 
```
Route::get('register', 'Auth\RegisterController@forbidden');
```
To stop user registration however if your project uses registration you can set up your own middleware to handle the dashboard.
I will also search for `protected $redirectTo = '/home';` in the project and replace it wil `protected $redirectTo = '/dashboard';`

## Elements and Layouts

### Default Blade
```
@extends('laramin::layouts.standard')
@push('styles')
	Any style sheets or even inline styles you wish to push
@endpush
@section('standard-content')
	Content here
@endsection
@push('scripts')
	any scripts you wish to inline or call.
@endpush
```
This is the blade i use for everything.

## Vue Components

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
**TODO**

## Config
The config can be found in your project under `config/laramin.php`
### Menu
You can set the menu up by editing the config and this layout uses font-awesome.
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
```
'project_manager' => [
	'name' => 'John Smith',
	'email' => 'jsmith@example.com',
	'phone' => '555 55 555',
	'contact_finalised_message' => 'Thank you for contacting us, we will get back to you as soon as possible.',
],
```