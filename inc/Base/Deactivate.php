<?php
/**
 * @package  WordifyPlugin
 */
namespace Inc\Base;

class Deactivate
{
	public static function run() {
		flush_rewrite_rules();
	}
}