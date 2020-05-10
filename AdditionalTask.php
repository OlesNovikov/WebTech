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
                <p class="all_tasks">
                    Варыянт 4: Стварыце 2 масіва з цэлымі лічбамі праз 2 палі формы, аб'яднаеце два масіва
                    ў адзін (не выкарыстоўваючы спецыяльныя функцыі PHP тыпу array_merge (arr1, arr2)!),
                    Выведзіце ўсе цотныя лічбы з атрыманага масіва.
                </p>
                <form action="AdditionalTask.php#lab2" method="POST" class="all_forms">
                    <input type="text" id="first_array_numbers" name="first_array_numbers">
                    <input type="text" id="second_array_numbers" name="second_array_numbers">
                    <input name="make_arrays" class="all_buttons" type="submit" value="Толькі цотныя лічбы">
                </form>
                
                    <?php 
                        function arrayIsNumeric($array) {
                            foreach ($array as $item) if (!is_numeric($item)) return false;
                            return true;
                        }

                        function echoArray($array) {
                            foreach ($array as $item) echo sprintf('%d ', $item);
                        }
                        
                        if (isset($_POST['make_arrays'])) {
                            echo '<div class="all_tasks">';
                            $stringFirstArray = $_POST['first_array_numbers'];
                            $stringSecondArray = $_POST['second_array_numbers'];

                            $firstArray = explode(" ", $stringFirstArray);
                            $secondArray = explode(" ", $stringSecondArray);

                            if (arrayIsNumeric($firstArray) && arrayIsNumeric($secondArray)) {
                                echo '<label>Першы масіў: </label>';
                                echoArray($firstArray);

                                echo '<br><br><label>Другі масіў: </label>';
                                echoArray($secondArray);

                                foreach ($firstArray as $item) $unitedArray[] = $item;
                                foreach ($secondArray as $item) $unitedArray[] = $item;
                                echo '<br><br><label>Аб\'еднаны масіў: </label>';
                                echoArray($unitedArray);

                                foreach ($unitedArray as $item) {
                                    if (($item % 2) === 0) $onlyEvenNumbers[] = $item;
                                }
                                echo '<br><br><label>Толькі цотныя лічбы: </label>';
                                echoArray($onlyEvenNumbers);
                            } else echo 'Калі ласка, увядзіце толькі лічбы';
                            echo '</div>';
                        }
                    ?>
            </article>

            <article id="lab3" class="all_articles">
                <h1>Лабараторная работа №3</h1>
                <p class="all_tasks">
                    Варыянт 4: Напісаць функцыю, якая фармуе поўны спіс файлаў у паказаным каталогу
                    (уключаючы падкаталогі) і лічацца агульны аб'ём файлаў. Імя каталога, у якім варта
                    выконваць пошук, атрымліваць праз вэб-форму. Адлюстраваць у таблічным выглядзе.
                </p>
                <form action="AdditionalTask.php#lab3" method="POST" class="all_forms">
                    <input type="text" id="input_catalog" name="input_catalog">
                    <input type="submit" class="all_buttons" name="search_button" value="Пошук у каталоге">
                </form>

                    <?php
                        function getAllFiles($catalogPath) {
                            $catalogFiles = array_diff(scandir($catalogPath), ['..', '.']);
                            $result = [];

                            foreach ($catalogFiles as $file) {
                                $fullPath = $catalogPath . '/' . $file;

                                if (is_dir($fullPath)) $result = array_merge($result, getAllFiles($fullPath));
                                else $result[] = $fullPath;
                            }
                            return $result;
                        }

                        if (isset($_POST['search_button'])) {
                            echo '<div class="all_tasks">';
                            echo '<p>Спіс усех файлаў: </p>';
                            if (file_exists($_POST['input_catalog'])) {
                                $catalogPath = $_POST['input_catalog'];
                                $pathArray = getAllFiles($catalogPath);

                                $rows = count($pathArray) / 2;
                                $cols = 2;
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
                            } else echo 'Такога каталога не існуе';

                            $overallSize = 0;
                            foreach ($pathArray as $path) $overallSize += filesize($path);
                            echo sprintf('Агульны аб\'ём: %d байт', $overallSize);
                            echo '</div>';
                        }                                
                    ?>
            </article>

            <article id="lab4" class="all_articles">
                <h1>Лабараторная работа №4</h1>
                <p class="all_tasks">
                    Варыянт 7: у адвольным тэксце ўсе нумары тэлефонаў (прадугледзець не менш за пяць
                    варыянтаў запісу нумары) вывесці зялёным колерам. Пры гэтым нумары сотавых тэлефонаў
                    (пачынаюцца з "+ КОД-") падкрэсліць. Тэкст ўводзіць праз форму.
                </p>
                <form action="AdditionalTask.php#lab4" method="POST" class="all_forms">
                    <textarea rows="10" id="textarea4_text" name="textarea4_text">
