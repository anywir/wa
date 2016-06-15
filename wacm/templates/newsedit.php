<div class="news" id='new'>
    <button class="edit-btn" >new</button>
</div>
<?php
foreach ($data['news'] as $news)
{ ?>
    <div class="news" id=<?= $news['id']?>>
        <div class="neon_light"></div>
        <?php
        $date = date_create($news['date']);
        $datetime = date_format($date, 'd-m-Y');
        ?>
        <time datetime="<?= $news['date'] ?>"><?= $datetime ?></time>
        <div id="h3"><?= $news['tema'] ?></div>
        <div id="p"><?= $news['text'] ?></div>
        <button class="edit-btn" >edit</button>
    </div>
    <?php
}?>
