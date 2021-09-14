<?php
require_once("ini.php");
require_once("helpers.php");

$connection = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASSWORD, DB_NAME);

$sql_request_lots = "SELECT  title, start_price, img_path, dt_add, dt_sell, name, symbol_code 
FROM lots l INNER JOIN categories c ON (l.category_id = c.id) 
WHERE dt_sell > CURRENT_TIMESTAMP ORDER BY dt_add DESC LIMIT 6";

$sql_request_categories = "SELECT name, symbol_code FROM categories";

/**
 * Возвращает данные из таблицы с лотами товаров
 *
 * @param mysqli $connection Ресурс соединения
 * @param string $sql_request_lots запрос на получение данных
 *
 * @return array Данные о всех лотах, подподающих под запрос
 */
function get_lots($connection)
{
    global $sql_request_lots;
    $result_lots = mysqli_query($connection, $sql_request_lots);
    return mysqli_fetch_all($result_lots, MYSQLI_ASSOC);
}

/**
 * Возвращает данные из таблицы с категориями товаров
 *
 * @param mysqli $connection Ресурс соединения
 * @param string $sql_request_categories запрос на получение данных
 *
 * @return array Данные о всех категориях, подподающих под запрос
 */
function get_categories($connection)
{
    global $sql_request_categories;
    $result_categories = mysqli_query($connection, $sql_request_categories);
    return mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
}