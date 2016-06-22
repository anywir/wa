<div class="about <?=$data['review']['style']?>" id="review<?=$data['review']['id']?>">
    <h2><?=$data['review']['title']?></h2>
    <aside>
        <p><?=$data['review']['text']?></p>
    </aside>
    <?php
        foreach($data['review']['sticker'] as $sticker)
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