# Documentação Complementar da Disciplina

## Projeto Desenvolvido com Aplicação CRUD

Este projeto consiste em um **Sistema de Gerenciamento de Concessionária** desenvolvido em PHP com MySQL, implementando operações CRUD (Create, Read, Update, Delete) para gerenciamento de:

- **Funcionários**: Cadastro, listagem, edição e exclusão de funcionários
- **Clientes**: Cadastro, listagem, edição e exclusão de clientes
- **Marcas**: Cadastro, listagem, edição e exclusão de marcas de veículos
- **Modelos**: Cadastro, listagem, edição e exclusão de modelos de veículos
- **Vendas**: Cadastro, listagem, edição e exclusão de vendas realizadas

### Estrutura CRUD Implementada

Para cada módulo, foram implementadas as quatro operações básicas:

1. **CREATE (Criar)**: Formulários de cadastro que inserem novos registros no banco de dados
2. **READ (Ler)**: Páginas de listagem que exibem todos os registros cadastrados
3. **UPDATE (Atualizar)**: Formulários de edição que modificam registros existentes
4. **DELETE (Deletar)**: Funcionalidade que remove registros do banco de dados

---

## Pseudocódigo

### Pseudocódigo - Operação de Cadastro de Funcionário

```
INÍCIO
    CONECTAR ao banco de dados MySQL
    RECEBER ação do formulário
    SE ação = "cadastrar" ENTÃO
        RECEBER nome_funcionario do formulário
        RECEBER email_funcionario do formulário
        RECEBER telefone_funcionario do formulário
        
        CRIAR comando SQL INSERT
        EXECUTAR comando SQL
        
        SE comando executado com sucesso ENTÃO
            EXIBIR mensagem: "Cadastrou com sucesso!"
            REDIRECIONAR para página de listagem
        SENÃO
            EXIBIR mensagem: "Não Cadastrou!"
            REDIRECIONAR para página de listagem
        FIM SE
    FIM SE
FIM
```

### Pseudocódigo - Operação de Listagem de Funcionários

```
INÍCIO
    CONECTAR ao banco de dados MySQL
    CRIAR comando SQL SELECT * FROM funcionario
    EXECUTAR consulta SQL
    OBTER quantidade de resultados
    
    SE quantidade > 0 ENTÃO
        EXIBIR tabela com cabeçalhos
        ENQUANTO houver registros FAÇA
            EXIBIR ID do funcionário
            EXIBIR nome do funcionário
            EXIBIR email do funcionário
            EXIBIR telefone do funcionário
            EXIBIR botões de ação (Editar/Excluir)
            AVANÇAR para próximo registro
        FIM ENQUANTO
        FECHAR tabela
    SENÃO
        EXIBIR mensagem: "Não encontrou resultado"
    FIM SE
FIM
```

### Pseudocódigo - Operação de Edição de Funcionário

```
INÍCIO
    CONECTAR ao banco de dados MySQL
    RECEBER id_funcionario da URL
    CRIAR comando SQL SELECT para buscar funcionário pelo ID
    EXECUTAR consulta SQL
    OBTER dados do funcionário
    
    SE ação = "editar" ENTÃO
        RECEBER dados atualizados do formulário
        CRIAR comando SQL UPDATE
        EXECUTAR comando SQL
        
        SE comando executado com sucesso ENTÃO
            EXIBIR mensagem: "Editou com sucesso!"
            REDIRECIONAR para página de listagem
        SENÃO
            EXIBIR mensagem: "Não foi possível editar!"
            REDIRECIONAR para página de listagem
        FIM SE
    FIM SE
FIM
```

### Pseudocódigo - Operação de Exclusão de Funcionário

```
INÍCIO
    CONECTAR ao banco de dados MySQL
    RECEBER ação = "excluir"
    RECEBER id_funcionario da URL
    
    CRIAR comando SQL DELETE FROM funcionario WHERE id = id_funcionario
    EXECUTAR comando SQL
    
    SE comando executado com sucesso ENTÃO
        EXIBIR mensagem: "Excluiu com sucesso!"
        REDIRECIONAR para página de listagem
    SENÃO
        EXIBIR mensagem: "Não foi possível excluir!"
        REDIRECIONAR para página de listagem
    FIM SE
FIM
```

### Pseudocódigo - Sistema de Roteamento (index.php)

