document.addEventListener("DOMContentLoaded", () => {
    console.log("Toggle Password Script Loaded"); // Tambahkan log untuk debugging

    const togglePassword = document.querySelector("#toggle-password");
    const passwordField = document.querySelector("#password");

    if (togglePassword && passwordField) {
        togglePassword.addEventListener("click", () => {
            console.log("Toggle Password Clicked"); // Log saat ikon diklik

            const type =
                passwordField.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordField.setAttribute("type", type);

            togglePassword.innerHTML =
                type === "password"
                    ? '<i class="fa fa-eye"></i>'
                    : '<i class="fa fa-eye-slash"></i>';
        });
    } else {
        console.error("Toggle Password Elements Not Found");
    }
});
