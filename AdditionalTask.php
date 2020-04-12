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