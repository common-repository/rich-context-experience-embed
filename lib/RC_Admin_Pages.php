<?php

class RC_Admin_Pages
{

  function __construct($basename)
  {
    add_action('admin_enqueue_scripts', array($this,'enqueues'));

    add_action('admin_menu', function() {
      add_options_page(__('Rich Context','rc-embed'), __('Rich Context','rc-embed'), 'manage_options', 'richcontext-embed', array($this,'settings_page'));
    });

    add_action( 'plugin_action_links_' . $basename, function( $links ) {
    	$links = array_merge( array(
    		'<a href="' . esc_url( admin_url( '/options-general.php?page=richcontext-embed' ) ) . '">' . __( 'Settings/Help', 'textdomain' ) . '</a>'
    	), $links );
    	return $links;
    });

  }

  function settings_page() {
    echo <<<HTML
    <div class="rc_header">
      <div class='logo'>&nbsp;</div>
      <h3>Thank you for using the Rich Context Embed Plugin.</h3>
      <p>Don't worry it's simple to use!</p>
    </div>
    <div class="rc_embed_info">
      <ol>
        <li>
          <h4>Get a configuration ID</h4>
          <p>This will come from the company that is having you embed this, please have the Configuration ID before continuing</p>
        </li>
        <li>
          <h4>Embed</h4>
          <p>There are 2 ways to embed:</p>
          <ul>
            <li>
              <h4>Widget</h4>
              <ol>
                <li>In the Wordpress Admin, go to Appearance>>Widgets.</li>
                <li>Drag the Rich Context Embed widget to the appropriate menu placement.</li>
                <li>Enter the Configuration ID you were given.</li>
                <li>Save your changes.</li>
              </ol>
            </li>
            <li>
              <h4>Short Code</h4>
              <ol>
                <li>In the Wordpress Admin, go to the appropriate Post or Page that you want it to display.</li>
                <li>
                  In the page editor paste the code below where you want it, making sure you use the appropriate Configuration ID.
                  <p> <code>[rc-embed configuration_id="<--ID YOU WERE GIVEN-->"]</code></p>
                </li>
                <li>Save your changes.</li>
              </ol>
            </li>
          </ul>
          <p><i><small>*** Please note that the embed will use the full width of where you put it and will automatically adjust it's height to handle it's content.</small></i></p>
        </li>
      </ol>
      <br />
      <h3>Troubleshooting</h3>
      <ul class='no_list_style'>
        <li>Please make sure you have the correct Configuation ID</li>
        <li>Check to make sure your theme can handle shortcodes</li>
      </ul>
      <br />
      <h3>Still Having Issues?</h3>
      <ul class='no_list_style'>
        <li>With your campaign? -- Please contact the company you are working with</li>
        <li>With the plugin? <p><a class='contact_button' href="mailto:help@richcontext.com">Contact Us</a></p></li>
      </ul>
    </div>
HTML;
  }

  function enqueues($hook) {
    if ( 'settings_page_richcontext-embed' != $hook ) {
        return;
    }
    wp_enqueue_style('ubuntu_font', 'https://fonts.googleapis.com/css?family=Ubuntu');
    wp_enqueue_style('settings_page_richcontext-embed', plugins_url('styles/admin.css',dirname(__FILE__) ));
  }
}


?>
