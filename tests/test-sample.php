<?php
// @todo
class Sample_Test extends WP_UnitTestCase {

	public function setup() {
		parent::setup();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function sample() {
		$bootstrap = new Inc2734\WP_Awesome_Widgets\Bootstrap();

		$this->assertTrue( is_a( $bootstrap, 'Inc2734\WP_Awesome_Widgets\Bootstrap' ) );
	}
}
