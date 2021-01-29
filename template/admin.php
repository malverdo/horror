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

	<?php  include 'public/block/header.php' ?>

	<div class="pattern pattern--hidden"></div>
   
    <div class='container'>
       
        <?php if (address_verification('/add_history') and isset($_SESSION['user'])  ):?>
            <br><br><br><br><br>
        <div class="blog-form">
            <h4>Добавить историю</h4>
            <form action="#" method="POST" enctype = 'multipart/form-data'>
                <input type="text" name="name_history" placeholder="название" >
                <textarea  name='text_history' cols="30" rows="10" placeholder="описание"></textarea>
                <input type="text" name="time_history" placeholder="время истории" >
                <input type = "file" name = "img" style="width: 320px;" style="background: none;"/>
                
                <button name='btn_history'>Добавить</button>
                
            </form>
        
        </div>
     
        <?php endif; ?>

        




        <?php if (address_verification('/check_taem') and isset($_SESSION['user'])  ):?>
        
            <br><br><br><br><br>
            <div class="blog-form">
            <h4>Новая тема (всего тем <?php print_r(count($_SESSION['team_check']))?> )</h4>
                <?php if(isset($_SESSION['team_check'])):?>
                    <?php for ($i=0; $i < count($_SESSION['team_check']); $i++):?>
                        <div class="grid_comentarii1">
                            <div >
                                <a href="?path=<?php print_r($_SESSION['team_check'][$i][7]);?>" style="position: absolute;"><img src="<?php print_r($_SESSION['team_check'][$i][6]);?>" alt=""  class="img_coment1"></a>
                               
                            </div>
                            <div class="text_commetn">
                            <a href="?path=<?php print_r($_SESSION['team_check'][$i][7]);?>"> <h5 class="fa fa-user"> <?php print_r($_SESSION['team_check'][$i][5]);?></h5></a> <p style="color: rgba(150,150,150,0.7);" class='fa fa-clock-o'><?php print_r($_SESSION['team_check'][$i][2]);?> <?php print_r($_SESSION['team_check'][$i][8]);?></p>
                            <h5 > <?php print_r($_SESSION['team_check'][$i][1]);?></h5></a>
                                <p>
                                <?php print_r($_SESSION['team_check'][$i][9]);?>
                                </p>
                            </div>
                            
                        </div>
                        <form action="#" method="POST" >
                               
                                <input type="text" style="display: none;" name ="<?php print_r($_SESSION['team_check'][$i][0]);?>">
                                <input type="text" style="display: none;" value="<?php print_r($_SESSION['team_check'][$i][5]);?>" name ="login">
                                <input type="text" name="messege" placeholder="сообщение пользователю" >
                                <button class="fa fa-paper-plane" name='btn_add' >Добавить</button>
                                <button class="fa fa-paper-plane" name='btn_delite' >удалить</button>
                        </form>
                    <?php endfor;?>
                <?php endif;?>
            </div>
        <?php endif; ?>
    </div>
    
    
    
				
			


    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

