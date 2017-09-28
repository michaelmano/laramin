import Q from 'qoob';

export default {
	activeModal: function (val) {
		if (null === this.activeModal) {
			Q.off(window, 'keyup', this.listenForEscape);
		} else {
			Q.on(window, 'keyup', this.listenForEscape);
		}
	}
}