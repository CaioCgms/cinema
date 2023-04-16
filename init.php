<?php
    require_once "autoload.php";

    use classes\Clientes;
    use classes\Salas;
    use classes\Filmes;
    use classes\Ingressos;

    use classes\Cliente;
    use classes\Sala;
    use classes\Filme;
    use classes\Ingresso;

    // Objetos 
    $clientes = new Clientes();
    $salas = new Salas();
    $filmes = new Filmes();
    $ingressos = new Ingressos();

    // Criar Salas
    $salas->add(new Sala("Sala 1"));
    $salas->add(new Sala("Sala 2"));
    $salas->add(new Sala("Sala 3"));
    $salas->add(new Sala("Sala 4"));

    // Criar Clientes
    $clientes->add(new Cliente("Caio Graco", "caio@mail.com", "1111"));
    $clientes->add(new Cliente("Caíque Gabriel", "caaique@mail.com", "1111"));

    // Criar Filmes
    $filmes->add(new Filme("Alvin e Os Esquilos 1", 90, "Esquilos Falantes que criam uma banda", "Fantasia"));
    $filmes->add(new Filme("Alvin e Os Esquilos 2", 93, "Esquilos Falantes que criam uma banda", "Fantasia"));
    $filmes->add(new Filme("Alvin e Os Esquilos 3", 88, "Esquilos Falantes que criam uma banda", "Fantasia"));
    $filmes->add(new Filme("Sonic 1", 100, "Ouriço azul da Sega", "Fantasia"));
    $filmes->add(new Filme("Sonic 2", 97, "Ouriço azul da Sega", "Fantasia"));


    // Mostra Lista de Salas
    function showSalas()
    {
        global $salas;
        echo "\n ---- SALAS ---- \n";
        for ($i = 0; $i < count($salas->getAll()); $i++) {
            echo "$i - " . $salas->getAll()[$i]->getNome() . "\n";
        }
    }

    // Motra lista de Filmes
    function showFilmes()
    {
        global $filmes;

        echo "\n ---- Filmes ---- \n";
        for ($i = 0; $i < count($filmes->getAll()); $i++) {
            echo "$i - " . $filmes->getAll()[$i]->getNome() . "\n";
        }
    }

    // Mostra lista de Clientes
    function showClientes()
    {
        global $clientes;

        echo "\n ---- Clientes ---- \n";
        for ($i = 0; $i < count($clientes->getAll()); $i++) {
            echo "$i - " . $clientes->getAll()[$i]->getNome() . "\n";
        }
    }

    // Mostra lista de Ingressos
    function showIngressos()
    {
        global $ingressos;

        echo "\n ---- Ingressos ---- \n";
        for ($i = 0; $i < count($ingressos->getAll()); $i++) {
            echo "$i - CLIENTE: " . $ingressos->getAll()[$i]->getCliente()->getNome();
            echo " | FILME: ". $ingressos->getAll()[$i]->getFilme()->getNome();
            echo " | SALA : ". $ingressos->getAll()[$i]->getSala()->getNome() . "\n";
        }
    }

    // Cria Sala
    function criarSala()
    {
        global $salas;
        $nome = readline("Insira o nome da Sala: ");
        $salas->add(new Sala($nome));
    }

    // Cria filme
    function criarFilme()
    {
        global $filmes;

        echo "\n Insira os detalhes do Filme ---- \n ";

        $nome = readline("Nome: ");
        $sinopse = readline("Sinopse: ");
        $duracao = readline("Duração em Minutos: ");
        $genero = readline("Gênero: ");

        $filmes->add(new Filme($nome, $duracao, $sinopse, $genero));
    }

    // Cria Cliente
    function criarCliente()
    {
        global $clientes;

        echo "\n Insira os detalhes do Cliente ---- \n ";

        $nome = readline("Nome: ");
        $email = readline("Email: ");
        $cpf = readline("CPF: ");

        $clientes->add(new Cliente($nome, $email, $cpf));
    }

    // Cria Ingresso
    function criarIngresso()
    {
        global $ingressos;
        global $clientes;
        global $salas;
        global $filmes;

        echo "\n Insira os detalhes do Ingresso ---- \n ";

        echo "\n >> Selecione o número do Cliente";
        showClientes();
        $cliente = (int) readline();
        echo "\n >> Selecione o número do Filme";
        showFilmes();
        $filme = (int) readline();
        echo "\n >> Selecione o número da Sala";
        showSalas();
        $sala =(int) readline();
        $ingressos->add(new Ingresso($clientes->get($cliente), $filmes->get($filme), $salas->get($sala)));
    }

    // Editar Sala
    function editarSala($index)
    {
        global $salas;
        $nome = readline("Insira o nome da Sala: ");
        $salas->update($index, new Sala($nome));
    }

    // Editar filme
    function editarFilme($index)
    {
        global $filmes;

        echo "\n Insira os detalhes do Filme ---- \n ";

        $nome = readline("Nome: ");
        $sinopse = readline("Sinopse: ");
        $duracao = readline("Duração em Minutos: ");
        $genero = readline("Gênero: ");

        $filmes->update($index, new Filme($nome, $duracao, $sinopse, $genero));
    }

    // Editar Cliente
    function editarCliente($index)
    {
        global $clientes;

        echo "\n Insira os detalhes do Cliente ---- \n ";

        $nome = readline("Nome: ");
        $email = readline("Email: ");
        $cpf = readline("CPF: ");

        $clientes->update($index, new Cliente($nome, $email, $cpf));
    }

    // Editar Ingresso
    function editarIngresso($index)
    {
        global $ingressos;
        global $clientes;
        global $salas;
        global $filmes;

        echo "\n Insira os detalhes do Ingresso ---- \n ";

        echo "\n >> Selecione o número do Cliente";
        showClientes();
        $cliente = readline();
        echo "\n >> Selecione o número do Filme";
        showFilmes();
        $filme = readline();
        echo "\n >> Selecione o número da Sala";
        showSalas();
        $sala = readline();
        $ingressos->update($index, new Ingresso($clientes->get($cliente), $filmes->get($filme), $salas->get($sala)));
    }

    // Remover Sala
    function removerSala($index)
    {
        global $salas;
        $salas->delete($index);
    }

    // Remover filme
    function removerFilme($index)
    {
        global $filmes;
        $filmes->delete($index);
    }

    // Remover Cliente
    function removerCliente($index)
    {
        global $clientes;
        $clientes->delete($index);
    }

    // Remover Ingresso
    function removerIngresso($index)
    {
        global $ingressos;
        $ingressos->delete($index);
    }


    // 
    function clientesFuncs()
    {
        $exit = false;
        while( !$exit) {
            echo "\n ---- CLIENTES ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";

            $menu_ = (int) readline();
    
            switch ($menu_) {
                case 1:
                    showClientes();
                    break;
                case 2:
                    criarCliente();
                    break;
                case 4:
                    showClientes();
                    $index = (int) readline();
                    editarCliente($index);
                    break;
                case 3:
                    showClientes();
                    $index = (int) readline();
                    removerCliente($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
            }
        }
    }

    function filmesFuncs()
    {
        $exit = false;
        while (!$exit) {
            echo "\n ---- FILMES ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";
    
            $menu_ = (int) readline();
    
            switch ($menu_) {
                case 1:
                    showFilmes();
                    break;
                case 2:
                    criarFilme();
                    break;
                case 4:
                    showFilmes();
                    $index = (int) readline();
                    editarFilme($index);
                    break;
                case 3:
                    showFilmes();
                    $index = (int) readline();
                    removerFilme($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
            }
        }
    }

    function salasFuncs()
    {
        $exit = false;
        while (!$exit) {
            echo "\n ---- SALAS ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";
    
            $menu_ = (int) readline();
    
            switch ($menu_) {
                case 1:
                    showSalas();
                    break;
                case 2:
                    criarSala();
                    break;
                case 4:
                    showSalas();
                    $index = (int) readline();
                    editarSala($index);
                    break;
                case 3:
                    showSalas();
                    $index = (int) readline();
                    removerSala($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
            }
        }
    }

    function ingressosFuncs()
    {
        $exit = false;
        while (!$exit) {
            echo "\n ---- INGRESSOS ----- ";
            echo "\n\n\n";
            echo " 1- >> Lista \n";
            echo " 2- >> Adicionar \n";
            echo " 3- >> Remover \n";
            echo " 4- >> Atualizar \n";
            echo " 5- >> Sair \n";

            $menu_ = (int) readline();

            switch ($menu_) {
                case 1:
                    showIngressos();
                    break;
                case 2:
                    criarIngresso();
                    break;
                case 4:
                    showIngressos();
                    $index = (int) readline();
                    editarIngresso($index);
                    break;
                case 3:
                    showIngressos();
                    $index = (int) readline();
                    removerIngresso($index);
                    break;
                case $menu_ == 5:
                    $exit = true;
                    break;
    
            }
        } 
    }

    $exit = false;
    while(!$exit)
    {
        echo "\n ---- CAIO'S CINEMAS ----- ";
        echo "\n\n\n";
        echo " 1- >> Filmes \n";
        echo " 2- >> Clientes \n";
        echo " 3- >> Salas \n";
        echo " 4- >> Ingressos \n";
        echo " 5- >> Sair \n";

        $menu_ = (int) readline();

        switch ($menu_) {
            case 1:
                filmesFuncs();
                break;
            case 2:
                clientesFuncs();
                break;
            case 3:
                salasFuncs();
                break;
            case 4:
                ingressosFuncs();
                break;
            case $menu_ == 5:
                $exit = true;
                break;

        }
    }

