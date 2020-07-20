<?php 
/**
 * @package WordifyPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function dashboard(){
        return require_once("$this->plugin_path/templates/admin.php");
    }
}