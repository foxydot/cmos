<?php

$themename = "Orsted Theme";
$shortname = "orsted";

$settings = array(

	'featured1' => 'Featured',
	'youtube' => 'H5h95s0OuEg',

);

# Settings

function s_lang($text) {
	return $text;
};

$options = array (

	array(  "name" => s_lang("Featured Category Name"),
            "id" => $shortname."_featured1",
            "std" => $settings['featured1'],
            "type" => "text"),
    
    array(  "name" => s_lang("Featured Video (Youtube Video ID)"),
            "id" => $shortname."_youtube",
            "std" => $settings['youtube'],
            "type" => "text")

);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) if ($value['type']!='header') update_option( $value['id'], $_REQUEST[ $value['id'] ] );
			foreach ($options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
			header("Location: themes.php?page=settings.php&saved=true");
			die;
		} else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) delete_option( $value['id'] );
			header("Location: themes.php?page=settings.php&reset=true");
			die;
		}
    }
	add_theme_page($themename." Settings", "Theme Settings", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<style type="text/css">
th {
	text-align: left;
}
td {
	padding: 1px 5px !important;
}
.header td {
	padding: 20px 0 10px !important;
}
.header td p {
	padding: 4px 5px !important;
	font-size: 12px !important;
	font-weight: bold !important;
	background-color: #073447 !important;
	color: #ffffff;
	margin: 0 !important;
}
.submit {
	padding-top: 40px;
}
</style>
<div class="wrap">
<h2><?php echo $themename; ?> Settings</h2>

<form method="post">

<table class="form-table">

<?php foreach ($options as $value) { 
    
if ($value['type'] == "text") { ?>
        
	<tr> 
	<th scope="row" style="width: 30%"><?php echo $value['name']; ?>:</th>
	<td>
	<input style="width: 50%" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
	&nbsp; <?php echo $value['note']; ?>
	</td>
	</tr>

<?php } elseif ($value['type'] == "textarea") { ?>
        
	<tr> 
	<th scope="row" style="width: 30%"><?php echo $value['name']; ?>:</th>
	<td>
	<textarea style="width: 80%; height: 70px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php if ( get_settings( $value['id'] ) != "") { echo htmlentities(stripslashes(get_settings( $value['id'] ))); } else { echo stripslashes($value['std']); } ?></textarea>
	&nbsp; <?php echo $value['note']; ?>
	</td>
	</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr> 
	<th scope="row"><?php echo $value['name']; ?>:</th>
	<td>
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	<?php foreach ($value['options'] as $option) { ?>
	<option value="<?php echo $option; ?>" <?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	<?php } ?>
	</select>
	&nbsp; &nbsp; <?php echo $value['note']; ?>
	</td>
    </tr>

<?php 
} elseif ($value['type'] == "header") {?>

	<tr class="header"><td colspan="2"><p><?php  echo $value['name'] ?></p></td></tr>
	
<?php 
} 
}
?>

</table>

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit" style="border: 0;">
<!-- <input name="reset" type="submit" value="Reset" /> -->
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin');

foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }


# Set Values
foreach ($settings as $k=>$v) {
	$var = $shortname.'_'.$k;
	if (!empty($$var)) $settings[$k] = stripslashes($$var);
}

?>
