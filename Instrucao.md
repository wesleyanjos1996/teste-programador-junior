# Instruções:

## Utilizei no meu ambiente de desenvolvimento:
- Sistema Operacional Windows 11 64bits
- PHP 7.4.33 nts 64bits
- MySQL 8.3 64bits
- Visual Studio Code 1.87.1 64bits

## Instrução de uso: 
- Pelo Explorador de Arquivos do computador, copie o caminho da pasta do projeto.
- Cole o caminho em um promp de comando ou powershell. Lembre-se de adicionar o comando cd antes do caminho.
- Exemplo (Não adicione as aspas): 'cd C:\Users\wesle\Downloads\programador_junior'
- Ao ser direcionado para raiz do projeto, digite o seguinte comando (Sem as aspas): 'php -S localhost:3000'
- Espere iniciar o servidor php localmente.
- Ao iniciar, digite em no navegador web na barra de url localhost:3000.
- Para importar o dump, no Workbreach vá para a guia Server, Data Import, selecione o arquivo dump e clique no botão Start Import.
- OBS: Na pasta sql, eu adicionei um dump do banco de dados e um script caso queira optar usar comandos sql.
- A Classe Ramal se encontra em lib/Ramal.php

## Mudanças:
- Adicionei informação de data e hora atual e a também data e hora da última atualização do AJAX.
- Adicionei verificações no AJAX para cada card se exibido conforme se status.
- Status escrito abaixo do nome do usuário do ramal

## OBS
Existe uma pasta php com Database.php não terminado, é possével verificar os dados existente nas tabelas ramais e filas que está no Dump da pasta SQL. Mude o nome de usuário e senha para o mesmo do ambiente de teste para conseguir acessar.