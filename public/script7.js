let prevScrollPos = window.pageYOffset;

    window.addEventListener('scroll', function() {
      let currentScrollPos = window.pageYOffset;

      if (prevScrollPos < currentScrollPos) {
        // Scrolling Down
        document.querySelector('.step-wizard-list').style.transform = 'translateY(-0%)';
      } else {
        // Scrolling Up
        document.querySelector('.step-wizard-list').style.transform = 'translateY(0)';
      }

      prevScrollPos = currentScrollPos;
    });