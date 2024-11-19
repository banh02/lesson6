<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate Phone Number</title>
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
        <h1>Validate Phone Number Form</h1>
        <form method="POST">
            <div class="form-group">
                <label for="phone">Nhập Số Điện Thoại:</label>
                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại (xx)-(0xxxxxxxxx)" required>
            </div>
            <button type="submit">Kiểm tra</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $phone = $_POST["phone"];
            $pattern = '/^\(\d{2}\)-\(0\d{9}\)$/';

            try {
                if (!preg_match($pattern, $phone)) {
                    throw new Exception("Số điện thoại không hợp lệ. Định dạng phải là (xx)-(0xxxxxxxxx).");
                }
                echo "<p class='success'>Số điện thoại hợp lệ: $phone</p>";
            } catch (Exception $e) {
                echo "<p class='error'>" . $e->getMessage() . "</p>";
            }
        }
        ?>
    </div>
</body>

</html>