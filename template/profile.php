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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
    </style>
    
</head>
<body>

	<?php  include 'public/block/header_forum.php' ?>
    
	<div class="pattern pattern--hidden"></div>

    <div class="container_1024px heder_padding">
        <div class="margin_profile">
            <p class="font-size-log-profil"><b>Пользователь:</b> <?php print_r($_SESSION['user'][1])?></p>
            <div class="grid_profile">
                <div>
                    <img src="<?php $retVal = (!empty($_SESSION['user'][5])) ? print_r($_SESSION['user'][5]) : print_r('images/user/nonaem.jpeg') ;?>" alt="" width="320" height="250">
                    <?php if (address_verification("{$_SESSION['user'][4]}")):?>
                        <a href=<?php print_r("?path={$_SESSION['user'][4]}/redactirovat");?>><p class="redac_profile">редактировать профиль</p></a>
                    <?php else:?>
                        
                        
                       
                        <div class="blog-form">
                            <form action = "" method = "post" enctype = 'multipart/form-data' >
                                    <label for="file-upload" class="custom-file-upload">
                                    <i class="fa fa-cloud-upload"></i> Добавить фото
                                    </label>
                                <input type = "file" name = "img" id="file-upload"/>
                                <button name = "btn_img">Загрузить фото</button>
                            </form>
                        </div>
                    <?php endif;?>
                    <a href="?path=/log_out"><p class="btn" style="padding-bottom:30px;">Выйти из аккаунта</p></a>
                </div>
                <div>
                <?php ?>
                
                <div class="blog-form" >
                    <form action="" method="POST" >
                    
                        <p class="text_profile_pading"><b>Дата регистрации:</b> &nbsp  <?php print_r($_SESSION['user'][7])?></p>
                        <p class="text_profile_pading"><b>Последние посещение:</b>&nbsp  <?php print_r($_SESSION['user'][8])?></p>
                        <p class="text_profile_pading"><b>Права:</b>&nbsp  <?php print_r($_SESSION['user'][9])?></p>
                        <p class="text_profile_pading" style="display:flex;"><b>статус:</b>&nbsp <?php $retVal = (isset($_SESSION['user'])) ? print_r(" <span class='onlain'>online</span>") : print_r(" <span class='offlain'>offline</span>") ;?></p>
                        <p class="text_profile_pading" ><a href="?path=/mail/vxod" style="display:flex;" ><b>почта:</b>&nbsp&nbsp   <span style="color: red;"> <?php print_r("{$_SESSION['user_vxod_kol'] }")?></span></a></p>
                        <?php if(!empty($_SESSION['user'][10]) or address_verification("{$_SESSION['user'][4]}/redactirovat")):?>
                            <p class="text_profile_pading"><b>имя:</b>&nbsp  <?php $retVal = (address_verification("{$_SESSION['user'][4]}")) ? print_r($_SESSION['user'][10]) : $retVal = (isset($_SESSION['user'][10])) ? print_r("<input type='text'  name='name' value='{$_SESSION['user'][10]}' > ") : print_r("<input type='text'  name='name' > ") ; ;?></p>
                        <?php endif;?>
                       
                        <?php if(!empty($_SESSION['user'][11]) or address_verification("{$_SESSION['user'][4]}/redactirovat")):?>
                            <p class="text_profile_pading" ><b>место жительства:</b>&nbsp <?php $retVal = (address_verification("{$_SESSION['user'][4]}")) ? print_r($_SESSION['user'][11]) : $retVal = (isset($_SESSION['user'][11])) ? print_r("<input  type='text' name='gorod' value='{$_SESSION['user'][11]}' >") : print_r("<input type='text' name='gorod'>") ;?></p>
                        <?php endif;?>

                        <?php if(!empty($_SESSION['user'][12]) or address_verification("{$_SESSION['user'][4]}/redactirovat")):?>
                            <p class="text_profile_pading"><b>Дата рождения:</b>&nbsp <?php $retVal = (address_verification("{$_SESSION['user'][4]}")) ? print_r($_SESSION['user'][12]) : $retVal = (isset($_SESSION['user'][12])) ? print_r("<br><input type='date' id='start' name='rojdenie'    value='{$_SESSION['user'][12]}' min='1970-01-01' max='2005-12-31' style='width:145px;'>") : print_r("<input type='date' id='start' name='rojdenie' min='1970-01-01' max='2005-12-31'  style='width:145px'; >")  ;?></p>
                        <?php endif;?>
                        
                        <?php if(!empty($_SESSION['user'][13]) or address_verification("{$_SESSION['user'][4]}/redactirovat")):?>
                            <p class="text_profile_pading" style="width: 400px;"><b>О себе:</b>&nbsp  <?php $retVal = (address_verification("{$_SESSION['user'][4]}")) ? print_r($_SESSION['user'][13]) : $retVal = (isset($_SESSION['user'][13])) ? print_r("<input type='text' name='o_sebe' value='{$_SESSION['user'][13]}' >") : print_r("<input type='text' name='o_sebe'>") ; ?></p>
                        <?php endif;?>

                        <?php if($_GET['path'] == '/'.$_SESSION['user'][1] and $_SESSION['user'][9] === 'Админ' or $_SESSION['user'][9] === 'Модератор' ):?>
                            <p class="text_profile_pading"><a href="?path=/<?php print_r($_SESSION['user'][1])?>/oblako/redac" style="text-decoration: underline;">Облачное хранилище </a></p>
                        <?php endif;?>
                        <p class="text_profile_pading"> <?php print_r('<b>Комминтарев</b> '.count($_SESSION['kol_komment_profile']))?></p>
                        
                        <?php if($_SESSION['user'][9] === 'Пользователь'):?>
                            <p class="text_profile_pading fa fa-exclamation"> Чтобы получить права "Продвинутый пользователь" оставьте  <?php print_r(200 - count($_SESSION['kol_komment']))?>  коминтраиев</p>

                        <?php endif;?>
                        
                        
                        <?php if (address_verification("{$_SESSION['user'][4]}/redactirovat")):?>
                            <button  name="buttom_red">Сохранить</button>
                        <?php else:?>
                        
                        <?php endif;?>
                    </form>
                    </div>
                </div>
                
            </div>
            

        </div>
        
       

    </div>




    
    
    
    <br><br><br><br><br><br>
    <?php include 'public/block/footer.php' ?>
 
    <?php include 'public/block/link_js.php' ?>
<body>

