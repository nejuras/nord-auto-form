<?php
namespace Model;

class AutoModel
{
    private $con;

    public function __construct()
    {
        $servername = "localhost";
        $username = "";
        $password = "";
        $dbname = "nordcode_auto";

        $this->con = mysqli_connect($servername, $username, $password, $dbname);

        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function insert()
    {
        if ($_POST) {
            $data = array(
                'auto_marke' => $_POST['marke'],
                'auto_model' => $_POST['model'],
                'kaina' => mysqli_real_escape_string($this->con, $_POST['kaina']),
                'komentaras' => mysqli_real_escape_string($this->con, trim($_POST['komentaras']))
            );

            $string = "INSERT INTO auto (";
            $string .= implode(",", array_keys($data)) . ') VALUES (';
            $string .= "'" . implode("','", array_values($data)) . "')";

            mysqli_query($this->con, "SET NAMES 'utf8'");
            mysqli_query($this->con, "SET CHARACTER SET utf8");
            mysqli_query($this->con, $string);

            $last_id = mysqli_insert_id($this->con);
            $datas = array(
                'auto_id' => $last_id,
                'odinis_s' => (isset($_POST['odinis_s'])) ? 1 : 0,
                'oro_k' => (isset($_POST['oro_k'])) ? 1 : 0,
                'klimato_k' => (isset($_POST['klimato_k'])) ? 1 : 0,
                'sildomos_s' => (isset($_POST['sildomos_s'])) ? 1 : 0
            );
            $savybes_keys = implode(',', array_keys($datas));
            $savybes_values = implode(',', array_values($datas));

            $strings = "INSERT INTO savybes ($savybes_keys)VALUES ($savybes_values)";

            mysqli_query($this->con, $strings);
            header('location:index.php');
        }
    }
}
