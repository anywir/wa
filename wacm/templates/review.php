<div class="about <?=$data['review']['style']?>">
    <h2><?=$data['review']['title']?></h2>
    <aside>
        <?=$data['review']['text']?>
    </aside>
    <?php
        foreach($data['review']['sticker'] as $sticker)
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