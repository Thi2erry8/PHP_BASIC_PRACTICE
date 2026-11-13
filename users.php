<?php

 session_start();
   if(empty($_SESSION['csrf_token'])){
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
 };
  require('database.php');

  if(!isset($_SESSION['id'])){
    header('Location: login.php');
    exit;
  }

    $stmt = $pdo->prepare('SELECT id , nom , prenom , email FROM users');
    $stmt->execute();

    $users = $stmt->fetchAll();

    ?>

<h1>Liste des utilisateurs</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($users)): ?>
        <tr>
            <td colspan="5">Aucun utilisateur trouvé.</td>
        </tr>
        <?php else: ?>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars((string)$user['id']) ?></td>
            <td><?= htmlspecialchars($user['nom'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($user['prenom'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
            <td>
                <a class="btn btn-update" href="update.php?id=<?= (int)$user['id'] ?>">UPDATE</a>

                <form action="delete.php" method="POST" style="display:inline"
                    onsubmit="return confirm('Supprimer cet utilisateur ?');">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                    <input type="hidden" name="id" value="<?= (int)$user['id'] ?>">
                    <button type="submit" class="btn btn-delete">DELETE</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>