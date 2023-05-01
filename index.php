
<?php

require_once("vendor/autoload.php");
require __DIR__. '/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Monolog\Logger;
use Monolog\Handler\SyslogHandler;
 $logger = new Logger('info');
 $logger->pushHandler(new SyslogHandler('ARTICLE_PHP_PROJECT'));
 $logger->pushHandler(new StreamHandler(__DIR__. '/log.txt', Logger::DEBUG));|
 $logger->pushHandler(new StreamHandler('/log.txt', Level::Warning));
 $logger->pushHandler(new FirePHPHandler());
$logger->info('This is a log! ^_^ ');
$logger->warning('This is a log warning! ^_^ ');
$logger->error('This is a log error! ^_^ ');


?>
<!DOCTYPE html>
            <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"/>

<head>
  <title>Article</title>
</head>
<body >
     <?php


    
if(isset($_GET["group"])&&!isset($_GET["delete"])){
    if($_GET["group"]==intval($_GET["group"])){
    
             require_once("views/Groups/update.php");
         }
         elseif(($_GET["group"])=='delete'){
             require_once("views/Groups/delete.php"); 
         }
         else{
             require_once("views/Groups/show.php"); 
         }
     }

    /* elseif(isset($_GET["user"])&&!isset($_GET["delete"])){
        if($_GET["user"]==intval($_GET["user"])) {
            require_once("views/Users/UsersEdit.php");
        }
        else if(($_GET["user"])=='delete'){
            require_once("views/Users/UsersDelete.php");
        }
        else if(($_GET["user"])=='add'){
            require_once("views/Users/UsersCreate.php");
        }
        else{
            require_once("views/Users/UsersView.php"); 
        }
    }*/

    elseif(isset($_GET["article"])&&!isset($_GET["delete"])){
        if($_GET["article"]==intval($_GET["article"])){
        
                // require_once("views/Articles/ArticlesEdit.php");
             }
             elseif(($_GET["article"])=='delete'){
                 require_once("views/Articles/delete.php"); 
             }
               else if(($_GET["article"])=='add'){
                require_once("views/Articles/create.php");
            }
             else{
                 require_once("views/Articles/show.php"); 
             }
         }

?> 
  
   
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
 
</html>

<?php 
require_once("vendor/autoload.php");
session_start();

$dbHandler = new MySqlHandler('users');


?>