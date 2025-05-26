<?php
        //print_r($_POST['nome']);
        //print_r('<br>');
        //print_r($_POST['email']);
        //print_r('<br>');
        //print_r($_POST['telefone']);

        //print_r($_POST['devweb']);
        //print_r('<br>');

        //if (isset($_POST['senioridade'])) {
        //    print_r($_POST['senioridade']);
        //} else {
        //    print_r('Senioridade não selecionada');
        //}
        //print_r('<br>');

        //if (isset($_POST['linguagem']) && is_array($_POST['linguagem'])) {
            //print_r($_POST['linguagem']);
        //} else {
        //    print_r('Nenhuma linguagem selecionada');
        //}
        //print_r('<br>');

        //print_r($_POST['sobre']);

        include_once("config.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senioridade = $_POST['senioridade'];
            $sobre = $_POST['sobre'];

            $devweb = isset($_POST['devweb']) ? implode(", ", $_POST['devweb']) : "";
            $linguagem = isset($_POST['linguagem']) ? implode(", ", $_POST['linguagem']) : "";

            $sql = "INSERT INTO forms(nome, email, telefone, linguagem, senioridade, sobre, devweb) 
                    VALUES('$nome','$email','$telefone','$linguagem','$senioridade','$sobre','$devweb')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir dados: " . mysqli_error($conn);
            }
}

?>


<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="form.css" media="screen">

        <title>Cadastro</title>
    </head>

    <body>  

        <div>
            <h1 id="titulo">Cadastro de Currículo</h1>
            <p id="subtitulo">Complete suas informações</p>
            <br>
        </div>

        <form method="POST" action="form.php">

            <fieldset class="grupo">
                <div class="campo">
                    <label for="nome"><strong>Nome</strong></label>
                    <input type="text" name="nome" id="nome" required>
                </div>

                <div class="campo">
                    <label for="telefone"><strong>Telefone</strong></label>
                    <input type="text" name="telefone" id="telefone" required>
                </div>

                <div class="campo">
                    <label for="email"><strong>Email</strong></label>
                    <input type="email" name="email" id="email" required>
                </div>
            </fieldset> 

            <div class="campo">
                <label><strong>De qual lado da aplicação você desenvolve?</strong></label>
                <label>
                    <input type="checkbox" name="devweb[]" value="frontend">Front-end
                </label>
                <label>
                    <input type="checkbox" name="devweb[]" value="backend">Back-end
                </label>
                <label>
                    <input type="checkbox" name="devweb[]" value="fullstack">Fullstack
                </label>
            </div>

            <div class="campo">
                <label for="senioridade"><strong>Senioridade</strong></label>
                <select id="senioridade" name="senioridade" required>
                  <option selected disabled value="">Selecione</option>
                  <option>Júnior</option>
                  <option>Pleno</option>
                  <option>Sênior</option>
                </select>
            </div>

            <fieldset class="grupo">
                <div id="check">
                    <label><strong>Selecione as linguagens conhecidas:</strong></label><br><br>
                    <input type="checkbox" id="tecnologia1" name="linguagem[]" value="HTML">
                    <label for="tecnologia1"> HTML</label>
                    <input type="checkbox" id="tecnologia2" name="linguagem[]" value="CSS">
                    <label for="tecnologia2"> CSS</label>
                    <input type="checkbox" id="tecnologia3" name="linguagem[]" value="JavaScript">
                    <label for="tecnologia3"> JavaScript</label>
                    <input type="checkbox" id="tecnologia4" name="linguagem[]" value="PHP">
                    <label for="tecnologia4"> PHP</label>
                    <input type="checkbox" id="tecnologia5" name="linguagem[]" value="C#">
                    <label for="tecnologia5"> C#</label>
                    <input type="checkbox" id="tecnologia6" name="linguagem[]" value="Python">
                    <label for="tecnologia6"> Python</label>
                    <input type="checkbox" id="tecnologia7" name="linguagem[]" value="Java">
                    <label for="tecnologia7"> Java</label>
                </div>
            </fieldset>

            <div class="campo">
                <br>
                <label for="experiencia"><strong>Fale sobre você: </strong></label>
                <textarea rows="15" style="width: 30em" id="sobre" name="sobre"></textarea>
            </div>

            <input class="botao" type="submit" name="submit" id="submit" value="Enviar">
            

        </form>

    </body>

</html>