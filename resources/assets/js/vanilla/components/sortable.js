import Q from 'qoob';
import Sortable from 'sortablejs';

const bootstrap = function bootstrap() {
	const sortableContainers = Q.find('.js-sortable');

	Q.each(sortableContainers, sortableContainer => {
		Sortable.create(sortableContainer, {
			animation: 250,
			handle: ".js-sortable-tile",
			draggable: ".js-sortable-item",
			onUpdate: function (event) {
				const sortableInput = Q.children(sortableContainer, '.js-sortable-input');
				if (sortableInput.length >= 1 && !Q.hasClass(sortableInput, 'js-sortable-example')) {
					let promises = [];
					window.laramin.loading = true;
					Q.each(sortableInput, (sortableInput, index) => {
						let promise = axios.post(sortableInput.form.action, {
							_method: 'PATCH',
							order: index+1
						});
						promises.push(promise);
					});
					Promise.all(promises).then(() => {
						window.laramin.loading = false;
					});
				}
			}
		});
	});
}

export default bootstrap;