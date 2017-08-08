<?php
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
		new Inc2734\WP_Awesome_Widgets\Awesome_Widgets();
	}
}
