<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">

                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="http://www.learningdonnie.cl">Learning Donnie</a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">
                                <li class="mbr-navbar__item">
                                    <a class="mbr-buttons__link btn text-white" href="?view=home"><i class="fa fa-fw fa-lg fa-home"></i>INICIO</a>
                                </li>
                                <?php if(!isset($_SESSION['logged'])) {
                                    echo '<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" onclick="showLogin()">';
                                    echo '<i class="fa fa-fw fa-lg fa-sign-in"></i>INICIAR SESIÓN</a>';
                                    echo '</li>';
                                    echo '<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" onclick="showReg()">';
                                    echo '<i class="fa fa-fw fa-lg fa-user-plus"></i>REGISTRO</a>';
                                    echo '</li>';
                                    echo '<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" data-toggle="modal" data-target="#Recoverypass">';
                                    echo '<i class="fa fa-fw fa-lg fa-question-circle"></i>RECUPERAR CONTRASE&Ntilde;A</a>';
                                    echo '</li>';
                                }else{
                                    echo '<li class="mbr-navbar__item">';
                                    echo '<a class="mbr-buttons__link btn text-white" href="?view=forum&goto=index"><i class="fa fa-fw fa-lg fa-comments"></i>FOROS</a>';
                                    echo '</li>';
                                    echo '<li class="mbr-navbar__item">';
                                    echo '<a class="mbr-buttons__link btn text-white" href="?view=grades"><i class="fa fa-fw fa-lg fa-book"></i>CURSOS</a>';
                                    echo '</li>';
                                    echo '<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" onclick="showAccount()">';
                                    echo '<i class="fa fa-fw fa-lg fa-user"></i>CUENTA</a>';
                                    echo '</li>';
                                    echo '<li class="mbr-navbar__item">';
                                    echo '<a class="mbr-buttons__link btn text-white" href="?view=logout"><i class="fa fa-fw fa-lg fa-sign-out"></i>SALIR</a>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php
    if(!isset($_SESSION['logged'])) {
        include(HTML_DIR . '/main/login.html');
        include(HTML_DIR . '/main/register.html');
        include(HTML_DIR . '/main/recoverypass.php');
    }else{
        include(HTML_DIR . '/main/account.php');
    }
    ?>
