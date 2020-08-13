## Requisito
  - necessário ter o [docker](https://docs.docker.com/install/linux/docker-ce/centos/) e o [docker-compose](https://github.com/docker/compose/) instalados;
  - Para instalar pode seguir o [Instalação do docker](./instalação_docker.md)

## Conteúdo
  - Aplicação Symfony 3.4 para servir de exemplo na instalação
  - Configuração de docker-compose com
    - [PHP7](https://pt.wikipedia.org/wiki/PHP)
        - [php:7.4-fpm](https://hub.docker.com/_/php)
        - pdo_mysql
    - [Nginx](https://pt.wikipedia.org/wiki/Nginx)
        - [nginx:1.19.1](https://hub.docker.com/_/nginx)
        - conf.d/app.conf para exemplo
    - [MySQL](https://pt.wikipedia.org/wiki/MySQL)
        - [mysql:8](https://hub.docker.com/_/mysql)
        - Inicia o banco com um `.sql`

    - [Composer](https://getcomposer.org)
        - [composer:1](https://hub.docker.com/_/composer)
        - Configurado para instalar as dependencias da App de exemplo


## Instalação Aplicação
  - Codigo Fonte
    ```bash
    cd /var/www/;
    git clone https://github.com/yurigauermarques/AmbientePHP.git;
    ```
  - Configuração de host
    - editar o `hosts`
    - adicione o conteudo no final
      ```bash
      127.0.0.1 app-docker.localhost
      ```

## Inicializar os containers
  - Subir o serviço
      ```bash
      docker-compose up -d --build
      ```
  - Derrubar o serviço
      ```bash
      docker-compose down
      ```
  - Se der erro para olhar os logs
      ```bash
      docker-compose logs;
      docker-compose logs nomecontainer;
      ```


## Pendencias
  - php.ini
  - yarn
  - Modsecurity
    - [Dockerhub](https://hub.docker.com/r/owasp/modsecurity)
    - [Dockerfile com a V3](https://github.com/coreruleset/modsecurity-docker/blob/master/v3-nginx/Dockerfile)
  - Traefik
    -[Docker - Traefik](https://docs.traefik.io/v1.7/configuration/backends/docker)
    -[Documentação do Traefik](https://docs.traefik.io/v1.7/#1-launch-traefik-tell-it-to-listen-to-docker)


## Exemplos de como utilizar o Composer
- Exemplo de como informar o caminho absoluto no `Windows`:
    ```bash
    docker run --rm --interactive --tty --volume  C:\Projetos\AmbientePHP\:/app composer create-project symfony/framework-standard-edition my_project_name;
    ```
- Instalar um Projeto `Symfony 3.4` com `Composer`
  - No Windows
    ```bash
    docker run --rm --interactive --tty --volume  C:\Projetos\AmbientePHP\:/app composer create-project symfony/framework-standard-edition my_project_name;
    ```
  - No Linux
    ```bash
    docker run --rm --interactive --tty --volume  /var/www/AmbientePHP/:/app composer create-project symfony/framework-standard-edition my_project_name;
    ```
- Executar comandos úteis do `Composer`
    ```bash
    docker run --rm --interactive --tty --volume  C:\Projetos\AmbientePHP\app\:/app composer install;
    docker run --rm --interactive --tty --volume  C:\Projetos\AmbientePHP\app\:/app composer update
    ```

## Exemplos úteis
- Exemplo de como atribuir valores para *variáveis de ambiente* direto na linha de comando para substituir o `.env`:
    ```bash
    export MAILER_USER=TESTE;
    export MYSQL_USER=userPrompt;
    ```
