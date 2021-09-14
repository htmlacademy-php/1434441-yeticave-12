<?php
require_once("helpers.php");
require_once("db-models.php"); 

$is_auth = rand(0, 1);
$user_name = "Иван";

$lots = get_lots($connection);
$categories = get_categories($connection);
?>

<?php
    $page_content = include_template("main.php", [
        "categories" => $categories,
        "lots" => $lots
    ]);
    
    $layout_content = include_template("layout.php", [
        "content" => $page_content, 
        "categories" => $categories, 
        "is_auth" => $is_auth, 
        "user_name" => "Иван", 
        "title" => "Главная"
    ]);

    print($layout_content);
?>
