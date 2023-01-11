<footer>
    <h2 class="footer-title">STUDIO</h2>
    <div class="col-lg-12 text-center">
        <div class="col-md-2 d-inline-block">
        <img class="w-100" src="<?= base_url('assets/website/img/stechz-white.png') ?>" alt="Stechz - Criamos websites incríveis">
        </div>
        <div class="col-md-7 d-inline-block">
        <ul class="navbar-footer">
                    <li><a class="nav-link active" href="">Home</a></li>
                    <li><a class="nav-link" href="#what-we-do">Serviços</a></li>
                    <li><a class="nav-link" href="#our-work">Portifólio</a></li>
                    <li><a class="nav-link" href="#contact">Contato</a></li>
                    <li><a class="nav-link" href="#budget">Orçamento</a></li>
                </ul>
        </div>
        <div class="col-md-2 d-inline-block">
        <a href="https://www.instagram.com/stechz.studio/">
            <ion-icon name="logo-instagram" class="text-white icons-footer"></ion-icon>
        </a>
        <a href="https://www.facebook.com/stechz.studio/">
            <ion-icon name="logo-facebook" class="text-white icons-footer"></ion-icon>
        </a>
        </div>
    </div>
    <div class="copyright"><p>Made with <ion-icon name="heart" class="copyright-icon"></ion-icon> by Stechz Creative Studio</p> </div>
</footer>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>