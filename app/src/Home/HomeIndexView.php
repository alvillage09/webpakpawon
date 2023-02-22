<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- mengambil data yang di parsing dari controller (data berupa array) -->
    <?php foreach ($data['user'] as $usr) {?>
        <ul>
            <li>Nama : <?= $usr['user']; ?> </li>
            <li>Password : <?= hash('sha256',$usr['password']); ?> </li>
        </ul>
    <?php }?>

</body>
</html>