<?php
  include  'connection.php';

  include 'connection.php';

  if (isset($_POST['add'])) {
      $product_name = mysqli_real_escape_string($conn, $_POST['name']);
      $product_price = mysqli_real_escape_string($conn, $_POST['price']);
      $product_price_range = mysqli_real_escape_string($conn, $_POST['price_range']);
      $product_category = mysqli_real_escape_string($conn, $_POST['category']);
      if(isset($_FILES['image'])) {
          $image = $_FILES['image']['name'];
          $image_size = $_FILES['image']['size'];
          $image_tmp_name = $_FILES['image']['tmp_name'];
          $image_folder = 'products/'.$image;
  
          $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$product_name' ") or die('query failed');
          if (mysqli_num_rows($select_product_name) > 0) {
              $message[] = 'Product name already exists';
          } else {
              $insert_product = mysqli_query($conn, "INSERT INTO `products` (`name`, `price`, `price_range`, `image`, `category`)
               VALUES ('$product_name', '$product_price', '$product_price_range', '$image',  '$product_category')") or die('query failed');
              if ($insert_product) {
                  if ($image_size > 2000000) {
                      $message[] = 'Image is too large';
                  } else {
                      move_uploaded_file($image_tmp_name, $image_folder);
                      $message[] = 'Product added successfully';
                  }
              }
          }
      } else {
          $message[] = 'Image not uploaded';
      }
  }
  ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <?php
        if(isset($message)){
          foreach ($message as $message) {
          echo'
              <div class="alert alert-dark" role="alert text-center p-3"  >
              '.$message.'
              </div>
            ';
          }
        }
    ?>
            <label>name</label>
            <input name="name" type="text" class="form-control" required />
            <label>price</label>
            <input name="price" type="number" class="form-control" required />
            <label>price range</label>
            <input name="price_range" type="text" class="form-control" required />
            <label for="">category</label>
            <select class="form-control" name="category" id="" required>
                <option value="coffee">Coffee</option>
                <option value="lattte">Latte</option>
                <option value="specias">Special</option>
                <option value="noncoffee">NonCoffee</option>
            </select>
            <label>imge</label>
            <input name="image" type="file" accept="image/jpg, image/png, image/webp" class="form-control" required />
            <button type="submit" name="add" class="btn w-100 text-center">ADD</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>