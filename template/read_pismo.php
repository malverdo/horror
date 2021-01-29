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
				<a href="?path=/mail/pismo"<?php $retVal = (address_verification('/mail/pismo')) ? print_r("class='color-link'") : null ;?>>Написать письмо/</a>
			</div>
			<div>
				
			</div>
		</div>

        <div >
            <div class="read_mail">
                <div>
                    <img src="<?php print_r($_SESSION['user_mail_read'][7])?>" alt="" width="50">
                </div>
                <div>
                    <div>
                        <a href="?path=<?php print_r($_SESSION['user_mail_read'][9])?>"><?php print_r($_SESSION['user_mail_read'][3])?></a>
                    </div>
                    <div class="flex_mail_raed">
                        <p> <?php print_r($_SESSION['user_mail_read'][5])?></p>
                        <p >&nbsp <?php print_r($_SESSION['user_mail_read'][6])?> <span style="opacity: 0.3;"> пользлователю: <?php print_r($_SESSION['user_mail_read'][2])?></span></p>   
                    </div>
                </div>
            </div>
            <div class="padding_mail_read">
                <p><?php print_r($_SESSION['user_mail_read'][1])?></p>
            </div>
        </div>
        <a href="?path=/mail/pismo">Ответить</a>
		<?php $_SESSION['user_mail_read_pismo'] = $_SESSION['user_mail_read'][3]?>
		

        
        
    </div>





    
    
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

