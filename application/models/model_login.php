<?php
class Model_Login extends Model
{
    public function get_username()
    {
        if (!empty($_POST)) {
            $username = $_POST['name'];
        }
        $username = NULL;
        return $username;
    }
    public function get_data()
    {
        $data = scandir("uploads");
        $result = array();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i] != "." && $data[$i] != "..") $result[] = $data[$i];
        }
        return $result;
    }
}
