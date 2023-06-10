<?php include_once __DIR__ . '/header.php' ?>

<?php

$panier = $_SESSION;

$arrayGames = [];
$total = 0;

?>


<?php foreach ($panier['panier'] as $value) {
  $url = "https://steam-ish.test-02.drosalys.net/api/game/$value";
  $json = file_get_contents($url);
  $data = json_decode($json, true);
  $arrayGames[] = $data;
  $total = $total + $data['price'];
}

?>


<section class="h-100">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10 text-center">

        <div class="d-flex justify-content-center align-items-center mb-4">
          <?php if ($total != 0) : ?>
            <h3 class="fw-normal mb-0 titleBasket">Your basket -</h3>
          <?php else : ?>
            <h3 class="fw-normal mb-0 titleBasket">Your basket is empty -</h3>
          <?php endif; ?>

          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
          </div>
        </div>
        <?php foreach ($arrayGames as $game) : ?>
          <div class="card cardBasket rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="<?= $game['thumbnailCover'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2"> <?= $game['name'] ?></p>
                  <p><span class="text-muted">Demat </span></p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                  </button>

                  <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" />

                  <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0"><?= $game['price'] ?> €</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="/component/panier_delete.php?delete=<?= $game['slug'] ?>"><i class="bi bi-trash-fill"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


</section>



<?php if ($total != 0) : ?>
  <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
    <div class="card-body p-4">

      <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
          <form>
            <div class="d-flex flex-row pb-3">
              <div class="d-flex align-items-center pe-2">
                <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1v" value="" aria-label="..." checked />
              </div>
              <div class="rounded border w-100 p-3">
                <p class="d-flex align-items-center mb-0">
                  <i class="bi bi-credit-card-fill"></i>-Credit
                  Card
                </p>
              </div>
            </div>
            <div class="d-flex flex-row pb-3">
              <div class="d-flex align-items-center pe-2">
                <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2v" value="" aria-label="..." />
              </div>
              <div class="rounded border w-100 p-3">
                <p class="d-flex align-items-center mb-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-bitcoin" viewBox="0 0 16 16">
                    <path d="M5.5 13v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.5v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.084c1.992 0 3.416-1.033 3.416-2.82 0-1.502-1.007-2.323-2.186-2.44v-.088c.97-.242 1.683-.974 1.683-2.19C11.997 3.93 10.847 3 9.092 3H9V1.75a.25.25 0 0 0-.25-.25h-1a.25.25 0 0 0-.25.25V3h-.573V1.75a.25.25 0 0 0-.25-.25H5.75a.25.25 0 0 0-.25.25V3l-1.998.011a.25.25 0 0 0-.25.25v.989c0 .137.11.25.248.25l.755-.005a.75.75 0 0 1 .745.75v5.505a.75.75 0 0 1-.75.75l-.748.011a.25.25 0 0 0-.25.25v1c0 .138.112.25.25.25L5.5 13zm1.427-8.513h1.719c.906 0 1.438.498 1.438 1.312 0 .871-.575 1.362-1.877 1.362h-1.28V4.487zm0 4.051h1.84c1.137 0 1.756.58 1.756 1.524 0 .953-.626 1.45-2.158 1.45H6.927V8.539z" />
                  </svg>-Bitcoin
                </p>
              </div>
            </div>
            <div class="d-flex flex-row">
              <div class="d-flex align-items-center pe-2">
                <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel3v" value="" aria-label="..." />
              </div>
              <div class="rounded border w-100 p-3">
                <p class="d-flex align-items-center mb-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paypal" viewBox="0 0 16 16">
                    <path d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                  </svg>-PayPal
                </p>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-6">
          <div class="row">
            <div class="col-12 col-xl-6">
              <div class="form-outline mb-4 mb-xl-5">
                <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Arthur Leroy" />
                <label class="form-label" for="typeName">Name on card</label>
              </div>

              <div class="form-outline mb-4 mb-xl-5">
                <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY" size="7" id="exp" minlength="7" maxlength="7" />
                <label class="form-label" for="typeExp">Expiration</label>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="form-outline mb-4 mb-xl-5">
                <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                <label class="form-label" for="typeText">Card Number</label>
              </div>

              <div class="form-outline mb-4 mb-xl-5">
                <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                <label class="form-label" for="typeText">Cvv</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xl-3">
          <div class="d-flex justify-content-between" style="font-weight: 500;">
            <p class="mb-2">Subtotal</p>
            <p class="mb-2"><?= $total ?> €</p>
          </div>


          <div class="d-flex justify-content-between" style="font-weight: 500;">
            <p class="mb-0">Tax (20%)</p>
            <p class="mb-0"> <?= $total * 0.2 ?> €</p>
          </div>

          <hr class="my-4">

          <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
            <p class="mb-2">Total (tax included)</p>
            <p class="mb-2"> <?= $total * 0.2 + $total ?> €</p>
          </div>

          <button type="button" class="btn btn-primary btn-block btn-lg">
            <div class="d-flex justify-content-between">
              <span>Buy-</span>
              <span> <?= $total * 0.2 + $total ?> €</span>
            </div>
          </button>

        </div>
      </div>

    </div>
  </div>
<?php endif; ?>

</div>
</div>
</div>
</section>



<?php include_once __DIR__ . '/footer.php' ?>