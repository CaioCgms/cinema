<?php
    namespace classes;

    class Sala
    {
        private $nome;
        private $id;

        public function __construct($nome)
        {
            $this->nome = $nome;
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

        public function getId()
        {
            return $this->id;
        }

        public function setId($v)
        {
            $this->id = $v;
        }
    }