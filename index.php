<?php
  if(isset($_POST['image_source'])) {
    define('UPLOAD_DIR', 'uploads/');
    $image_parts = explode(";base64,", $_POST['image_source']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file = UPLOAD_DIR . uniqid() . '.png';
    file_put_contents($file, $image_base64);
    if(file_put_contents($file, $image_base64)){
        $successmsg = "Image Uploaded!";
    }else{
        $errormsg = "Something went wrong!";
    }
  }
?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Base64 Conversion</title>
    <style>
        .headersection{
            background: blue;
            color: white;
        }
    </style>
  </head>
  <body>
  <header class="headersection text-center">
      <h1 class="p-5">Convert Base64 Image formate To Png!</h1>
  </header>
  <div class="container">
  <?php
     if(isset($successmsg)){
  ?>
  <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
        <?php echo $successmsg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
  </div>
  <?php } ?>

  <?php
     if(isset($errormsg)){
  ?>
    <div class="alert alert-warning alert-dismissible fade show" id="success-alert" role="alert">
        <?php echo $errormsg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
  </div>
  <?php } ?>
    <form method="post">
       <div class="form-group">
            <label for="exampleFormControlTextarea1">Paste Here Base64 Source:</label>
            <textarea name="image_source" class="form-control" rows="3" Required></textarea>
        </div>
       <button name="submit" class="btn btn-primary">Submit</button>
    </form>

    <!--<hr>
     <h1>List Of all Images:</h1>-->
    </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     
    <script>
       $(document).ready(function() {
            $("#success-alert").alert();
            window.setTimeout(function () { 
            $("#success-alert").alert('close'); }, 2000); 
      });
    </script> 
  </body>
</html>