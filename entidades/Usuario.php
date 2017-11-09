<?php
Class Usuario{
   // public $idUsuario;
    public $idRol;
    public $usuario;
    public $contrasena;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $dni;
    public $sexo;
    public $telefono;
    public $domicilio;
    public $fechaRegistro; 
}
/*
function get_idUsuario(){
    return $this->idUsuario;
}
function set_idUsuario($idUsuario){
    return $this->idUsuario=$idUsuario;
}
*/
function get_idRol(){
    return $this->$idRol;
}
function set_idRol($idRol){
    return $this->idUsuario=$idRol;
}
function get_usuario(){
    return $this->usuario;
}
function set_usuario($usuario){
    return $this->usuario=$usuario;
}
function get_contrasena(){
    return $this->contrasena;
}
function set_contrasena($contrasena){
    return $this->contrasena=$contrasena;
}
function get_nombre(){
    return $this->nombre;
}
function set_nombre($nombre){
    return $this->nombre=$nombre;
}
function get_apellidoPaterno(){
    return $this->apellidoPaterno;
}
function set_apellidoPaterno($apellidoPaterno){
    return $this->apellidoPaterno=$apellidoMaterno;
}
function get_apellidoMaterno(){
    return $this->apellidoMaterno;
}
function set_apellidoMaterno($apellidoMaterno){
    return $this->apellidoMaterno=$apellidoMaterno;
}
function get_dni(){
    return $this->dni;
}
function set_dni($dni){
    return $this->dni=$dni;
}
function get_telefono(){
    return $this->telefono;
}
function get_sexo(){
    return $this->sexo;
}
function set_sexo($sexo){
    return $this->sexo=$sexo;
}
function set_telefono(){
    return $this->telefono=$telefono;
}
function get_domicilio(){
    return $this->domicilio;
}
function set_domicilio(){
    return $this->domicilio=$domicilio;
}
function get_fechaRegistro(){
    return $this->fechaRegisro;
}
function set_fechaRegistro(){
    return $this->fechaRegistro=$fechaRegistro;
}
 ?>
