<?php
Class Usuario{
    private $idUsuario;
    private $usuario;
    private $password;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $dni;
    private $telefono;
    private $domicilio;
    private $fechaRegistro; 
}
function get_id(){
    return $this->idUsuario;
}
function set_id($idUsuario){
    return $this->idUsuario=$idUsuario;
}
function get_usuario(){
    return $this->usuario;
}
function set_usuario($usuario){
    return $this->usuario=$usuario;
}
function get_password(){
    return $this->password;
}
function set_password($password){
    return $this->password=$password;
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
