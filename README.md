<h1>Desafio para Estágio - Desenvolvedor Laravel PHP</h1>
<h3>Descrição</h3>
<p>Este projeto é uma aplicação web desenvolvida com Laravel 10+ e PHP 8+, que implementa um sistema de cadastro de usuários com confirmação de e-mail via token numérico de 6 dígitos, além de autenticação e um CRUD completo de usuários.</p>

<h3>Tecnologias Utilizadas</h3>
<ul>
    <li>Laravel 12</li>
    <li>PHP 8</li>
    <li>MySQL</li>
    <li>Mailtrap</li>
    <li>Bootstrap</li>
</ul>

<h3>Rodando o Projeto</h3>
<h4>Clone o projeto e entre na pasta</h4>
<p>git clone https://github.com/lleandrogon/CRUD-Next-Opinion.git</p>
<p>cd CRUD-Next-Opinion</p>

<h4>Instale as dependências no terminal</h4>
<p>composer install</p>

<h4>Gere o seu próprio arquivo .env e configure um banco de dados<h4>
<p>cp .env.example .env</p>

<h4>Execute as migrations</h4>
<p>php artisan migrate</p>

<h4>Crie uma conta no mailtrap para receber os emails</h4>
<p>O email pode ser feito no site da mailtrap: https://mailtrap.io/</p>

<h4>Edite os campos MAILs no .env</h4>
<p>O Mailtrap tem um campo chamada "Email Testing" lá estão todas as configurações do seu Mailtrap, copie o que está lá e coloque nos campos correspondentes no arquivo .env</p>

<h4>Rode a aplicação principal</h4>
<p>php artisan serve</p>

<h4>Por fim rode esse comando para o envio de emails no mailtrap</h4>
<p>php artisan queue:work</p>