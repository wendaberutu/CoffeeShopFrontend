// Function to handle login
const login = async (phone_number, password) => {
    try {
        const response = await fetch("http://127.0.0.1:8000/api/auth/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                // CSRF Token bisa ditambahkan jika diperlukan
                // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({
                no_whatshap: phone_number,
                password: password,
            }),
        });

        const data = await response.json();
        // console.log(data);

        if (response.ok) {
            console.log("Login successful", data);
            // Simpan token di localStorage
            localStorage.setItem("access_token", data.data.access_token);
            localStorage.setItem("user", JSON.stringify(data.data.user));
            console.log(localStorage.getItem("access_token"));
            console.log(localStorage.getItem("user"));

            // Cek role dan redirect berdasarkan role
            const userRole = data.data.user.role;

            if (userRole === "admin") {
                window.location.href = "/admin/products"; // Redirect ke halaman admin
            } else if (userRole === "user") {
                window.location.href = "/user/dashboard"; // Redirect ke dashboard untuk user
            }
        } else {
            console.error("Login failed", data.message);
            document.getElementById("error-message").style.display = "block";
            document.getElementById("error-message").innerText =
                data.message || "Invalid credentials, please try again.";
        }
    } catch (error) {
        console.error("Error during login", error);
        document.getElementById("error-message").style.display = "block";
        document.getElementById("error-message").innerText =
            "Something went wrong. Please try again.";
    }
};

// Event listener untuk form submission
document
    .getElementById("login-form")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const phone_number = document.getElementById("phone_number").value;
        const password = document.getElementById("password").value;

        login(phone_number, password); // Panggil fungsi login
    });
