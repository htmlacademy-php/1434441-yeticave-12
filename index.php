<?php
require_once("helpers.php");

$is_auth = rand(0, 1);
$user_name = "Иван";
?>

<?php 
    $connection = mysqli_connect("localhost", "root", "", "yeticave");
    
    $sql_request_lots = "SELECT  title, start_price, img_path, dt_add, dt_sell, name, symbol_code FROM lots l INNER JOIN categories c ON (l.category_id = c.id) WHERE dt_sell > CURRENT_TIMESTAMP ORDER BY dt_add DESC LIMIT 6";
    $sql_request_categories = "SELECT * FROM categories";

    $result_lots = mysqli_query($connection, $sql_request_lots);
    $result_categories = mysqli_query($connection, $sql_request_categories);

    $rows_lots = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);
    $rows_categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
?>

<?php
    $page_content = include_template("main.php", ["rows_categories" => $rows_categories, "rows_lots" => $rows_lots]);
    $layout_content = include_template("layout.php", ["content" => $page_content, "rows_categories" => $rows_categories, "is_auth" => $is_auth, "user_name" => "Иван", "title" => "Главная"]);
    print($layout_content);
?>
