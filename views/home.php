   <?php include "views/component/header.php"; ?>

   <main class="container">
       <div class="shadow bg-light mt-4 ms-4 mb-4 p-4">
           <div id="carouselExampleIndicators" class="carousel slide">
               <div class="carousel-indicators">
                   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                       aria-current="true" aria-label="Slide 1"></button>
                   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                       aria-label="Slide 2"></button>
               </div>
               <div class="carousel-inner">
                   <div class="carousel-item active">
                       <img src="<?= BASE_URL . 'img/slide 1.jpg' ?>" class="d-block w-100" alt="...">
                   </div>
                   <div class="carousel-item">
                       <img src="<?= BASE_URL . 'img/slide2.jpg' ?>" class="d-block w-100" alt="...">
                   </div>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                   data-bs-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                   data-bs-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Next</span>
               </button>
           </div>

           <h3 class="mt-3">Sản phẩm mới nhất</h3>
           <hr>
           <div class="row">
               <?php foreach ($listPro as $pro): ?>
               <div class="col-3">
                   <div class="border rounded-3 mb-3 overflow-hidden">
                       <div class="bg-danger ratio-1x1">
                           <img src="<?= BASE_URL_IMG . $pro->image_src ?>" alt="" class="mw-100 mh-100">
                       </div>
                       <div class="p-2">
                           <h5><?= $pro->name ?></h5>
                           <div class="d-flex justify-content-between">
                               <span
                                   class="text-danger text-decoration-line-through"><?= number_format("$pro->price_old") ?>
                                   VNĐ</span>
                               <span class="fw-bold"><?= number_format("$pro->price_new") ?> VNĐ</span>
                           </div>
                           <a href="?act=detail-pro&id=<?= $pro->id ?>">
                               <button class="btn btn-danger rounded-pill w-100 btn-sm mt-1">Chi tiết</button>
                           </a>
                       </div>
                   </div>
               </div>
               <?php endforeach; ?>
           </div>
       </div>
   </main>

   <?php include "views/component/footer.php"; ?>