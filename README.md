# Tarefas - Avaliação PHP - Finch

Projeto desenvolvido para teste 

## Como usar

- Clonar ou baixar o repositório
- Criar um banco de dados no Mysql ou Postgre
- Renomear o arquivo **.env.example** localizado na raíz do projeto para **.env**
- Editar o arquivo **.env** e adicionar as configurações do seu banco de dados, segue o exemplo.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tarefas
DB_USERNAME=root
DB_PASSWORD=
```
- Abra o terminal e entre na pasta do projeto, depois rode o comando: **php artisan migrate**. Caso ocorra algum erro verifique as suas configurações de banco estão corretas no **.env**.
- Rodar o comando **npm i** 
- Agora use o comando **php artisan serve** para startar a aplicação. Por padrão aplicação roda em *localhost:8000*, porém pode ocorrer exceções, caso isso ocorra altere os campos *APP_URL* e o *APP_PORT* no arquivo **.env**, para o endereço e porta corretos. 
- Com aplicação rodando basta acessar "http://localhost:8000"

## Métodos da API
Você pode acessar os métodos da API utilizando um programa como o Postman. A seguir estão as informações sobre cada método.

***OBS: lembre-se e colocar o endereço completo como por exemplo: http://localhost:8000/api/tarefas**

[Documentação da API](https://documenter.getpostman.com/view/2704456/S1EWPF6w)
