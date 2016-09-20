<?php
foreach ($data['news'] as $news)
{ ?>
    <div class="news">
        <div class="neon_light"></div>
        <?php
        $date = date_create($news['date']);
        $datetime = date_format($date, 'd-m-Y');
        ?>
        <time datetime="<?= $news['date'] ?>"><?= $datetime ?></time>
        <h3><?= $news['tema']?></h3>

        <p><?= $news['text'] ?></p>
    </div>
    <?php
}

?>
