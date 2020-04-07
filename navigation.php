<?php
    $index_class = basename($_SERVER["PHP_SELF"]) == 'index.php' ? "active" : "normal";
    $SIGHTS_class = basename($_SERVER["PHP_SELF"]) == 'SIGHTS.php' ? "active" : "normal";
    $MUSEUMS_class = basename($_SERVER["PHP_SELF"]) == 'MUSEUMS.php' ? "active" : "normal";
    $FOOD_class = basename($_SERVER["PHP_SELF"]) == 'FOOD.php' ? "active" : "normal";
    $HOTELS_class = basename($_SERVER["PHP_SELF"]) == 'HOTELS.php' ? "active" : "normal";
    $AdditionalTask_class = basename($_SERVER["PHP_SELF"]) == 'AdditionalTask.php' ? "active" : "normal";
?>

<li><a class="<?php echo $index_class; ?>" href="index.php">Дамашняя</a></li>
<li><a class="<?php echo $SIGHTS_class; ?>" href="SIGHTS.php">Славутасці</a></li>
<li><a class="<?php echo $MUSEUMS_class; ?>" href="MUSEUMS.php">Музеі</a></li>
<li><a class="<?php echo $FOOD_class; ?>" href="FOOD.php">Кухня</a></li>
<li><a class="<?php echo $HOTELS_class; ?>" href="HOTELS.php">Жыллё</a></li>
<li><a class="<?php echo $AdditionalTask_class; ?>" href="AdditionalTask.php">Дадатковае заданне</a></li>