```
INÍCIO
    CONECTAR ao banco de dados
    RECEBER parâmetro 'page' da URL
    
    SWITCH (página solicitada)
        CASO 'cadastrar-funcionario':
            INCLUIR arquivo cadastrar-funcionario.php
        CASO 'listar-funcionario':
            INCLUIR arquivo listar-funcionario.php
        CASO 'editar-funcionario':
            INCLUIR arquivo editar-funcionario.php
        CASO 'salvar-funcionario':
            INCLUIR arquivo salvar-funcionario.php
        CASO 'cadastrar-cliente':
            INCLUIR arquivo cadastrar-cliente.php
        CASO 'listar-cliente':
            INCLUIR arquivo listar-cliente.php
        // ... outros casos ...
        CASO PADRÃO:
            EXIBIR mensagem de boas-vindas
    FIM SWITCH
FIM
```

---

## Fluxograma

### Fluxograma - Operação CRUD Completa de Funcionário

```
                    ┌─────────────┐
                    │   INÍCIO    │
                    └──────┬──────┘
                           │
                           ▼
                    ┌──────────────────┐
                    │  CONECTAR AO BD  │
                    └──────┬───────────┘
                           │
                           ▼
                    ┌────────────────────┐
                    │ RECEBER AÇÃO (page)│
                    └──────┬─────────────┘
                           │
        ┌──────────────────┼──────────────────┐
        │                  │                  │
        ▼                  ▼                  ▼
   ┌────────┐        ┌────────┐        ┌────────┐
   │CADASTRO│        │ LISTAR │        │ EDITAR │
   └───┬────┘        └───┬────┘        └───┬────┘
       │                 │                 │
       ▼                 ▼                 ▼
┌─────────────┐  ┌─────────────┐  ┌─────────────┐
│ RECEBER     │  │ SELECT *    │  │ SELECT pelo │
│ DADOS FORM  │  │ FROM        │  │ ID          │
└──────┬──────┘  └──────┬──────┘  └──────┬──────┘
       │                 │                 │
       ▼                 ▼                 ▼
┌─────────────┐  ┌─────────────┐  ┌─────────────┐
│ INSERT INTO │  │ EXIBIR      │  │ RECEBER     │
│ TABLE       │  │ TABELA      │  │ DADOS FORM  │
└──────┬──────┘  └──────┬──────┘  └──────┬──────┘
       │                 │                 │
       ▼                 ▼                 ▼
┌─────────────┐         │          ┌─────────────┐
│ SUCESSO?    │         │          │ UPDATE SET  │
└───┬─────┬───┘         │          └──────┬──────┘
    │SIM  │NÃO          │                 │
    │     │             │                 ▼
    │     │             │          ┌─────────────┐
    │     │             │          │ SUCESSO?    │
    │     │             │          └───┬─────┬───┘
    │     │             │          SIM │     │ NÃO
    │     │             │             │     │
    ▼     ▼             ▼             ▼     ▼
┌──────────┐      ┌────────┐    ┌──────────┐
│MENSAGEM  │      │EXIBIR  │    │MENSAGEM  │
│SUCESSO   │      │RESULT. │    │SUCESSO   │
└────┬─────┘      └───┬────┘    └────┬─────┘
     │                │              │
     └────────────────┼──────────────┘
                      │
                      ▼
              ┌───────────────┐
              │ REDIRECIONAR  │
              │ PARA LISTAGEM │
              └───────┬───────┘
                      │
                      ▼
                 ┌─────────┐
                 │   FIM   │
                 └─────────┘

         ┌──────────────┐
         │   EXCLUIR    │
         └──────┬───────┘
                │
                ▼
         ┌──────────────┐
         │ DELETE WHERE │
         │ ID = ?       │
         └──────┬───────┘
                │
                ▼
         ┌──────────────┐
         │  SUCESSO?    │
         └───┬─────┬────┘
         SIM │     │ NÃO
             │     │
             ▼     ▼
      ┌──────────┐
      │ MENSAGEM │
      └────┬─────┘
           │
           ▼
      ┌──────────┐
      │  FIM     │
      └──────────┘
```

### Fluxograma - Fluxo de Navegação do Sistema

```
                    ┌─────────────┐
                    │  index.php  │
                    └──────┬──────┘
                           │
                           ▼
                    ┌──────────────────┐
                    │  Menu Principal  │
                    └──────┬───────────┘
                           │
        ┌──────────────────┼──────────────────┬──────────────────┐
        │                  │                  │                  │
        ▼                  ▼                  ▼                  ▼
   ┌─────────┐       ┌─────────┐       ┌─────────┐       ┌─────────┐
   │FUNCIONÁR│       │ CLIENTE │       │  MARCA  │       │  VENDA  │
   └────┬────┘       └────┬────┘       └────┬────┘       └────┬────┘
        │                 │                 │                 │
   ┌────┴────┐       ┌────┴────┐       ┌────┴────┐       ┌────┴────┐
   │Cadastrar│       │Cadastrar│       │Cadastrar│       │Cadastrar│
   │Listar   │       │Listar   │       │Listar   │       │Listar   │
   │Editar   │       │Editar   │       │Editar   │       │Editar   │
   │Excluir  │       │Excluir  │       │Excluir  │       │Excluir  │
   └────┬────┘       └────┬────┘       └────┬────┘       └────┬────┘
        │                 │                 │                 │
        └─────────────────┼─────────────────┴─────────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │  salvar-*.php│
                    └──────┬──────┘
                           │
                           ▼
                    ┌─────────────┐
                    │  BANCO DE   │
                    │   DADOS     │
                    └─────────────┘
```

