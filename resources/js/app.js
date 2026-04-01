document.addEventListener("DOMContentLoaded", function () {

    const preview = document.getElementById("home-preview");

    let triggered = false;

    window.addEventListener("wheel", function (e) {

        if (e.deltaY < 0 && !triggered) {

            preview.style.transform = "translateY(0)";
            triggered = true;

            setTimeout(() => {
                window.location.href = "/";
            }, 800);
        }

    });

});
