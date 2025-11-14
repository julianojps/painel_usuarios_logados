<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(300); // Define o limite para 300 segundos (5 minutos)


$pcs = ["CSTI81-DF","CSTI8-DF","CSTI7-DF","CSTI6-DF","CSTI5-DF","CSTI4-DF","CSTI3-DF","CSTI2-DF","CSTI1-DF","CSTI14-DF","CSTI13-DF","CSTI12-DF"];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta http-equiv="refresh" content="10">
</head>
<body>

<h2>Painel de Usuários Logados</h2>

<table>
<tr><th>PC</th><th>Usuário</th><th>Status</th></tr>

<?php foreach($pcs as $pc): ?>

<?php 
$cmd = 'powershell -NoLogo -NoProfile -ExecutionPolicy Bypass -File "check_user.ps1" -PC '.$pc;
$resp = trim(shell_exec($cmd));
?>

<tr>
    <td><?= $pc ?></td>
    <td><?= $resp ?></td>
    <td>
        <?php
            if ($resp == "SEM_USUARIO" || $resp == "ERRO" || $resp=="") {
                echo "🔴 Offline / Sem usuário";
            } else {
                echo "🟢 Ativo";
            }
        ?>
    </td>
</tr>

<?php endforeach; ?>
</table>

</body>
</html>
