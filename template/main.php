<!DOCTYPE html>
<html lang="en" >
<head>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(70926619, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/70926619" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    <meta name="yandex-verification" content="21136e1eb992f544" />
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<!-- prefix="og: https://ogp.me/ns#" -->
	<!-- <meta property="og:title" content="Главная" />
	<meta property="og:type" content="img" />
	<meta property="og:url" content="https://www.imdb.com/title/tt0117500/" />
	<meta property="og:image" content="/images/banner/divan.jpg" /> -->
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Страшные истории . Мистические , Загадочные истории. Привидение , ужастики , призраки. Настоящие страшные рассказы.  Страшные фото, картинки. Всё это на сайте">
	
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	
	<title><?php echo $params['title'];?></title>

	<?php include 'public/block/link_new.php' ?>
</head>
<body>
	<?php  include 'public/block/header.php' ?>
	 <!-- slider-area start -->
	 <div class="slider-area"  >
            <div class="slider-active" >
                <div class="slider-items" >
                    <img src="assets/images/slider/wolf.jpg" alt="slider" class="slider" >
                    <div class="single-slider">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-sm-10 col-xs-12">
                                    <h2>Страшная история.</h2>
                                    <p>Случайная короткая история  </p>
                                    <a href="?path=<?php print_r($_SESSION['history'][$params['random1']][5]);?>">Здесь</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-items">
                    <img src="assets/images/slider/park.jpg" alt="slider" class="slider">
                    <div class="single-slider single-slider2">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-offset-2 col-sm-10 col-xs-12 col-md-7 col-md-offset-5 text-right">
                                    <h2>Cтрашные рассказы.</h2>
                                    <p>Сборник страшных историй </p>
                                    <a href="?path=/history">Здесь</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- slider-area end -->


		
	
			
  
        <!-- blog-area start -->
        <div class="blog-area bg-1">
            <div class="container">
			
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="section-title text-center">
                            <a href="?path=/history"><h2>Cтрашные истроии</h2></a>
                            <p> Здесь вы можите прочитать страшные короткие истории.</p>
                        </div>
                    </div>
				</div>
				

                <div class="row">
				<?php for ($i=1; $i < 5; $i++):?>
                    <div class="col-2 col-md-3 col-sm-6 col-xs-12">
                        <div class="blog-wrap">
                            <div class="blog-img">
                                <a href="?path=<?php print_r($_SESSION['history'][$params['random'.$i]][5]);?>"><img src="<?php print_r($_SESSION['history'][$params['random'.$i]][4]);?>" alt="" style="height:190px"></a>
                            </div>
                            <div class="blog-content">
							<ul class="blog-meta">
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$params['random'.$i]][5]);?>"><i class="fa fa-clock-o"></i> <?php print_r($_SESSION['history'][$params['random'.$i]][7]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$params['random'.$i]][5]);?>"><i class="fa fa-eye"></i> <?php print_r($_SESSION['history'][$params['random'.$i]][8]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$params['random'.$i]][5]);?>"><i class="fa fa-hourglass-start"></i> <?php print_r($_SESSION['history'][$params['random'.$i]][6]);?></a></li>
                                </ul>
                                <h3><?php print_r($_SESSION['history'][$params['random'.$i]][1]);?></h3>
                                <p><?php print_r(mb_substr($_SESSION['history'][$params['random'.$i]][3] , 0 , 100).' ...');?></p>
                                <a href="?path=<?php print_r($_SESSION['history'][$params['random'.$i]][5]);?>">Читать <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
					</div>
				<?php endfor;?>


				</div>
			</div>	
        </div>
        <!-- blog-area end -->






 <!-- blog-area start -->
 <div class="blog-area bg-1" style="background-color: rgb(121, 121, 121);">
            <div class="container">
                <div class="row " >
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="section-title text-center">
                            <a href="?path=/top"><h2>Топ</h2></a>
                            <p> Здесь собраны лучшие топы.</p>
                        </div>
                    </div>
                </div>
                <div class="row " >

				<?php for ($i=0; $i < 4; $i++):?>
                    <div class="col-2 col-md-3 col-sm-6 col-xs-12">
                        <div class="blog-wrap" >
                            <div class="blog-img">
                                <a href="?path=<?php print_r($_SESSION['top'][$i][1]);?>"><img src="<?php print_r($_SESSION['top'][$i][2]);?>" alt="" style="height:190px"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li><a href="?path=<?php print_r($_SESSION['top'][$i][1]);?>"><i class="fa fa-clock-o"></i> <?php print_r($_SESSION['top'][$i][5]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['top'][$i][1]);?>"><i class="fa fa-eye"></i> <?php print_r($_SESSION['top'][$i][4]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['top'][$i][1]);?>"><i class="fa fa-hourglass-start"></i> <?php print_r($_SESSION['top'][$i][36]);?></a></li>
                                </ul>
                                <h3><?php print_r($_SESSION['top'][$i][3]);?></h3>
                                
                                <br>
                                <a href="?path=<?php print_r($_SESSION['top'][$i][1]);?>">Читать <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
				<?php endfor;?>
                    
                    
                </div>
            </div>
        </div>
        <!-- blog-area end -->




        <!-- blog-area start -->
        <div class="blog-area bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="section-title text-center">
                            <a href="?path=/updates"><h2>Страшные рассказы</h2></a>
                            <p> Последние обновления страшных истроий.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
				<?php for ($i=0; $i < 8; $i++):?>
                    <div class="col-2 col-md-3 col-sm-6 col-xs-12">
                        <div class="blog-wrap" style="height: 470px;">
                            <div class="blog-img">
                                <a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><img src="<?php print_r($_SESSION['history'][$i][4]);?>" alt="" style="height:190px"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><i class="fa fa-clock-o"></i> <?php print_r($_SESSION['history'][$i][7]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><i class="fa fa-eye"></i> <?php print_r($_SESSION['history'][$i][8]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><i class="fa fa-hourglass-start"></i> <?php print_r($_SESSION['history'][$i][6]);?></a></li>
                                </ul>
                                <h3><?php print_r(mb_substr($_SESSION['history'][$i][1], 0 ,17));?></h3>
                                <p><?php print_r(mb_substr($_SESSION['history'][$i][3], 0 ,120).' .....');?></p>
                                <a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>">Читать <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
					<?php endfor;?>
                    
                    
                    
                </div>
               
            </div>
        </div>
        <!-- blog-area end -->

       <!-- fanfact-area start -->
<div class="fanfact-area black-opacity bg-img-2">
    
    <div class="container">
        

        <div class="row">
            
            <div class="col-md-6 col-sm-6 col-xs-12 col-2">
                <div class="fanfact-wrap">
                    <div class="fanfact-content">
                        <h4>Пользователи</h4>
                        <h3 class="counter">1937</h3>
                    </div>
                    
                    <div class="fanfact-icon" >
                        <i class="fa fa-users"></i>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 col-2">
                <div class="fanfact-wrap">
                    <div class="fanfact-content">
                        <h4>Историй</h4>
                        <h3 class="counter">5471</h3>
                    </div>
                    <div class="fanfact-icon">
                        <i class="fa fa-database"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fanfact-area end -->


	
	



	


	<?php include 'public/block/footer.php' ?>

	
	<?php include 'public/block/link_js.php' ?>

</body>

	
</html>
