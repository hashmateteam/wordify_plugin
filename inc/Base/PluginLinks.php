<?php
/**
 * @package  WordifyPlugin
 */
namespace Inc\Base;
use \Inc\Base\BaseController;

class PluginLinks extends BaseController
{
	public function register() {
        add_filter('plugin_action_links_'.$this->plugin_basename ,array( $this,'links'));
    }
    
    public function links ( $links ) {
        array_push( $links , '<a href="admin.php?page=wordify_plugin" >Settings</a>');
        return $links;
    }
}