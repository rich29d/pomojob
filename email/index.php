<?php
header("Access-Control-Allow-Origin: *");
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
//require_once("phpmailer/class.phpmailer.php");
require 'phpmailer/PHPMailerAutoload.php';
// Inicia a classe PHPMailer
$mail = new PHPMailer();
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Host = "smtp.mayb.be"; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Port = 587; 
$mail->Username = 'envio@mayb.be'; // Usuário do servidor SMTP
$mail->Password = 'enviar123'; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "envio@mayb.be"; // Seu e-mail
$mail->FromName = "Teste maybbe"; // Seu nome
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAddress('teste@firee.com.br', 'Teste Firee');
//$mail->AddAddress('dennis@firee.com.br');
//$mail->AddAddress('diego@firee.com.br');
$mail->AddAddress('viniciusteixeira.m.s@gmail.com');
$mail->AddAddress('diego.sousa@e9midia.com.br');
//$mail->AddAddress('associado@wellness-brasil.com');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "maybbe"; // Assunto da mensagem
//  var_dump($_POST);
extract($_POST);
$msg = "";
$msg.="<table>
  <tr>
    <th colspan='3'><img width='800' src='http://mayb.be/email/header.jpg'></th>
  </tr>
  <tr>
    <td>mensagem:</td>
    <td>$mensagem</td>
    <td></td>
  </tr>

  <tr>
    <td>ID Vencedor:</td>
    <td>$id</td>
    <td></td>
  </tr>
  <tr>
    <td>Nome Vencedor:</td>
    <td>$name</td>
    <td></td>
  </tr>
  <tr>
    <td>E-mail Vencedor:</td>
    <td>$email</td>
    <td></td>
  </tr>
 <tr>
    <td>ID Obra:</td>
    <td><a href='http://mayb.be/admin/form_leilao/$id_obra'>$id_obra</a></td>
    <td></td>
  </tr>
  <tr>
    <td>Lance vencedor:</td>
    <td>$preco</td>
    <td></td>
  </tr>
   <th colspan='3'><img src='http://mayb.be/email/footer.jpg'></th>
   </tr>
   <tr>
 
</table>";
/*
  <th colspan='3' align='left'>
    O pagamento no valor de R$ 35,00 feito via paypal foi registrado e está em análise com a instituição financeira.<br>
  Para consultar se o pagamento foi aprovado acesse o <a href='https://www.paypal.com/signin/'>paypal.com</a> utilizando os seus dados.</br>
  <br>O titular da conta também receberá um e-mail do próprio Paypal confirmando essa transação.</th>
   </tr>
*/
$mail->Body = "$msg";
//$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("$fotoCropAtual", "$NomefotoCropAtual.jpg");  // Insere um anexo
// Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();
// Exibe uma mensagem de resultado
if ($enviado) {
  echo "E-mail enviado com sucesso!";
} else {
  echo "Não foi possível enviar o e-mail.";
  echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}




?>

