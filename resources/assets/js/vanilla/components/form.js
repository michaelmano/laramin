import Q from 'qoob';

const bootstrap = function bootstrap() {
	const inputs = Q.find('.Form__input');
	if (inputs.legnth < 1) return;

	Q.each(inputs, input => {
		const span = Q.make('span');
		Q.addClass(span, 'Form__input-span');
		Q.append(Q.parent(input), span);
	});
}

export default bootstrap;