document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem("jwt");

    if (token) {
        fetch("/dashboard", {
            method: "GET",
            headers: {
                Authorization: "Bearer " + token,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log("Data:", data);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    } else {
        console.log("Token tidak ditemukan");
    }
});
