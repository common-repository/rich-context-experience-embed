<?php

class RC_Utils
{
    public static $shortcodeName = "rc-embed";
    protected static $HTML = <<<HTML
  <div class="rc_embed" data-config="%CONFIG_ID%"></div>
HTML;

    public static function display_embed($configuration_id)
    {
      wp_enqueue_script( self::$shortcodeName );
      return str_replace("%CONFIG_ID%", preg_replace('/[[:cntrl:]]/', '', $configuration_id), self::$HTML);
    }
}
