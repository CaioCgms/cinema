<?php
    namespace classes;

    use classes\interfaces\CRUD;
    
    class Filmes implements CRUD
    {
        private $filmes = [];

        public function get($index)
        {
            return $this->filmes[$index];
        }

        public function add($filme)
        {
            $this->filmes[] = $filme;
        }

        public function update($index, $filme)
        {
            $this->filmes[$index] = $filme;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->filmes); $i++) {
                if ($i != $index) {
                    $new[] = $this->filmes[$i];
                }
            }
            $this->filmes = $new;
        }

        public function getAll()
        {
            return $this -> filmes;
        }
    }
    