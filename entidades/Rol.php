<?php
Class Rol{
    private $idRol;
    private $nombre;

function get_id(){
    return $this->idRol;
}
function set_id($idRol){
    return $this->idRol=$idRol;
}
function get_nombre(){
    return $this->nombre;
}
function set_nombre($nombre){
    return $this->nombre=$nombre;
}

}
?>