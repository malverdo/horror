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
    <meta name="description" content="Новые страшные истории ">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
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
                            <h2>Последнии обновления</h2>
                            <ul>
                                <li><a href="?path=/">Главная</a></li>
                                <li>/</li>
                                
                                <li class="active">обновления</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcumb-area end -->

		<div class="blog-area bg-1">
            <div class="container">
                <div class="row">

				<?php for ($i=0; $i < 24	; $i++):?>
                    <div class="col-xs-12 col-md-4 col-sm-6" >
                        <div class="blog-wrap" style="height: 550px;">
                            <div class="blog-img">
                                <a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><img src="<?php print_r($_SESSION['history'][$i][4]);?>" alt="" style="height:250px;"></a>
                            </div>
                            <div class="blog-content">
                                <ul class="blog-meta">
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><i class="fa fa-clock-o"></i>  <?php print_r($_SESSION['history'][$i][7]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><i class="fa fa-eye"></i> <?php print_r($_SESSION['history'][$i][8]);?></a></li>
                                    <li><a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>"><i class="fa fa-hourglass-start"></i> <?php print_r($_SESSION['history'][$i][6]);?></a></li>
                                </ul>
                                <h3><?php print_r($_SESSION['history'][$i][1]);?></h3>
                                <p><?php print_r(mb_substr($_SESSION['history'][$i][3], 0 ,110).' ... ');?></p>
                                <a href="?path=<?php print_r($_SESSION['history'][$i][5]);?>">Читать <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
					</div>
				<?php endfor;?>
					
                    
                    
                    <!-- <div class="col-xs-12">
                        <div class="pagination-wrap text-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li> <span>3</span></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div> -->


                </div>
            </div>
        </div>



    <?php include 'public/block/footer.php' ?>
	<?php include 'public/block/link_js.php' ?>
</body>
</html>

    