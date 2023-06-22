<?php

require  'vendor/autoload.php'; //o composer já traz o autoload pré definido nesta pasta, basta importar
//require 'src/Buscador.php'; //precisei importar pq esta classe foi eu que fiz. Removi este cara pois configuramos um autoloader na pasta composer.json

//Teste::metodo(); fiz para testar um mapeamento manual
//exit();

use Alura\BuscadorDeCursos\Buscador;
use Alura\BuscadorDeCursos\Teste;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);// cria meu cliente http e todas as requisições do meu client serão feitas para a alura
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler); //com o client e o crawler eu crio este buscador
$cursos = $buscador->buscar('/cursos-online-programacao/php'); //pega o inicio da URL da "base_url" lá do client e faz uma requisição para este caminho (a partir do buscador)

foreach ($cursos as $curso) { //faz o loop nos cursos
    echo exibeMensagem($curso); //pega o texto do nome do curso (é um array de strings)
}