<?php
namespace App;

class VueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Vue
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Vue("_test");
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers \App\Vue::__get
     * @covers \App\Vue::__set
     */
    public function testSetterGetter()
    {
        $valueTest = "Valeur de test";
        $this->object->test = $valueTest;
        $this->assertEquals($valueTest, $this->object->test);
        
        // Récupération d'une valeur inexistante
        $this->assertNull($this->object->inexistantValue);
        
        // L'affectation de tableau PHP, signifie une fusion des valeurs
        $this->object->tab = array($valueTest);
        $this->object->tab = array($valueTest);
        $this->assertEquals(array($valueTest, $valueTest), $this->object->tab);
    }

    /**
     * @covers \App\Vue::__isset
     * @covers \App\Vue::__unset
     */
    public function testIssetUnset()
    {
        $this->assertFalse(isset($this->object->inexistantValue1));
        
        $this->object->existantValue = "Message";
        $this->assertTrue (isset($this->object->existantValue));
        
        unset($this->object->existantValue);
        $this->assertFalse(isset($this->object->existantValue));
    }

    /**
     * @covers \App\Vue::__construct
     * @covers \App\Vue::setLayout
     * @covers \App\Vue::setMenuTop
     * @covers \App\Vue::afficher
     * @covers \App\Vue::getContent
     * @covers \App\Vue::getMenuTop
     */
    public function testAffichagePage()
    {
        $this->object->setLayout("_test");
        $this->object->setMenuTop("test");
        
        $this->expectOutputString("<menu>Menu TEST</menu>\n<content>content test</content>");
        $this->object->afficher();
    }

    /**
     * @covers \App\Vue::__construct
     * @covers \App\Vue::setLayout
     * @covers \App\Vue::setMenuTop
     * @covers \App\Vue::afficher
     * @covers \App\Vue::getContent
     * @covers \App\Vue::getMenuTop
     */
    public function testAffichagePageSansLayout()
    {
        //$this->object->setLayout(null); // Ceci génère un erreur
        $this->object->setMenuTop("test");
        
        $this->expectOutputString("content test");
        $this->object->afficher();
    }
}