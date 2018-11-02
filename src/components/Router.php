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

            //Если найденно совпадение записываем имя контроллера и метода
            if (preg_match('~^'.$uriPatterns.'$~', $uri)){

                //Получение внутреннего маршрута
                $internalRoute = preg_replace('~^'.$uriPatterns.'$~' ,$path, $uri);

                $segments = explode('/',$internalRoute);

                //Получение имени контроллера и метода
                $controllerName = array_shift($segments).'Controller';
                $controllerName= ucfirst($controllerName);

                $actionName ='action'.ucfirst(array_shift($segments));

                //Получение параметров
                $parameters = $segments;


                //Подключение файлов контроллера

                $controllerFile = ROOT.'/src/controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }

                //Создание экземпляр класса, и вызвать метод

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);
                if($result!=null){
                    break;
                }

            }
        }
    }
}