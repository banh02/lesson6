<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        .form-container {
            max-width: 400px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Validate Email Form</h1>
        <form method="POST">
            <div class="form-group">
                <label for="email">Nhập Email:</label>
                <input type="text" id="email" name="email" placeholder="Nhập địa chỉ email của bạn" required>
            </div>
            <button type="submit">Kiểm tra</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $pattern = '/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)+$/';

            try {
                if (!preg_match($pattern, $email)) {
                    throw new Exception("Email không hợp lệ. Vui lòng thử lại.");
                }
                echo "<p class='success'>Email hợp lệ: $email</p>";
            } catch (Exception $e) {
                echo "<p class='error'>" . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>
</body>

</html>