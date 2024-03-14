<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<body>
    <from action="download.php" method="post">
        <label for="count">Number of Users: </label>
        <input type="number" id="count" name="count" min="1" max="100" value="5">

        <label for="format"> Download Format: </label>
        <select name="format" id="format">
            <option value="html">HTML</option>
            <option value="markdown">MarkDown</option>
            <option value="json">JSON</option>
            <option value="text">Text</option>
        </select>

        <button type="submit">Generate</button>
    </from>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>