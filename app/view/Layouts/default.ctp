<!doctype html>  
<html lang="en">  
    <head>  
        <meta charset="utf-8">  
        <title><?php echo $title_for_layout; ?></title>  
        <meta name="description" content="The HTML5 Herald">  
        <meta name="author" content="SitePoint">  
        <?php
        echo $this->Html->css('cake.generic');
        echo $this->Html->css('reset');
        echo $this->Html->css('styles');
        ?>
				<link href='http://fonts.googleapis.com/css?family=Underdog' >
        <link href='http://fonts.googleapis.com/css?family=Revalia' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Economica:400,700italic' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>  
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
        <![endif]-->  
    </head>  
    <body>

        <header>
            <section>
                <div class="main">
                    <nav>
                        <ul class="menu">
                            <?php echo $this->element('topMenu'); ?>


                        </ul>
                    </nav>
                </div>

            </section>
            <section>
                <div class="main">
                    <div class="left" >
                        <a href=""><img  src="/images/logo.png"/></a>
                    </div>
                    <div class="right">
                        <p class="motto"><span style="font-family: 'Underdog', cursive;text-shadow:3px 3px 3px #eee">Musisz żyć dla innych, jeśli chcesz żyć <br>z pożytkiem dla siebie </span><i style="font-size:0.7em">~Seneka</i></p>
                    </div>
                </div>

            </section>
        </header>
        <section class="bottomMenu-row">
            <div class="main">
                <nav>
                    <ul class="bottomMenu">
                        <?php foreach ($bottomMenu as $bottom) : ?>
                            <li><?php echo $this->Html->link(__($bottom['Menu']['name']), array('controller' => 'menus', 'action' => 'view', $bottom['Menu']['id'])); ?> </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </section>
        <section class="content main">
            <div class="leftContent">
                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <aside class="rightContent">
                <?php echo $this->element('sideBox'); ?>
            </aside>
        </section>
        <footer class="main">
            <div class="leftFoot" >
                <p class="copyright">
                    Copyright socialmediate.pl @ <?php print date("Y");?><br />
                    Design by esine.pl<br/>
                    
                </p>
            </div>
        </footer>

    </body>  
</html>  
<?php
//echo $this->element('sql_dump'); 
?>
