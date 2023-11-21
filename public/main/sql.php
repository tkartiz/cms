<html>

<head>
    <title>PHP TEST</title>
</head>

<body>

    <?php

    $dsn = 'mysql:dbname=cms;charset=utf8;host=127.0.0.1:3308';
    $user = 'cmsuser';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
        print('接続に成功しました。<br>');
        
        foreach ( $pdo->query ( 'select * from announces' ) as $row ) {
            echo '<p>';
            echo $row ['id'], ' : ';
            echo $row ['content'], ' : ';
            echo '</p>';
        }
    } catch (PDOException $e) {
        print('Error:' . $e->getMessage());
        die();
    }

    $dbh = null;

    ?>

</body>

</html>