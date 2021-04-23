<?php
/**
 * Created by PhpStorm.
 * User: int0theVoid
 * Date: 20-10-16
 * Time: 23:39
 */
include(HTML_DIR.'/overall/head.php');
include(HTML_DIR.'/overall/navBar.php')?>


    <section class="mbr-section mbr-section--relative mbr-after-navbar" id="msg-box4-0" style="background-color: rgb(193, 193, 193);">

        <div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 124px; padding-bottom: 93px;">
            <div class="row">
                <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                    <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6">
                        <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width"><img src="/views/assets/images/iphone.png" class="mbr-figure__img"></figure>
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
            if($resp == true){
                echo '<div class="text-center alert alert-success">';
                echo '<strong>La cuenta ha sido registrada correctamente</strong>';
                echo '</div>';
            }else{
                echo '<div class="text-center alert alert-danger">';
                echo '<strong>Error en la activaci&oacute;n de la cuenta</strong>';
                echo '</div>';
            }
            echo '<div class="text-center">';
            echo '<img src="/views/images/iconRoboto.png">';
            echo '</div>';
        }
        ?>
    </section>





<?php include(HTML_DIR.'/overall/footer.php'); ?>