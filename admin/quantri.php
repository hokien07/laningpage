<?php
include("../include/header.php");
include("../include/dbConnect.php");
include("../include/function.php");
?>
<style>

<?php include("../style.css"); ?>
<?php echo  include("../css/admin.css"); ?>
</style>


<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Trang quan tri trang web</p>
            </div>
            <div class="col-md-6">
                <?php
                    $ten = $_SESSION['dang_nhap']['ten'];
                ?>
                <p class="meta-dangnhap">Bạn đăng login: <?php echo $ten ?> | <a href="logout.php">Logout</a></p>

            </div>
        </div>
    </div>
</div>


<?php

$id_user = $_SESSION['dang_nhap']['id'];
if (isset($_POST['submit'])) {
    $errors = array();
    if (empty($_POST['tieude'])) {
        $errors[] = "tieu-de";
    } else {
        $tieude = mysqli_real_escape_string($dbc, $_POST['tieude']);
    }

    if (empty($_POST['des'])) {
        $errors[] = "des";
    } else {
        $des = mysqli_real_escape_string($dbc, $_POST['des']);
    }
    if (empty($errors)) {
        //kiem tra da ton tai hay chua
        $q_tt = "SELECT id_text FROM text";
        $r_tt = mysqli_query($dbc, $q_tt);
        check_query($r_tt, $q_tt);
        if(mysqli_num_rows($r_tt) == 0) {
            $q_is = "INSERT INTO  text                
                  (header, content, id_user)
                  VALUES 
                  ('{$tieude}', '{$des}', $id_user)
              ";
        }else {
            $q_is = "UPDATE text SET header ='{$tieude}', content = '{$des}', id_user = '{$id_user}'";
        }

        $r_is = mysqli_query($dbc, $q_is);
        check_query($r_is, $q_is);

        header("location:../index.php");
    } else {
        echo "vui long dien day du thong tin";
    }
}

?>

<div class="content-quiantri">
    <div class="container"  >
        <div class="row">
            <div class="col-md-2">

            </div>

            <div class="col-md-6">

                <form method="post">
                    <div class="input-group">
                        <label for="tieude">Tiêu đề</label>
                        <input type="text" name="tieude" class="form-control" placeholder="Tiêu đề" aria-label="tieude"
                               value="<?php if (isset($_POST['tieude'])) echo strip_tags($_POST['tieude']) ?>">
                    </div>

                    <div class="input-group">
                        <label for="des" class="mo-ta">Mô tả</label>
                        <textarea name="des" id="des" cols="42" rows="10"
                                  placeholder="<?php if (isset($_POST['des'])) echo strip_tags($_POST['des']); else echo "Nhap mota." ?>"></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Cập nhật</button>
                </form>
            </div>
        </div>

    </div>
</div>

    <?php include("../include/footer.php"); ?>
