<?php require 'connectdb.php'; ?>

<?php
function add_user($nm, $em, $pw) {
    global $db;

    $query = "INSERT INTO users (name, email, pw) VALUES (:name, :email, :pw)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $nm);
    $statement->bindValue(':email', $em);
    $statement->bindValue(':pw', $pw);

    $statement->execute();
    $statement->closeCursor();
}

function add_workout($name, $desc, $date) {
    global $db;

    $query = "INSERT INTO user_workouts (workout_name, workout_date, description, user_name) VALUES (:name, :date, :desc, :user_name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':desc', $desc);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':user_name', $_SESSION['user']);
    $statement->execute();
    $statement->closeCursor();
}
?>
