document.addEventListener("DOMContentLoaded", function(event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener("click", () => {
                // Show navbar
                nav.classList.toggle("show");
                // Change icon
                toggle.classList.toggle("bx-x");
                // Add padding to body
                bodypd.classList.toggle("body-pd");
                // Add padding to header
                headerpd.classList.toggle("body-pd");
            });

            document.addEventListener("click", (e) => {
                const target = e.target;
                // Close sidebar if the target is outside the sidebar
                if (!target.closest("#nav-bar") && !target.closest("#header-toggle")) {
                    nav.classList.remove("show");
                    toggle.classList.remove("bx-x");
                    bodypd.classList.remove("body-pd");
                    headerpd.classList.remove("body-pd");
                }
            });
        }
    };

    showNavbar("header-toggle", "nav-bar", "body-pd", "header");

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll(".nav_link");

    function colorLink() {
        if (linkColor) {
            linkColor.forEach((l) => l.classList.remove("active"));
            this.classList.add("active");
        }
    }
    linkColor.forEach((l) => l.addEventListener("click", colorLink));


    // Your code to run since DOM is loaded and ready
});

document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const showPopup = urlParams.get("popup");

    if (showPopup === "true") {
        localStorage.setItem("showPopup", "true");
    }

    const storedShowPopup = localStorage.getItem("showPopup");

    if (storedShowPopup === "true") {
        const buttonPopup = document.getElementById("button-popup");
        buttonPopup.style.visibility = "visible";
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('.button-popup');
    var popup = document.querySelector('.popup');

    button.addEventListener('click', function() {
        popup.classList.add('show-popup'); /* Tambahkan kelas "show-popup" saat pop-up ditampilkan */
    });

    popup.addEventListener('click', function() {
        popup.classList.remove('show-popup'); /* Hapus kelas "show-popup" saat pop-up disembunyikan */
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const buttonAmbil = document.getElementById("btn-ambil");
    const buttonPopup = document.getElementById("button-popup");

    buttonAmbil.addEventListener("click", function() {
        const confirmation = confirm("Apakah Anda yakin sudah mengambil buku?");
        if (confirmation) {
            buttonPopup.style.display = "none";
            localStorage.setItem("showPopup", "hidden");
        }
    });
});