<?php
class Controller_Register extends Controller
{
    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }
    function action_default()
    {
        $this->view->generate('register_view.php');
    }
    function action_check()
    {
        if (register($_POST)) {
            $this->view->generate('main_view.php', $_POST['name']);
        } else {
            print('Не удалось добавить пользователя');
        }
    }
}
