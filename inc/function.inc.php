<?php
///// pour debuger
function debug($var){
      echo '<pre class="border border-dark bg-light text-danger fw-bold w-50 p-5 mt-5">';
            var_dump($var);
      echo'</pre>';
}
if (!empty($_POST)) {
  // on va vérifier si un champ est vide 
  $verif = true;
  foreach($_POST as $key => $value) {
    if (empty(trim($value))) {
        $verif = false;
    }
  }
  if($verif === false){
//     $info = alert("Veuillez renseigner tout les champs", "danger");
  }
}
//////////////////////////// Fonction pour la connexion à la base de données //////////////////

//Constante du server
define("DBHOST", "localhost");

// // constante de l'utilisateur de la BDD du serveur en local => root
define("DBUSER", "root");

// // constante pour le mot de passe de serveur en local => pas de mot de passe
define("DBPASS", "");
// Créer une base de donnée


// // Constante pour le nom de la BDD
define("DBNAME", "club");

function connexionBdd(): object
{

      $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

      //Grâce à PDP on peut lever une exception (une erreur) si la connexion à la BDD ne se réalise pas(exp: suite à une faute au niveau du nom de la BDD) et par la suite si elle cette erreur est capté on lui demande d'afficher une erreur

      try { // dans le try on vas instancier PDO, c'est créer un objet de la classe PDO (un élment de PDO)
           
            $pdo = new PDO($dsn, DBUSER, DBPASS);
            //On définit le mode d'erreur de PDO sur Exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On définit le mode de "fetch" par défaut
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // je vérifie la connexion avec ma BDD avec un simple echo
            // echo "Je suis connecté à la BDD";
      } catch (PDOException $e) {  // PDOException est une classe qui représente une erreur émise par PDO et $e c'est l'objetde la clase en question qui vas stocker cette erreur

            die("Erreur : " . $e->getMessage()); // die d'arrêter le PHP et d'afficher une erreur en utilisant la méthode getmessage de l'objet $e
      }
      //le catch sera exécuter dès lors on aura un problème da le try

      return $pdo;
}

// debug($pdo);

// function createTableJoueurs(): void
// {
//       $cnx = connexionBdd();
//       $sql = "CREATE TABLE IF NOT EXISTS joueurs(id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, nom VARCHAR (50) NOT NULL, prenom VARCHAR (50) NOT NULL,  email VARCHAR(100) NOT NULL, mdp VARCHAR(250) NOT NULL";
//       $cnx->exec($sql);

// }



?>