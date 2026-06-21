 <!-- Contact Section -->
    <section id="contact" class="contact-section section-py">
        <div class="container">
            <h2 class="section-title fade-in-section">Hubungi Kami</h2>
            <p class="section-subtitle fade-in-section">Ada pertanyaan? Kami siap membantu Anda</p>

            <div class="row g-4">
                <div class="col-lg-5 slide-in-left">
                    <h3 class="mb-4 fw-bold" style="color: var(--sea-blue-700);">Informasi Kontak</h3>
                    
                    <a href="tel:+6281234567890" class="contact-item">
                        <i class="bi bi-telephone"></i>
                        <div>
                            <h5 class="mb-1 fw-bold">Telepon</h5>
                            <p class="mb-0">082253553459</p>
                        </div>
                    </a>

                    <a href="mailto:berkahillahi0043@gmail.com" class="contact-item">
                        <i class="bi bi-envelope"></i>
                        <div>
                            <h5 class="mb-1 fw-bold">Email</h5>
                            <p class="mb-0">berkahillahi0043@gmail.com</p>
                        </div>
                    </a>

                    <div class="contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <h5 class="mb-1 fw-bold">Alamat</h5>
                            <p class="mb-0">JL.SUKAMARA RT.07 RW.02 LANDASAN ULIN UTARA KALIMANTAN SELATAN</p>
                        </div>
                    </div>

                 <a class="btn whatsapp-btn mt-3"  href="https://wa.me/+6282253553459"
                 >
                  <i class="bi bi-whatsapp"></i> Chat via WhatsApp</a>
                    
                
                   
                </div>

                <div class="col-lg-7 slide-in-right">
                    <div class="contact-form-card">
                      
                           <h2 class="text-center"><b>FAQ</b></h2>
                       
                            <div class="faq">
        <button class="accordion">
          Apa itu Heri Travel Geronggang?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Krushi is a Public Charitable Trust designed to carry out farming on
            extensive scale Natural & Sustainable methods.
          </p>
        </div>
      </div>
                     <div class="faq">
        <button class="accordion">
          What is Krushi?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Krushi is a Public Charitable Trust designed to carry out farming on
            extensive scale Natural & Sustainable methods.
          </p>
        </div>
      </div>
                     <div class="faq">
        <button class="accordion">
          What is Krushi?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Krushi is a Public Charitable Trust designed to carry out farming on
            extensive scale Natural & Sustainable methods.
          </p>
        </div>
      </div>
                     <div class="faq">
        <button class="accordion">
          What is Krushi?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="pannel">
          <p>
            Krushi is a Public Charitable Trust designed to carry out farming on
            extensive scale Natural & Sustainable methods.
          </p>
        </div>
      </div>

                       
      
                     
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}

.wrapper {
  max-width: 75%;
  margin: auto;
}

.wrapper > p,
.wrapper > h1 {
  margin: 1.5rem 0;
  text-align: center;
}

.wrapper > h1 {
  letter-spacing: 3px;
}

.accordion {
  background-color: white;
  color: rgba(0, 0, 0, 0.8);
  cursor: pointer;
  font-size: 1.2rem;
  width: 100%;
  padding: 2rem 2.5rem;
  border: none;
  outline: none;
  transition: 0.4s;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: bold;
}

.accordion i {
  font-size: 1.6rem;
}

.active,
.accordion:hover {
  background-color: #f1f7f5;
}
.pannel {
  padding: 0 2rem 2.5rem 2rem;
  background-color: white;
  overflow: hidden;
  background-color: #f1f7f5;
  display: none;
}
.pannel p {
  color: rgba(0, 0, 0, 0.7);
  font-size: 1.2rem;
  line-height: 1.4;
}

.faq {
  border: 1px solid rgba(0, 0, 0, 0.2);
  margin: 10px 0;
}
.faq.active {
  border: none;
}

    </style>
     <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          this.parentElement.classList.toggle("active");

          var pannel = this.nextElementSibling;

          if (pannel.style.display === "block") {
            pannel.style.display = "none";
          } else {
            pannel.style.display = "block";
          }
        });
      }
    </script>