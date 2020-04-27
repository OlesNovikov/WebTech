<!DOCTYPE html>
<?php
    session_start();
    if (isset($_SESSION['serializedArray'])) {
        $unserializedArray = unserialize($_SESSION['serializedArray']);
    }
?>
<html lang="be">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Minsk guide">
        <meta name="keywords" content="Minsk, hotels, food, museums, sights, guide, tourist, visit, travel,
                                           Минск, отели, еда, музеи, достопримечательности, гайд, турист, посетить, путешествие,
                                           Мінск, гателі, ежа, музеі, славутасці, гайд, турыст, наведаць, падарожжа">
        <meta name="author" content="Oles Novikov">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0"> 
        <title>Мінск - гайд па сталіцы</title>
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/AdditionalTask.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>

    <body>
    
        <header class="header_container">
            <div class="top_panel">
                <div class="top_telephone">Телефон для справок: +375 (33) 381 84 51</div>
            </div>
            <div class="logo_navigation_container">
                <div>
                    <a href="index.php"><img id="site_logo" src="img/Minsk_logo.jpg" alt="logo"></a>
                </div>
                <nav class="main_navigation">
                    <ul class="navigation_menu">
                        <?php include "navigation.php"; ?>
                    </ul>
                </nav>
            </div>
        </header>

        <main class="main_container">

            <article id="lab2" class="all_articles">
                <h1>Лабараторная работа №2</h1>
                <p id="first_task">
                    Варыянт 4: Стварыце 2 масіва з цэлымі лічбамі праз 2 палі формы, аб'яднаеце два масіва
                    ў адзін (не выкарыстоўваючы спецыяльныя функцыі PHP тыпу array_merge (arr1, arr2)!),
                    Выведзіце ўсе цотныя лічбы з атрыманага масіва.
                </p>
                <form action="AdditionalTask.php#lab2" method="post" id="Form2_container">
                    <label>Першы масіў:</label>
                    <input type="text" id="first_array_numbers" name="first_array_numbers">

                    <label>Другі масіў:</label>
                    <input type="text" id="second_array_numbers" name="second_array_numbers">
                    <input name="make_arrays" id="make_array_button" type="submit" value="Толькі цотныя лічбы">
                </form>

                <div id="first_task">
                    <?php 
                        if (isset($_POST['make_arrays'])) {
                            $stringFirstArray = $_POST['first_array_numbers'];
                            $stringSecondArray = $_POST['second_array_numbers'];

                            $firstArray = explode(" ", $stringFirstArray);
                            $secondArray = explode(" ", $stringSecondArray);
                        }

                        function arrayIsNumeric($array) {
                            foreach ($array as $item) {
                                if (!is_numeric($item)) {
                                  return false;
                                }
                              }
                              
                            return true;
                        }

                        function echoArray($array) {
                            foreach ($array as $item) {
                                echo sprintf('%d ', $item);
                            }
                        }
                    ?>

                    <label>Першы масіў:
                        <?php 
                            if (arrayIsNumeric($firstArray)) {
                                echoArray($firstArray);
                            } else {
                                echo 'Калі ласка, увядзіце толькі лічбы';
                            }
                        ?>
                    </label>

                    <br><br>

                    <label>Другі масіў:
                        <?php 
                            if (arrayIsNumeric($secondArray)) {
                                echoArray($secondArray);
                            } else {
                                echo 'Калі ласка, увядзіце толькі лічбы';
                            }
                        ?>
                    </label>

                    <br><br>

                    <label>Аб'еднаны масіў:
                        <?php                
                            if (arrayIsNumeric($firstArray) && arrayIsNumeric($secondArray)) {
                                foreach ($firstArray as $item) {
                                    $unitedArray[] = $item;
                                }
                                foreach ($secondArray as $item) {
                                    $unitedArray[] = $item;
                                }
                                echoArray($unitedArray);
                            } else {
                                echo 'Калі ласка, увядзіце толькі лічбы';
                            } 
                        ?>
                    </label>

                    <br><br>

                    <label>Толькі цотныя лічбы: 

                        <?php 
                            if (arrayIsNumeric($firstArray) && arrayIsNumeric($secondArray)) {
                                foreach ($unitedArray as $item) {
                                    if (($item % 2) === 0) {
                                        $onlyEvenNumbers[] = $item;
                                    }
                                }
                                echoArray($onlyEvenNumbers);
                            } else {
                                echo 'Калі ласка, увядзіце толькі лічбы';
                            }
                        ?>

                    </label> 
                </div>

            </article>

            <article id="lab3" class="all_articles">
                <h1>Лабараторная работа №3</h1>
                <p id="second_task">
                    Варыянт 4: Напісаць функцыю, якая фармуе поўны спіс файлаў у паказаным каталогу
                    (уключаючы падкаталогі) і лічацца агульны аб'ём файлаў. Імя каталога, у якім варта
                    выконваць пошук, атрымліваць праз вэб-форму. Адлюстраваць у таблічным выглядзе.
                </p>
                <form action="AdditionalTask.php#lab3" method="post" id="Form3_container">
                    <input type="text" id="input_catalog" name="input_catalog">
                    <br>
                    <input type="submit" name="search_button" value="Пошук у каталоге">
                </form>

                <div id="second_task">
                    <p>
                        Спіс усех файлаў: 
                        <?php

                            function getAllFiles($catalogPath) {
                                $catalogFiles = array_diff(scandir($catalogPath), ['..', '.']);
                                $result = [];

                                foreach ($catalogFiles as $file) {
                                    $fullPath = $catalogPath . '/' . $file;

                                    if (is_dir($fullPath)) {
                                        $result = array_merge($result, getAllFiles($fullPath));
                                    } else {
                                        $result[] = $fullPath;
                                    }
                                }
                                return $result;
                            }

                            if (file_exists($_POST['input_catalog'])) {
                                $catalogPath = $_POST['input_catalog'];
                                $pathArray = getAllFiles($catalogPath);

                                $rows = count($pathArray) / 2;
                                $cols = 2;
                                echo '<br><br>';
                                echo '<table border="1">';
                                echo sprintf('<th colspan="2">%s</th>', $catalogPath);
                                    
                                $i = 0;
                                for ($td = 1; $td <= $rows; $td++) {
                                    echo '<tr>';
                                    for ($tr = 1; $tr <= $cols; $tr++) {
                                        echo sprintf('<td>%s</td>', basename($pathArray[$i]));
                                        $i++;
                                    }
                                    echo '<tr>';
                                }
                                echo '</table>';
                            } else {
                                echo 'Такога каталога не існуе';
                            }
                        ?>
                    </p>
                    <br>
                    <p id="overall_size">
                        Агульны аб'ём:
                        <?php
                            $overallSize = 0;
                            foreach ($pathArray as $path) {
                                $overallSize += filesize($path);
                            }
                            echo sprintf('%d байт', $overallSize);
                        ?>
                    </p>
                </div>

            </article>

            <article id="lab4" class="all_articles">
                <h1>Лабараторная работа №4</h1>
                <p id="third_task">
                    Варыянт 7: у адвольным тэксце ўсе нумары тэлефонаў (прадугледзець не менш за пяць
                    варыянтаў запісу нумары) вывесці зялёным колерам. Пры гэтым нумары сотавых тэлефонаў
                    (пачынаюцца з "+ КОД-") падкрэсліць. Тэкст ўводзіць праз форму.
                </p>
                <form action="AdditionalTask.php#lab4" method="post" id="Form4_container">
                        <textarea rows="10" id="textarea4_text" name="textarea4_text">Lorem Ipsum 123 45 67 is simply dummy text of the printing and 1234567 typesetting industry. Lorem Ipsum has been +375(25)1234567 the industry's standard dummy +375441234567 text ever since the 1500s, when an unknown printer 1234567 took a galley of type and scrambled it to 80441234567 make a type specimen book. It has survived not only five centuries, 123-45-67 but also the leap into electronic typesetting, remaining 123 45 67 essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                        <br>
                        <input type="submit" name="search_button" value="Вылучыць усе нумары">
                </form>

                <?php 
                    $callbackFunction = function ($matches) {
                        if ($matches[0][0] == '+') {
                            $matches[0] = '<u>' . $matches[0] . '</u>';
                        }
                        return '<mark>' . $matches[0] . '</mark>';
                    };
                    $inputTextArray = $_POST['textarea4_text'];
                    $regEx = '/((((\+?375|80))((29|25|33|44)|(\(25\)|\(29\)|\(33\)|\(44\))))?([0-9]{7})|([0-9]{3}\s[0-9]{2}\s[0-9]{2})|([0-9]{3}\-[0-9]{2}\-[0-9]{2}))/';
                    $inputTextArray = preg_replace_callback($regEx, $callbackFunction, $inputTextArray);
                    echo sprintf('<p id="third_task">%s</p>', $inputTextArray);
                ?>
            </article>

            <article id="lab5" class="all_articles">
                <h1>Лабараторная работа №5</h1>
                <p id="fourth_task">
                    Варыянт 11: напісаць скрыпт, які б па зададзеным годзе выводзіць бліжэйшыя пяць
                    гадоў назвы па кітайскім календары. Год атрымліваць праз вебформу.
                </p>
                <form action="AdditionalTask.php#lab5" method="POST" id="Form5_container">
                    <input type="text" id="input_year" name="input_year">
                    <br>
                    <input type="submit" name="search_button" value="Паказаць">
                </form>
                    <?php
                        function yearInRange() {
                            if ($_POST['input_year'] < MIN_YEAR || $_POST['input_year'] > MAX_YEAR) return false;
                            return true;
                        }

                        const MIN_YEAR = 1900;
                        const MAX_YEAR = 10000;
                        if (yearInRange()) {
                            $year = $_POST['input_year'];
                            $host = 'localhost';
                            $user = 'Oles';
                            $password = 'Erda_2020';
                            $dbName = 'minskguide';

                            $link = mysqli_connect($host, $user, $password, $dbName);
                            if (!$link) {
                                echo sprintf('<br>Код памылкі: %s', mysqli_connect_errno());
                            } else {
                                $sqlQuery = 'SELECT * FROM years WHERE id > 0';
                                $result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
                                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                                $i = 1;
                                while ($i < 6) {
                                    $id = ($year % 12 + $i) % 12;
                                    $nextFiveYears[] = $data[$id]['year_of'];
                                    $i++;
                                }
                                echo '<br>';
                                $inputYearId = $year % 12;
                                echo sprintf('Уведзены год %d: %s', $year, $data[$inputYearId]['year_of']); 

                                $rows = 5;
                                $cols = 1;
                                echo '<table id="output_table" border="1">';
                                echo sprintf('<th>Наступныя 5 гадоў</th>');
                                    
                                $i = 0;
                                for ($td = 1; $td <= $rows; $td++) {
                                    echo '<tr>';
                                    for ($tr = 1; $tr <= $cols; $tr++) {
                                        echo sprintf('<td>%d: %s</td>', $year + 1 + $i, $nextFiveYears[$i]);
                                        $i++;
                                    }
                                    echo '<tr>';
                                }
                                echo '</table>';

                            }
                        } else {
                            echo sprintf('<br>Год павінен быць паміж %d і %d', MIN_YEAR, MAX_YEAR);
                        }
                    ?>
            </article>

            <article id="lab6" class="all_articles">
                <h1>Лабараторная работа №6</h1>
                <p id="fifth_task">
                    Варыянт 2: напісаць два скрыпту, адзін з якіх фарміруе адвольны набор дадзеных
                    (лічбы, радкі, масівы) і перадае іх іншаму скрыпту ў серыялізованай форме. Другі
                    скрыпт десерыялізуе дадзеныя.   
                    <?php
                        echo '<br>';
                        foreach ($unserializedArray as $item) {
                            if (is_array($item)) {
                                echo sprintf('<br>Рандомны масіў: ');
                                for ($i = 0; $i < count($item); $i++) echo sprintf('%s, ', $item[$i]);
                            } else {
                                if (is_numeric($item)) echo sprintf('<br>Рандомная лічба: %d', $item);
                                else echo sprintf('<br>Рандомная страка: %s', $item);
                            }
                        }
                        unset($_SESSION['unserializedArray']);
                        session_destroy();
                    ?>
                </p>
            </article>
            
        </main>

        <footer class="footer_container">
            <div class="footer_navigation">
                <ul>
                    <?php include "navigation.php"; ?>
                </ul>
            </div>
            <div class="footer_copyright">Oles Novikov © 2020 · Privacy Policy</div>
        </footer>

    </body>
</html>