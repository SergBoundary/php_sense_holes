<?php
$db = mysqli_connect ($servername, $username, $password, $database);

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

?>