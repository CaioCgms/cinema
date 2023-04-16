<?php
    namespace classes;

    use classes\interfaces\CRUD;

    class Clientes implements CRUD
    {
        private $clientes = [];

        public function get($index)
        {
            return $this->clientes[$index];
        }

        public function add($cliente)
        {
            $this->clientes[] = $cliente;
        }

        public function update($index, $cliente)
        {
            $this->clientes[$index] = $cliente;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->clientes); $i++) {
                if ($i != $index) {
                    $new[] = $this->clientes[$i];
                }
            }
            $this->clientes = $new;
        }

        public function getAll()
        {
            return $this -> clientes;
        }
    }
    