Lorem Ipsum 123 45 67 is simply dummy text of the printing and 1234567 typesetting industry. Lorem Ipsum has been +375(25)1234567 the industry's standard dummy +375441234567 text ever since the 1500s, when an unknown printer 1234567 took a galley of type and scrambled it to 80441234567 make a type specimen book. It has survived not only five centuries, 123-45-67 but also the leap into electronic typesetting, remaining 123 45 67 essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </textarea>
                    <input type="submit" class="all_buttons" name="mark_button" value="Вылучыць усе нумары">
                </form>

                <?php 
                    if (isset($_POST['mark_button'])) {
                        $callbackFunction = function ($matches) {
                            if ($matches[0][0] == '+') $matches[0] = '<u>' . $matches[0] . '</u>';
                            return '<mark>' . $matches[0] . '</mark>';
                        };
                        $inputTextArray = $_POST['textarea4_text'];
                        $regEx = '/((((\+?375|80))((29|25|33|44)|(\(25\)|\(29\)|\(33\)|\(44\))))?([0-9]{7})|([0-9]{3}\s[0-9]{2}\s[0-9]{2})|([0-9]{3}\-[0-9]{2}\-[0-9]{2}))/';
                        $inputTextArray = preg_replace_callback($regEx, $callbackFunction, $inputTextArray);
                        echo sprintf('<p class="all_tasks">%s</p>', $inputTextArray);
                    }
                ?>
            </article>

            <article id="lab5" class="all_articles">
                <h1>Лабараторная работа №5</h1>
                <p class="all_tasks">
                    Варыянт 11: напісаць скрыпт, які б па зададзеным годзе выводзіць бліжэйшыя пяць
                    гадоў назвы па кітайскім календары. Год атрымліваць праз вебформу.
                </p>
                <form action="AdditionalTask.php#lab5" method="POST" class="all_forms">
                    <input type="text" id="input_year" name="input_year">
                    <input type="submit" class="all_buttons" name="show_animals_button" value="Паказаць">
                </form>
                    <?php
                        function yearInRange() {
                            if ($_POST['input_year'] < MIN_YEAR || $_POST['input_year'] > MAX_YEAR) return false;
                            return true;
                        }
                        
                        const MIN_YEAR = 1900;
                        const MAX_YEAR = 10000;
                        if (isset($_POST['show_animals_button'])) {
                            if (yearInRange()) {
                                include 'dbConnect.php';
                                $year = $_POST['input_year'];
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
                            } else echo sprintf('<br>Год павінен быць паміж %d і %d', MIN_YEAR, MAX_YEAR);
                        }
                    ?>
            </article>

            <article id="lab6" class="all_articles">
                <h1>Лабараторная работа №6</h1>
                <p class="all_tasks">
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

            <article id="lab7" class="all_articles">
                <h1>Лабараторная работа №7</h1>
                <p class="all_tasks">
                    Варыянт 2: Выведзіце форму на сайце з наступнымі палямі: «Атрымальнікі», «Тэма»,
                    «Тэкст паведамлення» і кнопкай «Адправіць». У полі «Атрымальнікі» увядзіце праз
                    прабел або іншы усталяваны паасобны сімвал (, або;) адрасы электроннай пошты
                    атрымальнікаў. Атрымаеце ўсе дадзеныя з формы, праверце іх правільнасць, пры памылцы
                    выведзіце адпаведнае паведамленне, пакінуўшы уведзеныя ў палях формы, пры паспяховым
                    выніку праверкі - разашліце ліст. Захавайце у тэкставым файле спіс атрымальнікаў.
                </p>
                <form action="AdditionalTask.php#lab7" method="POST" class="all_forms">
                    <label>Атрымальнікі (праз прабел)</label>
                    <input type="text" id="receivers" name="receivers">
                    <br>
                    <label>Тэма</label>
                    <input type="text" id="subject" name="subject">
                    <br>
                    <label>Тэкст паведамлення</label>
