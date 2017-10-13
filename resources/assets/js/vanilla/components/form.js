import Q from 'qoob';

const bootstrap = function bootstrap() {
	const inputs = Q.find('.Form__input');
	if (inputs.legnth < 1) return;

	Q.each(inputs, input => {
		if (Q.hasClass(input, 'Form__input--file')) return fileInput(input);
		if (Q.hasClass(input, 'Form__input--text')
		|| Q.hasClass(input, 'Form__input--textarea')
		|| Q.hasClass(input, 'Form__input--tel')
		|| Q.hasClass(input, 'Form__input--number')
		|| Q.hasClass(input, 'Form__input--search')
		|| Q.hasClass(input, 'Form__input--url')
		|| Q.hasClass(input, 'Form__input--email')
		|| Q.hasClass(input, 'Form__input--password')) return textInput(input);
	});
}

const fileInput = function fileInput(input) {
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});

	// Firefox bug fix
	input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
	input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
}

const textInput = function textInput(input) {
	const span = Q.make('span');
	Q.addClass(span, 'Form__input-span');
	Q.append(Q.parent(input), span);
}

export default bootstrap;