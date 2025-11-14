Painel de Verificação — Usuários Logados (Lista Fixa)

Arquivos:
- painel.php      : Interface web. Contém a lista fixa de PCs no início do arquivo ($pcs).
- consulta.php    : Backend que consulta o PowerShell e retorna JSON com os resultados.
- check_user.ps1  : PowerShell que consulta Win32_ComputerSystem e retorna USER:<sam> | NO_USER | ERROR_CONEXAO
- style.css       : Estilos do painel.

Instruções rápidas:
1) Coloque os arquivos do ZIP no diretório do servidor web (ex: C:\xampp\htdocs\painel_users).
2) Crie a pasta C:\scripts\ e copie check_user.ps1 para lá.
3) Garanta permissão do usuário que roda o serviço web para executar PowerShell e se conectar às máquinas do domínio.
4) Teste WinRM / WMI nas máquinas de destino. O script usa Get-WmiObject (WMI). WinRM não é estritamente necessário para WMI, mas as máquinas devem aceitar consultas remotas de WMI.
5) Acesse http://seu-servidor/painel.php

Como mudar a lista de PCs:
- Edite a variável $pcs no topo de painel.php e coloque os hostnames desejados.

Segurança:
- Este painel permite executar comandos que acessam outras máquinas. Restrinja acesso ao diretório (autenticação) em produção.
- Considere usar credenciais seguras ou uma conta de serviço com permissões limitadas.

Performance:
- O painel executa uma consulta por PC sequencialmente. Para muitas máquinas, considere implementar consultas em paralelo (PowerShell Jobs) ou cache/intervalos maiores.

Suporte:
Se quiser, eu:
- Adiciono autenticação (login) no painel.
- Faço consultas em paralelo para melhorar velocidade.
- Integro com banco de dados para registro histórico.
- Ajusto para usar CredSSP/credenciais se necessário.
