<?php include("template/header.php"); ?>
    <form method="post">
        <input type="text" placeholder="Tên môn học" name="txtName" value="<?php echo $data['ten_mh']; ?>">
        <input type="text" placeholder="Số tín chỉ" name="txtTinchi" value="<?php echo $data['sotinchi']; ?>">
        <input type="text" placeholder="Số tiết lý thuyết" name="txtTietlt" value="<?php echo $data['sotiet_lt']; ?>">
        <input type="text" placeholder="Số tiết bài tập" name="txtTietbt" value="<?php echo $data['sotiet_bt']; ?>">
        <input type="text" placeholder="Số tiết thực hành-thí nghiệm" name="txtThuchanh" value="<?php echo $data['sotiet_thtn']; ?>">
        <input type="text" placeholder="Số giờ tự học" name="txtGio" value="<?php echo $data['sogio_tuhoc']; ?>">
        <button type="submit">Lưu</button>
    </form>
<?php include("template/footer.php"); ?>