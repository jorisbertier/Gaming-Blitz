<?php include_once __DIR__ . '/header.php' ?>
<?php


$slug = $_GET['slug'];
$url = "https://steam-ish.test-02.drosalys.net/api/game/" . $slug;
$json = file_get_contents($url);
$data = json_decode($json, true);


$url2 = "https://steam-ish.test-02.drosalys.net/api/country/";
$json2 = file_get_contents($url2);
$country = json_decode($json2, true);


$url3 = "https://steam-ish.test-02.drosalys.net/api/comment/";
$json3 = file_get_contents($url3);
$comment = json_decode($json3, true);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}



foreach ($data as $item) {
    $item;
}


?>


<div class="container mt-5">
    <div class="row gx-3 gy-3 mx-auto">
        <div class="col-xl-6 col-lg-12 col-md-12 mx-auto text-center"><img src="<?= $data['thumbnailCover'] ?>" class="card-img-top imgGame" alt="..."></div>
        <div class="col-xl-1 col-lg-12 col-md-12"></div>

        <div class="col-xl-5 col-lg-12 col-md-12 mt-md-3 textGame no-background">
            <div class="mt-2"><?= $data['name'] ?> (Xbox ONE / XBOX Seriex X|S)</div>
            <div class="mt-3" class="console"><i class="bi bi-xbox">
                    <svg class="xbox" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-xbox" viewBox="0 0 16 16">
                        <path d="M7.202 15.967a7.987 7.987 0 0 1-3.552-1.26c-.898-.585-1.101-.826-1.101-1.306 0-.965 1.062-2.656 2.879-4.583C6.459 7.723 7.897 6.44 8.052 6.475c.302.068 2.718 2.423 3.622 3.531 1.43 1.753 2.088 3.189 1.754 3.829-.254.486-1.83 1.437-2.987 1.802-.954.301-2.207.429-3.239.33Zm-5.866-3.57C.589 11.253.212 10.127.03 8.497c-.06-.539-.038-.846.137-1.95.218-1.377 1.002-2.97 1.945-3.95.401-.417.437-.427.926-.263.595.2 1.23.638 2.213 1.528l.574.519-.313.385C4.056 6.553 2.52 9.086 1.94 10.653c-.315.852-.442 1.707-.306 2.063.091.24.007.15-.3-.319Zm13.101.195c.074-.36-.019-1.02-.238-1.687-.473-1.443-2.055-4.128-3.508-5.953l-.457-.575.494-.454c.646-.593 1.095-.948 1.58-1.25.381-.237.927-.448 1.161-.448.145 0 .654.528 1.065 1.104a8.372 8.372 0 0 1 1.343 3.102c.153.728.166 2.286.024 3.012a9.495 9.495 0 0 1-.6 1.893c-.179.393-.624 1.156-.82 1.404-.1.128-.1.127-.043-.148ZM7.335 1.952c-.67-.34-1.704-.705-2.276-.803a4.171 4.171 0 0 0-.759-.043c-.471.024-.45 0 .306-.358A7.778 7.778 0 0 1 6.47.128c.8-.169 2.306-.17 3.094-.005.85.18 1.853.552 2.418.9l.168.103-.385-.02c-.766-.038-1.88.27-3.078.853-.361.176-.676.316-.699.312a12.246 12.246 0 0 1-.654-.319Z" />
                    </svg> | Xbox Series X|S | <i class="bi bi-patch-check"></i> En stock | <i class="bi bi-patch-check"></i> Download available</div>
            <div class="mt-3 text-center">This page has been visited <?= $rand = rand(100, 189); ?> today | Stock available</div>
            <div class="mt-3">

                <?php foreach ($country['items'] as $item) : ?>
                    <img src="<?= $item['urlFlag'] ?>" class="flag"> 
                <?php endforeach; ?>

            </div>
            <div class="mt-3 text-center">
                <select name="" id="select">
                    <option value="0">PC</option>
                    <option value="0">Xbox</option>
                    <option value="0">Playstation</option>
                    <option value="0">Switch</option>
                </select>
                <select name="" id="select">
                    <option value="0">Edition Standard</option>
                    <option value="0">Edition Prenium</option>
                    <option value="0">Edition Limited</option>
                    <option value="0">Edition Deluxe</option>
                </select>
            </div>
            <div class="mt-3 text-center">Price : <?= $data['price'] ?> €</div>
            <div class="mt-3 text-center">
                <a href="/component/panier_add.php?add=<?= $data['slug'] ?>"><button type="button" class="btn btnAchat"><i class="bi bi-cart4"></i></button></a>
                <button type="button" class="btn btnAchat">Buy now</button>
            </div>
        </div>

        <div class="container mt-5 description">
            <div class="row gx-3 gy-3 mx-auto">
                <div class="col-lg-6 col-md-12 textGame">
                    <div class="mb-3 text-sm-center">
                        <h2 class="mb-3">Description -</h2>
                        <p><?= $data['description'] ?></p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-12"></div>
                <div class="col-lg-5 col-md-12 textGame">
                    <ul>Category -
                        <?php foreach ($data['genres'] as $value) {
                            echo '<a href="/component/byCategorie.php?slug=' . $value['slug'] . '"<br>';
                            echo "<li>" . $value['slug'] . "</li>";
                        } ?></ul></a>
                </div>
            </div>
        </div>

        <div class="container mt-4"><h2>Comment -</div>
        <?php
                foreach ($comment['items'] as $item) {
                    $itemSlug = $item['game']['slug'];

                    if ($itemSlug === $slug) {
                        $commentId = $item['id'];
                        $commentContent = $item['content'];
                        $upVotes = $item['upVotes'];
                        $downVotes = $item['downVotes'];
                        $rank = $item['rank'];
                        $accountName = $item['account']['name'];
                        $accountNickname = $item['account']['nickname'];
        
        echo '<section">
            <div class="container my-5 py-5 text-dark">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-11 col-lg-9 col-xl-7">
                        <div class="d-flex flex-start mb-4">
                            <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="65" height="65" />
                            <div class="card w-100">
                                <div class="card-body commentContent p-4">
                                    <div class="">
                                        <h4>'.$accountName.'</h4>
                                        <p class="small">'.rand(1,9).' hours ago</p>
                                        <p class="small">Comment ID : '.$commentId.'</p>
                                        <p>
                                        '.$commentContent.'
                                        </p>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="#!" class="link-muted me-2"><i class="bi bi-hand-thumbs-up-fill"></i>'.$upVotes.'</a>
                                                <a href="#!" class="link-muted"><i class="bi bi-hand-thumbs-down-fill"></i>'.$downVotes.'</a>
                                            </div>
                                            <a href="#!" class="link-muted"><i class="fas fa-reply me-1"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </section>';

    }
}
?>



        <?php include_once __DIR__ . '/footer.php' ?>