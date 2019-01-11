<?php

namespace App;

class BoiteAOutilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
    
    /**
     * @covers \App\BoiteAOutils::getGeoZoneFromPhoneNumber
     */
    public function testGetGeoZoneFromPhoneNumber()
    {
        $test02 = BoiteAOutils::getGeoZoneFromPhoneNumber("0201010101");
        $this->assertEquals("Région nord-ouest et « Océan Indien »", $test02);
    }
}
