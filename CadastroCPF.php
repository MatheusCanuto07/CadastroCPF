<?php

    function chama_endereco($cep){
        //Tira os caracteres que não são númericos e os substitui por espaço vazio
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);
        return $xml;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        
        <label for="">Digite CEP</label>
        <input type="text" name="cep">
        <button name="buscar">Buscar Cep</button>

        <?php isset($_POST['buscar']) ? $endereco = chama_endereco($_POST['cep']) : ''?>
        <label for="">Rua</label>
        <input type="text" value="<?= isset($_POST['buscar']) ? $endereco -> logradouro : '' ?>">

        <label for="">Número</label>
        <input type="number">

        <label for="">Bairro</label>
        <input type="text" value="<?=isset($_POST['buscar']) ? $endereco -> bairro : '' ?>">

        <label for="">Cidade</label>
        <input type="text" value="<?=isset($_POST['buscar']) ? $endereco -> localidade : '' ?>">

        <label for="">UF</label>
        <input type="text" value="<?=isset($_POST['buscar']) ? $endereco -> uf : '' ?>">
    </form>
  
</body>
</html>