<?php
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique",
         "root",
         ""
    );

  $sql = "SELECT * FROM product";
  $stmt = $pdo->query($sql);

  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/styles/main.css">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">Enterprise</a>
            <a class="p-2 text-dark" href="#">Support</a>
            <a class="p-2 text-dark" href="#">Pricing</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div>
    <!-- ==== announcement ==== -->
    <div class="announcement-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">announcement</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
<div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <?php foreach ($products as $product) : ?>

                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="<?= $product['image'] ?>">
                    <div class="card-body">
                      <p class="card-text"><?= $product['name'] ?></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>

            <?php endforeach; ?>    
          </div>
        </div>
      </div>
</body>
</html>