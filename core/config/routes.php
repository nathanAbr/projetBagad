<?php
if(empty($_GET)){
    $class = '\application\controller\\'.$config['default_controller'];
    $default = new $class();
    return $default;
}
elseif(!empty($_GET)) {
    $class = '\application\controller\\'.$_GET['pages'];

    $page = new $class();
    if(isset($_GET['module'])){
        $module = $_GET['module'];
        foreach(get_class_methods($page) as $method){
            if($module == $method){
                if(isset($_GET['param'])){
                    $param = $_GET['param'];
                    return $page->$method($param);
                    break;
                }
                else{
                    return $page->$method();
                    break;
                }
            }
        }
    }
    else{
        return $page;
    }
}
?>