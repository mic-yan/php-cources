<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Message</title>
</head>
<body>
<div>
    <form enctype="text/plain" method="post">
    <label><?=$data['0']['user']?>:
        <br>
        <textarea rows="4" cols="50" name="mess_changed"><?=$data['0']['message_text']?></textarea>
    </label>
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
    <input type="button" value="Cancel" name="back">
    </form>
</div>
</body>
</html>