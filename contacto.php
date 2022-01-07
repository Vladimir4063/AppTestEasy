<?php
    header("Content-type: text/html;charset=\"utf-8\"");
    if ($_POST){
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "E-mail no válido.<br>";
        }
        if ($error != ""){
            $error = '<div class="alert alert-danger" role="alert"><p><b>Se generó un error:</b></p>' . $error . '</div>';
        } else {
			$language = $_POST['language'];
            $nombre = $_POST['Name'];
            $mail = $_POST['Email'];
            $compania = $_POST['Company'];
            $telefono = $_POST['Phone'];
            $pais = $_POST['Country'];
            $path_website = $_POST['path_website'];

            $header = 'From: ' . $mail . " \r\n";
            $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
            $header .= "Mime-Version: 1.0 \r\n";
            $header .= "Content-Type: text/plain";
            $mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
            $mensaje .= "Su e-mail es: " . $mail . " \r\n";
            $mensaje .= "Empresa: " . $compania . " \r\n";
            $mensaje .= "telefono: " . $telefono . " \r\n";
            $mensaje .= "pais: " . $pais . " \r\n";
            foreach($_POST['check_lista'] as $seleccion) 
            {
                $mensaje .= "Servicio: " . $seleccion ." \r\n";
            }
            $mensaje .= "path_website: " . $path_website . " \r\n";
            $mensaje .= "Enviado el " . date('d/m/Y', time());
            $para = 'vladimirgutierrez4063@gmail.com';
            $asunto = 'Mensaje de mi sitio web';
        if( $language === "english")
        {
            header("Location: ingles/index-en.html#formContact");
        }
        else
        {
            header("Location: index.html#formContact");
        }
        echo("Mailll");
        if (mail($para, $asunto, utf8_decode($mensaje), $header)) {
                $mensajeExito = '<div class="alert alert-success" role="alert"><p><strong>Mensaje enviado con éxito :)</strong></p></div>';    
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Mensaje sin enviar :(</strong></p></div>';  
            }
        }  
        echo("FIN");
    }
?>
