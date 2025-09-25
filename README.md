# MVC-Cuidados-de-Plantas
Trabalho - Aplicações para Internet - MVC Cuidados de Plantas

Sistema web em PHP utilizando o padrão MVC (Model-View-Controller) para gerenciar plantas domésticas, usuários e cuidados.
Inclui CRUD completo para Plantas, Usuários e Cuidados, com layout simples e consistente.

Estrutura do Projeto:

mvcPlantas/
├── app/
│ ├── controllers/ # Controladores (PlantaController, UsuarioController, CuidadoController)
│ ├── dao/ # DAOs para acesso ao banco de dados
│ ├── models/ # Models (Planta, Usuario, Cuidado)
│ └── views/ # Views (HTML + CSS)
│ ├── css/ # Arquivos CSS: home.css, form.css, listar.css
│ ├── plantas/ # Formulários e lista de plantas
│ ├── usuarios/ # Formulários e lista de usuários
│ └── cuidados/ # Formulários e lista de cuidados
├── index.php # Arquivo de entrada do projeto
├── mvcplantas.sql # Dump do banco de dados (para importar no MySQL)
└── README.md # Documentação do projeto

Funcionalidades

CRUD completo para Plantas, Usuários e Cuidados.

Relacionamento entre tabelas (usuarios, plantas, cuidados) via foreign keys.


Pré-requisitos

XAMPP (Apache + MySQL)

Como rodar localmente
Baixar o projeto

No GitHub, clique em Code → Download ZIP

Extraia a pasta em:

C:\xampp\htdocs\mvcPlantas

Criar o banco de dados

Abra phpMyAdmin

Clique em Novo → nomeie o banco como mvcplantas

Clique em Importar → selecione o arquivo mvcplantas.sql → Executar

Isso criará todas as tabelas e relacionamentos necessários.

Configurar conexão com o banco

Abra app/dao/MySQLSingleton.php e ajuste conforme seu MySQL:

private $host = 'localhost';
private $dbname = 'mvcplantas';
private $user = 'root';
private $pass = '';

Acessar a aplicação

No navegador, acesse:

http://localhost/mvcPlantas/


Arquivo SQL (mvcplantas.sql)

Contém:

Criação do banco mvcplantas

Tabelas: plantas, usuarios, cuidados

Índices, AUTO_INCREMENT e foreign keys
