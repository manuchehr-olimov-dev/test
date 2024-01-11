<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пример страницы</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            width: 30px;
            height: 30px;
            text-align: center;
        }
        button {
            margin: 5px;
        }
        .yellow {
            background-color: yellow;
        }
    </style>
</head>
<body>

<button onclick="makeYellow()">Сделать жёлтыми</button>
<button onclick="checkZeros()">Проверить</button>
<button onclick="makeYellow()">Еще кнопка</button>

<table id="myTable">
    <!-- Генерация таблицы 5x5 с случайными 0 или 1 -->
    <?php

        for ($i = 0; $i < 5; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 5; $j++) {
                echo "<td>" . rand(0, 1) . "</td>";
            }
            echo "</tr>";
        }

    ?>
</table>

<script>
    // Функция для смены цвета ячеек на жёлтый
    function makeYellow() {
        var cells = document.querySelectorAll('#myTable td');
        cells.forEach(function(cell) {
            cell.classList.add('yellow');
        });
    }

    // Функция для подсчёта ячеек с условием и вывода сообщения
    function checkZeros() {
        const cells = document.querySelectorAll('#myTable td');
        let count = 0;
        for (let i = 0; i < cells.length; i++) {
            const row = Math.floor(i / 5);
            const col = i % 5;

            // Проверка ячеек вокруг текущей ячейки
            if (
                (row > 0 && cells[i - 5].innerText === '0') ||
                (row < 4 && cells[i + 5].innerText === '0') ||
                (col > 0 && cells[i - 1].innerText === '0') ||
                (col < 4 && cells[i + 1].innerText === '0')
            ) {
                count++;
            }
        }
        alert('Количество ячеек с нулями рядом с более чем двумя единицами: ' + count);
    }
</script>

</body>
</html>