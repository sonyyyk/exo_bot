<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = htmlspecialchars($_POST['nickname'], ENT_QUOTES, 'UTF-8');
    $thoughts = htmlspecialchars($_POST['thoughts'], ENT_QUOTES, 'UTF-8');

    if (!empty($nickname) && !empty($thoughts)) {
        $file = 'thoughts.txt';
        $entry = $nickname . ": " . $thoughts . PHP_EOL;

        if (file_put_contents($file, $entry, FILE_APPEND)) {
            echo "Ваші дані збережено успішно!";
        } else {
            echo "Сталася помилка при збереженні даних.";
        }
    } else {
        echo "Будь ласка, заповніть усі поля!";
    }
} else {
    echo "Неправильний метод запиту.";
}
?>
