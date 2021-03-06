<?php
/**
 * @package ConstantContact_Tests
 * @subpackage Lists
 * @author Pluginize
 * @since 1.0.0
 */

class ConstantContact_Lists_Test extends WP_UnitTestCase {

	function test_class_exists() {
		$this->assertTrue( class_exists( 'ConstantContact_Lists' ) );
	}

	function test_class_access() {
		$this->assertTrue( constant_contact()->lists instanceof ConstantContact_Lists );
	}

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}
}
