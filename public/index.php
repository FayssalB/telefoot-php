<?php


$page = "home";
if(isset($_GET["page"])){
    $page = $_GET["page"];
}


$pages = array(
    "home" => array(
        "model" => "HomeModel",
        "controller" => "HomeController",
        "view" => "HomeView"
    ),
    "subscribe" => array(
        "model" => "SubscribeModel",
        "controller" => "SubscribeController",
        "view" => "SubscribeView"
    ),
    "login" => array(
        "model" => "LoginModel",
        "controller" => "LoginController",
        "view" => "LoginView"
    )
);

$find = false;
foreach($pages as $key => $value) {
    if($page === $key)
    {
        $model = $value["model"];
        $controller = $value["controller"];
        $view = $value["view"];

        $find = true;
    }
}

require("../config/index.php");

$dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

if($find) {

    require(DIR_MODEL . $page . ".php" );
    require(DIR_CONTROLLER . $page . ".php" );
    require(DIR_VIEW . $page . ".php" );

    $pageModel =  new $model($db);
    $pageController =  new $controller($pageModel);
    $pageView =  new $view($pageController);

    $pageView->render();
}