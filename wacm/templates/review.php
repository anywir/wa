<div class="about <?=$eachrev['style']?>">
    <h2><?=$eachrev['title']?></h2>
    <aside>
        <p><?=$eachrev['text']?></p>
    </aside>
    <?php
        foreach($eachrev['sticker'] as $sticker)
        {
            ?>
            <div class="slide_info <?= $sticker['style'] ?>">
                <p><?= $sticker['text'] ?></p>
                <span><?= $sticker['sign'] ?></span>
            </div>
            <?php
        }
    ?>
</div>