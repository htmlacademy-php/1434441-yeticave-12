<?php
$is_auth = rand(0, 1);
$user_name = "Иван";
$categories = [
    "boards" => "Доски и лыжи",
    "attachment" => "Крепления",
    "boots" => "Ботинки",
    "clothing" => "Одежда",
    "tools" => "Инструменты",
    "other" => "Разное"
];

$adverts = [
    [
        "name" => "2014 Rossignol District Snowboard",
        "category" => "boards",
        "price" => 10999,
        "url" => "img/lot-1.jpg",
    ],
    [
        "name" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "boards",
        "price" => 159999,
        "url" => "img/lot-2.jpg",
    ],
    [
        "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "attachment",
        "price" => 8000,
        "url" => "img/lot-3.jpg",
    ],
    [
        "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "boots",
        "price" => 10999,
        "url" => "img/lot-4.jpg",
    ],
    [
        "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "clothing",
        "price" => 7500,
        "url" => "img/lot-5.jpg",
    ],
    [
        "name" => "Маска Oakley Canopy",
        "category" => "other",
        "price" => 5400,
        "url" => "img/lot-6.jpg",
    ]
];

/**
 * Возвращает отформатированную цену, добавит пробел после каждого третьего разряда
 *
 * @param int $price Цена товара
 *
 * @return string Отформатированная цена с символом ₽ в конце
 */
function get_price($price) {
    $price = ceil($price);
    $price = number_format($price, 0, ""," ");
    return "$price ₽";
};

/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 * @param string $name Путь к файлу шаблона относительно папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function include_template($name, array $data = []) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}
?>

<?php
    $page_content = include_template("main.php", ["categories" => $categories, "adverts" => $adverts]);
    $layout_content = include_template("layout.php", ["content" => $page_content, "is_auth" => $is_auth, "categories" => $categories, "user_name" => "Иван", "title" => "Главная"]);
    print($layout_content);
?>
