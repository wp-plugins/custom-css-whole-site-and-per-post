<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$wholeSiteStyling = get_option( 'h5abCustomStyling' );
$wholeSiteExternal = get_option( 'h5abCustomExternal' );
$allowedHTML = wp_kses_allowed_html( 'post' );
?>

<div>

    <h1>Settings</h1>
    
    <p>Visit <a href="https://www.html5andbeyond.com/">HTML5andBeyond</a> for instruction and a couple of useful CSS snippets to use</p>

	<form method="post" enctype="multipart/form-data">

		<div id="table">
		    <table width="100%" cellpadding="10">
                <tbody>

                    <tr>
                    <td scope="row" align="left">
                        <p>Add Additional External Stylesheets (<strong>Include link tags</strong>): </p>
<textarea name="h5ab-whole-site-custom-external" class="h5ab-custom-styling" style="max-width: 550px; width: 90%; min-height: 100px;">
<?php echo wp_kses(stripslashes($wholeSiteExternal), H5AB_Custom_Styling::$h5ab_custom_styling_kses) ?>
</textarea>
                    </td>
                    </tr>

                    <tr>
                    <td scope="row" align="left">
                    <p>Enter Custom Whole Site CSS Styling Below (without <strong>Style</strong> tags): </p>
<textarea name="h5ab-whole-site-custom-styling" class="h5ab-custom-styling" style="max-width: 550px; width: 90%; min-height: 300px;">
<?php echo wp_kses(stripslashes($wholeSiteStyling), $allowedHTML); ?>
</textarea>
                    </td>
                    </tr>

                </tbody>
            </table>


		</div>

		<?php
			wp_nonce_field( 'h5ab_custom_styling_site_n', 'h5ab_custom_styling_site_nonce' );
			if ( ! is_admin() ) {
			echo 'Only Admin Users Can Update These Options';
			} else {
			echo '<input type="submit"  class="button button-primary show_field" id="h5ab_custom_styling_site_submit" name="h5ab_custom_styling_site_submit" value="Save Custom Styling" />';
			}

		?>

	</form>

</div>


<div class="h5ab-affiliate-advert">
                    <p style="margin: 0; text-align: center;">Advertisement</p>
                    <a href="http://themeover.com/microthemer?ap_id=html5andbeyond" target="_blank"><img src="<?php echo esc_url(plugins_url( '../images/MT_300x250.png', __FILE__ )) ?>" border="0" style="max-width: 100%; height: auto;" /></a>
                    <p style="margin: 0;">*Affiliate Link</p>

</div>

<hr/>

<div style="width: 98%; padding: 0 5px;">
<p>*Affiliate Link - We (Plugin Authors) earn commission on sales generated through this link.</p>
</div>
