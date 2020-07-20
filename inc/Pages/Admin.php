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
                'callback' => array($this->callbacks , 'dashboard'),
                'icon_url' => 'dashicons-store',
				'position' => 1,
				'children' => [
					[
						'page_title' => 'Dashboard',
						'menu_title' => 'Dashboard',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_dashboard',
						'callback' => function () {echo '<h1>Dashboard</h1>';},
					],
					[
						'page_title' => 'Custom Post Types Manager',
						'menu_title' => 'CPT Manager',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_cpt',
						'callback' => function () {echo '<h1>CPT Manager</h1>';},
					],
					[
						'page_title' => 'Taxonomies',
						'menu_title' => 'Taxonomies',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_taxonomies',
						'callback' => function () {echo '<h1>Taxonomies</h1>';},
					],
					[
						'page_title' => 'Widgets',
						'menu_title' => 'Widgets',
						'capability' => 'manage_options',
						'menu_slug' => 'wordify_widgets',
						'callback' => function () {echo '<h1>Widgets</h1>';},
					],
				]
			]
		);

		$this->settings->add_pages($this->pages)->register();
	}
}