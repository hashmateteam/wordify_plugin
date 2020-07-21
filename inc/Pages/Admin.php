<?php 
/**
 * @package  WordifyPlugin
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
/**
* 
*/
class Admin extends BaseController
{
	public $settings;
	public $callbacks;
	public $pages = array();
	
	public function register() {
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();

		$this->pages = array(
            [
                'page_title' => 'Wordify Plugin',
                'menu_title' => 'Wordify',
                'capability' => 'manage_options',
                'menu_slug' => 'wordify_plugin',
                'callback' => array($this->callbacks , $this->callbacks->method('dashboard')),
                'icon_url' => 'dashicons-store',
				'position' => 1,
				'children' => [
					[
						'page_title' => 'Dashboard',
						'menu_title' => 'Dashboard',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_dashboard',
						'callback' => array($this->callbacks , $this->callbacks->method('dashboard')),
					],
					[
						'page_title' => 'Custom Post Types Manager',
						'menu_title' => 'CPT Manager',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_cpt',
						'callback' => array($this->callbacks , $this->callbacks->method('')),
					],
					[
						'page_title' => 'Taxonomies',
						'menu_title' => 'Taxonomies',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_taxonomies',
						'callback' => array($this->callbacks , $this->callbacks->method('')),
					],
					[
						'page_title' => 'Widgets',
						'menu_title' => 'Widgets',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_widgets',
						'callback' => array($this->callbacks , $this->callbacks->method('')),
					],
				]
			]
		);

		$this->settings->settings = array(
			array(
				'option_group' => 'wordify_options_group',	// will be same on one page
				'option_name' => 'text_example',	// will be used by fields as 'id'
				'callback' => array( $this->callbacks, 'wordifyOptionsGroup' )	// after validation return the same input
			),
			array(
				'option_group' => 'wordify_options_group',	// will be same on one page
				'option_name' => 'first_name'
			)
		);

		$this->settings->sections = array(
			array(
				'id' => 'wordify_admin_index',	//will be used by fields as 'section'
				'title' => 'Settings',	//title of the section
				'callback' => array( $this->callbacks, 'wordifyAdminSection' ),
				'page' => 'wordify_dashboard' // will be used by fields as 'page'
			)
		);

		$this->settings->fields = array(
			array(
				'id' => 'text_example', //come from settings as option name 
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'wordifyTextExample' ),
				'page' => 'wordify_dashboard', //come from sections as page
				'section' => 'wordify_admin_index', //come from sections as id
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'wordifyFirstName' ),
				'page' => 'wordify_dashboard',
				'section' => 'wordify_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->add_pages($this->pages)->register();
	}
}