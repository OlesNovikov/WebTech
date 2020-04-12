<!DOCTYPE html>
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
                <form action="AdditionalTask.php#lab2" method="post" id="Task_container">
                    <label>Першы масіў:</label>
                    <br>
                    <input type="text" id="first_array_numbers" name="first_array_numbers">
                    <br><br>

                    <label>Другі масіў:</label>
                    <br>
                    <input type="text" id="second_array_numbers" name="second_array_numbers">
                    <br><br>
                    <input name="make_arrays" type="submit" value="Толькі цотныя лічбы">
                </form>

                <div id="output_container1">
                    <?php 
                        if (isset($_POST['make_arrays'])) {
                            $stringFirstArray = $_POST['first_array_numbers'];
                            $stringSecondArray = $_POST['second_array_numbers'];

                            $firstArray = explode(" ", $stringFirstArray);
                            $secondArray = explode(" ", $stringSecondArray);
                        }
                    ?>

                    <?php
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
                                echo "Калі ласка, увядзіце толькі лічбы";
                            }
                        ?>
                    </label>

                    <br><br>

                    <label>Другі масіў:
                        <?php 
                            if (arrayIsNumeric($secondArray)) {
                                echoArray($secondArray);
                            } else {
                                echo "Калі ласка, увядзіце толькі лічбы";
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
                                echo "Калі ласка, увядзіце толькі лічбы";
                            } 
                        ?>
                    </label>

                    <br><br>

                    <label>Толькі цотныя лічбы: 

                        <?php 
                            if (ArrayIsNumeric($firstArray) && ArrayIsNumeric($secondArray)) {
                                foreach ($unitedArray as $item) {
                                    if (($item % 2) === 0) {
                                        $onlyEvenNumbers[] = $item;
                                    }
                                }
                                echoArray($onlyEvenNumbers);
                            } else {
                                echo "Калі ласка, увядзіце толькі лічбы";
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
                <form action="AdditionalTask.php#lab3" method="post" id="Task_container">
                    <input type="text" id="input_catalog" name="input_catalog">
                    <input type="submit" name="search_button" value="Пошук у каталоге">
                    <br>

                </form>

                <div id="output_container2">
                    
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
                                echo '<table id="output_table" border="1">';
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
                                echo "Такога каталога не існуе";
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