<?php include_once __DIR__ . '/header.php'?>
<?php

$slug = $_GET['slug'];
$url = "https://steam-ish.test-02.drosalys.net/api/genre/".$slug;
$json = file_get_contents($url);
$data = json_decode($json, true);


?>
<div class="container mb-5">
  <div class="row">
    <h2><?=$slug?> -</h2>
  </div>
</div>

<div class="container">
  <div class="row gx-5 gy-5">
  <?php foreach($data['games'] as $item) : ?>
    <?php
  $slugName =$item["slug"];
  ?>
      <div class="col-lg-4 col-sm-12 col-md-6">

        <div class="card card-image card1" style="background: url('<?= $item['thumbnailCover'] ?>');">
          <!-- Content -->
          <div class="d-flex justify-content-between h-100 mt-2">
            <div class="ms-2">
              <h5 class="icon"><i class="bi bi-patch-check-fill firstI"></i> <?= $item['name'] ?></h5>
              <p class="icon"> <?= $item['price'] ?> €</p>
            </div>
            <div class="d-flex flex-direction-row">
              <div class="blob mx-1 d-flex align-items-center justify-content-center text-align-center"><i class="bi bi-heart-fill"></i></div>
              <div class="blob mx-1 d-flex align-items-center justify-content-center text-align-center"><svg class="xbox" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-xbox" viewBox="0 0 16 16">
                  <path d="M7.202 15.967a7.987 7.987 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33Zm-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.372 8.372 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.495 9.495 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4.171 4.171 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.778 7.778 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12.246 12.246 0 0 1-.654-.319Z" />
                </svg></div>
            </div>
          </div>

          <div class="d-flex justify-content-around text-align-center align-items-center mb-2">
            <a href="/component/jeu.php?slug=<?= $slugName ?>"><button type="button" class="btn align-self-end icon"><i class="bi bi-bag"></i> Acheter</button></a>
            <button type="button" class="btn align-self-end icon"><i class="bi bi-grid-fill"></i> Collection</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>



<?php include_once __DIR__ . '/footer.php'?>
