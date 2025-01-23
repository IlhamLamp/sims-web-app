const sidebar = document.getElementById("sidebar");
const hamburgerBtn = document.getElementById("hamburger-btn");
const spans = sidebar.querySelectorAll("span");
const title = document.getElementById("sidebar-title");

hamburgerBtn.addEventListener("click", () => {
    if (sidebar.classList.contains("lg:w-56")) {
        sidebar.classList.replace("lg:w-56", "w-20");
        Array.from(sidebar.querySelectorAll("span")).forEach((el) =>
            el.classList.add("hidden")
        );
        title.classList.add("hidden");
    } else {
        sidebar.classList.replace("w-20", "lg:w-56");
        Array.from(sidebar.querySelectorAll("span")).forEach((el) =>
            el.classList.remove("hidden")
        );
        title.classList.remove("hidden");
    }
});
