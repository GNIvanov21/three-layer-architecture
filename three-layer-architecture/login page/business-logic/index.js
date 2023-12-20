function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response === "success") {
                alert("Login successful!");
            } else {
                document.getElementById("errorMessage").innerText = "Invalid username or password.";
            }
        }
    };
    xhr.send("username=" + username + "&password=" + password);
}