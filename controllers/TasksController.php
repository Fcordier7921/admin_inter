<?php
class TasksController extends Controller //
{

    //c'est une page proteger par mot de passe
    public function home($args)
    {
        if (!$this->isLogin()) {
            $this->redirect();
        }
        if (!isset($_POST) && isset($_SESSION["search"]) && !empty($_SESSION["search"])) {
            $formDatas = $_SESSION["search"];
        } else {
            $_SESSION["search"] = $formDatas = $_POST;
        }

        $this->loadModel("InterventionModel");

        if (!isset($formDatas) || empty($formDatas) || ($formDatas["date"] == "" && $formDatas["etage"] == "tous")) {
            $tasks = $this->intervention->getAll();
        } else {
            $tasks = $this->intervention->findBy($formDatas);
        }


        $nbEtages = 10;

        return $this->render("home", ["tasks" => $tasks, "nbEtages" => $nbEtages]);
    }

    public function add_task()
    {
        $formDatas = $_POST;
        $this->loadModel("InterventionModel");
        $this->intervention->add($formDatas);
        $this->redirect("tasks", "home");
    }

    public function update_task()
    {
        $formDatas = $_POST;
        $this->loadModel("InterventionModel");
        $this->intervention->update($formDatas);
        $this->redirect("tasks", "home");
    }

    public function delete_task()
    {
        $formDatas = $_POST;
        $this->loadModel("InterventionModel");
        $this->intervention->delete($formDatas["id"]);
        $this->redirect("tasks", "home");
    }
}
