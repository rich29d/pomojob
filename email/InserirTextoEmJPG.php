<?php
// Carregar imagem já existente no servidor
$imagem = imagecreatefromjpeg( "img/header.jpg" );
/* @Parametros
 * "foto.jpg" - Caminho relativo ou absoluto da imagem a ser carregada.
 */
 
// Cor de saída
$cor = imagecolorallocate( $imagem, 255, 255, 255 );
/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 * 255 - Cor vermelha ( RGB )
 * 255 - Cor verde ( RGB )
 * 255 - Cor azul ( RGB )
 * -- No caso acima é branco
 */
 
// Texto que será escrito na imagem
$nome = urldecode( $_GET['nome'] );
/* @Parametros
 * $_GET['nome'] - Texto que será escrito
 */
 
// Escrever nome
//$font = imageloadfont('fonts/bree-bold-webfont.ttf');
imagettftext($imagem, 20, 0, 55, 265, $cor, "fonts/ariblk.ttf",  utf8_decode($_GET['nome']));
//imagestring( $imagem, $font, 60, 200, utf8_decode("Olá, " . $nome), $cor );
/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 * 5 - tamanho da fonte. Valores de 1 a 5
 * 15 - Posição X do texto na imagem
 * 515 - Posição Y do texto na imagem
 * $nome - Texto que será escrito
 * $cor - Cor criada pelo imagecolorallocate
 */
 
// Header informando que é uma imagem JPEG
header( 'Content-type: image/jpeg' );
 
// eEnvia a imagem para o borwser ou arquivo
imagejpeg( $imagem, NULL, 100 );
/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 * NULL - O caminho para salvar o arquivo.
          Se não definido NULL a imagem será mostrado no browser.
 * 80 - Qualidade da compresão da imagem.
 */