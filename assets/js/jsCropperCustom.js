// ProfilePicture JS Cropper Implementation
		$(document).ready(function(){
			var $modalProfilePicture = $('#ProfilePicturemodal');
			var image_ProfilePicture = document.getElementById('sample_image_ProfilePicture');
			var cropper_ProfilePicture;
			$('#upload_image_ProfilePicture').change(function(event){
				var files_ProfilePicture = event.target.files;
				var doneProfilePicture = function(url){
					image_ProfilePicture.src = url;
					$modalProfilePicture.modal('show');
				};

				if(files_ProfilePicture && files_ProfilePicture.length > 0)
				{
					reader_ProfilePicture = new FileReader();
					reader_ProfilePicture.onload = function(event)
					{
						doneProfilePicture(reader_ProfilePicture.result);
					};
					reader_ProfilePicture.readAsDataURL(files_ProfilePicture[0]);
				}
			});

			$modalProfilePicture.on('shown.bs.modal', function() {
				cropper_ProfilePicture = new Cropper(image_ProfilePicture, {
					aspectRatio: 1,
					viewMode: 1,
					preview:'.preview_ProfilePicture'
				});
			}).on('hidden.bs.modal', function(){
				cropper_ProfilePicture.destroy();
				cropper_ProfilePicture = null;
			});

			$('#crop_ProfilePicture').click(function(){
				canvas_ProfilePicture = cropper_ProfilePicture.getCroppedCanvas({
					width:1000,
					height:1000
				});

				canvas_ProfilePicture.toBlob(function(blob){
					url = URL.createObjectURL(blob);
					var reader_ProfilePicture = new FileReader();
					reader_ProfilePicture.readAsDataURL(blob);
					reader_ProfilePicture.onloadend = function(){
						var base64dataProfilePicture = reader_ProfilePicture.result;
						$.ajax({
							url:'includes/uploadImgCustom.php',
							method:'POST',
							data:{imageProfilePicture:base64dataProfilePicture},
							success:function(data)
							{
								$modalProfilePicture.modal('hide');
								$('#uploaded_image_ProfilePicture').attr('src', data);
							}
						});
					};
				});
			});

		});
	


		$(document).ready(function(){
			var $modal = $('#modal');
			var image = document.getElementById('sample_image');
			var cropper;
			$('#upload_image').change(function(event){
				var files = event.target.files;
				var done = function(url){
					image.src = url;
					$modal.modal('show');
				};

				if(files && files.length > 0)
				{
					reader = new FileReader();
					reader.onload = function(event)
					{
						done(reader.result);
					};
					reader.readAsDataURL(files[0]);
				}
			});

			$modal.on('shown.bs.modal', function() {
				cropper = new Cropper(image, {
					aspectRatio: 11 / 5.15,
					viewMode: 3,
					preview:'.preview'
				});
			}).on('hidden.bs.modal', function(){
				cropper.destroy();
				cropper = null;
			});

			$('#crop').click(function(){
				canvas = cropper.getCroppedCanvas({
					width:1100,
					height:515
				});

				canvas.toBlob(function(blob){
					url = URL.createObjectURL(blob);
					var reader = new FileReader();
					reader.readAsDataURL(blob);
					reader.onloadend = function(){
						var base64data = reader.result;
						$.ajax({
							url:'includes/uploadImgCustom.php',
							method:'POST',
							data:{image:base64data},
							success:function(data)
							{
								$modal.modal('hide');
								$('#uploaded_image').attr('src', data);
							}
						});
					};
				});
			});

		});




		$(document).ready(function(){
			var $modalProfileLogo = $('#ProfileLogomodal');
			var image_ProfileLogo = document.getElementById('sample_image_ProfileLogo');
			var cropper_ProfileLogo;
			$('#upload_image_ProfileLogo').change(function(event){
				var files_ProfileLogo = event.target.files;
				var done = function(url){
					image_ProfileLogo.src = url;
					$modalProfileLogo.modal('show');
				};

				if(files_ProfileLogo && files_ProfileLogo.length > 0)
				{
					reader_ProfileLogo = new FileReader();
					reader_ProfileLogo.onload = function(event)
					{
						done(reader_ProfileLogo.result);
					};
					reader_ProfileLogo.readAsDataURL(files_ProfileLogo[0]);
				}
			});

			$modalProfileLogo.on('shown.bs.modal', function() {
				cropper_ProfileLogo = new Cropper(image_ProfileLogo, {
					aspectRatio: 3 / 1,
					viewMode: 3,
					preview:'.preview_ProfileLogo'
				});
			}).on('hidden.bs.modal', function(){
				cropper_ProfileLogo.destroy();
				cropper_ProfileLogo = null;
			});

			$('#crop_ProfileLogo').click(function(){
				canvas_ProfileLogo = cropper_ProfileLogo.getCroppedCanvas({
					width:300,
					height:100
				});

				canvas_ProfileLogo.toBlob(function(blob){
					url = URL.createObjectURL(blob);
					var reader_ProfileLogo = new FileReader();
					reader_ProfileLogo.readAsDataURL(blob);
					reader_ProfileLogo.onloadend = function(){
						var base64data = reader_ProfileLogo.result;
						$.ajax({
							url:'includes/uploadImgCustom.php',
							method:'POST',
							data:{imageProfileLogo:base64data},
							success:function(data)
							{
								$modalProfileLogo.modal('hide');
								$('#uploaded_image_ProfileLogo').attr('src', data);
							}
						});
					};
				});
			});

		});
