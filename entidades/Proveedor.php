<?php
Class Proveedor{

    private $idProveedor;
    private $nombre;
    private $razonSocial;
    private $ruc;
    private $telefono1;
    private $telefono2;
    private $direccion;
    private $email1;
    private $email2;
    private $paginaWeb;
    private $observaciones;

//Metodos setter y getter
function get_idProveedor(){
    return $this->id;
}
function set_idProveedor($idProveedor){
    return $this->id=$idProveedor;
}
function get_nombre(){
    return $this->nombre;
}
function set_nombre($nombre){
    return $this->nombre=$nombre;
}
function get_razonSocial(){
    return $this->razonSocial;
}
function set_razonSocial($razonSocial){
    return $this->razonSocial=$razonSocial;
}
function get_ruc(){
    return $this->ruc;
}
function set_ruc($ruc){
    return $this->ruc=$ruc;
}
function get_telefono1(){
    return $this->telefono1;
}
function set_telefono1($telefono1){
    return $this->telefono1=$telefono1;
}
function get_telefono2(){
    return $this->telefono2;
}
function set_telefono2($telefono2){
    return $this->telefono2=$telefono2;
}
function get_direccion(){
    return $this->direccion;
}
function set_direccion($direccion){
    return $this->direccion=$direccion;
}
function get_email1(){
    return $this->email1;
}
function set_email1($email1){
    return $this->email1=$email1;
}
function get_email2(){
    return $this->email2;
}
function set_email2($email2){
    return $this->email2=$email2;
}
function get_paginaWeb(){
    return $this->paginaWeb;
}
function set_paginaWeb($paginaWeb){
    return $this->paginaWeb=$paginaWeb;
}
function get_observaciones(){
    return $this->observaciones;
}
function set_observaciones($observaciones){
    return $this->observaciones=$observaciones;
}

}
 ?>
