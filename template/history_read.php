<!DOCTYPE html>
<html lang="en" >
<head>
<!-- prefix="og: https://ogp.me/ns#" -->
	<!-- <meta property="og:title" content="Главная" />
	<meta property="og:type" content="img" />
	<meta property="og:url" content="https://www.imdb.com/title/tt0117500/" />
	<meta property="og:image" content="/images/banner/divan.jpg" /> -->
	<meta charset="UTF-8">
	<meta name="description" content="Страшные история читать">
	
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
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
                            <h2>Читать страшную историю</h2>
                            <ul>
                                <li><a href="?path=/">Главная</a></li>
                                <li>/</li>
                                
                                <li class="active"><?php print_r($_SESSION['history_read'][0][1]);?></li>
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
                                        <img src="<?php print_r($_SESSION['history_read'][0][4]);?>" alt="" >
                                    </div>
                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li><a href="#"><i class="fa fa-clock-o"></i><?php print_r($_SESSION['history_read'][0][7]);?></a></li>
                                            <li><a href="#"><i class="fa fa-eye"></i> <?php print_r($_SESSION['history_read'][0][8]);?></a></li>
                                            <li><a href="#"><i class="fa fa-hourglass-start"></i> <?php print_r($_SESSION['history_read'][0][6]);?></a></li>
                                        </ul>
                                        <h3><?php print_r($_SESSION['history_read'][0][1]);?></h3>
                                    </div>
                                </div>
                                <div class="blog-details-wrap" style="font-size: 16px;">
                                    <p><?php print_r($_SESSION['history_read'][0][3]);?></p>
                                    <blockquote>Цитата дня: В тот день человечество вспомнило ужас, который представлял собой жизнь под их гнетом. Жизнь загнанных зверей, заточенных в ими же возведенной клетке.</blockquote>

                                    <div class="col-xs-12">
                                        <div class="pagination-wrap text-center">
                                            <a href="?path=/random"><ul style="padding: 15px; background-color: #372c1b;">
                                                Следующая случайная история
                                            </ul></a>
                                        </div>
                                    </div>

                                    <!-- <div class="blog-form">
                                        <h3>Оставить коментарий</h3>
                                        <form action="#">
                                            
                                            <span>Ваш коментарий</span>
                                            <textarea name="massage" cols="30" rows="10" placeholder="текст"></textarea>
                                            <button>Отправить</button>
                                            
                                        </form>
                                        
                                    </div> -->

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-6">
                        <aside class="sidebar-wrap">
                            
                            <div class="widget sidebar-menu">
                                <a href="?path=/updates"><h3 class="widget-title">Последние добовления</h3></a>
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