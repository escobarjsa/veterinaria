<?php
class AuxiliarDAO{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $disponibilidad;
    
    function AuxiliarDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $disponibilidad=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> disponibilidad = $disponibilidad;
    }
    
    function registrar(){
        return "INSERT INTO auxiliar (nombre, apellido, correo, clave)
                VALUES ('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'))";
    }
    
    function actualizar(){
        return "update auxiliar set
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "'
                where idauxiliar=" . $this -> id;
    }
    
    function actualizarDisponbilidad($estado){
        return "update auxiliar set
                Disponibilidad = " . $estado . "
                where idauxiliar=" . $this -> id;
    }
    function autenticar(){
        return "SELECT idauxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }
    
    function consultar(){
        return "SELECT nombre, apellido, correo, disponibilidad
                FROM auxiliar
                WHERE idauxiliar =" . $this -> id;
    }
    function consultarCantidad(){
        return "SELECT count(tipo_solicitud_idtipo_solicitud)
                FROM solicitud
                where tipo_solicitud_idtipo_solicitud=1";
    }
    function existeCorreo(){
        return "SELECT idauxiliar
                FROM auxiliar
                WHERE correo = '" . $this -> correo . "'";
    }
    
    function consultarTodos(){
        return "SELECT idauxiliar, nombre, apellido, correo, disponibilidad
                FROM auxiliar";
    }
    function consultarDisponibles(){
        return "SELECT idauxiliar, nombre, apellido, correo, disponibilidad
                FROM auxiliar
                WHERE disponibilidad=0";
    }
    
    function filtrar($filtro){
        return "select idauxiliar ,nombre, apellido, correo, disponibilidad
                from auxiliar
                where nombre like '%".$filtro."%'
                    or apellido like '%".$filtro."%'
                order by apellido";
    }
    function losMasTrabajadores(){
        return "SELECT nombre, apellido, count(solicitud_idsolicitud)
                FROM auxiliar, solicitud_limpieza, solicitud
                where idauxiliar=auxiliar_idauxiliar and solicitud_idsolicitud=idsolicitud and estado_proceso=1
                 group by auxiliar_idauxiliar 
                 having count(solicitud_idsolicitud)>=1";
    }
}

