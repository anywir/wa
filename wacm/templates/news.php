<?php

foreach ($data['news'] as $news)
{ ?>
    <div class="news">
        <div class="neon_light"></div>
        <time datetime="<?= date("Y/m/d H:i:s",$news['date']) ?>"><?= date("d.m.Y",$news['date']) ?></time>
        <h3><?= $news['tema'].$news['date'] ?></h3>

        <p><?= $news['text'] ?></p>
    </div>
    <?php
}

?>
