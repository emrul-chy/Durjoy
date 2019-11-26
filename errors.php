<style>
		@font-face {
    		font-family: UbuntuMono-R;
    		src: url(assests/font/UbuntuMono-R.ttf);
		}
	</style>
<?php
if (count($errors) > 0):
?>
	<div style="margin-bottom: 10px">
		<div class="alert alert-danger" role="alert">
										<span class="fa fa-times-circle"></span><?php
    echo ' ' . $errors[0];
?>
</div>
</div>

<?php
endif;
?>