---

## Especificação em Linguagem Algorítmica (PHP)

### Algoritmo 1: Cadastrar Funcionário

```php
ALGORITMO cadastrar_funcionario
VAR
    nome_funcionario: TEXTO
    email_funcionario: TEXTO
    telefone_funcionario: TEXTO
    sql: TEXTO
    res: BOOLEANO
INÍCIO
    // Receber dados do formulário
    nome_funcionario <- $_POST['nome_funcionario']
    email_funcionario <- $_POST['email_funcionario']
    telefone_funcionario <- $_POST['telefone_funcionario']
    
    // Construir comando SQL
    sql <- "INSERT INTO funcionario (nome_funcionario, email_funcionario, telefone_funcionario)
            VALUES ('" + nome_funcionario + "', '" + email_funcionario + "', '" + telefone_funcionario + "')"
    
    // Executar comando SQL
    res <- conn->query(sql)
    
    // Verificar resultado
    SE res = VERDADEIRO ENTÃO
        ESCREVA "Cadastrou com sucesso!"
        REDIRECIONAR para '?page=listar-funcionario'
    SENÃO
        ESCREVA "Não Cadastrou!"
        REDIRECIONAR para '?page=listar-funcionario'
    FIM SE
FIM
```

### Algoritmo 2: Listar Funcionários

```php
ALGORITMO listar_funcionarios
VAR
    sql: TEXTO
    res: RESULTADO
    qtd: INTEIRO
    row: REGISTRO
INÍCIO
    // Construir comando SQL
    sql <- "SELECT * FROM funcionario"
    
    // Executar consulta
    res <- conn->query(sql)
    
    // Obter quantidade de resultados
    qtd <- res->num_rows
    
    // Verificar se há resultados
    SE qtd > 0 ENTÃO
        ESCREVA "Encontrou " + qtd + " resultado(s)"
        ESCREVA início da tabela
        ESCREVA cabeçalhos da tabela
        
        // Loop para exibir cada registro
        ENQUANTO res->fetch_object() FAÇA
            row <- próximo registro
            ESCREVA row->id_funcionario
            ESCREVA row->nome_funcionario
            ESCREVA row->email_funcionario
            ESCREVA row->telefone_funcionario
            ESCREVA botões de ação
        FIM ENQUANTO
        
        ESCREVA fim da tabela
    SENÃO
        ESCREVA "Não encontrou resultado."
    FIM SE
FIM
```

### Algoritmo 3: Editar Funcionário

```php
ALGORITMO editar_funcionario
VAR
    id_funcionario: INTEIRO
    nome_funcionario: TEXTO
    email_funcionario: TEXTO
    telefone_funcionario: TEXTO
    sql: TEXTO
    res: BOOLEANO
INÍCIO
    // Receber ID do funcionário
    id_funcionario <- $_REQUEST['id_funcionario']
    
    // Receber dados atualizados
    nome_funcionario <- $_POST['nome_funcionario']
    email_funcionario <- $_POST['email_funcionario']
    telefone_funcionario <- $_POST['telefone_funcionario']
    
    // Construir comando SQL UPDATE
    sql <- "UPDATE funcionario SET 
            nome_funcionario='" + nome_funcionario + "', 
            email_funcionario='" + email_funcionario + "', 
            telefone_funcionario='" + telefone_funcionario + "' 
            WHERE id_funcionario=" + id_funcionario
    
    // Executar comando SQL
    res <- conn->query(sql)
    
    // Verificar resultado
    SE res = VERDADEIRO ENTÃO
        ESCREVA "Editou com sucesso!"
        REDIRECIONAR para '?page=listar-funcionario'
    SENÃO
        ESCREVA "Não foi possível editar!"
        REDIRECIONAR para '?page=listar-funcionario'
    FIM SE
FIM
```

### Algoritmo 4: Excluir Funcionário

```php
ALGORITMO excluir_funcionario
VAR
    id_funcionario: INTEIRO
    sql: TEXTO
    res: BOOLEANO
INÍCIO
    // Receber ID do funcionário
    id_funcionario <- $_REQUEST['id_funcionario']
    
    // Construir comando SQL DELETE
    sql <- "DELETE FROM funcionario WHERE id_funcionario=" + id_funcionario
    
    // Executar comando SQL
    res <- conn->query(sql)
    
    // Verificar resultado
    SE res = VERDADEIRO ENTÃO
        ESCREVA "Excluiu com sucesso!"
        REDIRECIONAR para '?page=listar-funcionario'
    SENÃO
        ESCREVA "Não foi possível excluir!"
        REDIRECIONAR para '?page=listar-funcionario'
    FIM SE
FIM
```

