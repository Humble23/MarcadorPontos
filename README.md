# Desafio TICTO - Vaga DESENVOLVEDOR PHP

Para a resolução do desafio proposto, foram utilizadas as seguintes tecnologias:

*   **Laravel 8** - Utilizando simples implementações da camadas repository e service com intuito de encapsular algumas regras genéricas do crud facilitando a legibilidade e reutilização do código
*   **AlpineJS** - Para facilitar a implementação de alguns comportamentos de reatividade simples
*   **AdminLTE 3** - Todo o painel foi construído em cima do AdminLTE 3 com intuito de agilizar o desenvolvimento, colocando o foco na implementação das regras de negócio
*   **Tailwind** - Apesar do AdminLTE vim com o bootstrap optei também pela utilização do tailwind, as suas classes utilitárias facilitam bastante quando queremos fazer alguns ajustes finos na interface sem a necessidade de ficar sempre revisitando os arquivos css/sass

## Como rodar a aplicação local:

### Instalando as dependências

Para a instalação das dependências do php rode

```$ composer install```

Para a instalação das dependências do javascript rode

```$ npm install ou yarn install```

### Preparando o banco de dados

Crie um banco mysql vazio e execute as migrations

```$ php artisan migrate```

Logo após rode a seed para criação dos usuários base do painel

```$ php artisan db:seed```

Serão criado dois usuários, um administrador e um funcionário subordinado a ele:

As credenciais de acesso para esses usuários são:

**Administrador:**
```
**email:** administrador@ticto.com
**senha:** admin@vaga
```

**Funcionário:**

```**email:** edilsonfernandes312@gmail.com
**senha:** edilson@dev</label>```

PS: Opcionalmente pode ser realizado a importação do dump (BANCODEDADOS.sql) que se encontra na raiz do projeto que possuí alguns dados previamente cadastrados