<body>
<div id="wrap">
    <div  class="menu">
        <ul>
            <li><a href="http://blog.wired.audio">Блог</a></li>
            <li><a href="#news">Новости</a></li>
<?php

foreach ($data['sections'] as $section) {
    ?>
            <li><a href=#<?=$section["style"]?>><?=$section["menu"]?></a></li>
    <?php
}
?>
        </ul>
    </div>
    <div  class="up">
        <div class="screen">
            <a title="вверх" href="#top"></a>
        </div>
    </div>
    <header id="top">
        <video id="vid" poster="../images/teback.jpg" autoplay loop muted>
            <source src="video/teback.ogv" type='video/ogg; codecs="theora, vorbis"'>
            <source src="video/teback.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            <source src="video/teback.webm" type='video/webm; codecs="vp8, vorbis"'>
        </video>
        <h1>wired audio</h1>
        <span>D.I.Y. решения для вашего Hi-Fi</span>
    </header>