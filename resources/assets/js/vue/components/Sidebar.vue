<template>
	<aside :class="['Sidebar', open ? 'Sidebar--open' : '']">
		<section class="Avatar">
			<img class="Avatar__image" src="http://via.placeholder.com/80x80" alt="User Name" @click.prevent="openUserMenu">
			<div class="Avatar__menu">
				<h6 class="Avatar__name" @click.prevent="openUserMenu">Joe Bloggs 
					<span :class="['Avatar__button', userNav ? 'Avatar__button--active' : '']">
						<svg class="Icon Icon--small">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-angle-down"></use>
						</svg>
					</span>
				</h6>
				<transition enter-active-class="animated flipInX" leave-active-class="animated flipOutX">
					<nav v-show="userNav" class="Avatar__navigation">
						<ul class="List List--unstyled">
							<li class="List__item"><a href="#" class="List__item-link">Preferences</a></li>
							<li class="List__item"><a href="#" class="List__item-link">Logout</a></li>
						</ul>
					</nav>
				</transition>
			</div>
		</section>

		<slot></slot>
	</aside>
</template>

<script>
	export default {
		props: {
			open: {
				default: false,
				type: Boolean,
			}
		},
		data() {
			return {
				userNav: false,
			}
		},
		methods: {
			openUserMenu() {
				return this.userNav = !this.userNav;
			}
		}
	}
</script>