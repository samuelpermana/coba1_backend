var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
    panel.style.maxHeight = null;
    } else {
    panel.style.maxHeight = panel.scrollHeight + "px";
    }
});
}

    // 2. Validasi Form
    const form = document.querySelector('#contact form');
    form.addEventListener('submit', function(e) {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        if (!name || !email || !message) {
            e.preventDefault();
            alert('Mohon lengkapi semua input sebelum mengirim!');
        }
    });

    // 3. Tampilan Modal untuk Form
    const btnAjukanSurat = document.querySelector('.btn');
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close">&times;</span>
            ${form.outerHTML}
        </div>
    `;
    document.body.appendChild(modal);

    btnAjukanSurat.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    // Close modal saat tombol close ditekan
    modal.querySelector('.close').addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal saat klik di luar modal
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    $(document).ready(function() {
        const cards = $('.features .card');
        let currentIndex = 0;
    
        function showCard(index) {
        cards.hide().eq(index).fadeIn();
        }
    
        $('.next-btn').click(function() {
        currentIndex++;
        if (currentIndex >= cards.length) {
            currentIndex = 0;
        }
        showCard(currentIndex);
        });
    
        $('.prev-btn').click(function() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = cards.length - 1;
        }
        showCard(currentIndex);
        });
    });
    
        





let swiperCards = new Swiper(".card__content", {
    loop: true,
    spaceBetween: 32,
    grabCursor: true,
  
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
  
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  
    breakpoints:{
      600: {
        slidesPerView: 2,
      },
      968: {
        slidesPerView: 3,
      },
    },
  });

  