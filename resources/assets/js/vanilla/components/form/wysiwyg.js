import Q from 'qoob';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

const bootstrap = function bootstrap() {
	const editors = Q.find('.Form__wysiwyg');
	if (editors.length <= 0) return;
	Q.each(editors, editorContainer => {
		ClassicEditor.create(editorContainer).then(editor => {
			console.log(editor);
		}).catch(error => {
			console.error(error);
		});
	});
}

export default bootstrap;