
<?php require_once 'application\config.php'; ?>

<?php
class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }
    function action_default()
    {
        $data = $this->model->get_data();
        $username = $this->model->get_username();
        $this->view->generate('main_view.php', $data, $username);
    }
    function action_logout()
    {
        setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/", null, null, true); // httponly !!! 
        header("Location: /Module_23/main");
    }
    function action_loadFile()
    {
        $errors = [];

        if (!empty($_FILES)) {

            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {

                $fileName = $_FILES['files']['name'][$i];

                if ($_FILES['files']['size'][$i] > UPLOAD_MAX_SIZE) {
                    $errors[] = 'Недопустимый размер файла ' . $fileName;
                    continue;
                }

                if (!in_array($_FILES['files']['type'][$i], ALLOWED_TYPES)) {
                    $errors[] = 'Недопустимый формат файла ' . $fileName;
                    continue;
                }

                $filePath = UPLOAD_DIR . '/' . basename($fileName);

                if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
                    $errors[] = 'Ошибка загрузки файла ' . $fileName;
                    continue;
                }
            }
        }
        $data=$this->model->get_data();
        $this->view->generate('main_view.php',$data, $_POST['name']);
    }
}
