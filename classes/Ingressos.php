<?php
    namespace classes;

    use classes\interfaces\CRUD;

    class Ingressos implements CRUD
    {
        private $ingressos = [];

        public function get($index)
        {
            return $this->ingressos[$index];
        }

        public function add($ingresso)
        {
            $this->ingressos[] = $ingresso;
        }

        public function update($index, $ingresso)
        {
            $this->ingressos[$index] = $ingresso;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->ingressos); $i++) {
                if ($i != $index) {
                    $new[] = $this->ingressos[$i];
                }
            }
            $this->ingressos = $new;
        }

        public function getAll()
        {
            return $this -> ingressos;
        }
    }
    