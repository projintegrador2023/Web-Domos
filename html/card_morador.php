<?php
echo '
        <div class="rounded col-12 d-flex flex-column my-2">
            <div class="bg-0491a3 d-flex justify-content-between accordion-cabecalho"> 
                <p class="m-2"> Nome: ' . $nome_morador .'</p>
            </div>
            <div id="lista" class="bg-ffffff accordion-conteudo">
                <p class="p-2 mb-0 color-0491a3 border-bottom"> Bloco: '. $bloco . '</p>
                <p class="p-2 mb-0 color-0491a3 border-bottom"> Número: '. $numero . ' </p>
                <p class="p-2 mb-0 color-0491a3 border-bottom"> Cpf: '. $cpf .' </p>
                <p class="p-2 mb-0 color-0491a3 border-bottom"> E-mail: '. $email_usuario .' </p>
            </div>
          </div>';
?>
