<?php

foreach ($data['sections'] as $section) 
{
    if ($section['id_review']== $eachrev['id']) //відділяємо секції прив'язані до ревью
    {
        ?>
        <section class="<?= $section['style'] ?>" id="<?= $section['style'] ?>"
                 style="background-image: url(<?= SITE . 'lib/' . $section['backimg'] ?>)">
            <div class="top_no_mov">
                <?php
                if ($section['style'] == 'bbb_lite') {
                    ?>
                    <h2><?= $section['title'] ?></h2>
                    <p><?= $section['slog'] ?></p>
                    <?php
                } elseif ($section['style'] == 'bbb_maxi') {
                    ?>
                    <p><?= $section['slog'] ?></p>
                    <h2><?= $section['title'] ?></h2>
                    <?php
                }
                ?>

                <a href="bbb.html">подробнее</a>
                <div class="a_h">
                </div>
            </div>
            <div class="bottom_mov">
                <?php
                foreach ($section['images'] as $image) {
                    ?>
                    <div class="slide_img">
                        <img src=<?= SITE . 'lib/' . $image['src'] ?> alt=<?= $image['title'] ?>>
                        <p><?= $image['title'] ?></p>
                    </div>
                    <?php
                }
                ?>
                <div class="slide_info three">
                    <?= $section['sticker'] ?>
                </div>
            </div>
        </section>
        <?php
    }
 }
?>