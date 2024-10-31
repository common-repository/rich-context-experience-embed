<?php
require_once('RC_Utils.php');
/**
 *
 */
class RC_Shortcode
{
    public function __construct()
    {
        add_shortcode(RC_Utils::$shortcodeName, function ($atts) {
            $attrs_with_defaults = shortcode_atts(array(
              'configuration_id' => ''
            ), $atts);
            return RC_Utils::display_embed($attrs_with_defaults['configuration_id']);
        });
    }
}
