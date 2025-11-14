param([string]$PC)

try {
    $user = Get-WmiObject -Class Win32_ComputerSystem -ComputerName $PC -ErrorAction Stop

    if ($user.UserName) {
        $sam = ($user.UserName -split "\\\\")[-1]
        Write-Output $sam
    } else {
        Write-Output "SEM_USUARIO"
    }
}
catch {
    Write-Output "ERRO"
}
