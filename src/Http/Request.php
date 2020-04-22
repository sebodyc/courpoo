<?php

namespace Application\Http;

require_once 'ParameterBag.php';

class Request
{
    /**
     * La méthode de la requête HTTP
     * @var string
     */

    protected string $method = 'GET';
    /**
     * Les paramètres de la requête HTTP
     * @var ParameterBag
     */
    protected ParameterBag $params;


    public function __construct()
    {

        //on met en place ma methode
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = new ParameterBag($_REQUEST);
    }

    /**
     * Vérifie la méthode HTTP de la requête
     * @param string $method Ex: "POST" ou "GET"
     * @return bool 
     */

    public function isMethod(string $methode): bool
    {
        return $this->method === strtoupper($methode);
    }

    /**
     * Retourne les paramètres de la requête HTTP
     * @return ParameterBag 
     */

    public function getParams(): ParameterBag
    {
        return $this->params;
    }

    /**
     * Retourne la méthode HTTP
     * @return string 
     */

    public function getMethod(): string
    {
        return $this->method;
    }

    public function get(string $key, int $filter = FILTER_DEFAULT, array $option = [])
    {
        if (!$this->params->has($key)) {
            return null;
        }

        //si il existe je le recuper et je le filtre avec le filtre choisi
        $value = $this->params->get($key);

        return filter_var($value, $filter, $option);
    }

    public function getNumber(string $key)
    {

        return $this->get($key, FILTER_CALLBACK, [
            'options' => fn ($value) => is_numeric($value) ? (float) $value : false
        ]);
    }
}
