<style>
		@font-face {
    		font-family: UbuntuMono-R;
    		src: url(assests/font/UbuntuMono-R.ttf);
		}
	</style>
<?php
if (count($success) > 0):
?>
	<div style="margin-bottom: 10px">
		<div class="alert alert-success" role="alert">
										<span class="fa fa-check"></span><?php
    echo ' ' . $success[0];
?>
</div>
</div>

<?php
endif;
?>
