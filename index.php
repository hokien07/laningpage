<?php
include("include/header.php");
include("include/dbConnect.php");
include("include/function.php");
?>
<div class="container-fuild">
    <div class="content-page">
        <img src="img/background.jpg" alt="banner background" class="img-responsive center-block">
        <div class="text-content">
            <?php
            $q_td = "SELECT * FROM text";
            $r_td = mysqli_query($dbc, $q_td);
            check_query($r_td, $q_td);

            $row = mysqli_fetch_array($r_td);

            if (empty($row['header'])) {
                echo "<h1>WE WILL COMMING SOON</h1>";
            } else {
                echo "<h1>{$row['header']}</h1>";
            }


            if (empty($row['content'])) {
                echo "<p>Lpsum dolor sit amet, consectetur adipisicing elit. Asperiores consequatur cumque fugit illum iure porro quae
                quasi quos veritatis vitae? Adipisci alias aliquid dolorem eos in nesciunt obcaecati officia quis?orem30</p>";
            } else
                echo "<p>{$row['content']}</p>";

            ?>

            <div class="form-dangky">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button"><i class="fa fa-envelope"
                                                                       aria-hidden="true"></i></button>
                  </span>
                    <input type="text" class="form-control" placeholder="nhận thông tin" aria-label=" nhận thông tin">
                </div>

            </div>
        </div>
    </div>
</div><!-- /.container -->
<?php
include("include/footer.php");
?>
