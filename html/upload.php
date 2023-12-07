<?php
    $client_id = "b8c02929102d33d";
    $statusMsg = $valErr = '';
    $status = 'danger';
    $imgurData = array();

    if (isset($_POST['submit'])){
        $statusMsg = $valErr = '';
        if (empty($_FILES['file']['name'])){
            $valErr .= 'sem imagem';
          }
    
          if (empty($valErr)){
            $filename = basename($_FILES['file']['name']);
            $filetype = pathinfo($filename, PATHINFO_EXTENSION);

            
            $image_source = file_get_contents($_FILES['file']['tmp_name']);
            $post_fields = array('image' => base64_encode($image_source));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID '. $client_id));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
            $response = curl_exec($ch);
            echo $response;
            if ($response === false) {
                echo 'Erro cURL: ' . curl_error($ch);
            }
            curl_close($ch);
    
            $responseArr = json_decode($response);
            
            if (!empty($responseArr->data->link)){
              $imgurData = $responseArr;
              
              $status = 'success';
              $statusMsg = 'Imagem enviada para o Imgur com sucesso';
    
              $imglink = $imgurData->data->link;
            } else {
                $statusMsg = 'Erro ao enviar imagem, tente novamente em instantes.';
            }
        }
    }
?>