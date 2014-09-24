<div class="wrap">
<div id="icon-themes" class="icon32"><br /></div>
<h2><?php echo sprintf(__('%s Theme Options', PADD_THEME_SLUG), PADD_THEME_NAME); ?></h2>

<div id="padd-admin-tabs">

	<ul>
		<li><a href="#padd-admin-tab-about"><?php echo __('About', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-general"><?php echo __('General', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-background"><?php echo __('Background', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-tracker"><?php echo __('Page Tracker', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-socialnetwork"><?php echo __('Social Networking', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-pagenav"><?php echo __('Page Navigation', PADD_THEME_SLUG); ?></a></li>
	</ul>

	<fieldset id="padd-admin-tab-about">
		<h3><?php echo __('About The Theme', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('%s is a freemium WordPress theme. This special WordPress theme is packed with a better framework, an admin options panel and an awesome design to boot. Download more <a href="http://www.paddsolutions.com">free WordPress Themes</a>.', PADD_THEME_SLUG), PADD_THEME_NAME); ?></p>
		<h3><?php echo __('Donate To Us', PADD_THEME_SLUG); ?></h3>
		<p><?php echo __('Donations are very welcome, any amount counts. Proceeds goes to the development of more freemium WordPress themes.', PADD_THEME_SLUG); ?></p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="MKRFZ5RSPMQNS">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<h3><?php echo __('Subscribe To Us', PADD_THEME_SLUG); ?></h3>
		<p><?php echo __('To get our latest updates, follow us at <a href="http://twitter.com/paddsolutions" target="_blank">Twitter</a>, be our <a href="http://www.facebook.com/paddsolutions" target="_blank">Facebook</a> fan or subscribe to our <a href="http://feeds.feedburner.com/paddsolutions" target="_blank">RSS</a> feed.', PADD_THEME_SLUG); ?></p>
		<h3><?php echo __('Get In Touch', PADD_THEME_SLUG); ?></h3>
		<p><?php echo __('We love to hear your thoughts. Feel free to <a href="http://www.paddsolutions.com/contact-us/" target="_blank">contact us</a> should you need customization support, project quotations, advertisement proposals or just anything under the sun.', PADD_THEME_SLUG); ?></p>
		<h3><?php echo __('Disclaimer', PADD_THEME_SLUG); ?></h3>
		<p><?php echo __('Our themes are provided "as is" without warranty of any kind, either expressed or implied. We are not responsible for any damage while using this theme, use it at your own risk.', PADD_THEME_SLUG); ?></p>
	</fieldset>

	<fieldset id="padd-admin-tab-general">
		<h3><?php echo __('General Options', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('General options for %s theme to work.', PADD_THEME_SLUG), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['general'] as $opt) {
					$opt->value = Padd_Theme_Option::get($opt->keyword);
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="general"><?php echo __('Save Settings', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-background">
		<h3><?php echo __('Background Options', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Background options for %s theme.', PADD_THEME_SLUG), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['background'] as $opt) {
					$opt->value = Padd_Theme_Option::get($opt->keyword);
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="background"><?php echo __('Save Settings', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-tracker">
		<h3><?php echo __('Page Tracker Options', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Page tracker options for %s theme.', PADD_THEME_SLUG), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['tracker'] as $opt) {
					$opt->value = Padd_Theme_Option::get($opt->keyword);
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="tracker"><?php echo __('Save Settings', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-socialnetwork">
		<h3><?php echo __('Social Networking Options', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Social networking options for %s theme.', PADD_THEME_SLUG), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['socialnetwork'] as $opt) {
					$opt->value = Padd_Theme_Option::get($opt->keyword);
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="socialnetwork"><?php echo __('Save Settings', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-pagenav">
		<h3><?php echo __('Page Navigation Options', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Page navigation options for %s theme.', PADD_THEME_SLUG), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['pagenav'] as $opt) {
					$opt->value = Padd_Theme_Option::get($opt->keyword);
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="pagenav"><?php echo __('Save Settings', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

</div>
</div>