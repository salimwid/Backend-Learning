<html>
<head>
<title>Upload Form</title>
</head>
<body>

<form id="profile-update-form" action="<?=base_url();?>amit/update_profile" method="post" rel="updateprofile" enctype="multipart/form-data">
	<div class="small-12 medium-3 columns">
		<label>Profile Photo</label>
			<div id="profile-photo-container" class="photo-container">
				<div id="profile_photo" class="image_upload member_photo" style="background-size:cover;background-position:center center;"></div>	
				<input id="profile_image" type="hidden" name="image">
				<button id="chg_img" style="margin-top: 75px;" class="chg_img button" rel="profile">Change</button>
				<input id="upload" type="file" style="visibility: hidden;"/>
			</div>
	</div>
</form>
<script src="<?php echo base_url(); ?>application/assets/js/image_upload.js?v=22"></script>
<!-- <input type="submit" value="upload" action="/upload/resize_image" method="post"/> -->

</form>

</body>
</html>