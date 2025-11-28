# Sistema de Gerenciamento de Concessionária - Sabrina Ribeiro

## Breve Descrição do Trabalho

Este projeto consiste em um sistema web CRUD (Create, Read, Update, Delete) desenvolvido em PHP para gerenciamento de uma concessionária de veículos. O sistema permite o cadastro, listagem, edição e exclusão de funcionários, clientes, marcas, modelos e vendas.

O sistema foi desenvolvido utilizando:
- **PHP** para a lógica de programação e interação com o banco de dados
- **MySQL** como banco de dados relacional
- **Bootstrap** para interface responsiva e moderna
- **MySQLi** para conexão e manipulação de dados

O sistema possui uma arquitetura modular com páginas separadas para cada operação CRUD, facilitando a manutenção e expansão do código.

## Instruções de Instalação

### Pré-requisitos

Antes de instalar o sistema, certifique-se de ter os seguintes softwares instalados:

- **XAMPP** (ou similar: WAMP, LAMP, MAMP) contendo:
  - PHP 7.0 ou superior
  - MySQL 5.7 ou superior
  - Apache Server

### Passo a Passo

1. **Clone ou baixe o projeto**
   - Extraia os arquivos do projeto para a pasta `htdocs` do XAMPP (geralmente em `C:\xampp\htdocs\`)

2. **Configure o banco de dados**
   - Inicie o XAMPP e ative os serviços Apache e MySQL
   - Acesse o phpMyAdmin através do navegador: `http://localhost/phpmyadmin`
   - Crie um novo banco de dados ou importe o arquivo `bancodedados.sql`
   - Se preferir importar:
     - No phpMyAdmin, selecione "Importar"
     - Escolha o arquivo `bancodedados.sql` do projeto
     - Clique em "Executar"

3. **Configure as credenciais de conexão**
   - Abra o arquivo `config.php`
   - Verifique e ajuste, se necessário, as seguintes configurações:
     ```php
     define('HOST', 'localhost');
     define('USER', 'root');
     define('PASS', '');
     define('BASE', 'concessionaria');
     define('PORT', 3307);
     ```
   - **Importante**: Ajuste a porta do MySQL caso seja diferente (padrão é 3306)
   - Ajuste o usuário e senha do MySQL se necessário

4. **Verifique a estrutura do projeto**
   - Certifique-se de que todos os arquivos PHP estão na mesma pasta
   - As pastas `css` e `js` devem conter os arquivos do Bootstrap

## Passos para Execução

1. **Inicie os serviços do XAMPP**
   - Abra o painel de controle do XAMPP
   - Inicie o serviço **Apache**
   - Inicie o serviço **MySQL**

2. **Acesse o sistema**
   - Abra seu navegador web
   - Digite o endereço: `http://localhost/projetos/index.php`
   - Ou simplesmente: `http://localhost/projetos/`

3. **Utilize o sistema**
   - O sistema abrirá na página inicial
   - Use o menu de navegação para acessar as diferentes funcionalidades:
     - **Funcionário**: Cadastrar e listar funcionários
     - **Cliente**: Cadastrar e listar clientes
     - **Marca**: Cadastrar e listar marcas de veículos
     - **Modelo**: Cadastrar e listar modelos de veículos
     - **Venda**: Cadastrar e listar vendas realizadas

4. **Funcionalidades disponíveis**
   - **Cadastrar**: Adicionar novos registros no sistema
   - **Listar**: Visualizar todos os registros cadastrados
   - **Editar**: Modificar informações dos registros existentes
   - **Excluir**: Remover registros do sistema

### Observações Importantes

- Certifique-se de que a porta 3307 (ou a porta configurada) está disponível para o MySQL
- O banco de dados deve estar criado antes de acessar o sistema
- Em caso de erro de conexão, verifique as configurações no arquivo `config.php`
- Para desenvolvimento, mantenha os serviços Apache e MySQL ativos durante o uso do sistema