<textarea rows="10" id="textarea7_text" name="textarea7_text"></textarea>
                    <input type="submit" class="all_buttons" name="send_button" value="Адправіць">
                </form>

                <?php
                    require 'includes/PHPMailer.php';
                    require 'includes/SMTP.php';
                    require 'includes/Exception.php';

                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\SMTP;
                    use PHPMailer\PHPMailer\Exception;
                    
                    $senderEmail = 'email@.com';
                    $senderPassword = 'password';

                    if (isset($_POST['send_button'])) {
                        $receiversArray = explode(' ', $_POST['receivers']);
                        $subject = $_POST['subject'];
                        $message = $_POST['textarea7_text'];
                        if ((count($receiversArray) > 0) && (strlen($subject) != 0) && (strlen($message) != 0)) {
                            $mail = new PHPMailer();
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = 'true';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port = '587';
                            $mail->Username = $senderEmail;
                            $mail->Password = $senderPassword;
                            $mail->Subject = $subject;
                            $mail->setFrom($senderEmail);
                            $mail->Body = $message;

                            $receiversFile = fopen('AllReceivers.txt', 'w');
                            foreach ($receiversArray as $email) {
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $mail->addAddress($email);
                                    if ($mail->Send()) {
                                        echo sprintf('<p class="all_tasks">Паведамленне адпраўлена %s</p>', $email);
                                        fwrite($receiversFile, $email);
                                    } else echo sprintf('<p class="all_tasks">Памылка... паведамленне не было адпраўлена %s</p>', $email);
                                } else echo sprintf('<p class="all_tasks">Электронная пошта ўведзена няправільна: %s</p>', $email);
                            }
                            fclose($receiversFile);
                            $mail->smtpClose();
                        } else echo '<p id="error_message">Вы ўвялі не ўсе дадзеныя</p>';
                    }
                ?>
            </article>

            <article id="lab8" class="all_articles">
            <h1>Лабараторная работа №8</h1>
                <p class="all_tasks">
                    Варыянт 6: напісаць скрыпт, які адпраўляе адміністратару статыстыку наведвання
                    рэсурсу за дзень (назва старонкі, колькасць праглядаў).
                </p>
                <?php
                    include "visitCount.php"; 
                    $interval = 1;
                    echo '<table>';
                    echo
                        '<tr>
                            <td>Дата</td>
                            <td>Старонка</td>
                            <td>Праглядаў</td>
                        </tr>';
                    $pagesArray = array('index.php', 'SIGHTS.php', 'MUSEUMS.php', 'FOOD.php', 'HOTELS.php', 'AdditionalTask.php');
                    foreach ($pagesArray as $pageName) {
                        $connectionResult = mysqli_query($link, "SELECT * FROM `$pageName` ORDER BY `date` DESC LIMIT $interval");
                        while ($row = mysqli_fetch_assoc($connectionResult)) {
                            echo
                                '<tr>
                                    <td>' . $row['date'] . '</td>
                                    <td>' . $pageName . '</td>
                                    <td>' . $row['views'] . '</td>
                                </tr>';
                        }
                    }
                    echo '</table>';
                ?>
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
