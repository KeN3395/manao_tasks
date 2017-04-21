<?php

class Application
{
    private static
        $instance = null;

    /**
     * @return Application
     */

    private
        $property = array(),
        $template;

    public static function getInstance($template) //получение текущего экзмепляра класса
    {
        if (null === self::$instance) {
            self::$instance = new static($template);
        }
        return self::$instance;
    }

    private function __clone()
    {
    }

    private function __sleep()
    {
    }

    private function __wakeup()
    {
    }

    private function __construct($template)
    {
        $this->template = $template;
        $this->includeFile($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');
    }

    public function restartBuffer() //сбрасывает буффер вывода
    {
        ob_clean();
    }

    public function setPageProperty($id, $value) //устанавливает св-во страницы, например id = 'h1'
    {
        $this->property[$id] = $value;
    }

    public function getPageProperty($id) //получение св-ва страницы по id
    {
        return $this->property[$id];
    }

    public function getTemplate() //возвращает имя шаблона
    {
        return $this->template;
    }

    public function getTemplatePath() //получение пути шаблона
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/app/templates/' . $this->template;
    }

    public function includeComponent() //инициализация класса Component()
    {
        new Component();
    }

    public function showProperty($id) //на месте вызова оставляет макрос для дальнешей замены на необходимое св-во страницы, например если id = 'h1', то макрос = #PAGE_PROPERTY_h1#
    {
        echo "#PAGE_PROPERTY_$id#";
    }

    public function showHeader() //подключает header c папки шаблонов с шаблона $template
    {
        $this->handler("onProlog");
        ob_start();
        $this->includeFile($this->getTemplatePath() . '/header.php');
    }

    public function showFooter() //подключает footer c шаблона
    {
        $this->includeFile($this->getTemplatePath() . '/footer.php');
        $this->handler("onEpilog");
        $contents = ob_get_contents();
        ob_end_clean();
        echo str_replace($this->getProperty(), $this->property, $contents);
    }

    public function handler($event)
    {
        if (function_exists($event))
            call_user_func($event);
    }

    private function includeFile($file) //подключение файлов
    {
        if (file_exists($file))
            include_once $file;
    }

    private function getProperty() //возвращает массив ключей макроса
    {
        $keys_property = array();
        foreach (array_keys($this->property) as $key)
            $keys_property[] = $this->getMacros($key);
        return $keys_property;
    }

    private function getMacros($macro_key) //возвращает макрос
    {
        return '#PAGE_PROPERTY_' . $macro_key . '#';
    }
}

class Component
{
    private
        $name,
        $template,
        $params = array();

    public function includeTemplate()
    {

    }
}
