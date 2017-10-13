export default {
	showModal(name) {
		this.$refs[name].show = true;
		this.activeModal = name;
	},
	hideModal() {
		this.$refs[this.activeModal].show = false;
		this.activeModal = null;
	},
	listenForEscape(event) {
		if (event.keyCode === 27) this.hideModal();
	},
	toggleNavigation() {
		this.navigationOpen = !this.navigationOpen;
	},
	contactProjectManager() {
		this.loading = true;
		this.hideModal();
		this.form.post('/laramin/contact')
			.then(response => {
				this.loading = false;
				this.messages.push({type: 'success', message: response.message});
			});
	}
}