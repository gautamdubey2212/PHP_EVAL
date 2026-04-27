<?php

include "Db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Reg WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['Password'])) {

            $_SESSION['user'] = $row['id'];

            header("Location: Home.php");
            exit();

        } else {
            echo "❌ Wrong Password!";
        }

    } else {
        echo "❌ User not found!";
    }
}
?>


<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
         
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h3 class="text-center mt-5">Login with us!!!</h3>

            <form action="" method="POST">
                <div
                    class="container rounded shadow border mt-5 col-5 p-5"
                >
                    <div class="form-floating mb-3">
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder="Enter email"
                        />
                        <label for="formId1">Email</label>
                    </div>

                    

                     <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="Enter Password"
                        />
                        <label for="formId1">Password</label>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Submit
                    </button>
                    
                    
                </div>
                
            </form>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
