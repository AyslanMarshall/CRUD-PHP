<?php 
require 'contato.class.php';
$contato = new Contato();

if(!empty($_POST['email']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $contato->adicionar($email, $nome);
    header("Location: index.php");
}

?>
<h1>ADICIONAR</h1>

<form method="POST">
    Nome:<br>
    <input type="text" name="nome"><br><br>

    Email:<br>
    <input type="email" name="email"><br><br>

    <button type="submit">adicionar</button>
</form>