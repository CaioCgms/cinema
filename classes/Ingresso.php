<?php
    namespace classes;

    use classes\Cliente;
    use classes\Filme;
    use classes\Sala;

    class Ingresso
    {
        private $id;
        private Cliente $cliente;
        private Filme $filme;
        private Sala $sala;

        public function __construct($cliente, $filme, $sala)
        {
            $this->cliente = $cliente;
            $this->filme = $filme;
            $this->sala = $sala;
            $this->id = uniqid();
        }

        public function getCliente()
        {
            return $this->cliente;
        }

        public function setCliente(Cliente $v)
        {
            $this->cliente = $v;
        }

        public function getFilme()
        {
            return $this->filme;
        }

        public function setFilme(Filme $v)
        {
            $this->filme = $v;
        }

        public function getSala()
        {
            return $this->sala;
        }

        public function setSala(Sala $v)
        {
            $this->sala = $v;
        }
    }