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
    <?php $comment = new forum_team; ?>
	<div class="pattern pattern--hidden"></div>
	<div class="container_1024px heder_padding">
        <div class="heder_padding_team_forum" >
            <a href="?path=/forum">форум/</a>
            <?php for ($i=0; $i <count($_SESSION['forum']); $i++) 
            { 
                if (address_verification($_SESSION['forum'][$i][2]) and $_SESSION['forum'][$i][2] === $_GET['path'] or address_verification($_SESSION['forum'][$i][2]."/redac" )) {
                    print_r("<a href='#' '> <b>{$_SESSION['forum'][$i][1]}/</b></a>");
                }
            }?>
            
            
        </div>
        
        <?php for ($i=0; $i < count($_SESSION["forum_team{$_GET['path']}"]); $i++):?>
            <div class="grid_forum_team" >

                
                <div class='team_disp'>
                    <p class="fa fa-commenting-o " style="font-size: 60px;"></p>
                </div>
                <div style="display:flex; align-items: center; flex-wrap:wrap;">
                
                    <a href="?path=<?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][4])?>/komment" class="title_team"><h4><?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][1])?></h4></a>
                    &nbsp
                    <?php if($_SESSION['user'][9] == 'Админ' or $_SESSION['user'][9] == 'Модератор'):?>
                        <div class="blog-form">
                            <form action="#" method="POST" >
                                <input type="text" style="display: none;" name ="name_forum" value="<?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][0])?>">
                                <button class="fa fa-paper-plane" name='btn_delite' >удалить</button>
                            </form>
                        </div>
                    <?php endif;?>
                </div>
                

                <div class="flex_forum_team2">
                        <p class="fa fa-user"><?php print_r($comment->comment_login($_SESSION["forum_team{$_GET['path']}"][$i][4]))?>&nbsp&nbsp&nbsp</p>
                        <p class='fa fa-repeat'><?php print_r($comment->comment_taim($_SESSION["forum_team{$_GET['path']}"][$i][4]))?><br></p>
                </div>

                <div class=" border_forum_team flex_forum_team2">
                    
                        
                        <p class='fa fa-comment'><?php print_r($comment->comment_col($_SESSION["forum_team{$_GET['path']}"][$i][4]))?>&nbsp&nbsp&nbsp</p> 
                        <p class='fa fa-eye'><?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][3])?></p>
                    
                </div>
                
                <div class="flex_forum_team">
                    <div >
                        <a href="?path=<?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][7])?>"><img src="<?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][6])?>" alt="" class="img_img_user" ></a>
                    </div>
                    <div class="flex_forum_team3    ">
                        <a href="?path=<?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][7])?>">&nbsp&nbsp&nbsp<p class='fa fa-user'> <?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][5])?></p></a>
                        <div class="flex_forum_team">
                            
                            <p class="fa fa-clock-o"><?php print_r($_SESSION["forum_team{$_GET['path']}"][$i][2])?></p>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php endfor;?>
            
        
   
        <?php if (isset($_SESSION['flash_dobav'])) {
            print_r("<p class='offlain'>".$_SESSION['flash_dobav'].'</p>');
            unset($_SESSION['flash_dobav']);
            
            
        }?>
    <?php if($_SESSION['user'][9] === 'Админ' or $_SESSION['user'][9] === 'Модератор' or $_SESSION['user'][9] == 'Продвинутый пользователь'):?>
        <?php for ($i=0; $i < count($_SESSION['forum']); $i++):?>
            <?php if(isset($_SESSION['user']) and address_verification($_SESSION['forum'][$i][2])):?>
                <br>
                <a href="?path=<?php print_r($_SESSION['forum'][$i][2]."/redac"); ?>" class="fa fa-paper-plane" style="font-size: 16px;"> добавить тему</a>
                
            <?php endif;?>
        <?php endfor;?>
    <?php endif;?>

    <?php if($_SESSION['user'][9] === 'Пользователь'):?>
        <br>
        <p style="font-size:16px;" class='fa fa-comments-o'>чтобы добавить тему оставьте еще <?php print_r(200 - count($_SESSION['kol_komment']))?>  комментраиев</p>

    <?php endif;?>
    
    <?php for ($i=0; $i < count($_SESSION['forum']); $i++):?>
        <?php if(address_verification($_SESSION['forum'][$i][2]."/redac")):?>
            

            <div class="blog-form">
                    <h3>Добавить тему</h3>
                    <form action="" method="POST">
                        
                        <input    type="text" name="form_head_team" placeholder="тема">
                        <textarea name="form_head_team_text" cols="30" rows="10" placeholder="текст"></textarea>
                        <button class="fa fa-paper-plane" name="btn_forum_team">Добавить</button>
                        
                    </form>
                    
            </div>
   
        <?php endif;?>
    <?php endfor;?>

    
    </div>
    
    
    
    <br><br><br><br><br><br><br><br><br> <br><br><br>
    
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

