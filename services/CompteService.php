<?php
require_once "./models/Compte.php";
require_once "./models/CompteRepository.php";
class CompteService{

    private CompteRepository $compteRepository;

    public function __construct(){
        $this->compteRepository =new CompteRepository();
    }

    public function listerCompte():array{
        return  $this->compteRepository->selectAllCompte();
    }

    public function addCompte(Compte $compte):void{
        //$this->compteRepository->selectCompteByNum($compte->getNum());
        $this->compteRepository->insertCompte($compte);
    }

    public function SearchCompteByNum (string $numero):Compte|null{
        return $this->compteRepository->selectCompteByNum($numero);
    }
}