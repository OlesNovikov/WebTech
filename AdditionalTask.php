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

            <form action="AdditionalTask.php" method="post" id="Task_container">
                <label>Першы масіў:</label>
                <br>
                <input type="text" id="first_array_numbers" name="first_array_numbers">
                <br><br>

                <label>Другі масіў:</label>
                <br>
                <input type="text" id="second_array_numbers" name="second_array_numbers">
                <br><br>
                <input name="make_arrays" type="submit" value="Паказаць першы і другі масіў">

                <?php 
                    if (isset($_POST['make_arrays'])) {
                        $string_first_array = $_POST['first_array_numbers'];
                        $string_second_array = $_POST['second_array_numbers'];

                        $first_array = explode(" ", $string_first_array);
                        $second_array = explode(" ", $string_second_array);
                    }
                ?>
                <br><br>

                <?php

                function ArrayIsNumeric($array) {
                    $valid = true;
                    $i = 0;
                    while (valid && $i < count($array)) {
                        if (!(is_numeric($array[$i]))) {
                            $valid = false;
                        }
                        $i++;
                    } 
                    return $valid;
                }

                ?>

                <label>Першы масіў: 
                    <?php 
                        if (ArrayIsNumeric($first_array)) {
                            for ($i = 0; $i < count($first_array); $i++) {
                                echo $first_array[$i] . " ";
                            }
                        } else {
                            echo "Калі ласка, увядзіце толькі лічбы";
                        }
                    ?>
                </label>

                <br><br>
                <label>Другі масіў: 
                    <?php 
                        if (ArrayIsNumeric($second_array)) {
                            for ($i = 0; $i < count($second_array); $i++) {
                                echo $second_array[$i] . " ";
                            }
                        } else {
                            echo "Калі ласка, увядзіце толькі лічбы";
                        }
                    ?>
                </label>
                <br><br>

                <label>Аб'еднаны масіў:
                    <?php                
                        if (ArrayIsNumeric($first_array) && ArrayIsNumeric($second_array)) {
                            for ($i = 0; $i < count($first_array); $i++) {
                                $united_array[] = $first_array[$i];
                            }
    
                            for ($i = 0; $i < count($second_array); $i++) {
                                $united_array[] = $second_array[$i];
                            }
    
                            for ($i = 0; $i < count($united_array); $i++) {
                                echo $united_array[$i] . " ";
                            }
                        } else {
                            echo "Калі ласка, увядзіце толькі лічбы";
                        } 
                    ?>
                </label>
                <br><br>

                <label>Толькі цотныя лічбы: 
                    <?php 
                        if (ArrayIsNumeric($first_array) && ArrayIsNumeric($second_array)) {
                            for ($i = 0; $i < count($united_array); $i++) {
                                if (($united_array[$i] % 2) == 0) {
                                    $only_even_numbers[] = $united_array[$i];
                                }
                            }
    
                            for ($i = 0; $i < count($only_even_numbers); $i++) {
                                echo $only_even_numbers[$i] . " ";
                            }
                        } else {
                            echo "Калі ласка, увядзіце толькі лічбы";
                        }
                    ?>
                </label> 
            </form>

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