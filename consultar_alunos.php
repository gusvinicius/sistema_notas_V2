<?php include ("conteiner_funcoes.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
    <title>buscar alunos</title>

    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/cores.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
    <!-- ------TOPO DO SITE---------- -->
    <header>
        <!-- ICONE DE VOLTARL -->
        <div class="head-1">
            <a href="index.php">
                <span class="icone1 material-icons perfil md-36 perfil">
                    arrow_back
                </span>
            </a>

        </div>
        <!-- NOME DO SISTEMA -->
        <div class="head-2">
            <h1 class="text1">SISTEMA DE NOTAS</h1>
        </div>
        <!-- ICONE DO MENU -->
        <div class="head-3">
            <span class="icone1 material-icons md-36 menu nav">
                menu
            </span>
        </div>
    </header>

    <!-- -------------------MENU BURGUER DO SITE---------------- -->
    <menu class="conteiner-menu" id="menu">
        <!-- NOME DE MENU -->
        <div>
            <h3 class="t1">MENU</h3>
        </div>
        <!-- SWITCH DE DARK MODE -->
        <div class="list-menu sel">
            <span class="material-icons md-24 icone-modo">
                light_mode
            </span>
            <h4>TEMA</h4>
            <input type="checkbox" id="check" class="control">
            <label for="check" class="switch">
                <span class="slider"></span>
            </label>
        </div>
        <!-- ICONE DE ALUNOS -->
        <a href="consultar_alunos.php">
            <div class="list-menu sel">
                <span class="material-icons md-24">
                    groups
                </span>
                <h4>ALUNOS</h4>
            </div>
        </a>

        <!-- SALAS -->
        <a href="consultar_salas.php">
            <div class="list-menu sel">
                <span class="material-symbols-outlined">
                    table
                </span>
                <h4>SALAS</h4>
            </div>
        </a>
        <!-- LINK PARA O PORTIFOLIO -->
        <div class="list-menu sel">
            <a href="https://github.com/gusvinicius" target="_blank">
                <span class="material-icons md-24">
                    rocket_launch
                </span>
            </a>
            <a href="https://github.com/gusvinicius" target="_blank">
                <h4>PORTIFOLIO</h4>
            </a>
        </div>
    </menu>

    <main class="corpo-principal">
        <div class="conteiner-titulo">
            <h2 class="t1 text1">PESQUISAS</h2>
        </div>

        <!-- CONTEINER DOS FORMULARIOS DE PESQUISA -->
        <div class="conteiner-aluno">

            <!-- PESQUISA POR NOME -->
            <div class="conteiner-pesquisa">
                <div class="conteiner-titulo">
                    <h3 class="t1 text1">ALUNOS POR SALA</h3>
                </div>
                <form action="" method="get">
                    <div class="div-input">
                        <label class="text1">NOME</label>
                        <input class="input-name-aluno"  type="text" name="nome-aluno-pesq"  placeholder="nome do aluno" required maxlength="25">
                    </div>

                    <div class="div-input">
                        <label class="text1">SALA:</label>
                        <select class="input-select" name="sala">
                        <?php
                            select_salas()
                        ?>
                        </select>
                    </div>

                    <div class="div-btn">
                        <input class="btn-2" name="pesquisar-alun" type="submit" value="PESQUISAR">
                    </div>
                    </div>
                </form>

                <div class="conteiner-listas">
                    <?php
                        if(isset($_GET['pesquisar-alun'])){
                            pesq_alun_sala();
                        }
                    ?>
                </div>
            </div>


            <!-- PESQUISA ALUNOS POR SALA -->
            <div class="conteiner-pesquisa">
                <div class="conteiner-titulo">
                    <h3 class="t1 text1">ALUNOS DA SALA</h3>
                </div>
                <form action="" method="get">
                    <div class="div-input">
                        <label class="text1">SALA:</label>
                        <select class="input-select" name="sala">
                            <?php
                                select_salas();
                            ?>
                        </select>
                    </div>

                    <div class="div-btn">
                        <input class="btn-2" name="pes-salas" type="submit" value="PESQUISAR">
                    </div>
                </form>

                <div class="conteiner-listas">
                    <?php
                        if(isset($_GET['pes-salas'])){
                            mostra_alun_sala();
                        }
                    ?>
                </div>
            </div>

            <!-- MOSTRAR TODOS OS ALUNOS -->
            <div class="conteiner-pesquisa">
                <div class="conteiner-titulo">
                    <div class="conteiner-titulo">
                        <h3 class="t1 text1">MOSTRAR TODOS OS ALUNOS</h3>
                    </div>
                </div>

                <form action="" method="get">
                    <div class="div-btn">
                        <input class="btn-2" name="mostra-aluno" type="submit" value="PESQUISAR">
                    </div>
                </form>

                <div class="conteiner-listas">
                <?php
                    if(isset($_GET['mostra-aluno'])){
                        mostra_alunos();
                    }
                    if(isset($_GET['func'])){
                        $id = $_GET['id'];
                        deletar($id);
                    }
                ?>
                </div>
            </div>

            <?php
                if(isset($_GET['func'])){
                    $id = $_GET['id'];
                     deletar($id);
                }
            ?>

    </main>

    <script src="comandos/comando_consulta_alun.js"></script>
</body>
</html>