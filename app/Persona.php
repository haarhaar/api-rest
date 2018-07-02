<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Persona extends Model{
    protected $table="personas";
    protected $fillable=array("dui","nombre","apellido","fechaNacimiento");
}
?>
