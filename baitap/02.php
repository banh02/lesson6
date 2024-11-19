<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate Account</title>
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
        <h1>Validate Account Form</h1>
        <form method="POST">
            <div class="form-group">
                <label for="account">Nhập Tên Tài Khoản:</label>
                <input type="text" id="account" name="account" placeholder="Nhập tài khoản" required>
            </div>
            <button type="submit">Kiểm tra</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $account = $_POST["account"];
            $pattern = '/^[_a-z0-9]{6,}$/';

            try {
                if (!preg_match($pattern, $account)) {
                    throw new Exception("Tên tài khoản không hợp lệ. Tài khoản phải có ít nhất 6 ký tự, không chứa ký tự đặc biệt hoặc chữ hoa.");
                }
                echo "<p class='success'>Tên tài khoản hợp lệ: $account</p>";
            } catch (Exception $e) {
                echo "<p class='error'>" . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>
</body>

</html>