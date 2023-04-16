<?php
    namespace classes;

    use classes\Usuario;

    class Cliente extends Usuario
    {
        public function __construct($nome, $email, $cpf)
        {
            parent::__construct($nome, $email, $cpf);
        }
    }