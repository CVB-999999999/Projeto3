# Projeto3
Tema 14 - Desenvolvimento de Website para a promoção de uma empresa de Explicações

## Indice
- [Descrição](#descricao)
- [Ferramentas Usadas](#ferramentas)
- [Funcionalidades Programadas](#funcionalidades)
- [Instalação](#instalacao)

## Descrição <a name="descricao"></a>
Desenvolvimento de Website para a promoção de uma empresa de Explicações. Onde os 
alunos possam aceder aos conteúdos publicados pelos explicadores. O administrador tem 
que gerir todos os acessos, criar permissões para os explicadores e para os alunos.

## Ferramentas Usadas <a name="ferramentas"></a>
* Laravel
* PHP
* Javascript
* MySQL

## Funcionalidades Programadas <a name="funcionalidades"></a>
#### Alunos
* Download de PDFs
* Submissão da resolução dos PDFs
* Verificação do resultado da avaliação
#### Admin
* Crição de utilizadores
* Alteração de permissões
* Criação de disicplinas
* Edição de disciplinas
* Inscrição de utilizadores a disciplinas
#### Explicador
* Upload dos PDFs
* Download das resoluções
* Submissão da nota da resolução

## Instalação <a name="instalacao"></a>
1. Seguir as instruções na [Documentação do Laravel](https://laravel.com/docs/8.x/installation) para instalar os pré-requesitos
2. Configurar o [MySQL](https://www.mysql.com/) e colocar as credenciais de acesso no ficheiro .env
3. Preencher a informação de email no .env para o sistema poder enviar emails
4. Abrir um terminal na localização do projeto e executar `php artisan make:fresh --seed` e `php artisan storage:link`
5. Para iniciar, executar no terminal previamente aberto `php artisan serve`
