<template>
	<section>
		<div class="util-breakaway-bottom-2">
			<img ref="image" :src="image">
			<laramin-simple-loader :loading="!loaded"></laramin-simple-loader>
		</div>
		<input type="hidden" :name="name + '_dimentions'" :value="dimentions">
		<input :name="name" ref="file" type="file" accept="image/*" class="Form__input Form__input--file" data-multiple-caption="{count} files selected"/>
		<label @click="$refs['file'].click()" :for="name"><i class="fa fa-upload"></i> <span v-text="labelText"></span></label>
	</section>
</template>

<script>
	import Cropper from 'cropperjs';

	export default {
		props: {
			name: {
				type: String,
				required: true
			},
			label: {
				type: String,
				default: 'Choose an image'
			},
			minWidth: {
				type: Number,
			},
			minHeight: {
				type: Number,
			},
			image: {
				type: String,
				required: true
			}
		},
		data() {
			return {
				enabled: false,
				labelText: this.label,
				cropper: '',
				dimentions: '',
				fileInput: '',
				loaded: false,
			}
		},
		mounted() {
			this.$refs['file'].addEventListener('change', function (event) {
				event.preventDefault();
				this.render(event.target);
			}.bind(this));

			this.$refs['image'].onload = function () {
				this.loaded = true;
			}.bind(this);
		},
		methods: {
			updateDimentions() {
				this.dimentions = JSON.stringify(this.cropper.getData());
			},
			enableCropper(src) {
				this.enabled = true;
				const image = this.$refs['image']
				image.src = src;
				
				this.cropper = new Cropper(image, {
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
						data.width = this.minWidth;
						data.height = this.minHeight;
						cropper.setData(data);
						this.updateDimentions();
					}.bind(this),
					cropmove: function(e) {
						var cropper = this.cropper;
						var data = cropper.getData();
						if (data.width < this.minWidth || data.height < this.minHeight) {
							data.width = this.minWidth;
							data.height = this.minHeight;
							cropper.setData(data);
						} else {
							this.updateDimentions();
						}
					}.bind(this)
				});
			},
			render(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(event) {
						var file_input = event.target;
						var image = new Image();
						image.src = event.target.result;
						image.onload = function() {
							if (image.width < this.minWidth || image.height < this.minHeight) {
								const message = 'Error, File needs to be above ' + this.minWidth + 'x' + this.minHeight;
								file_input.value = '';
								this.labelText = message;
								this.cropper.destroy();
								this.loaded = false;
								this.$refs.image.src = this.image;
								this.enabled = false;
								laramin.messages.push({type: 'error', message});
							} else {
								if (!this.enabled) {
									this.enableCropper(image.src)
								}
								this.cropper.replace(image.src);
							}
						}.bind(this)
					}.bind(this)
					reader.readAsDataURL(input.files[0]);
				}
			}
		}
	}
</script>