<?php
error_reporting(E_ALL);

session_start();

function returnHome()
{
    header('Location: index.php');
    exit;
}

try {
    $dbh = new PDO('mysql:host=localhost;dbname=guestbook', 'root', '123456');

    if (isset($_REQUEST['action'])) {

        switch (trim($_REQUEST['action'])) {
            case 'comment':
                $sql = 'INSERT INTO message(name, email, comment, created) ';
                $sql .= 'VALUES (';
                $sql .= "'" . $_REQUEST['name'] . "', ";
                $sql .= "'" . $_REQUEST['email'] . "', ";
                $sql .= "'" . $_REQUEST['comment'] . "', ";
                $sql .= "'" . date('Y-m-d H:i:s') . "'";
                $sql .= ')';
                $stmt = $dbh->exec($sql);
                returnHome();
                break;
            case 'login':
                $password = $_REQUEST['password'];
                $sql = "SELECT * FROM admin WHERE password = '$password'";
                $stmt = $dbh->query($sql);
                $admin = $stmt->fetch();
                if (!$empty($admin)) {
                    $_SESSION['admin'] = true;
                }
                returnHome();
                break;
            case 'logout':
                unset($_SESSION['admin']);
                returnHome();
                break;
        }
    }

    $sql = 'SELECT * FROM message ORDER BY created DESC';
    $messages = $dbh->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Guestbook</title>
    <style>
        #wrapper {
            margin: 0 auto;
            width: 500px;
        }

        #admin-login {
            margin-bottom: 10px;
        }

        section.message {
            border: 1px solid #CCC;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div id="admin">
        <?php if (!isset($_SESSION['admin']) || $_SESSION['admin']): ?>
            <form id="admin-login" action="<?= $_SERVER['PHP_SELF'] ?>">
                <label>管理密碼：</label>
                <input type="password" name="passwd"/>
                <input type="hidden" name="action" value="admin-login"/>
                <button type="submit">登入</button>
            </form>
        <?php else: ?>
            <p>管理員您好，<a href="<?= $_SERVER['PHP_SELF'] . '?action=logout' ?>">登出</a></p>
        <?php endif ?>
    </div>
    <div id="main-body">
        <?php if ($messages): ?>
            <?php foreach ($messages as $message): ?>
                <section class="message">
                    <p><span class="name"><?= $message['name'] ?></span> -
                        <span class="email"><?= $message['email'] ?></span> -
                        <span class="created"><?= $message['created'] ?></span></p>

                    <div class="comment"><?= nl2br($message['comment']) ?></div>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="form">
        <form id="post-message" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <p class="name">
                <label>Name: </label>
                <input type="text" name="name">
            </p>

            <p class="email">
                <label>Email:</label>
                <input type="text" name="email">
            </p>

            <p class="comment">
                <label>Comment:</label>
                <textarea name="comment" rows="10" cols="50"></textarea>
            </p>

            <p>
                <button type="submit">送出</button>
            </p>
        </form>
    </div>
</div>
</body>
</html>