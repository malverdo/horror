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
                                            <li <?php $retVal = (address_verification('/')) ? print_r("class='active'") : null ;?>><a href="?path=/" >Главная</a>
                                                <?php if ($_SESSION['user'][9] == 'Админ' or $_SESSION['user'][9] == 'Модератор' ):?>
                                                    <ul style="width:240px;">
                                                        <li ><a href="?path=/add_history">Добавить историю </a></li>
                                                        <li ><a href="?path=/check_taem">Проверить новые темы </a></li>
                                                    </ul>
                                                <?php endif;?>
                                        
                                            </li>
                                                        
                                            <li <?php $retVal = (address_verification('/history')) ? print_r("class='active'") : null ;?> ><a href="?path=/history">Страшные истории</a>
                                                <ul style="width: 300px;">
                                                    <li ><a href="?path=/history">Страшные истории</a></li>
                                                    <li ><a href="?path=/updates">Последние обновления</a></li>
                                                    <?php for ($i=1; $i < 5; $i++):?>
                                                    <li ><a href="?path=<?php print_r($_SESSION['history'][$params['random'.$i]][5]);?>">(История)<?php print_r($_SESSION['history'][$params['random'.$i]][1]);?></a></li>
                                                    
                                                    <?php endfor;?>
                                                </ul>
                                            </li>
                                            <li <?php $retVal = (address_verification('/random')) ? print_r("class='active'") : null ;?>><a href="?path=/random">Случайная история</a></li>
                                            <li <?php $retVal = (address_verification('/top')) ? print_r("class='active'") : null ;?>><a href="?path=/top">Топ</a></li>
                                            <li <?php $retVal = (address_verification('/forum')) ? print_r("class='active'") : null ;?>><a href="?path=/forum">Форум</a></li>
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
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
