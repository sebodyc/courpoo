<?php

namespace Application\Entity;

class Order
{
    protected string $nom;
    protected string $email;
    protected float $montant;

    public function __construct(string $nom, string $email, float $montant)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->montant = $montant;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function getTva(float $taux = 0.2): float
    {
        return $this->montant * $taux;
    }

    public function getTotal(float $taux = 0.2): float
    {
        return $this->montant * (1 + $taux);
    }
}
