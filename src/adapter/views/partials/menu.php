<!-- Topbar Start -->
<div class="container-fluid">
  <div class="row bg-secondary py-2 px-xl-5">
    <!-- Top Items -->
    <div class="col-lg-6 d-none d-lg-block">
      <div class="d-inline-flex align-items-center">
        <a class="text-dark" href="#">FAQ</a>
        <span class="text-muted px-2">|</span>
        <a class="text-dark" href="#">Ajuda</a>
        <span class="text-muted px-2">|</span>
        <a class="text-dark" href="#">Suporte</a>
      </div>
    </div>
    <!-- Social Media -->
    <div class="col-lg-6 text-center text-lg-right">
      <div class="d-inline-flex align-items-center">
        <a class="text-dark px-2" href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a class="text-dark px-2" href="#">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="text-dark px-2" href="#">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="text-dark px-2" href="#">
          <i class="fab fa-instagram"></i>
        </a>
        <a class="text-dark pl-2" href="#">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="row align-items-center py-3 px-xl-5">
    <!-- Logo -->
    <div class="col-lg-3 d-none d-lg-block">
      <a href="/" class="text-decoration-none">
        <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary">Virtual </span>Store</h2>
      </a>
    </div>
    <!-- Search -->
    <div class="col-lg-6 col-6 text-left">
      <form action="/buscar" method="POST">
        <div class="input-group">
          <input name="product" type="search" class="form-control" placeholder="Busque os melhores produtos">
          <div class="input-group-append">
            <span class="input-group-text bg-transparent text-primary">
              <i class="fa fa-search"></i>
            </span>
          </div>
        </div>
      </form>
    </div>
    <!-- Items Top Right -->
    <div class="col-lg-3 col-6 text-right">
      <a href="#" class="btn border">
        <i class="fas fa-heart text-primary"></i>
        <span class="badge">0</span>
      </a>
      <a href="/carrinho" class="btn border">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span class="badge">0</span>
      </a>
    </div>
  </div>
</div>
<!-- Topbar End -->
<!-- Navbar Start -->
<div class="container-fluid">
  <div class="row border-top px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Categorias</h6>
        <i class="fa fa-angle-down text-dark"></i>
      </a>
      <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
          <div class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">Classes <i class="fa fa-angle-down float-right mt-1"></i></a>
            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
              <a href="" class="dropdown-item">Masculino</a>
              <a href="" class="dropdown-item">Feminino</a>
              <a href="" class="dropdown-item">Infantil</a>
            </div>
          </div>
          <a href="" class="nav-item nav-link">Camisetas</a>
          <a href="" class="nav-item nav-link">Calças</a>
          <a href="" class="nav-item nav-link">Sapatos</a>

        </div>
      </nav>
    </div>
    <div class="col-lg-9">
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="/" class="text-decoration-none d-block d-lg-none">
          <h2 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary">Virtual </span>Store</h2>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link">Home</a>
            <a href="/carrinho" class="nav-item nav-link">Carrinho</a>
            <a href="/pagamento" class="nav-item nav-link">Pagamento</a>
            <a href="/contato" class="nav-item nav-link">Contato</a>
          </div>
          <div class="navbar-nav ml-auto py-0">
            <a href="" class="nav-item nav-link">Entrar</a>
            <a href="" class="nav-item nav-link">Cadastro</a>
          </div>
        </div>
    </div>
    </nav>
  </div>
</div>
</div>
<!-- Navbar End -->
