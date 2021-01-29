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
	
	<title><?php print_r($_SESSION["forum_comment"][0][1])?></title>

    <?php include 'public/block/link.php' ?>
    <?php include 'public/block/link_new.php' ?>
</head>
<body>

	<?php  include 'public/block/header_forum.php' ?>
    
    <div class="pattern pattern--hidden"></div>
    
    
	<div class="container_1024px heder_padding">
    <div class="heder_padding_team_forum">
        <a href="?path=/forum">форум/</a>
        <a href='?path=<?php print_r($_SESSION["forum_comment"][0][4])?>/komment'class='color-link2' ><b><?php print_r($_SESSION["forum_comment"][0][1])?>/</b></a>
        
    </div>
        <div class="grid_comentarii">
           
            <div>
            
                <a href="?path=<?php print_r($_SESSION["forum_comment"][0][7])?>"><img src=" <?php print_r($_SESSION["forum_comment"][0][6])?>" alt=""  class="img_coment"></a>
                
                <div class="flex_commetn">
                    <div class="flex_commetn">
                        
                        <p class="fa fa-user"></p>
                        <a href="?path=<?php print_r($_SESSION["forum_comment"][0][7])?>"><p> <?php print_r($_SESSION["forum_comment"][0][5])?></p></a>
                    </div>
                    <div class="flex_commetn">
                    <p class="fa fa-eye"></p>
                        <p ><?php print_r($_SESSION["forum_comment"][0][3])?></p>
                    </div>
                </div>

                <div class="flex_commetn">
                    <div>
                        <p >Статус: <?php if (strtotime($_SESSION['online_coment'][0][8]) > time() - 120 ) {

                                        print_r("<span class='onlain'> online</span>");
                                    }else{
                                        print_r("<span class='offlain'> offline</span>");
                                    }?></p>
                    </div>
                    <div class="flex_commetn">
                        <img src="images/icon_forum_team/chat_bol.png" alt="" width="20">
                        <p ><?php print_r(count($_SESSION['comment_all']));?>
</p>
                    </div>
                </div>

                <div class="flex_commetn1">
                    
                    <p style="color: rgba(150,150,150,0.7);" class='fa fa-clock-o'><?php print_r($_SESSION["forum_comment"][0][2])?></p>
                </div>

            </div>
            

            <div class="text_commetn">
                <h2><?php print_r($_SESSION["forum_comment"][0][1])?></h2>
                <p>
                <?php print_r($_SESSION["forum_comment"][0][9])?>
                </p>
                
            </div>
                                    
        </div>
        
        

        
        
        <?php for ($i=0; $i < count($_SESSION['comment_all']); $i++):?>
        <div class="grid_comentarii1">
            
                
            <div >
                <a href="?path=<?php print_r($_SESSION['comment_all'][$i][3]);?>" style="position: absolute;"><img src="<?php print_r($_SESSION['comment_all'][$i][2]);?>" alt=""  class="img_coment1"></a>
                
                
            
                
            </div>
            
            <div class="text_commetn">
            <a href="?path=<?php print_r($_SESSION['comment_all'][$i][3]);?>"> <h5 class="fa fa-user"> <?php print_r($_SESSION['comment_all'][$i][1]);?></h5></a> <p style="color: rgba(150,150,150,0.7);" class='fa fa-clock-o'><?php print_r($_SESSION['comment_all'][$i][4]);?></p>
                <p>
                <?php print_r($_SESSION['comment_all'][$i][6]);?>
                </p>
                <?php if($_SESSION['user'][9] == 'Админ' or $_SESSION['user'][9] == 'Модератор'):?>
                        <div class="blog-form">
                            <form action="#" method="POST" >
                                <input type="text" style="display: none;" name ="name_forum" value="<?php print_r($_SESSION['comment_all'][$i][0]);?>">
                                <button class="fa fa-paper-plane" name='btn_delite' >удалить</button>
                            </form>
                        </div>
                <?php endif;?>
            </div>
        </div>
        
        <?php endfor;?>
        
        <?php if(isset($_SESSION['user'])):?>
        
                <br>
        
                <div class="blog-form">
                    
                    <h3>Коментировать<br> </h3>
                    
                    <div style="display:flex;">
                        <div style="padding: 4px;">
                            <a href="?path=<?php print_r($_SESSION['user'][4]);?>" ><img src="<?php print_r($_SESSION['user'][5]);?>" alt=""  class="img_coment1"></a>
                            <h5><span class="fa fa-user" style="font-size:14px;"><?php print_r($_SESSION['user'][1]);?> </span></h5>
                            
                        </div>
                        
                        <form action="" method="POST"  class="padding_input_commit">
                            
                            
                            <textarea name="form_head_comment_text" cols="20" rows="2" placeholder="Добавить ваш комментарий..." style="height: 80px;"></textarea>
                            <button name="btn_comment_team" class="fa fa-paper-plane">Отправить</button>
                            
                        </form>

                    </div>
                    
                    
            </div>
            <?php endif;?>

            <br><br>
            <?php if(!isset($_SESSION['user'])):?>
                <br><br><br><br>
                <a href="?path=/registra"><h3>Чтобы комментировать авторезируйтесь</h3></a>
                <br><br><br><br>
            <?php endif;?>
        


    </div>
    
   













 
    


    
    
    
    
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

