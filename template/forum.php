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
	<div class="container_1024px heder_padding">
    
    <?php for ($i=0 ,$q = 0; $i < count($_SESSION['forum']); $i++ ,$q++):?>
        
        <?php for ($x=0; $x < 1; $x++):?>
        <div class="grid_forum">
            <div class='team_disp'>
                <p class='fa fa-users ' class='display_none' style="font-size:50px;" ></p>
            </div>


            <div style="display:flex; align-items: center; flex-wrap:wrap;">
                <a href="?path=<?php print_r($_SESSION['forum'][$i][2])?>" class="title_form_tem"><h3><?php print_r($_SESSION['forum'][$i][1])?></h3></a>&nbsp
                    <?php if($_SESSION['user'][9] == 'Админ' or $_SESSION['user'][9] == 'Модератор'):?>
                        <div class="blog-form">
                            <form action="#" method="POST" >
                                <input type="text" style="display: none;" name ="name_forum" value="<?php print_r($_SESSION['forum'][$i][1]);?>">
                                <button class="fa fa-paper-plane" name='btn_delite' >удалить</button>
                            </form>
                        </div>
                    <?php endif;?>
            </div>
            
            <div class="border_forum" >
                <p ><?php print_r(count($_SESSION['team_all_forum'][$i]))?>-тем</p>
            </div>

            <div class="forum_flex">
                <a href="?path=<?php print_r($_SESSION['team_all_forum'][$i][$x][7])?>"><img src=" <?php print_r($_SESSION['team_all_forum'][$i][$x][6])?>" alt="" class="img_forum_polz"></a>
                <div class="grid_form_avtor">
                    <p>тема: <?php print_r( mb_substr($_SESSION['team_all_forum'][$i][$x][1],0,15)."...")?></p>
                    <a href="?path=<?php print_r($_SESSION['team_all_forum'][$i][$x][7])?>"><p>автор: <?php print_r($_SESSION['team_all_forum'][$i][$x][5])?></p></a>
                    <div class="forum_flex">
                        
                        <p class="fa fa-clock-o"><?php print_r($_SESSION['team_all_forum'][$i][$x][2])?></p>
                    </div>
                </div>
            </div>

            

        </div>
        <?php endfor;?>
    <?php endfor;?>
   
  
      
     






    
        
    <?php $_SESSION['team_all_forum']?>
    <?php if($_SESSION['user'][9] === 'Админ' ):?>
        <br><br>
        <div class="blog-form" >
            <form action="" method="POST">
            <input type="text"  name="form_head" style="background-color: rgba(60,60,60,0.6);" placeholder="добавить форум">
            <button class="fa fa-paper-plane" name="btn_forum" >добавить</button>
            </form>
        </div>
    <?php endif;?>

       







    </div>
    
    
    
    <br><br><br><br><br><br><br><br><br> <br><br><br>
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

