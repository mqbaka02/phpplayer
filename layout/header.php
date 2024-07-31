<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpPlayer</title>

    <?php foreach($styles as $style) : ?>
        <link rel="stylesheet" href=<?="styles/$style"?>>
    <?php endforeach ?>

    <link rel="icon" type="image/x-icon" href="favicon.ico?v=1">
</head>
<body>