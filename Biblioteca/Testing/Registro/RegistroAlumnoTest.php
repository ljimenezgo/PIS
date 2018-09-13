<?php

/**
* cd c:\xampp\htdocs\CCC\CienciasDeLaComunicacion\PIS\Testing
*phpunit --bootstrap ../autoload.php Registro/RegistroAlumnoTest.php
**/
require_once '../Modelo/alumno.php';
require_once '../Modelo/database.php';

class RegistroAlumnoTest extends PHPUnit_Framework_TestCase
{

  private $model;  
  protected $indice = 17;
  protected $nuevoValor = 'Update';
  protected $nombreTest = 'nombre';
  protected $apellido1Test = 'apellidoP';
  protected $apellido2Test = 'apellidoM';
  protected $cuiTest = 'cui';
  protected $direccionTest = 'direccion';
  protected $emailTest = 'email@';
  protected $telefonoTest = 'fono';
  protected $tipo = 2;
  protected $estadoActivo = 0;
  protected $estadoInactivo = 1;


  function testCrearAlumno()
  {

    $this->nombreTest = $this->nombreTest.$this->indice;
    $this->apellido1Test = $this->apellido1Test.$this->indice;
    $this->apellido2Test = $this->apellido2Test.$this->indice;
    $this->cuiTest = $this->cuiTest.$this->indice;
    $this->direccionTest = $this->direccionTest.$this->indice;
    $this->emailTest = $this->emailTest.$this->indice;
    $this->telefonoTest = $this->telefonoTest.$this->indice;


    $this->model = new alumno();
    $pvd = new alumno();
    $pvd->persona_id = 1;
    $pvd->persona_nombres = $this->nombreTest;
    $pvd->persona_apellido1 = $this->apellido1Test;
    $pvd->persona_apellido2 = $this->apellido2Test;
    $pvd->persona_tipo_id = $this->tipo;
    $pvd->persona_cui = $this->cuiTest;
    $pvd->persona_direccion = $this->direccionTest;
    $pvd->persona_email = $this->emailTest;
    $pvd->persona_telefono = $this->telefonoTest;
    $pvd->persona_estado = $this->estadoActivo;
    
    $rpta = $this->model->Registrar($pvd);
    echo 'Id de alumno creado: '.$rpta.'\n';
    
    // $this->assertInternalType("int", $rpta);
    $this->assertNotNull($rpta);
    
    return $rpta;
  }


  /**
   * @depends testCrearAlumno
  */
  function testConsultarAlumno($idNewAlumno)
  {
    $this->model = new alumno();
    $rpta = $this->model->Obtener($idNewAlumno);
    
    $this->assertEquals($this->nombreTest.$this->indice, $rpta->persona_nombres);
    $this->assertEquals($this->apellido1Test.$this->indice, $rpta->persona_apellido1);
    $this->assertEquals($this->apellido2Test.$this->indice, $rpta->persona_apellido2);
    $this->assertEquals($this->emailTest.$this->indice, $rpta->persona_email);
    $this->assertEquals($this->cuiTest.$this->indice, $rpta->persona_cui);
    $this->assertEquals($this->direccionTest.$this->indice, $rpta->persona_direccion);
    $this->assertEquals($this->telefonoTest.$this->indice, $rpta->persona_telefono);

    return $rpta;
  }

  /**
   * @depends testConsultarAlumno
  */
  function testActualizarAlumno($alumno)
  {

    $this->model = new alumno();
    $pvd = new alumno();
    $pvd->persona_id = $alumno->persona_id;
    $pvd->persona_nombres = $alumno->persona_nombres;
    $pvd->persona_apellido1 = $alumno->persona_apellido1;
    $pvd->persona_apellido2 = $alumno->persona_apellido2;
    $pvd->persona_tipo_id = $this->tipo;
    $pvd->persona_cui = $alumno->persona_cui;
    //Se actualiza el valor de direccion, email y telefono del estudiante
    $pvd->persona_direccion = $alumno->persona_direccion.$this->nuevoValor;
    $pvd->persona_email = $alumno->persona_email.$this->nuevoValor;
    $pvd->persona_telefono = $alumno->persona_telefono.$this->nuevoValor;
    $pvd->persona_estado = $this->estadoActivo;
    
    $this->model->Actualizar($pvd);


    $this->model = new alumno();
    $rpta = $this->model->Obtener($alumno->persona_id);
    
    $this->assertEquals($alumno->persona_nombres, $rpta->persona_nombres);
    $this->assertEquals($alumno->persona_apellido1, $rpta->persona_apellido1);
    $this->assertEquals($alumno->persona_apellido2, $rpta->persona_apellido2);
    $this->assertEquals($alumno->persona_email.$this->nuevoValor, $rpta->persona_email);
    $this->assertEquals($alumno->persona_cui, $rpta->persona_cui);
    $this->assertEquals($alumno->persona_direccion.$this->nuevoValor, $rpta->persona_direccion);
    $this->assertEquals($alumno->persona_telefono.$this->nuevoValor, $rpta->persona_telefono);

    return $alumno->persona_id;

  }

  /**
   * @depends testActualizarAlumno
  */
  function testEliminarAlumno($idAlumno)
  {
    $this->model = new alumno();
    $pvd = new alumno();
    $this->model->Eliminar($idAlumno);

    $rpta = $this->model->Obtener($idAlumno);
    
    $this->assertEquals($this->estadoInactivo, $rpta->persona_estado);

  }


  
}

