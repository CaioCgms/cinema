<?php
    function load($class)
    {
        require_once $class;
    }

    load('classes/interfaces/CRUD.php');

    load('classes/Usuario.php');
    load('classes/Cliente.php');
    load('classes/Filme.php');
    load('classes/Ingresso.php');
    load('classes/Sala.php');

    load('classes/Clientes.php');
    load('classes/Filmes.php');
    load('classes/Ingressos.php');
    load('classes/Salas.php');
