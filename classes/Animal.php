<?php

abstract class Animal
{
    protected $longueur;
    protected $largeur;
    protected $hauteur;
    protected $poids;
    protected $couleurDominante;
    protected $genre;
    protected $locomotion;
    protected $nom;
    protected $appareilRespiratoire = true;
    protected $appareilDigestif = true;
    protected $appareilExcreteur = true;
    protected $appareilCirculatoire = true;
    protected $appareilNerveux = true;

    protected function seNourrir()
    {
        echo "Je bouffe";
    }
}
