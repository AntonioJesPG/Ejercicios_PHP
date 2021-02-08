<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Juegos
 *
 * @author DWES
 */
class Juegos {
    private $codigo;
    private $nombre_juego;
    private $nombre_consola;
    private $anio;
    private $precio;
    private $alquilado;
    private $descripcion;
    private $imagen;
    
    function __construct($codigo, $nombre_juego, $nombre_consola, $anio, $precio,$descripcion, $alquilado, $imagen) {
        $this->codigo = $codigo;
        $this->nombre_juego = $nombre_juego;
        $this->nombre_consola = $nombre_consola;
        $this->anio = $anio;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->alquilado = $alquilado;
        $this->imagen = $imagen;
    }

    function getCodigo() {
        return $this->codigo;
    }
    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

        function getNombre_juego() {
        return $this->nombre_juego;
    }

    function getNombre_consola() {
        return $this->nombre_consola;
    }

    function getAnio() {
        return $this->anio;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getAlquilado() {
        return $this->alquilado;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre_juego($nombre_juego) {
        $this->nombre_juego = $nombre_juego;
    }

    function setNombre_consola($nombre_consola) {
        $this->nombre_consola = $nombre_consola;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setAlquilado($alquilado) {
        $this->alquilado = $alquilado;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

}
