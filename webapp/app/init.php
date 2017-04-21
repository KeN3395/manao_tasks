<?php
function onEpilog() {
    Application::getInstance("news")->setPageProperty('h1','news');
};