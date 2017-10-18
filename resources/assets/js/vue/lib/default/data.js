import Form from '../../../vanilla/lib/form';

export default {
	loading: false,
	messages: [],
	activeModal: null,
	navigationOpen: true,
	deleteItem: false,
	form: new Form({
		message: ''
	}),
	deleteForm: new Form({
		_method: 'delete'
	})
}