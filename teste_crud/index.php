<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

        <?php
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Validate form data (you can add more validation if needed)
            if (empty($name) || empty($email) || empty($message)) {
                echo "Please fill in all fields.";
            } else {
                // Connect to the database (replace with your own database credentials)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "mensagem";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    //echo "Connected successfully.";
                }

                // Insert data into the database
                $sql = "INSERT INTO mensagem (name, email, message) VALUES ('$name', '$email', '$message')";

                if ($conn->query($sql) === TRUE) {
                    echo "Message sent successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the database connection
                $conn->close();
            }
        }
        ?>

        <div class="container">
            <h2>Entre em contato conosco:</h2>
            
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="name">Nome Completo:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Menssagem:</label>
                    <textarea name="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>