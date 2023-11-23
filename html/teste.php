<?php 
    require_once "db/DB_Endereco.php";
    $endereco = new Endereco();

    $endereco->set_cep('29160596');
    $endereco->set_estado('ES');
    $endereco->set_cidade('Serra');
    $endereco->set_bairro('Hélio Ferraz');
    $endereco->set_rua('R. Rachel Vitalino de Brito');
    $endereco->set_numero('110');
    $endereco->set_complemento('');

    $endereco->insert();
?>