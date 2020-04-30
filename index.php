<!DOCTYPE html>
<?php
    include 'session.php';
    $_SESSION['serializedArray'] = $serializedArray;
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
        <link rel="stylesheet" href="css/index.css">
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
            <?php include "visitCount.php"; ?>
            <article class="all_articles">
                    <img id="introduction_image" src="img/Introduction_Minsk.jpg" alt="introduction">
                    <div id="introduction_text">
                        <h1>Увядзенне</h1>
                        <p><b>Мінск</b> - сталіца Беларусі, адміністрацыйны цэнтр Мінскай вобласці і
                            Мінскага раёна, у склад якіх не ўваходзіць, паколькі з'яўляецца
                            самастойнай адміністрацыйна-тэрытарыяльнай адзінкай з
                            асаблівым (сталічным) статусам. Найбуйнейшы транспартны
                            вузел, палітычны, эканамічны, культурны і навуковы цэнтр
                            краіны. З'яўляецца ядром Мінскай агламерацыі. Дзесяты па
                            колькасці насельніцтва (без уліку прыгарадаў) горад у Еўропе,
                            пяты - пасля Масквы, Санкт-Пецярбурга, Кіева, Ташкента на                                тэрыторыі былога СССР. Горад размешчаны недалёка ад
                            геаграфічнага цэнтра краіны і стаіць на рацэ Свіслачы. Плошча
                            складае 348,84 км², насельніцтва - 2 018 281 чалавек (па
                            выніках перапісу 2019 году) без уліку прыгарадаў. Горад-герой.
                        </p>
                    </div>
            </article>

            <article class="all_articles">
                <img id="geographical_image" src="img/Minsk_from_space.jpg" alt="Minsk_from_space">
                <div id="geographical_description">
                    <h1>Геаграфічнае становішча</h1>
                    <p>Мінск размешчаны на паўднёва-ўсходнім схіле Мінскага ўзвышша, якое мае моранага паходжанне.
                    Яно ўтварылася падчас сожскага абляднення, апошняга, якi дасягнуў гэтай тэрыторыі.
                    Сярэдняя вышыня над узроўнем мора 220 м.</p>
                    
                    <p>Найбольш ўзнёслая частка Мінска (283 м) размешчана ў раёне вуліцы Ляшчынскага, за домам № 8
                    (да забудовы горада на захад такая кропка была паміж вуліцамі Ціміразева і Харкаўскай).
                    Самая нізкая адзнака (181,4 м) знаходзіцца на паўднёвым усходзе горада ў пойме Свіслачы ў мікрараёне Чыжоўка
                    (гл. Чыжоўскае вадасховішча).</p>
                </div>
            </article>

            <article class="all_articles">
                <img id="education_image" src="img/BSUIR.jpg" alt="education_image">
                <div id="education_description">
                    <h1>Адукацыя</h1>
                    <p>У Мінску дзейнічае 28 ВНУ, у якіх у 2017/2018 навучальнага года навучалася 154,6
                    тыс. Студэнтаў - 54,4% ад агульнай колькасці студэнтаў у Рэспубліцы Беларусь.
                    У 2012/2013 навучальным годзе прафесарска-выкладчыцкі склад ВНУ горада склаў 13 901
                    чалавек.</p>

                    <p>У горадзе дзейнічае больш за 200 сярэдніх агульнаадукацыйных школ, больш за 40
                    гімназій, 48 сярэдніх спецыяльных навучальных устаноў, 26 устаноў
                    прафесійна-тэхнічнай адукацыі, 4 ліцэя. У 2017/2018 навучальным годзе ў 278 установах
                    агульнай сярэдняй адукацыі навучалася 196 тыс. Чалавек, ва ўстановах сярэдняй
                    спецыяльнай адукацыі - 31,1 тыс. Навучэнцаў, прафесійна-тэхнічнай - 12,1 тыс.
                    Навучэнцаў. Колькасць вучняў на кожным з гэтых узроўняў адукацыі вышэй, чым у любой з
                    абласцей краіны. Колькасць настаўнікаў у Мінску - 17,4 тыс. Чалавек (чацвёрты паказчык
                    у краіне). У 2012/2013 навучальным годзе 2% вучняў у школах і гімназіях навучаліся
                    на беларускай мове, 98% - на рускай.</p>
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
