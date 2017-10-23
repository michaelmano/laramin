<template>
	<transition enter-active-class="animated animated--fast slideInLeft" leave-active-class="animated slideOutLeft">
		<aside v-show="open" class="Sidebar">
			<div class="Sidebar__container">
				<section class="Avatar">
					<img v-if="user.avatar" class="Avatar__image" :src="user.avatar" :alt="user.name">
					<i v-else class="Avatar__image fa fa-4x fa-user-circle-o"></i>
					<div class="Avatar__menu">
						<h6 class="Avatar__name" @click.prevent="openUserMenu">{{ user.name }}
							<span :class="['Avatar__button', userNav ? 'Avatar__button--active' : '']">
								<i class="fa fa-angle-down"></i>
							</span>
						</h6>
						<transition enter-active-class="animated flipInX" leave-active-class="animated flipOutX">
							<nav v-show="userNav" class="Avatar__navigation">
								<ul class="List List--unstyled">
									<li class="List__item" v-for="item in userNavigation"><a :href="item.link" class="List__item-link">item.name</a></li>
									<li class="List__item"><a href="#" @click.prevent="logout" class="List__item-link">Logout</a></li>
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
			</div>
		</aside>
	</transition>
</template>

<script>
	import Form from '../../vanilla/lib/form';

	export default {
		props: {
			open: {
				default: true,
				type: Boolean,
			},
			user: {
				type: Object,
			},
			userNavigation: {
				type: Array
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
			},
			logout() {
				this.$emit('loading');
				
				let form = new Form();
				form.post('/logout')
					.then(event => location.href = '/');
			}
		}
	}
</script>