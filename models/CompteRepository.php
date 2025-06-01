<?php
require_once "Compte.php";
require_once "./config/Database.php";
class CompteRepository {
    private Database $database;
    public function __construct(){
        $this->database = new Database();
    }
    public function selectAllCompte():array{
        $sql="select * from compte";
        //1-connexion a la Bd
        try {
            ;

            //2-Execute la requete
            $stmt=$this->database->getPdo()->query($sql);
            $comptes=[];
            while($row=$stmt->fetch()){
                $comptes[]=Compte::toCompte($row);
                
            }
            return $comptes;
            //3-Recuperer les donnes sous forme de tableau
            //4-Convertir les donnes en object de type Compte
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit; 
        }
        
        

        return []; 
    }

    public function selectCompteById(int $id):Compte|null{
        $sql="select * from compte where id=$id";
        try {
            //2-Execute la requete
            $stmt=$this->database->getPdo()->query($sql);
            $row = $stmt->fetch();
            return Compte::toCompte($row);
            //3-Recuperer les donnes sous forme de tableau
            //4-Convertir les donnes en object de type Compte
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit; 
        }
        return null;
    }

    public function selectCompteByNum(string $num):Compte|null{
        $sql="select * from compte where numero='$num'";
        try {
            //2-Execute la requete
            $stmt=$this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Compte::toCompte($row);
            }
            //3-Recuperer les donnes sous forme de tableau
            //4-Convertir les donnes en object de type Compte
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit; 
        }
        return null;
    }

    public function insertCompte(Compte $compte):int{
        $sql="INSERT INTO `compte` ( `numero`, `dateCreation`, `solde`) VALUES ('".$compte->getNumero()."', '2025-06-08', '".$compte->getSolde()."')";
        $nbreCompteInsert=0;
        try {
            

            //2-Execute la requete
            //3-Recuperer les donnes sous forme de tableau
            $nbreCompteInsert=$this->database->getPdo()->exec($sql);
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit; 
        }
        return $nbreCompteInsert;
    }
}