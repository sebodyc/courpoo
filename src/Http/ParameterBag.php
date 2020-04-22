<?php

namespace Application\Http;

/**
 * 
 * surcouche d'utilisation de tableau associatif
 */



class ParameterBag
{
    /**
     * le tableau sur lequel on travaille
     * @var array<string,mixed>
     */
    protected  array $arr = [];

    /**
     * constructeur de la classe accepte le tableau sur lequel on va traviller
     * @param array<string,mixed>
     * 
     */

    public function __construct(array $array)
    {
        $this->arr = $array;
    }
    /**
     * permet de savoir si le tableau contien une information (key)
     * il va recevoir la clef recherchee il renvoi true si trouve false si non
     */

    public function has(string $key)
    {

        if (array_key_exists($key, $this->arr)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * retourne la valeur dune clef donnee ou la valeur par defaut
     * @param string key clef quon recherche
     * @param mixed $default la valeur retournee si defaut
     * @param mixed la valeur correspondant a la clef ou default si rien
     */

    public function get(string $key, $default = false)
    {

        if ($this->has($key)) {

            return $this->arr[$key];
        }
    }

    /**
     * permet d'ajouter ou modifier un element du tableau 
     */

    public function set(string $key, $value): void
    {

        $this->arr[$key] = $value;
    }
}
