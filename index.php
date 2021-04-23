<?php
require ('core/core.php');
//Redireccionador según variable GET pasada por parametro; Ej: www.learningdonnie.cl/?view=login

if(isset($_GET['view']) and $_GET['view'] == "forum" and isset($_GET['goto'])){
    include ('core/controllers/'.strtolower($_GET['view']).'Controller.php');
}elseif(isset($_GET['view']) and file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controller.php')) {
    include('core/controllers/' . strtolower($_GET['view']) . 'Controller.php');
}else{
    include('core/controllers/homeController.php');
}
