<?php
require_once "Compte.php";
class CompteRepository {
    
    public function selectAllCompte():array{
        $sql="select * from compte";
        //1-connexion a la Bd
        try {
            $host = 'localhost:3306';
            $dbname = 'gestioncompte';
            $username = 'root';
            $password = '';
            $charset = 'utf8mb4'; 
            $dsn="mysql:host=$host;dbname=$dbname;charset=$charset";
            //ouvrir la connexion
            $pdo = new PDO($dsn, $username, $password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

            ]);

            //2-Execute la requete
            $stmt=$pdo->query($sql);
            $comptes=[];
            while($row=$stmt->fetch()){
                $compte=new Compte();
                $compte->setId($row['id']);
                $compte->setNumero($row['numero']);
                $compte->setDateCreation($row['dateCreation']);
                $compte->setSolde($row['solde']);
                $comptes[]=$compte;
                
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
        //1-connexion a la Bd
        //2-Execute la requete
        //3-Recuperer les donnes sous forme de tableau
        //4-Convertir les donnes en object de type Compte

        return null;
    }

    public function insertCompte(Compte $compte):int{
        $sql="insert into";
        //1-connexion a la Bd
        //2-Execute la requete
        //3-Recuperer les donnes sous forme de tableau
        //4-Convertir les donnes en object de type Compte

        return 0;
    }
}