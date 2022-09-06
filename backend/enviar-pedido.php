<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
include './Carrinho.class.php';
include './Item.class.php';


if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through

        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'mariaeduardamb1928@gmail.com';                     //SMTP username

        $mail->Password = 'lfvopgvnmvkchsnz';                               //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('mariaeduardamb1928@gmail.com', 'Eduarda');
        $mail->addAddress('mariaeduardamb1928@gmail.com', 'EduardaAddress');     //Add a recipient
        $mail->addReplyTo('mariaeduardamb1928@gmail.com', 'EduardaReply');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Novo email da Confeitaria";

        $body = "Pedido feito através do site, segue informações abaixo: <br> <br>";
        $body .= "Nome: " . $_POST['nome'] . "<br>";
        $body .= "Sobrenome: " . $_POST['sobrenome'] . "<br>";
        $body .= "Email: " . $_POST['email'] . "<br>";
        $body .= "Endereço: " . $_POST['endereco'] . "<br> <br>";
        $body .= "Segue informações dos itens abaixo: <br> <br>";
        
        $carrinho = new Carrinho();
        $itens_carrinho = $carrinho->list();
        foreach ($itens_carrinho as $item_carrinho) {
          $item = new Item();
          $item = $item->get_by_id($item_carrinho['item_id'])[0];
          $body .= "Item: " . $item['nome'] . " <br>";
          $body .= "Quantidade: " . $item_carrinho['quantidade'] . " <br> <hr/> <br>";
        }

        $mail->Body = $body;
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
    } finally {
        header("location: http://localhost/confeitaria-duda/frontend/index.html");
    }
} else {
    echo "Erro ao enviar e-mail, acesso não foi via formulário";
}
