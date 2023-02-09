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


if($find) {

    require(DIR_MODEL . $page . ".php" );
    require(DIR_CONTROLLER . $page . ".php" );
    require(DIR_VIEW . $page . ".php" );

    $pageModel =  new $model();
    $pageController =  new $controller($pageModel);
    $pageView =  new $view($pageController);

    $pageView->render();
}