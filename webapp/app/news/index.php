<?php
include $_SERVER['DOCUMENT_ROOT'].'/app/core.php';
$app = Application::getInstance("news");
$app->showHeader();
echo "<h1>";
$app->showProperty('h1');
echo "</h1>";
$app->showFooter();
