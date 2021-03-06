<?php
/**
 * @package ConstantContact_Tests
 * @subpackage AuthRedirect
 * @author Pluginize
 * @since 1.0.0
 */

class ConstantContact_Auth_Redirect_Test extends WP_UnitTestCase {

	function test_class_exists() {
		$this->assertTrue( class_exists( 'ConstantContact_Auth_Redirect' ) );
	}

	function test_class_access() {
		$this->assertTrue( constant_contact()->auth_redirect instanceof ConstantContact_Auth_Redirect );
	}

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}
}
