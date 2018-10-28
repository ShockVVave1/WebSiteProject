<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 28.10.2018
 * Time: 0:13
 */

//Объект класса Route анализирует запрос
class Router
{
    private $routes;

    //Читает руты
    public function __construct(){
        $routesPath=ROOT.'/src/config/routes.php';
        $this->routes=include($routesPath);
    }

    /**
     * Return request string
     * @return string;
     */

    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        };
    }


    public function run(){
        //Получаем строку запроса
        $uri = $this->getURI();

        /**
         * TODO Убрать код при размещении на хостинге
         */
        $uri = substr($uri,stripos($uri,'/')+1);

        //Перебираем руты
        foreach ($this->routes as $uriPatterns => $path){
            echo "<br>$uriPatterns->$path";

            //Если найденно совпадение записываем имя контроллера и метода
            if (preg_match('~^'.$uriPatterns.'$~', $uri)){
                $segments = explode('/',$path);

                $controllerName = array_shift($segments).'Controller';
                $controllerName= ucfirst($controllerName);

                $actionName ='action'.ucfirst(array_shift($segments));
                echo '<br>'.$controllerName.'->'.$actionName;

                //Подключение файлов контроллера

                $controllerFile = ROOT.'/src/controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }

                //Создание экземпляр класса, и вызвать метод

                $controllerObject = new $controllerName;
                $result = $controllerObject -> $actionName();
                if($result!=null){
                    break;
                }

            }
        }
    }
}