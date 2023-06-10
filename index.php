<?php include_once __DIR__ . '/component//header.php' ?>

<?php

$page = 1;

if (isset($_GET['page'])) {
  $page = $_GET['page'];
}


$nextPage = $page + 1;



$url = 'https://steam-ish.test-02.drosalys.net/api/game?page=' . $page; // Remplacez l'URL par celle de votre API
$json = file_get_contents($url);
$data = json_decode($json, true);
$maxPage = $data["totalPages"];



$url2 = "https://steam-ish.test-02.drosalys.net/api/genre";
$json2 = file_get_contents($url2);
$data2 = json_decode($json2, true);

if ($nextPage > $maxPage + 1) {
  header('Location: index.php?page=5');
}

?>

<div class="container w-25 mt-4 mb-4 text-center">
<div class="dropdown">

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    By Category
  </button>
  <ul class="dropdown-menu">
  <?php foreach ($data2['items'] as $item) : ?>
    <li><a class="dropdown-item" href="/component/byCategorie.php?slug=<?= $item['slug']?>"><?=$item['name']?></a></li>
    <?php endforeach;?>
  </ul>
</div>

  </div>
</div>


<div class="container">
  <div class="row gx-5 gy-5">
    <?php foreach ($data['items'] as $item) : ?>
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
            <a href="/component/jeu.php?slug=<?= $item['slug'] ?>"><button type="button" class="btn align-self-end icon"><i class="bi bi-bag"></i> Buy</button></a>
            <button type="button" class="btn align-self-end icon"><i class="bi bi-grid-fill"></i> Collection</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="container text-center mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-4"></div>
    <?php
      // Calculer les valeurs des boutons
      $startPage = max(1, $page - 1);
      $endPage = min($startPage + 2, $maxPage);

      // Afficher les boutons de page
      for ($i = $startPage; $i <= $endPage; $i++) {
        $activeClass = ($i == $page) ? 'active' : '';
        echo '<div class="mx-auto gx-1 gy-1 col-1"><a href="/index.php?page='.$i.'">
                <button type="button" class="btn btn-primary page '.$activeClass.'">'.$i.'</button>
              </a></div>';
      }
    ?>
    <div class="col-4"></div>
  </div>
</div>

<?php include_once __DIR__ . '/component/footer.php' ?>