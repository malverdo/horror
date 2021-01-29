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
        <div class="margin_profile">
            <p class="font-size-log-profil"><b>Пользователь:</b> <?php print_r($_SESSION['accaunt'][0][1])?></p>
            <div class="grid_profile">
                <div>
                    <img src="<?php $retVal = (!empty($_SESSION['accaunt'][0][5])) ? print_r($_SESSION['accaunt'][0][5]) : print_r('images/user/nonaem.jpeg') ;?>" alt="" width="320" height="250">
                    <a href="?path=/mail/pismo" class="text_profile_pading" style="text-decoration: underline;"> <?php $retVal = (isset($_SESSION['user']) and $_SESSION['user'][1] != $_SESSION['accaunt'][0][1]) ? print_r("Отправить сообщение") : null ;?> </a>
                    <br><br><br><br>


                    <?php if($_SESSION['user'][1] != $_SESSION['accaunt'][0][1] and $_SESSION['accaunt'][0][9] != 'Админ'   and $_SESSION['user'][9] === 'Админ' or $_SESSION['user'][9] === 'Модератор'): ?>
                        <div class="blog-form">
                        <form action="" method="POST">
                            
                            <input name='delite' type='submit' value='удалить ак' style='width:220px;' ><br><br>
                            <?php if ($_SESSION['user'][9] === 'Админ') {
                                print_r("<input name='moderator' type='submit' value='сделать модератором' style='width:220px;'><br><br>");
                                
                            }?>
                            
                            <input type='number'  step="10" id='start' name='ban' placeholder="дней" style='width:100px;'><br><br>
                            <button name="btn_ban">забанить</button>

                            
                        </form>
                        </div>
                    <?php endif;?>


                
                </div>
                <div>
                    

                    <form action="" method="POST">
                    
                        <p class="text_profile_pading"><b>Дата регистрации:</b> &nbsp  <?php print_r($_SESSION['accaunt'][0][7])?></p>
                        <p class="text_profile_pading"><b>Последние посещение:</b>&nbsp  <?php print_r($_SESSION['accaunt'][0][8])?></p>
                        <p class="text_profile_pading"><b>Права:</b>&nbsp  <?php print_r($_SESSION['accaunt'][0][9])?></p>
                        <p class="text_profile_pading"><b>статус:</b>&nbsp <?php $retVal = (strtotime($_SESSION['accaunt'][0][8]) > time() - 120 ) ? print_r(" <span class='onlain'>online</span>") : print_r(" <span class='offlain'>offline</span>") ;?></p>
                        <?php if(!empty($_SESSION['accaunt'][0][10])):?>
                            <p class="text_profile_pading"><b>имя:</b>&nbsp  <?php print_r($_SESSION['accaunt'][0][10])?></p>
                        <?php endif;?>
                        <?php if(!empty($_SESSION['accaunt'][0][11])):?>
                            <p class="text_profile_pading"><b>место жительства:</b>&nbsp <?php print_r($_SESSION['accaunt'][0][11])?></p>
                        <?php endif;?>
                        <?php if(!empty($_SESSION['accaunt'][0][12])):?>
                            <p class="text_profile_pading"><b>Дата рождения:</b>&nbsp <?php print_r($_SESSION['accaunt'][0][12])?></p>
                        <?php endif;?>
                        <?php if(!empty($_SESSION['accaunt'][0][13])):?>
                            <p class="text_profile_pading" style="width: 400px;"><b>О себе:</b>&nbsp  <?php print_r($_SESSION['accaunt'][0][13])?></p>
                        <?php endif;?>
                        <p class="text_profile_pading"> <?php print_r('<b>Комминтарев:</b> '.count($_SESSION['kol_komment']))?></p>

                        <?php if(!empty($_SESSION['accaunt'][0][16])):?>
                            <p class="text_profile_pading"><b>игрок забанен до:</b>&nbsp  <span class='offlain'><?php print_r($_SESSION['accaunt'][0][16])?> </span></p>
                        <?php endif;?>
                    </form>




                    
                    <?php $_SESSION['user_mail_read_pismo'] = $_SESSION['accaunt'][0][1]?>
                </div>
                
            </div>
            

        </div>
        
       

    </div>





       







    </div>
    
    
    
    <br><br><br><br><br><br><br><br><br> <br><br><br>
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

