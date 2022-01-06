<?php
    require_once 'config/db.php';
    class model{
        private $mamh, $ten_mh, $sotinchi, $sotiet_lt, $sotiet_bt, $sotiet_thtn, $sogio_tuhoc;

        public function connectDb() {
            $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
            }
            return $connection;
        }
    
        public function closeDb($connection = null) {
            mysqli_close($connection);
        }

        public function getAllUsers(){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sql = "SELECT * FROM MONHOC";
            $result = mysqli_query($conn,$sql);

            // Tôi khai báo biến lưu kết quả trả về (dạng mảng)
            $datas = [];
            // B3. Xử lý và (KO PHẢI SHOW KẾT QUẢ) TRẢ VỀ KẾT QUẢ
            if(mysqli_num_rows($result) > 0){
                // Lấy tất cả dùng mysqli_fetch_all
                $arr_users = mysqli_fetch_all($result, MYSQLI_ASSOC); //Sử dụng MYSQLI_ASSOC để chỉ định lấy kết quả dạng MẢNG KẾT HỢP
            }
            $this->closeDb($conn);

            return $arr_users;
        }

        public function addUsers($name, $tinchi, $tietlt, $tietbt, $tietth, $giotuhoc){
            $conn = $this->connectDb();
            $sql = "INSERT INTO MONHOC(ten_mh,sotinchi,sotiet_lt,sotiet_bt,sotiet_thtn,sogio_tuhoc) VALUES ('$name', '$tinchi', '$tietlt', '$tietbt', '$tietth', '$giotuhoc')";
            $result = mysqli_query($conn,$sql);
            $this->closeDb($conn);
            return $result;
        }


        public function getUser($mamh){
            $conn = $this->connectDb();

            $sql = "SELECT * FROM MONHOC WHERE mamh = '$mamh'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0)
                $user = mysqli_fetch_assoc($result);
            $this->closeDb($conn);
            return $user;
        }

        public function updateUser($mamh, $name, $tinchi, $tietlt, $tietbt, $tietth, $giotuhoc){
            $conn = $this->connectDb();

            $sql = "UPDATE MONHOC SET ten_mh='$name', sotinchi='$tinchi', sotiet_lt='$tietlt', sotiet_bt='$tietbt',sotiet_thtn ='$tietth', sogio_tuhoc='$giotuhoc' WHERE mamh = '$mamh'";
            $result = mysqli_query($conn,$sql);

            $this->closeDb($conn);
            return $result;
        }

        function deleteUser($mamh){
            $conn = $this->connectDb();

            $sql = "DELETE FROM MONHOC WHERE mamh = '$mamh'";
            $result = mysqli_query($conn,$sql);

            $this->closeDb($conn);
            return $result;
        }
    }
?>