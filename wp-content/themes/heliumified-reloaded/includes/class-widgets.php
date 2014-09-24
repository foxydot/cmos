<?php

class Padd_Theme_Widget_Feedburner extends WP_Widget {

	function Padd_Theme_Widget_Feedburner() {
		$widget_ops = array(
						'classname' => 'widget_feedburner',
						'description' => PADD_THEME_NAME . ' Theme widget for Feedburner Subscription form. To set the username, go to the Social Networking Tab under ' . PADD_THEME_NAME . ' Options.'
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_feedburner_form', PADD_THEME_NAME . ' Feedburner Subscription Form', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_feedburner_form';
	}

	function widget($args,$instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Subscribe', PADD_THEME_SLUG) . $after_title . "\n";
		}

		padd_theme_widget_feedburner();
		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = esc_attr( $instance['title'] );
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option( $this->option_name, $settings );
	}
}

class Padd_Theme_Widget_SocialNetwork extends WP_Widget {

	function Padd_Theme_Widget_SocialNetwork() {
		$widget_ops = array(
						'classname' => 'widget_socialnet',
						'description' => PADD_THEME_NAME . ' Theme widget for social networking profile page. To set the username, go to the Social Networking Tab under ' . PADD_THEME_NAME . ' Options.'
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_socialnet', PADD_THEME_NAME . ' Social Network Badges', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_socialnet';
	}

	function widget($args,$instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Social Network', PADD_THEME_SLUG) . $after_title . "\n";
		}

		padd_theme_widget_socialnet();
		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = esc_attr( $instance['title'] );
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option( $this->option_name, $settings );
	}
}

class Padd_Theme_Widget_FBLikeBox extends WP_Widget {

	function Padd_Theme_Widget_FBLikeBox() {
		$widget_ops = array(
						'classname' => 'widget_fb_likebox',
						'description' => PADD_THEME_NAME . ' Theme widget for social networking profile page. To set the username, go to the Social Networking Tab under ' . PADD_THEME_NAME . ' Options.'
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_fb_like_box', PADD_THEME_NAME . ' Facebook Like Box', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_fb_like_box';
	}

	function widget($args,$instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Facebook Like Box', PADD_THEME_SLUG) . $after_title . "\n";
		}
		padd_theme_widget_facebook_likebox();
		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = esc_attr( $instance['title'] );
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option( $this->option_name, $settings );
	}
}

class Padd_Theme_Widget_Ads extends WP_Widget {

	function Padd_Theme_Widget_Ads() {
		$widget_ops = array(
						'classname' => 'widget_ads',
						'description' => PADD_THEME_NAME . ' Theme widget for advertisment. To manage ads, go to the Custom Ads Tab under ' . PADD_THEME_NAME . ' Options.'
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_ads', PADD_THEME_NAME . ' Custom Ads', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_ads';
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Sponsors', PADD_THEME_SLUG) . $after_title . "\n";
		}

		padd_theme_widget_sponsors();
		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = esc_attr( $instance['title'] );
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option($this->option_name, $settings);
	}
}

register_widget('Padd_Theme_Widget_Feedburner');
register_widget('Padd_Theme_Widget_SocialNetwork');
register_widget('Padd_Theme_Widget_FBLikeBox');
register_widget('Padd_Theme_Widget_Ads');