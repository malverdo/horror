<!-- header-area start -->
<header class="header-area" id="sticky-header" >
            <div class="container " >
                <div class="row" >
                    <div class="col-xs-12">
                        <div class="header-bottom">
                             <div class="row">
                                <div class="col-md-3 col-sm-9 col-xs-6">
                                    <div class="logo">
                                        <a href="?path=/">
                                            <img src="assets/images/slider/logo.png" alt="" width="200">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 hidden-sm hidden-xs">
                                    <div class="mainmenu text-right">
                                        <ul id="navigation" >
                                            <li <?php $retVal = (address_verification('/')) ? print_r("class='active'") : null ;?>><a href="?path=/" >Сайт</a></li>
                                            <li <?php $retVal = (address_verification('/forum')) ? print_r("class='active'") : null ;?>><a href="?path=/forum">Форум</a></li>
                                            <li <?php $retVal = (address_verification('/users')) ? print_r("class='active'") : null ;?> ><a href="?path=/users">Пользователи</a></li>
                                           
                                            <?php if(isset($_SESSION['user'][1])):?>
                                                <li ><a href="<?php print_r("?path={$_SESSION['user'][4]}");?>" class='fa fa-user'><?php print_r(" ".$_SESSION['user'][1]);?> </a></li>
                                                <?php if($_SESSION['user_vxod_kol'] === 0):?>
                                                    <li ><a href="<?php print_r("?path=/mail/vxod");?>"class='fa fa-paper-plane' ><?php print_r(' '.$_SESSION['user_vxod_kol']);?></a></li>
                                                <?php else:?>
                                                    <li class='active'><a href="<?php print_r("?path=/mail/vxod");?>"class='fa fa-paper-plane' ><?php print_r(' '.$_SESSION['user_vxod_kol']);?></a></li>
                                                <?php endif;?>
                                            <?php else:?>
                                            
                                                <li <?php $retVal = (address_verification('/registra')) ? print_r("class='active'") : null ;?>><a href="?path=/registra">вход/регистрация</a></li>

                                            <?php endif; ?>
                                            
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                                <?php if(address_verification('/users')):?>
                                <div class="col-md-1 col-sm-2 col-xs-4">
                                    <div class="search-wrap text-right">
                                        <ul>
                                        
                                            <li><a href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                                <ul>
                                                    <li>
                                                        <form action="#">
                                                            <input type="text" style="background:rgb(150,150,150);"  placeholder="Поиск пользователя" >
                                                            <button><i class="fa fa-search"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div class="col-md-1 col-sm-2 col-xs-4">
                                    <div class="search-wrap text-right">
                                        
                                    </div>
                                </div>
                                <div class=" col-xs-2 col-sm-1 hidden-md hidden-lg">
                                    <div class="responsive-menu-wrap floatright"></div>
                                </div>
                                
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


