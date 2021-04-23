<?php
/**
 * Created by PhpStorm.
 * User: Int0.thevoid
 * Date: 07-06-2016
 * Time: 3:23
 */ ?>
<?php include (HTML_DIR . '/overall/head.php');?>
<body>
<?php include(HTML_DIR . '/overall/navBar.php'); ?>
<section class="engine"><a rel="external" href="http://www.learningdonnie.cl">Learning Donnie</a>
</section>
<section class="mbr-section mbr-section--relative mbr-after-navbar" id="msg-box4-0" style="background-color: rgb(193, 193, 193);">

    <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 124px; padding-bottom: 93px;">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6">
                    <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><img src="/views/assets/images/iphone.jpg" class="mbr-figure__img"></figure>
                </div>
                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 mbr-section__right">
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
                            <h3 class="mbr-header__text">¿Por qué Learning Donnie?</h3>
                        </div>
                    </div>
                    <div class="mbr-section__container mbr-section__container--middle">
                        <div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg"><p>Learning Donnie es una WebApp desarrollada para aquellas personas que forman parte de un ambiente de aprendizaje institucional que buscan reforzar los contenidos que imparten las entidades educativas haciendo &nbsp;que estas mismas se hagan partícipe de esta iniciativa.</p></div>
                    </div>
                    <div class="mbr-section__container">
                        <div class="mbr-buttons mbr-buttons--auto-align btn-inverse"><a class="mbr-buttons__btn btn btn-lg btn-default" href="http://www.learningdonnie.cl">Leer más</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    if(isset($_GET['success'])){
        $resp = strtolower($_GET['success']);
        if($resp == 'true'){
            echo '<div class="text-center alert alert-success">';
            echo '<strong>';
            echo 'Su cuenta ha sido activada satisfactoriamente. Por favor, inicie sesi&oacute;n.';
            echo '</strong>';
            echo '</div>';
        }elseif ($resp == 'close'){
            echo '<div class="text-center alert alert-warning">';
            echo '<strong>';
            echo 'Su cuenta ya fue activada anteriormente';
            echo '</strong>';
            echo '</div>';
        }else{
            echo '<div class="text-center alert alert-danger">';
            echo '<strong>Error en la activaci&oacute;n de la cuenta.</strong>';
            echo '</div>';
        }
        echo '<div class="text-center">';
        echo '<img src="/views/images/iconRoboto.png">';
        echo '</div>';
    }else if (isset($_GET['reg']) and empty($_SESSION['logged'])){
        echo '<script type="text/javascript">',
        'showReg();',
        '</script>'
        ;
    }
    ?>
</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="features1-1" style="background-color: rgb(255, 255, 255);">

    <div class="mbr-section__container mbr-section__container--std-top-padding mbr-section__container--sm-bot-padding mbr-section-title container" style="padding-top: 93px;">
        <div class="mbr-header mbr-header--center mbr-header--wysiwyg row">
            <div class="mbr-section__container container">
                <div class="hidden-lg section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../views/images/LDonnie_LogoMB.png" class="center-block hidden-lg img-responsive img-rounded">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden-md hidden-sm hidden-xs section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../views/images/LDonnie_Logo.png" class="center-block hidden-sm hidden-xs img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-sm-offset-2" style="margin-top: 40px; margin-bottom: 20px">
                <h3 class="mbr-header__text">Un proyecto desarrollado gracias a:</h3>

            </div>
        </div>
    </div>
    <div class="mbr-section__container container">
        <div class="mbr-section__row row">
            <div class="mbr-section__col col-xs-3 col-md-3 col-sm-3">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="http://getbootstrap.com/" target="_blank"><img src="/views/assets/images/bootstrap.png" class="mbr-figure__img" alt="Bootstrap"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text"></h3>
                    </div>
                </div>


            </div>
            <div class="mbr-section__col col-xs-3 col-md-3 col-sm-3">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="http://api.jquery.com/jquery.ajax/" target="_blank"><img src="/views/assets/images/ajax-logo-600x408-92.png" class="mbr-figure__img" alt="AJAX"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text"></h3>
                    </div>
                </div>


            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="mbr-section__col col-xs-3 col-md-3 col-sm-3">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="https://secure.php.net/" target="_blank"><img src="/views/assets/images/logo-php-xxl-600x600-88.png" class="mbr-figure__img" alt="PHP"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text"></h3>
                    </div>
                </div>


            </div>

            <div class="mbr-section__col col-xs-3 col-md-3 col-sm-3">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="https://www.javascript.com/" target="_blank"><img src="/views/assets/images/node-icon2-600x600-99.png" class="mbr-figure__img" alt="JavaScript"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text"></h3>
                    </div>
                </div>


            </div>



        </div>
    </div>
</section>

<?php include (HTML_DIR."/overall/footer.php"); ?>
</body>
</html>