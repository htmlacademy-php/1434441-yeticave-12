<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и
        горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($rows_categories as $rows_category): ?>
        <li class="promo__item promo__item--<?=htmlspecialchars($rows_category["symbol_code"]);?>">
            <a class="promo__link" href="all-lots.html"><?=htmlspecialchars($rows_category["name"]);?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($rows_lots as $row_lot):

        $res = get_dt_range($row_lot["dt_sell"]);
        $res_implode = implode(":", $res);

        ?>
        <li class="lots__item lot">
            <div class="lot__image">
                <img src="<?=$row_lot["img_path"];?>" width="350" height="260" alt="">
            </div>
            <div class="lot__info">
                <span class="lot__category"><?=htmlspecialchars($row_lot["name"]);?></span>
                <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=htmlspecialchars($row_lot["title"]);?></a>
                </h3>
                <div class="lot__state">
                    <div class="lot__rate">
                        <span class="lot__amount">Стартовая цена</span>
                        <span class="lot__cost"><?=get_price($row_lot["start_price"]);?></span>
                    </div>
                    <div class="lot__timer timer <?=$res[0] < 1 ? "timer--finishing" : "";?>">
                        <?=$res_implode;?>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
