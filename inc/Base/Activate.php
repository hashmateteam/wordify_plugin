<?php
/**
 * @package  WordifyPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function run() {
		flush_rewrite_rules();
	}
}