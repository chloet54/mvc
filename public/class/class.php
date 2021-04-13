<?php

    class User{
        private $id_user;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $avatar;
        private $date_naissance_utilisateur;
        private $password_utilisateur;

        
        public function id_user(){return $this->id_user;}
        public function nom_utilisateur(){return $this->nom_utilisateur;}
        public function prenom_utilisateur(){return $this->prenom_utilisateur;}
        public function mail_utilisateur(){return $this->mail_utilisateur;}
        public function avatar(){return $this->avatar;}
        public function date_naissance_utilisateur(){return $this->date_naissance_utilisateur;}
        public function password_utilisateur(){return $this->password_utilisateur;} 
        

        public function setId_user($id){
            $this->id_user=(int) $id;
        }
        public function setNom_utilisateur($name){
            $this->nom_utilisateur=$name;
        }
        public function setPrenom_utilisateur($surname){
            $this->prenom_utilisateur=$surname;
        }
        public function setMail_utilisateur($mail){
            $this->mail_utilisateur=$mail;
        }
        public function setAvatar($avat){
            $this->avatar=$avat;
        }
        public function setDate_naissance_utilisateur($date){
            $this->date_naissance_utilisateur=$date;
        }
        public function setPassword_utilisateur($password_utilisateur){
            $this->password_utilisateur=$password_utilisateur;
        }

        public function hydrate( array $donnees){
            foreach($donnees as $key => $value){
                $method='set'.ucfirst($key);
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }
    }

    class UserManager{
        private $bdd;

        public function setDb(PDO $bdd){
            $this->bdd=$bdd;
        }

        public function __construct($bdd){
            $this->setDb($bdd);
        }

        public function add(User $user){
            $req=$this->bdd->prepare('INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, mail_utilisateur, date_naissance_utilisateur, password_utilisateur) VALUES(:nom_utilisateur, :prenom_utilisateur, :mail_utilisateur, :date_naissance_utilisateur, :password_utilisateur)');
            
            $req->bindValue(':nom_utilisateur', $user->nom_utilisateur(),PDO::PARAM_STR);
            $req->bindValue(':prenom_utilisateur', $user->prenom_utilisateur(),PDO::PARAM_STR);
            $req->bindValue(':mail_utilisateur',$user->mail_utilisateur());
            $req->bindValue(':date_naissance_utilisateur',$user->date_naissance_utilisateur(),PDO::PARAM_STR);
            $req->bindValue(':password_utilisateur',$user->password_utilisateur(),PDO::PARAM_STR);

            $req->execute();
        }

        public function delete(User $user){
            $this->bdd->exec('DELETE FROM utilisateur WHERE id_user='.$user->id_user());
        }

        public function get($id){
            $id = (int) $id;

            $req = $this->bdd->prepare('SELECT * FROM utilisateur WHERE id_user = ?');
            $req->execute(array($id));
            $donnees=$req->fetch(PDO::FETCH_ASSOC);
            
            $user = new User();
            $user->hydrate($donnees);
            return $user;
        }
        public function getAll(){
            $users = [];

            $req = $this->bdd->query('SELECT * FROM utilisateur');

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $user = new User();
                $user->hydrate($donnees);
                $users[] = $user;

            }
            return $users;
        }
        public function update(User $user){
            $req = $this->bdd->prepare('UPDATE utilisateur SET nom_utilisateur = :nom_utilisateur, prenom_utilisateur = :prenom_utilisateur, mail_utilisateur = :mail_utilisateur, avatar = :avatar, date_naissance_utilisateur = :date_naissance_utilisateur, password_utilisateur = :password_utilisateur WHERE id_user = :id_user');

            $req->bindValue(':id_user', $user->id_user(),PDO::PARAM_INT);
            $req->bindValue(':nom_utilisateur', $user->nom_utilisateur(),PDO::PARAM_STR);
            $req->bindValue(':prenom_utilisateur', $user->prenom_utilisateur(),PDO::PARAM_STR);
            $req->bindValue(':mail_utilisateur',$user->mail_utilisateur());
            $req->bindValue(':avatar',$user->avatar());
            $req->bindValue(':date_naissance_utilisateur', $user->date_naissance_utilisateur());
            $req->bindValue(':password_utilisateur',$user->password_utilisateur(),PDO::PARAM_STR);

            $req->execute();

        }

        public function updateAvatar(User $user){
            $req = $this->bdd->prepare('UPDATE utilisateur SET avatar = :avatar WHERE id_user = :id_user');
            $req->bindValue(':avatar',$user->avatar());

            $req->execute();
        }

        public function login($email){
            $req = $this->bdd->prepare('SELECT * FROM utilisateur WHERE mail_utilisateur =?');
            $req->execute(array($email));
            if($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $user = new User();
                $user->hydrate($donnees);
                return $user;
            }else{
                return false;
            }
        }
    }
?>