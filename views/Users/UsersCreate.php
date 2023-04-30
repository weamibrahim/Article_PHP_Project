<center>
    <?php
           
            $handler = new MySQLHandler("users");

            if(isset($_POST['submit'])){
             $newdata=array("id"=>null,"name"=>$_POST['name'] , "email"=>$_POST['email'] , "group_id"=>$_POST['group_id'],"number"=>$_POST['number'],"password"=>$_POST['password']);
             $handler->connect();
             $handler->save($newdata);
             header("Location: http://localhost/php-project/index.php?user");
            }
                 ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/style.css"/>
            <!DOCTYPE html>
            <html>
    <head>
    <title>Admin</title>
    </head>
    <body >
        <form method="POST" action="" enctype="multipart/form-data">
        
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">name</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">email</label>
                <textarea name="email" type="email" class="form-control" id="exampleFormControlInput1"></textarea>
            </div>
        
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">number</label>
                <textarea name="number" type="number" class="form-control" id="exampleFormControlInput1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">password</label>
                <textarea name="password" type="password" class="form-control" id="exampleFormControlInput1"></textarea>
            </div>
        
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Group</label>
                <textarea name="group_id" type="group_id" class="form-control" id="exampleFormControlInput1"></textarea>
                
                        
            </div> 
            <button name="submit" class="btn btn-success">Submit</button>
        </form>

        <script type="text/javascript" src="../../assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    </body>
    
    </html>
    </center>