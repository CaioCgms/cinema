<?php
    namespace classes;

    use classes\interfaces\CRUD;

    class Salas implements CRUD
    {
        private $salas = [];

        public function get($index)
        {
            return $this->salas[$index];
        }

        public function add($sala)
        {
            $this->salas[] = $sala;
        }

        public function update($index, $sala)
        {
            $this->salas[$index] = $sala;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->salas); $i++) {
                if ($i != $index) {
                    $new[] = $this->salas[$i];
                }
            }
            $this->salas = $new;
        }

        public function getAll()
        {
            return $this -> salas;
        }
    }
