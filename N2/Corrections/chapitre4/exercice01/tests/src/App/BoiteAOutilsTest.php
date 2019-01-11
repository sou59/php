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
        $test01      = BoiteAOutils::getGeoZoneFromPhoneNumber("01********");
        $test02      = BoiteAOutils::getGeoZoneFromPhoneNumber("0201010101");
        $test03      = BoiteAOutils::getGeoZoneFromPhoneNumber("0301010101");
        $test04      = BoiteAOutils::getGeoZoneFromPhoneNumber("0401010101");
        $test05      = BoiteAOutils::getGeoZoneFromPhoneNumber("0501010101");
        $test06      = BoiteAOutils::getGeoZoneFromPhoneNumber("0601010101");
        $test07      = BoiteAOutils::getGeoZoneFromPhoneNumber("0701010101");
        $test08      = BoiteAOutils::getGeoZoneFromPhoneNumber("0801010101");
        $test09      = BoiteAOutils::getGeoZoneFromPhoneNumber("0901010101");
        $test00336   = BoiteAOutils::getGeoZoneFromPhoneNumber("003361010101");
        $testPlus336 = BoiteAOutils::getGeoZoneFromPhoneNumber("+3361010101");
        
        $this->assertEquals("Région parisienne",                                $test01);
        $this->assertEquals("Région nord-ouest et « Océan Indien »",            $test02);
        $this->assertEquals("Région nord-est",                                  $test03);
        $this->assertEquals("Région sud-est dont Corse",                        $test04);
        $this->assertEquals("Région sud-ouest et « Océan Atlantique »",         $test05);
        $this->assertEquals("Téléphone mobile",                                 $test06);
        $this->assertEquals("Téléphone mobile",                                 $test07);
        $this->assertEquals("Numéro spéciaux",                                  $test08);
        $this->assertEquals("Pas de zone",                                      $test09);
        
        //$this->markTestIncomplete("Numéros de téléphones internationaux non gérés");
        $this->assertNotEquals("Téléphone mobile",                              $test00336);
        $this->assertNotEquals("Erreur de saisie dans le numéro de téléphone",  $testPlus336);
    }
}
