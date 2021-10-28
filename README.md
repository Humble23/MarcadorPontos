
<h1>Desafio TICTO - Vaga DESENVOLVEDOR PHP</h1>

<p>Para a resolução do desafio proposto, foram utilizadas as seguintes tecnologias:
<ul>
    <li><strong>Laravel 8</strong> - Utilizando simples implementações da camadas repository e service com intuito de encapsular algumas regras genéricas do crud facilitando a legibilidade e reutilização do código</li>
    <li><strong>AlpineJS</strong> - Para facilitar a implementação de alguns comportamentos de reatividade simples</li>
    <li><strong>AdminLTE 3</strong> - Todo o painel foi construído em cima do AdminLTE 3 com intuito de agilizar o desenvolvimento, colocando o foco na implementação das regras de negócio</li>
    <li><strong>Tailwind</strong> - Apesar do AdminLTE vim com o bootstrap optei também pela utilização do tailwind, as suas classes utilitárias facilitam bastante quando queremos fazer alguns ajustes finos na interface sem a necessidade de ficar sempre revisitando os arquivos css/sass</li>
</ul>

<h2>Como rodar a aplicação local:</h2>

<h3>Instalando as dependências</h3>

Para a instalação das dependências do php rode

<pre>$ composer install</pre>

Para a instalação das dependências do javascript rode

<pre>$ npm install ou yarn install</pre>

<h3>Preparando o banco de dados</h3>

<p>Crie um banco mysql vazio e execute as migrations</p>

<pre>$ php artisan migrate</pre>

<p>Logo após rode a seed para criação dos usuários base do painel</p>

<pre>$ php artisan db:seed</pre>

<p>Serão criado dois usuários, um administrador e um funcionário subordinado a ele:</p>

As credenciais de acesso para esses usuários são:

<strong>Administrador:</strong>
<pre>
<label><strong>email:</strong> administrador@ticto.com</label>
<label><strong>senha:</strong> admin@vaga</label>
</pre>

<strong>Funcionário:</strong>
<pre>
<label><strong>email:</strong> edilsonfernandes312@gmail.com</label>
<label><strong>senha:</strong> edilson@dev</label>
</pre>

<pre>PS: Opcionalmente pode ser realizado a importação do dump (BANCODEDADOS.sql) que se encontra na raiz do projeto que possuí alguns dados previamente cadastrados</p> 
