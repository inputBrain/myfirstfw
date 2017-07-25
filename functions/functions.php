<?php

function get_route($uri) {
    // Получаем из глобальной зоны видимости $ROUTE в переменную $routes
    global $ROUTE;
    $routes = $ROUTE;

    // В цикли ищем какому из ключей массива $ROUTES подходит адресная строка
    foreach ($routes as $rUri => $rRoute) {
        // Если найдено совпадение, заменяем адресную строку на значение соответствующего ключа
        if (preg_match("#^{$rUri}$#Ui", $uri)) {
            $route = preg_replace("#^{$rUri}$#Ui", $rRoute, $uri);
            break;
        }
    }

    $route = explode('/', $route);
    // Выделяем контроллер, экшен и параметры
    $return['controller'] = array_shift($route);
    $return['action'] = array_shift($route);
    $return['params'] = empty($route) ? array() : $route;

    return $return;
}
