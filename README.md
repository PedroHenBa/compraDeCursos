<h1>Api com codeIgniter</h1>

- Uma pequena api escrita em php

<h1>Instalação</h1>

```bash
git clone https://github.com/PedroHenBa/compraDeCursos.git
```

<h1>Iniciando</h1>

<h2>Criar um usuário</h2>

para criar um usuário, mande uma request post para `http://localhost:8080/user/register`

```bash
{
    "email" : "example@email.com",
    "senha": "example"
}
```

<h2>Login</h2>

para fazer login mande uma request post para `http://localhost:8080/user/login`

```bash
{
    "email": "example@email.com",
    "senha" : "example"
}
```

<h2>Listar usuários</h2>

para listar, mande uma request get para `http://localhost:8080/users`

```bash
[
    {
        "id": "4",
        "email": "pedro",
        "senha": "1234"
    },
]
```

<h1>Categorias</h1>

<h2>Criar categoria</h2>

para criar uma categoria, mande uma request post para `http://localhost:8080/categoria`

```bash
{
    "nome" : "exemplo",
}
```

<h2>Listar categorias</h2>

para listar, mande uma request get para `http://localhost:8080/categorias`

```bash
[
    {
        "id": "1",
        "nome": "teste"
    }
]
```

<h1>Cursos</h1>

<h2>Criar cursos</h2>

para criar um curso, mande uma request post para `http://localhost:8080/curso`

```bash
{
    "name": "teste1",
    "nomeCategoria" : "teste1",
    "preco" : "50",
    "descricao" : "teste1",
    "imagemUrl" : "teste.png"
}
```

<h2>Pesquisar curso por nome</h2>

para pesquisar um curso por nome, mande uma request get para `http://localhost:8080/curso/$nome`

```bash
[
    {
        "id": "teste1",
        "name": "teste1",
        "nomeCategoria": "teste1",
        "preco": "50",
        "descricao": "teste1",
        "imagemUrl": null
    }
]
```

<h2>Listar curso por categoria</h2>

para listar cursos pela categoria, mande uma request get para `http://localhost:8080/curso/categoria/$nomeCategoria`


```bash
[
    {
        "id": "teste1",
        "name": "teste1",
        "nomeCategoria": "teste1",
        "preco": "50",
        "descricao": "teste1",
        "imagemUrl": null
    },
    {
        "id": "teste2",
        "name": "teste2",
        "nomeCategoria": "teste1",
        "preco": "50",
        "descricao": "teste2",
        "imagemUrl": null
    }
]
```

<h2>Listar Cursos</h2>

para listar cursos, mande uma request get para `http://localhost:8080/cursos`

```bash
[
    {
        "id": "teste1",
        "name": "teste1",
        "nomeCategoria": "teste1",
        "preco": "50",
        "descricao": "teste1",
        "imagemUrl": null
    },
    {
        "id": "teste2",
        "name": "teste2",
        "nomeCategoria": "teste3",
        "preco": "50",
        "descricao": "teste2",
        "imagemUrl": null
    }
]
```

<h1>Carrinho</h1>

<h2>Criar carrinho</h2>

para criar um carrinho, mande uma request post para `http://localhost:8080/carrinho`

```bash
{
    "idUser" : "1",
}
```

<h2>Adicionar curso ao carrinho</h2>

para adicionar curso ao carrinho, mande uma request post para `http://localhost:8080/carrinho/adicionar`

```bash
{
    "idCurso" : "6",
    "idCarrinho" : "8"
}
```

<h2>Remover item do carrinho</h2>

para remover curso do carrinho, mande uma request delete para `http://localhost:8080/carrinho/remover`

```bash
{
    "idCurso" : "6",
    "idCarrinho" : "8"
}
```

<h2>Listar carrinhos</h2>

para listar os carrinhos, mande uma request get para `http://localhost:8080/carrinhos`

```bash
[
    {
        "id": "6",
        "idUser": "4"
    }
]
```

<h2>Detalhar carrinho</h2>

para detalhar o carrinho, mande uma request get para `http://localhost:8080/carrinho/show/$id`


```bash
[
    {
        "id": "6",
        "name": "teste1",
        "nomeCategoria": "teste1",
        "preco": "100",
        "descricao": "",
        "imagemUrl": null
    },
    {
        "total": 100
    }
]
```