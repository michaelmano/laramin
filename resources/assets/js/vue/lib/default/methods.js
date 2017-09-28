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
	}
}