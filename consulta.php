<?php
if(isset($argv[1])){ $pc = $argv[1]; } else { exit; }
$cmd = 'powershell -NoLogo -NoProfile -ExecutionPolicy Bypass -File "check_user.ps1" -PC ' . $pc;
echo trim(shell_exec($cmd));
?>
