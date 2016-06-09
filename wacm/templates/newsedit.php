<?php

foreach ($data['news'] as $news)
{ ?>
    <div class="news">
        <div class="neon_light"></div>
        <time datetime="<?= $news['data'] ?>"><?= $news['data'] ?></time>
        <h3><?= $news['tema'] ?></h3>
        <p><?= $news['text'] ?></p>
        <button id=<?= $news['id']?>>edit</button>
    </div>
    <?php
}?>
