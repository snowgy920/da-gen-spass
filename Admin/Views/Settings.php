<?php
?>
<div class="wrap da-content-wrapper">
	<h2>Secure Password Settings</h2>
	<div class="tabs-wrapper">
		<h2 class="nav-tab-wrapper">
			<a class='nav-tab nav-tab-active' href='#general'>General Options</a>
			<!-- <a class='nav-tab' href='#engines'>Engine Option</a> -->
		</h2>
		<div class="tabs-content-wrapper da-settings">
			<div id="general" class="tab-content tab-content-active">
				<form method="post" action="options.php">
					<?php settings_fields( 'da-gen-pass-settings' ); ?>
					<?php do_settings_sections( 'da-gen-pass-settings' ); ?>

					<?php require(DA_GSP_PLUGIN_DIR.'/Admin/Views/General.php'); ?>
					<div>
						<?php submit_button(); ?>
					</div>
				</form>
			</div>
			<!-- <div id="engines" class="tab-content">
				<form method="post" action="">
				<?php //require(DA_GSP_PLUGIN_DIR.'/Admin/Views/Engines.php'); ?>
					<div>
						<input type="hidden" name="da__cmd" value="saveEngineOption" />
						<input type="submit" value="Save" class="button button-primary">
					</div>
				</form>
			</div> -->
		</div>
	</div>
</div>
