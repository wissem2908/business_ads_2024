<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Message Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .message {
        margin-bottom: 20px;
        padding: 10px 20px;
        border-radius: 5px;
    }
    .success {
        background-color: #d4edda;
        color: #155724;
    }
    .error {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>
</head>
<body>
    <div class="container">
        <?php
            // Include your database configuration file
            include 'config.php';

            // Retrieve the confirmation code from the URL parameter
            if(isset($_GET['code'])) {
                $confirmationCode = $_GET['code'];

                try {
                    // Connect to the database
                    $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    
                    // Query to find a user with the provided confirmation code
                    $stmt = $bdd->prepare('SELECT * FROM `normal_users` WHERE `confirmationCode` = ?');
                    $stmt->execute([$confirmationCode]);
                    
                    // Check if a user is found with the confirmation code
                    if($stmt->rowCount() > 0) {
                        // Update the user's account status to activated
                        $updateStmt = $bdd->prepare('UPDATE `normal_users` SET `active` = ? WHERE `confirmationCode` = ?');
                        $updateStmt->execute([1, $confirmationCode]);

                        // Display success message
                        echo "<div class='message success'>Your account has been successfully activated,Now please wait the activatioin from administration</div><br/>
                        <a href='https://bizads.au/login.php'>Log In</a>
                        ";
                    } else {
                        // Display error message if no user is found with the confirmation code
                        echo "<div class='message error'>Invalid confirmation code. Please make sure you clicked the correct link.</div>";
                    }
                } catch(PDOException $e) {
                    // Display error message if there's an error with database connection or query
                    echo "<div class='message error'>Error: " . $e->getMessage() . "</div>";
                }
            } else {
                // Display error message if no confirmation code is provided
                echo "<div class='message error'>No confirmation code provided.</div>";
            }
        ?>
    </div>
</body>
</html>
