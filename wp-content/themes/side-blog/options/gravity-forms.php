<?php
	$option_fields[] = $gravity_forms = THEME_PREFIX . "gravity_forms";
?>

<div class="postbox">
    <h3>Enable "Gravity Forms" Styles</h3>
    
    <div class="inside">
    	<p>Gravity Forms is probably the most comprehesive Form Management plugin you can get for WordPress. Each Press75.com theme includes matching Gravity Forms styles which can be enabled below. If don't own Gravity and need to integrate some forms with this theme, use the link below to get purchase a copy.</p>
    	        
        <p class="purchase">
			<a class="button" href="http://www.press75.com/affiliates/buy-gravity.php" target="_blank" title="Purchase Support">Purchase Gravity Forms</a>
		</p>
		
		<p>If you already own Gravity Forms and want to enable form styles, just check the box below.</p>
		
		<p>
			<label for="<?php echo $gravity_forms; ?>">
		        <input class="checkbox" id="<?php echo $gravity_forms; ?>" type="checkbox" name="<?php echo $gravity_forms; ?>" value="true"<?php checked(TRUE, (bool) get_option($gravity_forms)); ?> /> <?php _e("Enable Gravity Forms Styles"); ?>
		    </label>
		</p>
		
		<p class="submit">
			<input type="submit" class="button" value="Save Changes" />
		</p>
    </div> <!-- inside -->
</div> <!-- postbox -->