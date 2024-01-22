<?php
$data = [];
include('../config.php');
$assunto = 'Nova mensagem do site';
$corpo = '';
foreach ($_POST as $key => $value) {
    $corpo .= ucfirst($key) . ": " . $value;
    $corpo .= "<hr>";
}
$info = ['assunto' => $assunto, 'corpo' => $corpo];
$mail = new Email('vps.dankicode.com', 'testes@dankicode.com', 'gui123456', 'Guilherme');
$mail->addAddress('sabrina_polazzo@outlook.com', 'sabrina');
$mail->formatarEmail($info);

header('Content-Type: application/json');

if ($mail->enviarEmail()) {
    $data['sucesso'] = true;
} else {
    $data['erro'] = true;
}

die(json_encode($data));
