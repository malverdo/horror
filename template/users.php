<!DOCTYPE html>
<html lang="en" >
<head>
<!-- prefix="og: https://ogp.me/ns#" -->
	<!-- <meta property="og:title" content="Главная" />
	<meta property="og:type" content="img" />
	<meta property="og:url" content="https://www.imdb.com/title/tt0117500/" />
	<meta property="og:image" content="/images/banner/divan.jpg" /> -->
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $params['title'];?></title>

    <?php include 'public/block/link.php' ?>
    <?php include 'public/block/link_new.php' ?>
</head>
<body>

	<?php  include 'public/block/header_forum.php' ?>
    
    <div class="pattern pattern--hidden"></div>
    
    <!-- blog-area start -->
    <div class="blog-area bg-1">
            <div class="container">
                <div class="row" >
                <br><br>
                <h2>Пользователи</h2>
                
       
            
                </div>
                <div class="row">
				<?php for ($i=0; $i < count($_SESSION['user_ac']); $i++):?>
                    <div class="col-2 col-md-3 col-sm-6 col-xs-12">
                        <div class="blog-wrap" style="height: 380px;">
                            <div class="blog-img" >
                                <a href="?path=<?php print_r($_SESSION['user_ac'][$i][14]);?>"><img src="<?php print_r($_SESSION['user_ac'][$i][5]);?>" alt="" style="height:190px"></a>
                            </div><a href="?path=<?php print_r($_SESSION['user_ac'][$i][14]);?>">
                            <div class="blog-content">
                                
                                <h3><?php print_r($_SESSION['user_ac'][$i][1]);?></h3>
                                <p><b>статус:</b> <?php $retVal = (strtotime($_SESSION['user_ac'][$i][8]) > time() - 120 ) ? print_r(" <span class='onlain'>online</span>") : print_r(" <span class='offlain'>offline</span>") ;?><br>
                                <b>регистрация:</b>  <?php print_r($_SESSION['user_ac'][$i][7]);?><br>
                                <b>Посещение:</b> <?php print_r($_SESSION['user_ac'][$i][8]);?><br>
                                <b>Права:</b>  <?php print_r($_SESSION['user_ac'][$i][9]);?><br>
                            
                            
                            </p>
                                
                                
                            </div></a>
                        </div>
                    </div>
					<?php endfor;?>
                    
                    
                    
                </div>
                <div class="col-xs-12">
                    <div class="pagination-wrap text-center">
                        <ul>
                            
                            <?php if ((int)$_SESSION['namber_str_link'] === count($_SESSION['namber_link']) and isset($_SESSION['namber_str_link'])):?>

                                <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][2])?>"><i class="fa fa-angle-left"></i></a></li>

                                        
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][0])?>"><?php print_r($_SESSION['link_user'][0])?></a></li>
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][1])?>"><?php print_r($_SESSION['link_user'][1])?></a></li>
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][2])?>"><?php print_r($_SESSION['link_user'][2])?></a></li>
                                        <li> <span><?php print_r($_SESSION['link_user'][3])?></span></li>

                                        


                            <?php elseif( isset($_SESSION['namber_str_link']) and (int)$_SESSION['namber_str_link'] === count($_SESSION['namber_link']) - 1):?>

                                <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][1])?>"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][0])?>"><?php print_r($_SESSION['link_user'][0])?></a></li>
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][1])?>"><?php print_r($_SESSION['link_user'][1])?></a></li>
                                        <li> <span><?php print_r($_SESSION['link_user'][2])?></span></li>
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][3])?>"><?php print_r($_SESSION['link_user'][3])?></a></li>
                                        
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][3])?>"><i class="fa fa-angle-right"></i></a></li>
                                        

                                <?php else:?>
                            

                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][0])?>"><i class="fa fa-angle-left"></i></a></li>

                                        <?php if(address_verification('/users') or address_verification('/users/1')):?>
                                            <li> <span><?php print_r($_SESSION['link_user'][0])?></span></li>
                                            <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][1])?>"><?php print_r($_SESSION['link_user'][1])?></a></li>
                                        <?php else:?>
                                            <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][0])?>"><?php print_r($_SESSION['link_user'][0])?></a></li>
                                            <li> <span><?php print_r($_SESSION['link_user'][1])?></span></li>
                                        <?php endif;?>
                                        
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][2])?>"><?php print_r($_SESSION['link_user'][2])?></a></li>
                                        <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][3])?>"><?php print_r($_SESSION['link_user'][3])?></a></li>
                                        <?php if(address_verification('/users') or address_verification('/users/1')):?>
                                            <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][1])?>"><i class="fa fa-angle-right"></i></a></li>
                                            <?php else:?>
                                                <li><a href="?path=/users/<?php print_r($_SESSION['link_user'][2])?>"><i class="fa fa-angle-right"></i></a></li>
                                                <?php endif;?>

                                                
                                <?php endif; ?>
                                
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->
    
   








 
    


    
    
    
    
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

