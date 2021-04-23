<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 3:23
 */ ?>
<?php include (HTML_DIR . '/overall/head.php');?>
<body>
<section class="engine"><a rel="nofollow" href="#"></section>
<?php include(HTML_DIR . '/overall/navBar.php'); ?>
<section class="mbr-section mbr-after-navbar">
    <div class="mbr-section__container container">
        <div class="container" style="margin-top: 40px; margin-bottom: 40px;">
        <?php
        echo '<div role="form" >';
        echo '<div id="idDivChangePassMsg"></div>';
            echo '<div class="form-group">';
                echo '<label for="idTxtPassRecovery1"><span class="fa fa-fw fa-lg fa-eye"></span>Ingrese una nueva contrase&ntilde;a</label>';
                echo '<input type="password" class="form-control" id="idTxtPassRecovery1" placeholder="Contrase&ntilde;a">';
            echo '</div>';
            echo '<div class="form-group">';
                echo '<label for="idTxtPassRecovery2"><span class="fa fa-fw fa-lg fa-eye"></span>Repita su nueva contrase&ntilde;a</label>';
                echo '<input type="password" class="form-control" id="idTxtPassRecovery2" placeholder="Contrase&ntilde;a">';
            echo '</div>';
            echo '<button type="button" class="btn btn-default btn-success btn-block" id="btnSubmitChangePass" onclick="goChangePass()"><span class="fa fa-fw fa-lg fa-refresh"></span> Cambiar contrase&ntilde;a</button>';
        echo '</div>';
        ?>
        </div>
    </div>
</section>
<script src="/views/js/changepass.js"></script>
<?php include (HTML_DIR."/overall/footer.php"); ?>
</body>