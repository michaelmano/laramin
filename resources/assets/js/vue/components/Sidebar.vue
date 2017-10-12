<template>
	<transition enter-active-class="animated animated--fast slideInLeft" leave-active-class="animated slideOutLeft">
		<aside v-show="open" class="Sidebar">
			<section class="Avatar">
				<img class="Avatar__image" src="http://via.placeholder.com/80x80" alt="User Name">
				<div class="Avatar__menu">
					<h6 class="Avatar__name" @click.prevent="openUserMenu">Joe Bloggs 
						<span :class="['Avatar__button', userNav ? 'Avatar__button--active' : '']">
							<i class="fa fa-angle-down"></i>
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
			<nav class="Navigation">
				<ul class="Navigation__list">
					<slot></slot>
				</ul>
			</nav>
		</aside>
	</transition>
</template>

<script>
	export default {
		props: {
			open: {
				default: true,
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