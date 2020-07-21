<?php 
/**
 * @package WordifyPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function method($name){
        if(! method_exists($this,$name) ){
            return 'not_exists';
        }
        return $name;
    }

    public function not_exists(){
        //return require_once("$this->plugin_path/templates/not_exist.php");
        echo("<h1><strong>_ PAGE _ DOES _ NOT _ EXISTS _</strong></h1>");
    }

    public function dashboard(){
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function wordifyOptionsGroup( $input )
	{
		return $input;
	}

	public function wordifyAdminSection()
	{
		echo 'Check this beautiful section!';
	}

	public function wordifyTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
	}

	public function wordifyFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}