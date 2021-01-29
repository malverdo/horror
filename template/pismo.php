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
        <div class="heder_padding_2x mail_grid">
			<div class="flex_320">
				<a href="?path=/mail/vxod" <?php $retVal = (address_verification('/mail/vxod')) ? print_r("class='color-link'") : null ;?>>Входящие/</a>
				<a href="?path=/mail/otprav" <?php $retVal = (address_verification('/mail/otprav')) ? print_r("class='color-link'") : null ;?>>Отправленые/</a>
				<a href="?path=/mail/spam" <?php $retVal = (address_verification('/mail/spam')) ? print_r("class='color-link'") : null ;?>>Спам/</a>
				<a href="?path=/mail/pismo"<?php $retVal = (address_verification('/mail/pismo')) ? print_r("style='color:rgb(255,186,0);'") : null ;?>>Написать письмо/</a>
			</div>
			<div>
				
			</div>
		</div>
		<div class="blog-form" >
			<h3>Отправить письмо</h3>
		<form action="" method="POST">
            <input type="text"  name="login_accaunt_otprav" placeholder="логин" value="<?php print_r($_SESSION['user_mail_read_pismo']) ;?>"><br><br>
			<?php 	
						
                        $messages = flash();
                        if($messages)
                        foreach ($messages as $message) {
                        echo "<p class='offlain'>$message</p>";
                        }
                        echo '<br>';
                        ?>
            <textarea rows="6" cols="30" name="text_accaunt_otprav" placeholder="текст"></textarea>
            <br><br>
            <button name="btn_otravka_mail" >Отправить</button>
        </form>
		</div>
		
		
        
    </div>





    
    
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

