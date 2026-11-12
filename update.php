<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

require 'database.php';


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit('Invalid user ID');
}

$stmt = $pdo->prepare(
    "SELECT id, nom, Prenom, email FROM users WHERE id = ?"
);

$stmt->execute([$id]);

$user = $stmt->fetch();

if (!$user) {
    exit('User not found');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');

    $errors = [];

    if (mb_strlen($nom) < 3) {
        $errors[] = "Name must contain at least 3 characters";
    }

    if (mb_strlen($prenom) < 3) {
        $errors[] = "Firstname must contain at least 3 characters";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }

    if (empty($errors)) {

        try {
            $stmt = $pdo->prepare(
                "UPDATE users
                 SET nom = ?, Prenom = ?, email = ?
                 WHERE id = ?"
            );

            $stmt->execute([$nom, $prenom, $email, $id]);

            header('Location: users.php');
            exit;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            $errors[] = "Unable to update user";
        }
    }

    $user['nom'] = $nom;
    $user['Prenom'] = $prenom;
    $user['email'] = $email;
}

?>

<h2>Update User</h2>

<?php foreach ($errors ?? [] as $error): ?>
<p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php endforeach; ?>

<form method="POST">

    <input type="text" name="nom" value="<?= htmlspecialchars($user['nom'], ENT_QUOTES, 'UTF-8') ?>" required>

    <input type="text" name="prenom" value="<?= htmlspecialchars($user['Prenom'], ENT_QUOTES, 'UTF-8') ?>" required>

    <input type="email" name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" required>

    <button type="submit">Update</button>

</form>