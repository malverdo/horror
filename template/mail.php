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
				<a href="?path=/mail/vxod" <?php $retVal = (address_verification('/mail/vxod')) ? print_r("style='color:rgb(255,186,0);'") : null ;?>>Входящие/</a>
				<a href="?path=/mail/otprav" <?php $retVal = (address_verification('/mail/otprav')) ? print_r("style='color:rgb(255,186,0);'") : null ;?>>Отправленые/</a>
				<a href="?path=/mail/spam" <?php $retVal = (address_verification('/mail/spam')) ? print_r("style='color:rgb(255,186,0);'") : null ;?>>Спам/</a>
				<a href="?path=/mail/pismo">Написать письмо/</a>
			</div>
			<div>
				<?php if (address_verification('/mail/vxod')) {
					print_r("<a href='?path=/mail/vxod/redac'>Редактировать</a>");
				} elseif (address_verification('/mail/otprav')) {
					print_r("<a href='?path=/mail/otprav/redac'>Редактировать</a>");
				}elseif (address_verification('/mail/spam')) {
					print_r("<a href='?path=/mail/spam/redac'>Редактировать</a>");
				}
				?>
				
			</div>
		</div>
		
		<?php if (address_verification('/mail/otprav')):?>
			<?php for ($i=0; $i < count($_SESSION['user_otprav']) ; $i++):?>
				
			<div class="mail_grid_pismo">
			
					<?php if ($_SESSION['user_otprav'][$i][4] == 0 ) {
						print_r("<img src='images/mail/Elli2.png' alt=''>");
					}else{
						print_r("<img src='images/mail/Elli1.png' alt=''>");
					}
					?>
					<a href="?path=<?php print_r($_SESSION['user_otprav'][$i][9]);?>"><img src="<?php print_r($_SESSION['user_otprav'][$i][7]);?>" alt="" class='round'></a>
					<a href="?path=<?php print_r($_SESSION['user_otprav'][$i][9]);?>"><?php print_r($_SESSION['user_otprav'][$i][3]);?></a>
					<a href="?path=/mail/<?php print_r($_SESSION['user_otprav'][$i][8]);?>" class="display_none_mobile"><span class="flex_mail_raed"> пользователю:<?php print_r($_SESSION['user_otprav'][$i][2])?></span> <?php print_r(mb_substr($_SESSION['user_otprav'][$i][1], 0 , 65));?></a>
					<p><?php print_r($_SESSION['user_otprav'][$i][6]);?></p>
			</div>
			<?php endfor;?>
		<?php endif;?>

		
		<?php if (address_verification('/mail/vxod')):?>
			<?php for ($i=0; $i < count($_SESSION['user_vxod']) ; $i++):?>
			<div class="mail_grid_pismo">
				
					<?php if ($_SESSION['user_vxod'][$i][4] == 0 ) {
						print_r("<img src='images/mail/Elli2.png' alt=''>");
						
					}else{
						print_r("<img src='images/mail/Elli1.png' alt=''>");
					}
					?>
					<a href="?path=<?php print_r($_SESSION['user_vxod'][$i][9]);?>"><img src="<?php print_r($_SESSION['user_vxod'][$i][7]);?>" alt=""   class='round'></a>
					<a href="?path=<?php print_r($_SESSION['user_vxod'][$i][9]);?>"><?php print_r($_SESSION['user_vxod'][$i][3]);?></a>
					<a href="?path=/mail/<?php print_r($_SESSION['user_vxod'][$i][8]);?>" class="display_none_mobile"> <?php print_r(mb_substr($_SESSION['user_vxod'][$i][1], 0 , 65));?></a>
					<p><?php print_r($_SESSION['user_vxod'][$i][6]);?></p>
			</div>
			<?php endfor;?>
		<?php endif;?>

		<?php if (address_verification('/mail/spam')):?>
			<?php for ($i=0; $i < count($_SESSION['user_spam']) ; $i++):?>
			<div class="mail_grid_pismo">
				
					<?php if ($_SESSION['user_spam'][$i][4] == 0 ) {
						print_r("<img src='images/mail/Elli2.png' alt=''>");
					}else{
						print_r("<img src='images/mail/Elli1.png' alt=''>");
					}
					?>
					
					<a href="?path=<?php print_r($_SESSION['user_spam'][$i][9]);?>"><img src="<?php print_r($_SESSION['user_spam'][$i][7]);?>" alt="" class='round'></a>
					<a href="?path=<?php print_r($_SESSION['user_spam'][$i][9]);?>"><?php print_r($_SESSION['user_spam'][$i][3]);?></a>
					<a href="?path=/mail/<?php print_r($_SESSION['user_spam'][$i][8]);?>" class="display_none_mobile"> <?php print_r(mb_substr($_SESSION['user_spam'][$i][1], 0 , 65));?></a>
					<p><?php print_r($_SESSION['user_spam'][$i][6]);?></p>
			</div>
			<?php endfor;?>
			
		<?php endif;?>
		
        
        
    </div>





    
    
    
    <br><br><br><br><br><br><br><br><br><br>
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

