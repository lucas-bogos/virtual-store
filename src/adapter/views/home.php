<!DOCTYPE html>
<html lang="pt-br">
<?php
$title = 'Compras é aqui';
include_once __DIR__ . '/partials/head.php';
include_once __DIR__ . '/../views/partials/menu.php';
?>

<body>
  <main>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Produtos</h1>
        <div class="d-inline-flex">
          <p class="m-0"><a style="color: #D19C97 !important;" href="">Home</a></p>
          <p class="m-0 px-2">&gt;</p>
          <p class="m-0"><?php echo $title; ?></p>
        </div>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
      <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
          <!-- Price Start -->
          <div class="border-bottom mb-4 pb-4">
            <h5 class="font-weight-semi-bold mb-4">Filtrar por Preço</h5>
            <form>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="price-all">
                <label class="custom-control-label" for="price-all">Todos os preços</label>
                <span class="badge border font-weight-normal">1000</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-1">
                <label class="custom-control-label" for="price-1">$0 - $100</label>
                <span class="badge border font-weight-normal">150</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-2">
                <label class="custom-control-label" for="price-2">$100 - $200</label>
                <span class="badge border font-weight-normal">295</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-3">
                <label class="custom-control-label" for="price-3">$200 - $300</label>
                <span class="badge border font-weight-normal">246</span>
              </div>
            </form>
          </div>
          <!-- Price End -->
          <!-- Color Start -->
          <div class="border-bottom mb-4 pb-4">
            <h5 class="font-weight-semi-bold mb-4">Filtrar por Cor</h5>
            <form>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="color-all">
                <label class="custom-control-label" for="price-all">Todas as Cores</label>
                <span class="badge border font-weight-normal">1000</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-1">
                <label class="custom-control-label" for="color-1">Preto</label>
                <span class="badge border font-weight-normal">150</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-2">
                <label class="custom-control-label" for="color-2">Branco</label>
                <span class="badge border font-weight-normal">295</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-3">
                <label class="custom-control-label" for="color-3">Vermelho</label>
                <span class="badge border font-weight-normal">246</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-4">
                <label class="custom-control-label" for="color-4">Azul</label>
                <span class="badge border font-weight-normal">145</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="color-5">
                <label class="custom-control-label" for="color-5">Verde</label>
                <span class="badge border font-weight-normal">168</span>
              </div>
            </form>
          </div>
          <!-- Color End -->
          <!-- Size Start -->
          <div class="mb-5">
            <h5 class="font-weight-semi-bold mb-4">Filtrar por Tamanho</h5>
            <form>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="size-all">
                <label class="custom-control-label" for="size-all">Todos os Tamanhos</label>
                <span class="badge border font-weight-normal">1000</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-2">
                <label class="custom-control-label" for="size-2">P</label>
                <span class="badge border font-weight-normal">295</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-3">
                <label class="custom-control-label" for="size-3">M</label>
                <span class="badge border font-weight-normal">246</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-4">
                <label class="custom-control-label" for="size-4">G</label>
                <span class="badge border font-weight-normal">145</span>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="size-5">
                <label class="custom-control-label" for="size-5">GG</label>
                <span class="badge border font-weight-normal">168</span>
              </div>
            </form>
          </div>
          <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->
        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
          <div class="row pb-3">
            <!-- Filters -->
            <div class="col-12 pb-1">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="dropdown ml-4">
                  <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordenar por
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="#">Mais Recentes</a>
                    <a class="dropdown-item" href="#">Populares</a>
                    <a class="dropdown-item" href="#">Melhor Avaliado</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Products -->
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                  <div class="d-flex justify-content-center">
                    <h6>$123.00</h6>
                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                  <div class="d-flex justify-content-center">
                    <h6>$123.00</h6>
                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                  <div class="d-flex justify-content-center">
                    <h6>$123.00</h6>
                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="img/product-7.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                  <div class="d-flex justify-content-center">
                    <h6>$123.00</h6>
                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="img/product-8.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                  <div class="d-flex justify-content-center">
                    <h6>$123.00</h6>
                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                  <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                  <div class="d-flex justify-content-center">
                    <h6>$123.00</h6>
                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
              </div>
            </div>
            <!-- Pagination -->
            <div class="col-12 pb-1">
              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-3">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- Shop Product End -->
      </div>
    </div>
    <!-- Shop End -->
  </main>
  <?php include_once __DIR__ . '/../views/partials/footer.php'; ?>
  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  <!-- Contact Javascript File -->
  <script src="/mail/jqBootstrapValidation.min.js"></script>
  <script src="/mail/contact.js"></script>
  <!-- Template Javascript -->
  <script src="/js/main.js"></script>
</body>

</html>
