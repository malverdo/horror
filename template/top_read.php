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

	<?php include 'public/block/link_new.php' ?>
</head>
<body>
	<?php  include 'public/block/header.php' ?>

	





        <!-- breadcumb-area start -->
        <div class="breadcumb-area bg-img-5 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcumb-wrap text-center">
                            <h2><?php print_r($_SESSION['top_read'][0][3]);?></h2>
                            <ul>
                                <li><a href="?path=/">Главная</a></li>
                                <li>/</li>
                                
                                <li class="active"><?php print_r($_SESSION['top_read'][0][3]);?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcumb-area end -->

       <!-- blog-area start -->
        <div class="blog-details-area bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="blog-wrap">
                                    <div class="blog-img">
                                        <img src="<?php print_r($_SESSION['top_read'][0][2]);?>" alt="" >
                                    </div>
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li><a href="#"><i class="fa fa-clock-o"></i><?php print_r($_SESSION['top_read'][0][5]);?></a></li>
                                            <li><a href="#"><i class="fa fa-eye"></i> <?php print_r($_SESSION['top_read'][0][4]);?></a></li>
                                            <li><a href="#"><i class="fa fa-hourglass-start"></i> <?php print_r($_SESSION['top_read'][0][36]);?></a></li>
                                        </ul>
                                        <h3><?php print_r($_SESSION['top_read'][0][3]);?></h3>
                                    </div>
                                </div>
                                <div class="blog-details-wrap">
									
									
								<?php if($_SESSION['top_read'][0][10] === 'null'):?>
									<p class="top_read_text_head"><?php print_r($_SESSION['top_read'][0][3]);?></p>
									
									<p class="top_read_text "><?php print_r($_SESSION['top_read'][0][7]);?></p>
								


								<?php else:?>
									<?php for ($i=0,$e = 6 , $r = 7 , $t = 8; $i < 10; $i++):?>
										<p class="top_read_text_head"><?php print_r($_SESSION['top_read'][0][$e]);?></p>
										<div class="img-width-100">
											<img src="<?php print_r($_SESSION['top_read'][0][$t]);?>" alt="" class="img-width-100">
											
										</div>
										<p class="top_read_text "><?php print_r($_SESSION['top_read'][0][$r]);?></p>
									<?php $e += 3 ;$r += 3;$t += 3?>

									<?php endfor;?>




								<?php endif;?>
					






                                    <blockquote>Цитата дня: В тот день человечество вспомнило ужас, который представлял собой жизнь под их гнетом. Жизнь загнанных зверей, заточенных в ими же возведенной клетке.</blockquote>

                                    <div class="col-xs-12">
                                        <div class="pagination-wrap text-center">
                                            <a href="?path=/random"><ul style="padding: 15px; background-color: #372c1b;">
                                                Читать случайную историю
                                            </ul></a>
                                        </div>
                                    </div>

                                  

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-6">
                        <aside class="sidebar-wrap">
                            
                            <div class="widget sidebar-menu">
                                <h3 class="widget-title">Последние добовления</h3>
                                <ul>
									<?php for ($i=0; $i < 8; $i++):?>
										<li><a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><?php print_r($_SESSION['history'][$i][1]);?></a></li>
									<?php endfor;?>
                                </ul>
                            </div>
                            
                            <div class="widget recent-post">
                                <h3 class="widget-title">Случайная история</h3>
                                <ul>
                                   

										
									<?php for ($i=1; $i < 5; $i++):?>
										<li>
											<div class="post-img">
												<a href="?path=<?php print_r($_SESSION['history_read_2'][$params['random'.$i]][5]);?>"><img src="<?php print_r($_SESSION['history_read_2'][$params['random'.$i]][4]);?>" alt="" style="width:50px; height:50px;"></a>
											</div>
											<div class="post-content">
												<a href="?path=<?php print_r($_SESSION['history_read_2'][$params['random'.$i]][5]);?>"><?php print_r($_SESSION['history_read_2'][$params['random'.$i]][1]);?></a>
												<p><?php print_r($_SESSION['history_read_2'][$params['random'.$i]][6]);?></p>
											</div>
										</li>
									<?php endfor;?>
                                        
                                    
                                    
                                </ul>
                            </div>
                            
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->





















    


    <?php include 'public/block/footer.php' ?>
	<?php include 'public/block/link_js.php' ?>
</body>
</html>