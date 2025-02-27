<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exo PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <header>
        <nav class="navbar bg-dark py-3">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1  text-white">Exo_PHP</span>
            </div>
        </nav>
    </header>
    <main>

        <?php
///// pour debuger
function debug($var){
      echo '<pre class="border border-dark bg-light text-danger fw-bold w-50 p-5 mt-5">';
            var_dump($var);
      echo'</pre>';
}

$message = "";

/////////////////////////////// Fonction error ////////////////////////////////////////
function error(string $contenu, string $class) : string {
     return 
     "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">
               $contenu
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>

     </div>";
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
    $message = error("Veuillez renseigner tout les champs", "danger");
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


        <form action="" method="post" class="p-5 bg-info">
            <h1 class="text-center fw-bold">Formulaire d'inscription</h1>
            <div class="row">
                <div class="col-4">
                    <img src="assets/img/cortina-dampezzo-9338185_1280.jpg" alt="image" width="450px" height="550px">
                </div>
                <div class="col-8">
                    <div class="col-md-6 mb-5">
                    <label for="lastName" class="form-label mb-2">Nom</label>
                        <input type="text" class="form-control fs-5" id="nom" name="nom">
                    </div>
                    <div class="col-md-6 mb-5">
                        <label for="firstName" class="form-label mb-2">Prenom</label>
                        <input type="text" class="form-control fs-5" id="prenom" name="prenom">
                    </div>
                    <div class="col-md-6 mb-5">
                        <label for="email" class="form-label mb-2">Email</label>
                        <input type="text" class="form-control fs-5" id="email" name="email" placeholder="email@exemple.com">
                    </div>
                    <div class="col-md-6 mb-5">
                        <label for="phone" class="form-label mb-2">Mot de passe</label>
                        <input type="password" class="form-control fs-5" id="mot-pass" name="mot-passe">
                    </div>
                
                    <!-- <button class="w-25 mx-auto btn btn-danger fs-5" type="submit">Se connecter</button> -->
                    <div>
                        <button class="btn btn-danger" type="submit">s'inscrire</button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <footer></footer>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>

