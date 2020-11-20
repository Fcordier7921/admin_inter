<?php
class PagesController extends Controller
{
    function index($args)
    {

        if ($this->isLogin()) {
            $this->redirect("tasks", "home");
        }

        return $this->render("home", ["titrepage" => "Connection"]);
    }

    function login()
    {
        $formDatas = $_POST;
        $this->loadModel("UserModel");
        $isLogin = $this->user->is_login($formDatas["username"], $formDatas["password"]);

        if ($isLogin) {
            $this->redirect("tasks", "home");
        }
        $this->redirect();
        exit();
    }

    function logout()
    {
        $this->delSession("user");
        $this->redirect();
        exit();
    }
}
