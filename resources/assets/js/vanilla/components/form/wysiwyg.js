import Q from 'qoob';

const bootstrap = function bootstrap() {
	const editors = Q.find('.Form__wysiwyg');
	if (editors.length <= 0) return;
	Q.each(editors, editorContainer => {
		editorContainer.height = 500;
		ClassicEditor.create(editorContainer, {
			height: '600px'
		});
	});
}

export default bootstrap;