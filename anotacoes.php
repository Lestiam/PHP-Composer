<?php
//Composer é um gerenciador de dependências PHP.
//Ele guarda as dependências dentro do projeto.
//Se quisermos uma dependência global, devemos usar o global command.
//Um pacote sempre segue a nomenclatura: <vendor>/<name>.
//As meta-informações de uma dependência ficam salvas no arquivo composer.json.
//O comando composer init inicializa o composer.json.


//No vídeo anterior, ao digitar composer install a nova dependência (Symfony DomCrawler) não foi instalada. O pacote só
// foi buscado pelo composer ao executar composer update.
//
//Isso se dá pelo seguinte fato: O comando composer install lê o arquivo composer.lock e instala as exatas dependências
// lá definidas. No nosso caso, nós já tinhamos o arquivo criado, então o composer.lock foi lido e como não havia alterações, nada foi instalado.
//
//Já o comando composer update lê o arquivo composer.json, instala as dependências mais atuais dentro das restrições definidas e atualiza o composer.lock.
//
//Sendo assim, em um projeto em andamento (tendo o arquivo composer.lock), para instalarmos uma nova dependência precisamos
// executar o composer require ou após adicionar a dependência no arquivo composer.json executar o comando composer update.




//composer.json = esse cara define a estrutura do nosso projeto e quais suas dependencias, mas se tiver uma dependencia com uma versão mais recente, ele traz ela tbm
//composer.lock = traz as exatas versoes das dependencias que eu trouxe ali e armazena algumas informações a mais. Nós não mexemos nesse composer


//O composer possui um repositório central de pacotes: https://packagist.org/
//É possível configurar repositórios de outras fontes (do github, zip etc)
//O pacotes guzzlehttp/guzzle serve para executar requisições HTTP de alto nível
//Para instalar uma dependência (pacote) basta executar: composer require <nome do pacote>
//Composer guarda as dependências e dependências transitivas na pasta vendor do projeto
//O nome e versão da dependências fica salvo no arquivo composer.json
//O comando require adiciona automaticamente a dependência no composer.json
//O comando composer install automaticamente baixa todas as dependências do composer.lock (ou do composer.json, caso o .lock não exista ainda)
//O arquivo composer.lock define todas as versões exatas instaladas
//O composer já gera um arquivo autoload.php para facilitar o carregamento das dependências
//Basta usar require vendor/autoload.php


//todos os namespaces que começarem com "Alura", serão mapeados para a pasta "src". é meu autoloader interno
// "autoload": {
//            "classmap": [
//                "./Teste.php" //traz uma classe de fora, que não utiliza a PSR4
//            ],
//            "files": ["./functions.php"],//traz uma funçaõ de fora
//            "psr-4": {
//                "Alura\\BuscadorDeCursos\\": "src/" //mapeia as psrs colocando todos os namesspaces em um diretório
//            }
//        }
//por exemplo, se eu tentasse encontrar uma classe chamada Alura\BuscadorDeCursos\Service\ClasseTeste, este arquivo estaria dentro de srx/Service/ClasseTeste.php
//pois o namesSpace padrão Alura\BuscadorDeCursos\ iria ser transformado na pasta raiz "src" e é adicionado o ".php" no final


//"scripts": {
//        "test": "phpunit tests\\TestBuscadorDeCursos.php"
//    } //crio um comando para o terminal de comando, ao inves de digitar vendor\bin\phpunit tests\TestBuscadorDeCursos;php, eu só digito "composer test" que o programa roda toda essa query


