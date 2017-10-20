import Q from 'qoob';
import Sortable from 'sortablejs';

const bootstrap = function bootstrap() {
	const sortableContainers = Q.find('.js-sortable');

	Q.each(sortableContainers, sortableContainer => {
		Sortable.create(sortableContainer, {
			animation: 250,
			handle: ".js-sortable-tile",
			draggable: ".js-sortable-item",
			onUpdate: function (event){
			   var item = event.item;
			}
		  });
	});
}

export default bootstrap;