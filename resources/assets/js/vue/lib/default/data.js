import Form from '../../../vanilla/lib/form';

export default {
	loading: false,
	messages: [],
	activeModal: null,
	navigationOpen: true,
	form: new Form({
		message: ''
	})
}