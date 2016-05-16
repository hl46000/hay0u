<?php
$themename = "Hay0U AppStore";    
$shortname = "hay0u";    
$options = array (
    array("name" => "SEO settings","type" => "heading","desc" => ""),
	array("name" => "Home description(Description)","id" => $shortname."_description","std" => "","type" => "text"),
	array("name" => "Home Keywords(Keywords)","id" => $shortname."_keywords","std" => "","type" => "text"),
	array("name" => "Home Picture Settings","type" => "heading","desc" => ""),
	array("name" => "Photos address-1","id" => $shortname."_homeimg1","std" => "","type" => "text"),
	array("name" => "Link address-1","id" => $shortname."_homelnk1","std" => "","type" => "text"),
	array("name" => "Photos address-2","id" => $shortname."_homeimg2","std" => "","type" => "text"),
	array("name" => "Link address-2","id" => $shortname."_homelnk2","std" => "","type" => "text"),
	array("name" => "Photos address-3","id" => $shortname."_homeimg3","std" => "","type" => "text"),
	array("name" => "Link address-3","id" => $shortname."_homelnk3","std" => "","type" => "text"),
	array("name" => "Photos address-4","id" => $shortname."_homeimg4","std" => "","type" => "text"),
	array("name" => "Link address-4","id" => $shortname."_homelnk4","std" => "","type" => "text"),
	array("name" => "Photos address-5","id" => $shortname."_homeimg5","std" => "","type" => "text"),
	array("name" => "Link address-5","id" => $shortname."_homelnk5","std" => "","type" => "text"),
	array("name" => "More thematic link settings","type" => "heading","desc" => ""),
	array("name" => "Link address","id" => $shortname."_h0umore","std" => "","type" => "text"),
	array("name" => "Default cover settings","type" => "heading","desc" => "Do not set any picture when this will be the default display cover"),
	array("name" => "Cover Image Address","id" => $shortname."_popimg","std" => "","type" => "text"),
);
function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
            foreach ($options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
            header("Location: themes.php?page=control.php&saved=true");    
            die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] );
                update_option( $value['id'], $value['std'] );
            }
            header("Location: themes.php?page=control.php&reset=true");    
            die;
        }
    }
    add_theme_page($themename." Options", "$themename Settings", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' Settings are saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' Settings have been reset.</strong></p></div>';
?>
    <style type="text/css">
    th{text-align:left;}
    input{width:100%;}
    .submit{width:100px;padding:0;}
    .defaultbutton{padding-left:745px;}
    </style>
    <div class="wrap">
        <h2><b><?php echo $themename; ?> Settings</b></h2>
        <form method="post">
            <div class="submit" style="padding:0;">
                <input style="font-size:12px !important;" name="save" type="submit" value="Save Settings" />   
                <input type="hidden" name="action" value="save" />
            </div>
            <table class="optiontable" >
                <?php foreach ($options as $value) {
                    if ($value['type'] == "text") { ?>
                        <tr align="left">
                            <th scope="row"><?php echo $value['name']; ?>:</th>
                            <td>
                                <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" size="40" />
                            </td>
                        </tr>
                    <?php } elseif ($value['type'] == "heading") { ?>
                        <tr valign="top">
                            <td colspan="2" style="text-align: left;"><hr />
                            <h2><?php echo $value['name']; ?></h2></td>
                            <tr><td colspan=2> <p style="color:red; margin:0 0;" > <?php echo $value['desc']; ?> </P> <hr /></td></tr>
                        </tr>
					<?php } elseif ($value['type'] == "heading2") { ?>
                        <tr valign="top">
                            <td colspan="2" style="text-align: left;"><hr />
                            <h2><?php echo $value['name']; ?></h2></td>
                            <tr><td colspan=2> <p style="color:red; margin:0 0;" > <?php echo $value['desc']; ?><select><?php $result = mysql_query("select * from wp_term_taxonomy where taxonomy = 'category' ORDER BY count DESC"); 
while ($row=mysql_fetch_array($result)) { ?>
					<option>
						<?php echo get_cat_name($row['term_id']) ?> (ID:<?php echo $row['term_id']; ?>)
					</option>
					<?php } ?></select></P> <hr /></td></tr>
                        </tr>
					<?php } ?>
                    <?php
                }
                ?>
            </table>
            <hr />
            <div class="submit">
                <input style="font-size:12px !important;" name="save" type="submit" value="Save Settings" />   
                <input type="hidden" name="action" value="save" />
            </div>
        </form>
        <form method="post" class="defaultbutton">
            <div class="submit">
                <input style="font-size:12px !important;" name="reset" type="submit" value="Restore Defaults" />
                <input type="hidden" name="action" value="reset" />
            </div>
        </form>
    </div>
    <?php
}
add_action('admin_menu', 'mytheme_add_admin');
?>