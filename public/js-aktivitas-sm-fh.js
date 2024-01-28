window.onload = function () {
    "use strict";
    //autoplay true=on, false=off
    var autoplay = false;

    //slideshow autoplay timing in ms
    var autoTime = 3000;

    //vars
    var tracker = 0,
        slidewindow = document.querySelector("#slideshow #slidewindow"),
        slides = document.querySelectorAll("#slideshow #slidewindow div"),
        next = document.querySelector("#slideshow #controls #next"),
        prev = document.querySelector("#slideshow #controls #prev"),
        dots = document.querySelector("#slideshow #controls #dots"),
        titleElement = document.querySelector("#description h1"),
        descriptionElement = document.querySelector("#description p"),
        allDots = dots.getElementsByTagName("LI");

    function updateText(index) {
        titleElement.textContent = slides[index].getAttribute("data-title");
        descriptionElement.textContent =
            slides[index].getAttribute("data-description");
    }

    //Attach click events to next and prev
    next.onclick = direction;
    prev.onclick = direction;

    //create a dot for each slide
    for (var i = 0; i < slides.length; i++) {
        var dot = document.createElement("LI");
        dot.id = i;
        dots.appendChild(dot);
        dot.onclick = direction;
    }

    //run function on resize
    window.onresize = updateAll;

    //invoke updateAll
    updateAll();

    //update slide and container sizes
    function updateAll() {
        updateDots(tracker);
        updateText(-tracker);

        //set width of slidewindow to 100%
        slidewindow.style.width = "100%";

        //Get current width and height
        var curWidth = slides[0].offsetWidth;
        var curHeight = slides[0].offsetHeight;

        //set current w/h of slidewindow to match slide
        slidewindow.style.width = curWidth + "px";
        slidewindow.style.height = curHeight + "px";

        //set position of each slide
        for (var i = 0; i < slides.length; i++) {
            console.log(slides[i].style.transform);
            console.log(tracker);
            slides[i].style.transform =
                "translateX(" + (i * curWidth + tracker * curWidth) + "px )";
        }
    }

    function isNumber(obj) {
        return !isNaN(parseFloat(obj));
    }

    //autoplay
    if (autoplay === true) {
        setInterval(function () {
            if (tracker > 1 - slides.length) {
                tracker -= 1;
            } else if (tracker === 1 - slides.length) {
                tracker = 0;
            } else if (tracker < 0) {
                tracker += 1;
            } else if (tracker === 0) {
                tracker = -slides.length + 1;
            }
            updateAll();
        }, autoTime);
    }

    function direction(eventObject) {
        //get id from target
        var idVal = eventObject.target.id;

        if (idVal === "next" && tracker > 1 - slides.length) {
            tracker -= 1;
        } else if (idVal === "next" && tracker === 1 - slides.length) {
            tracker = 0;
        } else if (idVal === "prev" && tracker < 0) {
            tracker += 1;
        } else if (idVal === "prev" && tracker === 0) {
            tracker = -slides.length + 1;
        } else if (isNumber(idVal)) {
            tracker = -idVal;
        }
        updateAll();
    }

    //updateDots
    function updateDots(n) {
        n *= -1;
        for (var i = 0; i < allDots.length; i++) {
            allDots[i].className = "";
        }
        allDots[n].className = "active";
    }

    //swipe event listeners
    slidewindow.addEventListener("touchstart", handleTouchStart, false);
    slidewindow.addEventListener("touchmove", handleTouchMove, false);

    //swipe vars
    var xDown = null;
    var yDown = null;

    //swipe handleTouchStart
    function handleTouchStart(evt) {
        xDown = evt.touches[0].clientX;
        yDown = evt.touches[0].clientY;
    }

    //swipe handleTouchMove
    function handleTouchMove(evt) {
        if (!xDown || !yDown) {
            return;
        }

        var xUp = evt.touches[0].clientX;
        var yUp = evt.touches[0].clientY;

        var xDiff = xDown - xUp;
        var yDiff = yDown - yUp;

        if (Math.abs(xDiff) > Math.abs(yDiff)) {
            /*determine most significant*/
            if (xDiff > 0) {
                //swipe left - next
                if (tracker > 1 - slides.length) {
                    tracker -= 1;
                } else if (tracker === 1 - slides.length) {
                    tracker = 0;
                }
                updateAll();
            } else {
                //swipe right - prev
                if (tracker < 0) {
                    tracker += 1;
                } else if (tracker === 0) {
                    tracker = -slides.length + 1;
                }
                updateAll();
            }
        } else {
            if (yDiff > 0) {
                //swipe up
            } else {
                //swipe down
            }
        }

        /* reset values */
        xDown = null;
        yDown = null;
    }
};
