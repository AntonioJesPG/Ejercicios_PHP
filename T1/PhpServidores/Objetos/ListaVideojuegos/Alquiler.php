<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alquiler
 *
 * @author DWES
 */
class Alquiler {
    private $cod_juego;
    private $dni_cliente;
    private $fecha_alquiler;
    private $fecha_devolucion;
    
    function __construct($cod_juego, $dni_cliente, $fecha_alquiler, $fecha_devolucion) {
        $this->cod_juego = $cod_juego;
        $this->dni_cliente = $dni_cliente;
        $this->fecha_alquiler = $fecha_alquiler;
        $this->fecha_devolucion = $fecha_devolucion;
    }
    
    function getCod_juego() {
        return $this->cod_juego;
    }

    function getDni_cliente() {
        return $this->dni_cliente;
    }

    function getFecha_alquiler() {
        return $this->fecha_alquiler;
    }

    function getFecha_devolucion() {
        return $this->fecha_devolucion;
    }

    function setCod_juego($cod_juego) {
        $this->cod_juego = $cod_juego;
    }

    function setDni_cliente($dni_cliente) {
        $this->dni_cliente = $dni_cliente;
    }

    function setFecha_alquiler($fecha_alquiler) {
        $this->fecha_alquiler = $fecha_alquiler;
    }

    function setFecha_devolucion($fecha_devolucion) {
        $this->fecha_devolucion = $fecha_devolucion;
    }



}
