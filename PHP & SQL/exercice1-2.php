<?php
/**
 * Exercice effectué durant le stage d'infomaticien
 */
// DEBUG GET & POST
//var_dump($_POST);

$genders = [
    'Femme',
    'Homme',
    'Autre',
];

// CONNEXION A LA BASE DE DONNEES
try {
    $db = new PDO('mysql:host=localhost;dbname=Stage;charset=utf8', 'root', '');
    echo "<p>Connexion à la base de données établie</p>";
} catch (Exception $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// VALIDATION DES CHAMPS
if(isset($_POST['user_lastname'])) {

    $filtered_email = filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL);
    $filtered_lastname = filter_var($_POST['user_lastname'], FILTER_SANITIZE_STRING);
    $filtered_firstname = filter_var($_POST['user_firstname'], FILTER_SANITIZE_STRING);

    if($filtered_email && $filtered_firstname && $filtered_firstname) {
        $query = $db->prepare('INSERT INTO stage.clients (lastname, firstname, email, gender) values (:lastname, :firstname, :email, :gender)');

        $query->execute([
            'lastname' => $_POST['user_lastname'],
            'firstname' => $_POST['user_firstname'],
            'email' => $_POST['user_email'],
            'gender' => $_POST['user_gender']
        ]);

        echo "<h3 style='color: green'>L'utilisateur " . $filtered_lastname . " a été inscrit</h3>";
    } else {
        echo "<p style='color: red'>Veuillez remplir tous les champs</p>";
        $user_lastname = $_POST['user_lastname'];
        $user_firstname = $_POST['user_firstname'];
        $user_email = $_POST['user_email'];
    }
}

?>
<html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
    </head>
    <body>
        <form action="" method="post">
            <fieldset>
                <legend>Inscription</legend>
                <div>
                    <label for="lastname">Nom :</label>
                    <input type="text" id="lastname" name="user_lastname" value="<?= $user_lastname ?? '' ?>">
                </div>
                <div>
                    <label for="firstname">Prénom :</label>
                    <input type="text" id="firstname" name="user_firstname" value="<?= $user_firstname ?? '' ?>">
                </div>
                <div>
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="user_email" value="<?= $user_email ?? '' ?>">
                </div>
                <div>
                    <?php
                    foreach ($genders as $gender) {
                        $checked = '';
                        if (isset($_POST['user_gender']) && $_POST['user_gender'] == $gender) {
                            $checked = 'checked';
                        }
                        ?>
                        <label for="user_gender_<?= $gender; ?>"><?= $gender; ?></label>
                        <input type="radio" id="user_gender_<?= $gender ?>" name="user_gender" value="<?= $gender ?>" required <?= $checked ?>>
                    <?php
                    }
                    ?>
                </div>
                <div>
                    <button type="submit">S'inscrire</button>
                </div>
            </fieldset>
        </form>
        <div>
            <h3>Liste des clients : </h3>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Sexe</th>
                </tr>
                <?php
                $clients = $db->query("SELECT * FROM Stage.clients ORDER BY clients.id DESC LIMIT 10");
                foreach ($clients as $client) {
                    ?>
                    <tr>
                        <td><?php echo $client['lastname'] ?></td>
                        <td><?php echo $client['firstname'] ?></td>
                        <td><?php echo $client['email'] ?></td>
                        <td><?php echo $client['gender'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <h3>Filtrer les clients par pays: </h3>
            <form method="post">
                <select name="countries">
                    <?php
                    $client_countries = $db->query("SELECT * FROM Stage.countries");
                    foreach ($client_countries as $country) {
                        ?>
                        <option value="<?php echo $country['id'] ?>" ><?php echo $country['name'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <button type="submit">Choisir</button>
            </form>
            <?php
            if(isset($_POST['countries'])) {
                $clients_country_query = $db->prepare("SELECT * FROM Stage.clients WHERE clients.country_id = :id ");
                $clients_country_query->execute(['id' => $_POST['countries']]);
                $clients_country = $clients_country_query->fetchAll();
            } else {
                echo "<p>Aucun pays sélectionné</p>";
            }
            ?>
            <div>
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Sexe</th>
                    </tr>
                    <?php
                    if(isset($clients_country)) {
                        foreach ($clients_country as $client) {
                            ?>
                            <tr>
                                <td><?php echo $client['lastname'] ?></td>
                                <td><?php echo $client['firstname'] ?></td>
                                <td><?php echo $client['email'] ?></td>
                                <td><?php echo $client['gender'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
