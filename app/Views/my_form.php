<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anti-Hacker Lab</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            color: #333333;
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
        }
        .result-box {
            background-color: #e8f0fe;
            border-left: 5px solid #1a73e8;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            word-wrap: break-word;
        }
        .result-title {
            font-size: 12px;
            color: #1a73e8;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 4px;
        }
        .result-text {
            color: #333333;
            font-family: 'Courier New', Courier, monospace;
            font-size: 15px;
            margin: 0;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #5f6368;
            font-size: 14px;
            font-weight: 600;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus {
            border-color: #1a73e8;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #1557b0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Secure Form Lab</h2>
        
        <?php if (isset($user_input)): ?>
            <div class="result-box">
                <div class="result-title">Galing sa User (Naka-Escape):</div>
                <p class="result-text"><?= esc($user_input) ?></p>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <?= csrf_field() ?>
            
            <label for="user_input">Input Text:</label>
            <input type="text" id="user_input" name="user_input" placeholder="Type <b>John</b> here..." required>
            
            <button type="submit">Submit Data</button>
        </form>
    </div>

</body>
</html>