### Algoritmo 5: Sistema de Roteamento Principal

```php
ALGORITMO roteamento_sistema
VAR
    pagina: TEXTO
INÍCIO
    // Conectar ao banco de dados
    INCLUIR 'config.php'
    
    // Receber parâmetro de página
    pagina <- $_REQUEST['page']
    
    // Roteamento baseado na página solicitada
    ESCOLHA pagina
        CASO 'cadastrar-funcionario':
            INCLUIR 'cadastrar-funcionario.php'
        CASO 'listar-funcionario':
            INCLUIR 'listar-funcionario.php'
        CASO 'editar-funcionario':
            INCLUIR 'editar-funcionario.php'
        CASO 'salvar-funcionario':
            INCLUIR 'salvar-funcionario.php'
        CASO 'cadastrar-cliente':
            INCLUIR 'cadastrar-cliente.php'
        CASO 'listar-cliente':
            INCLUIR 'listar-cliente.php'
        CASO 'editar-cliente':
            INCLUIR 'editar-cliente.php'
        CASO 'salvar-cliente':
            INCLUIR 'salvar-cliente.php'
        // ... outros casos para Marca, Modelo, Venda ...
        CASO PADRÃO:
            ESCREVA "Seja Bem Vindo a Concessionaria Auto Drive!"
					"Encontre o carro perfeito para a sua proxima estrada🚗"
    FIM ESCOLHA
FIM
```

### Algoritmo 6: Gerenciamento de Ações CRUD

```php
ALGORITMO gerenciar_acoes
VAR
    acao: TEXTO
INÍCIO
    // Receber ação do formulário
    acao <- $_REQUEST['acao']
    
    // Executar ação correspondente
    ESCOLHA acao
        CASO 'cadastrar':
            EXECUTAR algoritmo_cadastrar()
        CASO 'editar':
            EXECUTAR algoritmo_editar()
        CASO 'excluir':
            EXECUTAR algoritmo_excluir()
    FIM ESCOLHA
FIM

SUBALGORITMO algoritmo_cadastrar()
    // Implementação do cadastro
FIM SUBALGORITMO

SUBALGORITMO algoritmo_editar()
    // Implementação da edição
FIM SUBALGORITMO

SUBALGORITMO algoritmo_excluir()
    // Implementação da exclusão
FIM SUBALGORITMO
```

---

## Descrição das Tabelas do Banco de Dados

### Tabela: funcionario
- `id_funcionario` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nome_funcionario` (VARCHAR(100), NOT NULL)
- `email_funcionario` (VARCHAR(100))
- `telefone_funcionario` (VARCHAR(20))

### Tabela: cliente
- `id_cliente` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nome_cliente` (VARCHAR(100), NOT NULL)
- `cpf_cliente` (CHAR(11))
- `email_cliente` (VARCHAR(100))
- `telefone_cliente` (VARCHAR(20))
- `endereco_cliente` (VARCHAR(100))
- `dt_nasc_cliente` (DATE)

### Tabela: marca
- `id_marca` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nome_marca` (VARCHAR(45), NOT NULL)

### Tabela: modelo
- `id_modelo` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nome_modelo` (VARCHAR(45), NOT NULL)
- `cor_modelo` (VARCHAR(20))
- `ano_modelo` (YEAR)
- `tipo_modelo` (VARCHAR(45))
- `marca_id_marca` (INT, FOREIGN KEY)

### Tabela: venda
- `id_venda` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `data_venda` (VARCHAR(45))
- `valor_venda` (DECIMAL(10,2))
- `cliente_id_cliente` (INT, FOREIGN KEY)
- `funcionario_id_funcionario` (INT, FOREIGN KEY)
- `modelo_id_modelo` (INT, FOREIGN KEY)

---

## Observações Técnicas

1. **Conexão com Banco de Dados**: Utiliza MySQLi para conexão orientada a objetos
2. **Roteamento**: Sistema de roteamento simples baseado em parâmetro GET 'page'
3. **Validação**: Validações básicas implementadas nos formulários HTML
4. **Interface**: Utiliza Bootstrap para criação de interface responsiva
5. **Segurança**: Para produção, recomenda-se implementar prepared statements e validação de entrada

---

**Desenvolvido por: Sabrina Ribeiro**  
**Projeto: Sistema de Gerenciamento de Concessionária Auto Drive** 
**Data: 2025**
