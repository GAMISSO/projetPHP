<?php
class CompteCheque extends Compte {
    private const Frais=0.08;

    public function __construct(float $solde=0){
        parent::__construct( $solde );
    }

    public  function retrait(Transaction $transaction){
        $montant=self::Frais*$transaction->getMontant();
        $this->solde-=$montant;
        $this->addTransaction($transaction);
    }

    public  function depot(Transaction $transaction){
        $montant=self::Frais*$transaction->getMontant();
        $this->solde+=$montant;
        $this->addTransaction($transaction);
    }

}
