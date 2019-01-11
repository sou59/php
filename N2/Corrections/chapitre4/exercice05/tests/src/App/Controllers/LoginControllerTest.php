<?php
namespace App\Controllers;

/**
 * Generated by PHPUnit_SkeletonGenerator.
 */
class LoginControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \App\Application
     */
    protected $application;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->application = \App\Application::getInstance();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers \App\Controllers\LoginController::init
     * @covers \App\Controllers\LoginController::action
     */
    public function testLoginAdmin()
    {
        $_GET['page']      = "login";
        $_POST['username'] = "admin";
        $_POST['userpass'] = "coucou";
        $_SESSION[\App\Application::SESS_NS_AUTH] = array();
        
        try {
            $this->application->dispatch();
        } catch (\PHPUnit_Framework_Exception $e) {
            $this->assertContains("Cannot modify header information", $e->getMessage());
        }
        
        $this->assertEquals("ADMIN",          $_SESSION[\App\Application::SESS_NS_AUTH]['userrole']);
        $this->assertEquals("Administrateur", $_SESSION[\App\Application::SESS_NS_AUTH]['fullname']);
        $this->assertEquals("0.0.0.0",        $_SESSION[\App\Application::SESS_NS_AUTH]['test_IP']);
    }
    
    /**
     * @covers \App\Controllers\LoginController::init
     * @covers \App\Controllers\LoginController::action
     */
    public function testLoginClientTest()
    {
        $_GET['page']      = "login";
        $_POST['username'] = "jack";
        $_POST['userpass'] = "o'neil";
        $_SESSION[\App\Application::SESS_NS_AUTH] = array();
        
        try {
            $this->application->dispatch();
        } catch (\PHPUnit_Framework_Exception $e) {
            $this->assertContains("Cannot modify header information", $e->getMessage());
        }
        
        $this->assertEquals("CLIENT",         $_SESSION[\App\Application::SESS_NS_AUTH]['userrole']);
        $this->assertEquals("M. Jack O'Neil", $_SESSION[\App\Application::SESS_NS_AUTH]['fullname']);
        $this->assertEquals("0.0.0.0",        $_SESSION[\App\Application::SESS_NS_AUTH]['test_IP']);
    }
    
    /**
     * @covers \App\Controllers\LoginController::init
     * @covers \App\Controllers\LoginController::action
     */
    public function testLoginClientInexistant()
    {
        $_GET['page']      = "login";
        $_POST['username'] = "napoleon";
        $_POST['userpass'] = "bonaparte";
        $_SESSION[\App\Application::SESS_NS_AUTH] = array();
        
        $this->expectOutputRegex("`Erreur dans votre mot de passe !`");
        $this->application->dispatch();
        
        $this->assertFalse(isset($_SESSION[\App\Application::SESS_NS_AUTH]['userrole']));
        $this->assertFalse(isset($_SESSION[\App\Application::SESS_NS_AUTH]['fullname']));
        $this->assertFalse(isset($_SESSION[\App\Application::SESS_NS_AUTH]['test_IP']));
    }
}