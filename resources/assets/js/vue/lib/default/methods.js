import Q from 'qoob';

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
	},
	deleteItemInput(event) {
		this.deleteItem = event.target.value;
	},
	submitDeleteItem(url, element) {
		const target = event.target;
		this.loading = true;
		this.hideModal();
		this.deleteForm.delete(url)

		.then(response => {
			if (element !== '') {
				Q.remove(Q.head(Q.ancestor(target, element)));
			}
			this.loading = false;
			this.messages.push({type: 'success', message: response.message});
		});
	}
}