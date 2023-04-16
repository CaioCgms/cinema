<?php
    namespace classes;

    class Filme
    {
        private $nome;
        private $duracao;
        private $sinopse;
        private $genero;
        private $id;

        function __construct($nome, $duracao, $sinopse, $genero)
        {
            $this->nome = $nome;
            $this->sinopse = $sinopse;
            $this->duracao = $duracao;
            $this->genero = $genero;
            $this->id = uniqid();
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($v)
        {
            $this->nome = $v;
        }

        public function getDuracao()
        {
            return $this->duracao;
        }

        public function setDuracao($v)
        {
            $this->duracao = $v;
        }

        public function getSinopse()
        {
            return $this->sinopse;
        }

        public function setSinopse($v)
        {
            $this->sinopse = $v;
        }

        public function getGenero()
        {
            return $this->genero;
        }

        public function setGenero($v)
        {
            $this->genero = $v;
        }

        public function  getId()
        {
            return $this->id;
        }

        public function setId($v)
        {
            $this->id = $v;
        }
    }