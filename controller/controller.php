<?php
    require_once 'model/model.php';
    class controller{
        function index(){
            $model = new model;
            $datas = $model->getAllUsers();
            require_once('view/index.php');
        }

        function details(){
            $model = new model;
            $mamh = $_GET['mamh'];
            $data = $model->getUser($mamh);
            if($data)
                header("location:index.php");
                else
                header("error.php");
        }

        function add(){
            require_once 'view/add.php';
            if(isset($_POST['txtName'])){
                $ten_mh = $_POST['txtName'];
                $sotinchi = $_POST['txtTinchi'];
                $sotiet_lt = $_POST['txtTietlt'];
                $sotiet_bt = $_POST['txtTietbt'];
                $sotiet_thtn = $_POST['txtThuchanh'];
                $sogio_tuhoc = $_POST['txtGio'];
                $model = new model;
                $result = $model->addUsers($ten_mh, $sotinchi, $sotiet_lt, $sotiet_bt, $sotiet_thtn, $sogio_tuhoc);
                if($result)
                header("location:index.php");
                else
                header("error.php");
            }
        }

        function edit(){
            $model = new model;
            $mamh = $_GET['mamh'];
            $data = $model->getUser($mamh);
            require_once('view/edit.php');
            if(isset($_POST['txtName'])){
                $ten_mh = $_POST['txtName'];
                $sotinchi = $_POST['txtTinchi'];
                $sotiet_lt = $_POST['txtTietlt'];
                $sotiet_bt = $_POST['txtTietbt'];
                $sotiet_thtn = $_POST['txtThuchanh'];
                $sogio_tuhoc = $_POST['txtGio'];
                $result = $model->updateUser($mamh, $ten_mh, $sotinchi, $sotiet_lt, $sotiet_bt, $sotiet_thtn, $sogio_tuhoc);
                if($result)
                header("location:index.php");
                else
                header("error.php");
            }
        }

        function delete(){
            $model = new model;
            $mamh = $_GET['mamh'];
            $result = $model->deleteUser($mamh);
            if($result)
                header("location:index.php");
                else
                header("error.php");
        }
    }
?>