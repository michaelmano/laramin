<laramin-sidebar :open="navigationOpen" :user="{{ Auth::user() }}" @loading="loading = true">
	@foreach(Config::get('laramin.sidebar_links') as $link)
		<laramin-sidebar-item url="{{ $link['url'] }}" icon="{{ $link['icon'] }}">{{ $link['name'] }}</laramin-sidebar-item>
	@endforeach
	@if (Config::get('laramin.project_manager.name'))
	<li class="Navigation__list-item">
		<a href="#" class="Navigation__list-link" @click="showModal('help-ticket')">
			<i class="Navigation__list-icon fa fa-info-circle"></i>
			Help
		</a>
	</li>
	@endif
</laramin-sidebar>