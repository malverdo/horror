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
    <br><br>

        <?php if(address_verification("/{$_SESSION['user'][1]}/oblako")):?>
            <a href="?path=/<?php print_r($_SESSION['user'][1])?>/oblako/redac">редактировать</a>
            
        <?php else:?>
            <form action="" method="POST" id="form" class="oblako_grid">
                <div class="flex_oblako_nazad">
                    <img src="images/arrow/arroy.png" alt="">
                    <a href="?path=/<?php print_r($_SESSION['user'][1]) ?> " style="padding-left: 10px;">назад</a>
                </div>
                <div class="btn_flex_mail_redac">
                    <img src="images/mail/musr.png" alt=""  >
                    <button name="delite" class="btn-2">Удалить</button>
                </div>
                <div>
                    <?php 
                        $_SESSION['razmer_2v'] = 8557832222;
                            $razmer = $_SESSION['razmer_2v'] - $_SESSION['razmer'];
                    ?>
                    <p>свободно <?php print_r( get_size($razmer));?></p>
                    <p>занято <?php print_r(get_size($_SESSION['razmer']));?></p>
                </div>
            </form>
            
        <?php endif;?>
        <?php 
           
           
        
           
        
        ?>
        
        <?php
            if (isset($_SESSION['params'])) {
                print_r("<p class='offlain'>{$_SESSION['params']}</p>");
                unset($_SESSION['params']);
            }
            
        ?>
        
    
        <div class="flex_oblako">
            
        <?php if(address_verification("/{$_SESSION['user'][1]}/oblako/redac") ):?>
            
            <form action = "" method = "post" enctype = 'multipart/form-data' >
                <div class="example-1">
                    <div class="form-group">
                        <label class="label">
                        <i class="fa fa-file"></i>
                        <span class="title">добавить</span><br><br>
                        <input type="file" name="file">

                        <input type = "submit" value = "Загрузить"  name = "file_start" class="input_oblako" style="font-size:18px;"/>
                        </label>
                    </div>
                </div>
            </form>
            
        <?php endif;?>
        
        <?php if (address_verification("/{$_SESSION['user'][1]}/oblako")):?>
            <?php for ($i=0; $i < count($_SESSION['file_user']); $i++):?>
                <?php if($_SESSION['file_user'][$i][4] == 'image'):?>
                    <div style="padding:10px">
                        <img src="<?php print_r($_SESSION['file_user'][$i][2])?>" alt="" width="120" style="height:120px;">
                        <div >
                            
                            <p><?php print_r(mb_substr("{$_SESSION['file_user'][$i][3]}",0,13))?></p>
                            
                        </div>
                    </div>
                <?php else:?>
                    <div style="padding:10px">
                        <img src="images/oblak/file_icon.png" alt="" width="100" height="100" style="height:120px;">
                        <div >
                            
                            <p><?php print_r(mb_substr("{$_SESSION['file_user'][$i][3]}",0,13))?></p>
                            
                        </div>
                    </div>
                <?php endif;?>
            <?php endfor;?>
        
        <?php elseif(address_verification("/{$_SESSION['user'][1]}/oblako/redac")  ):?>
       

            <?php for ($i=0; $i < count($_SESSION['file_user']); $i++):?>

                <?php if($_SESSION['file_user'][$i][4] == 'image'):?>
                    <div style="padding:10px">
                        <img src="<?php print_r($_SESSION['file_user'][$i][2])?>" alt="" width="120"  style="height:100px;" >
                        <div >
                            <div style="display: flex;">
                                <input type="checkbox" name="<?php print_r($_SESSION['file_user'][$i][0]);?>"  form="form" > &nbsp 
                                <p style="font-size:13.5px; color:rgba(120,120,120,0.8);"><?php print_r($_SESSION['file_user'][$i][5])?></p>
                            </div>
                            <a href="<?php print_r($_SESSION['file_user'][$i][2])?>" download><p class="oblako_text"><?php print_r($_SESSION['file_user'][$i][3])?></p></a>
                        </div>
                    </div>
                <?php else:?>
                    <div style="padding:10px">
                        <img src="images/oblak/file_icon.png" alt="" width="100" style="height:100px;">
                        <div >
                            <div style="display: flex;">
                                <input type="checkbox" name="<?php print_r($_SESSION['file_user'][$i][0]);?>"  form="form" > &nbsp 
                                <p style="font-size:13.5px; color:rgba(120,120,120,0.8);"><?php print_r($_SESSION['file_user'][$i][5])?></p>
                            </div>
                            <a href="<?php print_r($_SESSION['file_user'][$i][2])?>" download><p class="oblako_text"><?php print_r($_SESSION['file_user'][$i][3])?></p></a>
                        </div>
                    </div>
                <?php endif;?>

             
            <?php endfor;?>
        <?php endif;?>

        </div>
    </div>





    
    
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include 'public/block/footer.php' ?>
    <?php include 'public/block/link_js.php' ?>
<body>

