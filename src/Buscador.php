<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler) //meu construtor recebe um cliente http e um crawler do dom
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url) : array // método buscar, a partir de uma URL e vou retornar um array de cursos
    {
        $resposta = $this->httpClient->request('GET', $url); //método que queremos e o site que queremos buscar. É a nossa requisição
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html); //define o html depois

        $elementosCursos = $this->crawler->filter('span.card-curso__nome'); //aqui eu falo que quero só o nome dos cursos, é um span que eu peguei ao inspecionar o próprio site da Alura. Também estou falando que eu estou pegando os elementos dos cursos
        $cursos = []; //adiciono estes elementos para um array de cursos

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent; //de cada um dos elementos, eu só quero pegar o texto e este conteudo eu vou jogar pro meu array
        }

        return $cursos; //vai ser um array de strings
    }
}