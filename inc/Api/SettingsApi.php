<?php
/**
 * @package WordifyPlugin
 */
namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = array();
    public $settings = array();
    public $sections = array();
    public $fields = array();

    public function register(){
        if (! empty($this->admin_pages) ){
            add_action( 'admin_menu',array($this, 'add_admin_menu') );
        }
        if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'register_custom_fields' ) );
		}
    }
    public function add_pages( array $pages ) {
        $this->admin_pages = $pages;
        return $this;
    }

    public function add_admin_menu() {
        foreach ( $this->admin_pages as $page ) {
            add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'],$page['menu_slug'], $page['callback'],$page['icon_url'],$page['position']);
            if( ! empty($page['children']) ){
                foreach ( $page['children'] as $subpage ) {
                    add_submenu_page( $page['menu_slug'], $subpage['page_title'],$subpage['menu_title'], $subpage['capability'],$subpage['menu_slug'], $subpage['callback']);
                }
            }
        }
    }

    public function register_custom_fields(){
        //  register setting
        foreach ( $this->settings as $setting ) {
            register_setting($setting["option_group"], $setting["option_name"],( isset ( $setting["callback"] ) ) ? $setting["callback"] : '');
        }
        //  add settings action
        foreach ( $this->sections as $section ) {
            add_settings_section($section["id"],$section["title"],( isset($section["callback"]) ? $section["callback"] : ''),$section["page"]);
        }
        //  add settings field
        foreach ( $this->fields as $field ) {
            add_settings_field($field["id"],$field["title"],( isset($field["callback"]) ? $field["callback"] : '' ),$field["page"],$field["section"],( isset($field["args"]) ? $field["args"] : '' ));
        }
    }
}