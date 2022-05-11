<!DOCTYPE html>
<html lang="pt-br">
<?php
$title = 'Entre em contato conosco';
include_once __DIR__ . '/partials/head.php';
include_once __DIR__ . '/../views/partials/menu.php';
?>

<body>
  <main>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Contato</h1>
        <div class="d-inline-flex">
          <p class="m-0"><a style="color: #D19C97 !important;" href="">Home</a></p>
          <p class="m-0 px-2">&gt;</p>
          <p class="m-0"><?php echo $title; ?></p>
        </div>
      </div>
    </div>
    <!-- Page Header End -->
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
      <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Envie uma mensagem</span></h2>
      </div>
      <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
          <div class="contact-form">
            <div id="success"></div>
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                <p class="help-block text-danger"></p>
              </div>
              <div class="control-group">
                <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                <p class="help-block text-danger"></p>
              </div>
              <div class="control-group">
                <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                <p class="help-block text-danger"></p>
              </div>
              <div class="control-group">
                <textarea name="message" class="form-control" rows="6" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                <p class="help-block text-danger"></p>
              </div>
              <div>
                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Enviar Mensagem</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-5 mb-5">
          <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
          <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
          <div class="d-flex flex-column mb-3">
            <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
            <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
          </div>
          <div class="d-flex flex-column">
            <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->
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
