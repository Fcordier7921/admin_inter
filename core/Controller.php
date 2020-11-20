<?php

abstract class Controller
{
    public function loadModel(string $model)
    {
        require_once(ROOT . DS . 'models' . DS . $model . '.php');
        $entity = strtolower(str_replace("Model", "", $model));
        $this->$entity = new $model();
    }

    public function isLogin()
    {
        return isset($_SESSION["user"]) && !empty($_SESSION["user"]);
    }

    public function delSession($index)
    {
        unset($_SESSION[$index]);
    }

    public function redirect(string $nomCtrl = "", string $nomAction = "")
    {
        header("Location: /" . $nomCtrl . ($nomAction != "" ? "/" . $nomAction : ""));
        exit();
    }

    public function render(string $fichier, array $data = [])
    {
        extract($data);
        $dossierView = strtolower(str_replace("Controller", "", get_class($this)));
        require_once(ROOT  . DS . 'views' . DS .  "header" . '.php');
        require_once(ROOT  . DS . 'views' . DS .  $dossierView  . DS . $fichier . '.php');
        require_once(ROOT  . DS . 'views' . DS .  "footer" . '.php');
    }
}
