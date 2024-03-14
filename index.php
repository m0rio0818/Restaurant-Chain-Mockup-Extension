<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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

</html>