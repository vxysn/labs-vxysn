<?php


do {
    echo "\n";
    echo "1 - добавить \n";
    echo "2 - изменить \n";
    echo "3 - удалить \n";
    echo "4 - завершить \n";
    $choice = readline();
    switch ($choice) {
        case '1':
            addUser();
            break;
        case '2':
            editUser();
            break;
        case '3':
            deleteUser();
            break;
        case '4':
            return false;
            break;
    }
} while (true);


function addUser()
{
    $connection = mysqli_connect("localhost", "root", "root", "lw4");
    if ($connection == false) {
        print("Conncetion error!");
        exit();
    }

    print("Добавление пользователя: \n\n");
    $id = 0;
    $sql = "select count(0) from users";
    if ($result = mysqli_query($connection, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0] + 1;
        }
    }
    else {
        print("Error!");
    }

    if ($id < 1) {
        $id = 1;
    }

    $login = readline('логин: ');
    $password = readline('Впароль: ');
    $name = readline('имя: ');

    $sql = "INSERT INTO users SET
        id = {$id},
        login = '{$login}',
        password = '{$password}',
        name = '{$name}'";

    $result = mysqli_query($connection, $sql);
    if ($result == false) {
        print("\n\nError!");
    }
    else {
        print("\n\nУспешно);
    }
}

function editUser()
{
    $connection = mysqli_connect("localhost", "root", "root", "lw4");
    if ($connection == false) {
        print("Connection Error!");
        exit();
    }
    print("Редактирование пользователя: \n\n");

    $id = readline('Введите ID: ');


    $sql = "select `id` from users where `id` = '{$id}'";
    if ($result = mysqli_query($connection, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
        }
    }
    else {
        print("Error!");
    }

    if ($id === null) {
        echo "Id отсутствует \n";
        return;
    }
    $login = readline('Введите логин: ');
    $password = readline('Введите пароль: ');
    $name = readline('Введите имя: ');

    $sql = "UPDATE users SET
        id = {$id},
        login = '{$login}',
        password = '{$password}',
        name = '{$name}'
        WHERE id = {$id}";

    $result = mysqli_query($connection, $sql);
    if ($result == false) {
        print("\n\nError");
    }
    else {
        print("\n\nУспешное редактирование!");
    }
}


function deleteUser()
{
    $connection = mysqli_connect("localhost", "root", "root", "lw4");
    if ($connection == false) {
        print("Connection error!");
        exit();
    }
    print("Удаление пользователя: \n\n");

    $id = readline('Введите ID: ');


    $sql = "select `id` from users where `id` = '{$id}'";
    if ($result = mysqli_query($connection, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
        }
    }
    else {
        print("Error!");
    }

    if ($id === null) {
        echo "Id отсутствует \n";
        return;
    }

    $sql = "DELETE FROM users WHERE id = {$id}";

    $result = mysqli_query($connection, $sql);
    if ($result == false) {
        print("\n\nError!");
    }
    else {
        print("\n\nУспешное удаление!");
    }
}
