<h2>Import Demo Data</h2>
<div class="autocar_install_instruction">
	<p>Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme. It will allow you to quickly edit everything instead of creating content from scratch. When you import the data following things will happen:</p>
	<ul class="autocar_install_list">
		<li>No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified .</li>
		<li>No WordPress settings will be modified .</li>
		<li>Posts, pages, some images, some widgets and menus will get imported .</li>
		<li>Images will be downloaded from our server, these images are copyrighted and are for demo use only .</li>
		<li>Please click import only once and wait, it can take a couple of minutes</li>
	</ul>
</div>
<div class="autocar_install_instruction">
	<p>Before you begin, make sure all the required plugins are activated.</p>
</div>
<div class="autocar_install_form">
	<?php
		if($return == true){
			echo '<p class="autocar_success_msg">Import Successfully. Please check preview.</p>';
		}elseif(!empty($return)){
			echo '<p class="autocar_error_msg">Please Reset wordpress again and then import Demo data.</p>';
		}
		if($chkimport == true){
			echo '<p class="autocar_after_msg">Data is already imported.</p>';
		}else{
	?>
	<form action="<?php echo admin_url('themes.php?page=import_demo_data'); ?>" method="post">
		<button class="button-primary button" name="autocarimportdemodata" value="import">Import Demo Data</button>
	</form>
		<?php } ?>
</div>