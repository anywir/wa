<div class="about <?=$eachrev['style']?>" id="review<?=$eachrev['id']?>">
    <h2><?=$eachrev['title']?></h2>
    <aside>
        <p><?=$eachrev['text']?></p>
    </aside>
    <?php
        foreach($eachrev['sticker'] as $sticker)
        {
            ?>
            <div class="slide_info <?= $sticker['style'] ?>" id = "sticker<?=$sticker['id']?>">
                <p><?= $sticker['text'] ?></p>
                <span><?= $sticker['sign'] ?></span>
                <button class="edit-btn" >edit</button>
            </div>
            <?php
        }
    ?>
    <button class="edit-btn" >edit</button>
</div>