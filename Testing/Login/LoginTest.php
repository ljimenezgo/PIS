<?php

/**
* cd c:\xampp\htdocs\CCC\CienciasDeLaComunicacion\PIS\Testing
*phpunit --bootstrap ../autoload.php Login/LoginTest.php
**/
require_once '../Modelo/usuarios_modelo.php';
require_once '../Modelo/conectar.php';

class LoginTest extends PHPUnit_Framework_TestCase
{

  private $model;  
  protected $usernameCorrecto = 'admin';
  protected $passwordCorrecto = 'admin';
  protected $usernameIncorrecto = 'fake';
  protected $passwordIncorrecto = '`fake';  


  //Inicion de sesión correcto
  function testLogin01()
  {

    $usu=new usuarios_modelo();
    $datos=$usu->validarLogin($this->usernameCorrecto,$this->passwordCorrecto);

    echo $datos."\n";

    // echo $_SESSION['loggedin']."\n";
    // echo $_SESSION['rol']."\n";
    // echo $_SESSION['usuario_cuenta']."\n";
    // echo $_SESSION['start']."\n";
    // echo $_SESSION['expire']."\n";

    $this->assertEquals($_SESSION['loggedin'], true);
    $this->assertNotNull($_SESSION['rol']);
    $this->assertNotNull($_SESSION['usuario_cuenta']);
    $this->assertNotNull($_SESSION['start']);
    $this->assertNotNull($_SESSION['expire']);
    
  }


  //Inicion de sesión incorrecto
  function testLogin02()
  {

    $usu=new usuarios_modelo();
    $datos=$usu->validarLogin($this->usernameIncorrecto,$this->passwordIncorrecto);
    
    echo $datos."\n";

    $this->assertEquals(isset($_SESSION['loggedin']), false);
    $this->assertEquals(isset($_SESSION['rol']), false);
    $this->assertEquals(isset($_SESSION['usuario_cuenta']), false);
    $this->assertEquals(isset($_SESSION['start']), false);
    $this->assertEquals(isset($_SESSION['expire']), false);
    
  }

  //Inicion de sesión sin username
  function testLogin03()
  {

    $usu=new usuarios_modelo();
    $datos=$usu->validarLogin('', $this->passwordCorrecto);
    
    echo $datos."\n";

    $this->assertEquals(isset($_SESSION['loggedin']), false);
    $this->assertEquals(isset($_SESSION['rol']), false);
    $this->assertEquals(isset($_SESSION['usuario_cuenta']), false);
    $this->assertEquals(isset($_SESSION['start']), false);
    $this->assertEquals(isset($_SESSION['expire']), false);
    
  }

  //Inicion de sesión sin password
  function testLogin04()
  {

    $usu=new usuarios_modelo();
    $datos=$usu->validarLogin($this->usernameCorrecto, '');
    
    echo $datos."\n";

    $this->assertEquals(isset($_SESSION['loggedin']), false);
    $this->assertEquals(isset($_SESSION['rol']), false);
    $this->assertEquals(isset($_SESSION['usuario_cuenta']), false);
    $this->assertEquals(isset($_SESSION['start']), false);
    $this->assertEquals(isset($_SESSION['expire']), false);
    
  }

  //Inicion de sesión sin username y sin password
  function testLogin05()
  {

    $usu=new usuarios_modelo();
    $datos=$usu->validarLogin('', '');
    
    echo $datos."\n";

    $this->assertEquals(isset($_SESSION['loggedin']), false);
    $this->assertEquals(isset($_SESSION['rol']), false);
    $this->assertEquals(isset($_SESSION['usuario_cuenta']), false);
    $this->assertEquals(isset($_SESSION['start']), false);
    $this->assertEquals(isset($_SESSION['expire']), false);
    
  }


}  