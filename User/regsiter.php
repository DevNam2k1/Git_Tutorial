
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nam Long | Quần áo số 1 Việt Nam</title>
        <link rel="stylesheet" href="../File CSS/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
    <?php 
     include '../File PHP/top_header_login.php'; 
   ?>
   <?php 
     include '../File PHP/header_login.php'; 
   ?>
    
    <?php 
     include '../File PHP/main_regsiter.php'; 
   ?>

<?php 
     include '../File PHP/footer.php'; 
   ?>
  <script src="../File JS/toggle_menu.js"></script>
  <script src="../File JS/validator.js"></script>
  <script>

    //Mong muốn của chúng ta
    Validator({
    form:'#form-1',
    rules:[
        Validator.isRequired('#fullname'),
        Validator.isEmail('#email'),
    ]
});
  </script>
</body>
</html>