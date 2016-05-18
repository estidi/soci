
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">  
    </head>
    <body>
        <div id="container">
            <div id="content">

                <?php
                include './classes.php';

                $Main = new Main();
                ?>
            </div>
            <div id="footer">
                <?php Statistics::showEvents()?>
                
            </div>
        </div>

    </body>
</html>
