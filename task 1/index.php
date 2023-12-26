<!DOCTYPE html>
<html>
<head>
    <title>Форма загрузки файла</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Загрузка файла</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit" value="Загрузить">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $uploadDir = 'files/';
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);
        $uploadOk = 1;

        // Проверяем тип файла
        $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        if ($fileType != 'txt') {
            echo '<div class="status error">Разрешены только файлы типа .txt</div>';
            $uploadOk = 0;
        }

        // Проверяем размер файла
        if ($_FILES['file']['size'] > 500000) {
            echo '<div class="status error">Файл слишком большой. Максимальный размер - 500 КБ.</div>';
            $uploadOk = 0;
        }

        if ($uploadOk == 1 && move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            $content = file_get_contents($uploadFile);
            $lines = explode("\n", $content);

            foreach ($lines as $line) {
                $digitsCount = preg_match_all('/[0-9]/', $line);
                echo $line . ' = ' . $digitsCount . '<br>';
            }

            echo '<div class="status success">Файл успешно загружен и обработан!</div>';
        } else {
            echo '<div class="status error">Ошибка загрузки файла.</div>';
        }
    }
    ?>
</div>
</body>
</html>
