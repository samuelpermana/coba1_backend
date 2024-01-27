var btns = document.querySelectorAll(".btn3");

btns.forEach(function (btn) {
    btn.addEventListener("click", function () {
        var panel = this.nextElementSibling;
        this.classList.toggle("active");
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
});
