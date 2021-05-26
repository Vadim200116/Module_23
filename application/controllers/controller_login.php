<?php
class Controller_Login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }
    function action_default()
    {

        $data = $this->model->get_data();
        $this->view->generate('login_view.php', $data);
    }
    function action_check()
    {
        $data = $this->model->get_data();
        if (getUserByName($_POST['name'])) {
            $this->view->generate('main_view.php', $data, $_POST['name']);
        } else {
            $this->view->generate('login_view.php', "Такого пользователя нет");
        }
    }
}
