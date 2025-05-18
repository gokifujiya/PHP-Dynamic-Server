<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Users</title>
</head>
<body>
    <h1>Generate Lorem Ipsum Users</h1>
    <form action="download.php" method="post">
        <label for="count">Number of Users:</label>
        <input type="number" id="count" name="count" min="1" max="100" value="5" required>

        <br><br>

        <label for="format">Download Format:</label>
        <select id="format" name="format" required>
            <option value="html">HTML</option>
            <option value="markdown">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
        </select>

        <br><br>

        <button type="submit">Generate and Download</button>
    </form>
</body>
</html>
