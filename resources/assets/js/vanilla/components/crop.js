import Q from 'qoob';
import Cropper from 'cropperjs';

const bootstrap = function bootstrap() {
	const croppers = Q.find('.js-crop');
	if (croppers.length <= 0) return;

	Q.each(croppers, crops => {
		const attributes = Q.head(Q.data(crops, 'cropper'));
		if (attributes) {
			const image = Q.head(Q.children(crops, 'img'));
			const upload = Q.head(Q.children(crops, '.js-crop-upload'));
			const input = Q.head(Q.children(crops, '.js-crop-dimentions'));
			const MIN_WIDTH = JSON.parse(attributes).min_width;
			const MIN_HEIGHT = JSON.parse(attributes).min_height;

			let cropper = '',
				enabled = false;

			Q.on(upload, 'change', function(event) {
				event.preventDefault();
				render(this);
			});

			const updateInput = function updateInput() {
				input.value = JSON.stringify(cropper.getData());
			}
			
			const enableCropper = function enableCropper(src) {
				enabled = true;
				image.src = src;
				
				cropper = new Cropper(image, {
					aspectRatio: 12 / 5,
					width: image.width, // resize the cropped area
					height: image.height,
					checkCrossOrigin: false,
					viewMode: 0,
					zoomable: false,
					movable: false,
					rotatable: false,
					scalable: false,
					ready: function() {
						var cropper = this.cropper;
						var containerData = cropper.getContainerData();
						var cropBoxData = cropper.getCropBoxData();
						var aspectRatio = cropBoxData.width / cropBoxData.height;
						var newCropBoxWidth;
						var data = cropper.getData();
						data.width = MIN_WIDTH;
						data.height = MIN_HEIGHT;
						cropper.setData(data);
						updateInput();
					},
					cropmove: function(e) {
						var cropper = this.cropper;
						var data = cropper.getData();
						if (data.width < MIN_WIDTH || data.height < MIN_HEIGHT) {
							data.width = MIN_WIDTH;
							data.height = MIN_HEIGHT;
							cropper.setData(data);
						} else {
							updateInput();
						}
					}
				});
			}

			const render = function render(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(event) {
						var file_input = event.target;
						var image = new Image();
						image.src = event.target.result;
						image.onload = function() {
							if (image.width < MIN_WIDTH || image.height < MIN_HEIGHT) {
								const message = 'Error, File needs to be above ' + MIN_WIDTH + 'x' + MIN_HEIGHT;
								file_input.value = '';

								upload.nextElementSibling.querySelector('span').innerHTML = message;
								laramin.messages.push({type: 'error', message});
							} else {
								if (!enabled) {
									enableCropper(image.src)
								}
								cropper.replace(image.src);
							}
						}
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
		}
	});
}

export default bootstrap;