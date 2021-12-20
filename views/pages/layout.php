<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LEO</title>

        <link href="/assets/img/favicon.ico" rel="shortcut icon" type="icon">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="/public/assets/css/main.min.css" rel="stylesheet">
    </head>
    <body>
        <?=DesafioLeo\Utility::showComponent('header.php');?>
        <?=eval($content)?>
        <?=DesafioLeo\Utility::showComponent('footer.php');?>
    </body>
</html>
