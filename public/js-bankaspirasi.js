var btns = document.querySelectorAll(".btn3");

btns.forEach(function (btn) {
    btn.addEventListener("click", function () {
        var panel = this.nextElementSibling;
        this.classList.toggle("active");
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            panel.style.padding = 0;
        } else {
            panel.style.padding = "10px 18px";
            panel.style.maxHeight = panel.scrollHeight + 17 + "px";
        }
    });
});
