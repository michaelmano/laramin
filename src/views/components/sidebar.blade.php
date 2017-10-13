<laramin-sidebar :open="navigationOpen" :user="{{ Auth::user() }}" @loading="loading = true">
	@foreach(Config::get('laramin.sidebar_links') as $link)
		<laramin-sidebar-item url="{{ $link['url'] }}" icon="{{ $link['icon'] }}">{{ $link['name'] }}</laramin-sidebar-item>
	@endforeach
</laramin-sidebar>