
<?php
include('./function.php');
// pirmas apsilankymas
start();
// naujo objekto kurimas
if(isset($_POST['name']) && !isset($_POST['id'])) {                 
    newObject();
}
// unpdate seno
if(isset($_POST['name']) && isset($_POST['id'])) {                 
    update();
}                                                      
// objekto trynimas
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
   delete();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
    $list = id();
    ?>
<form action="" method="post">
<input type="hidden" name="id" value="<?=$list['id']?>">
<input type="text" name="name" value="<?=$list['name']?>">
<input type="text" name="surname" value="<?=$list['surname']?>">
<input type="number" name="score" value="<?=$list['score']?>">
<button type="submit">ivesti</button>
</form>
<?php } else { ?>
    <form action="" method="post">
<input type="text" name="name">
<input type="text" name="surname">
<input type="number" name="score">
<button type="submit">ivesti</button>
</form>
<?php } ?>
<table>
  <tr>
    <th>Numeris</th>
    <th>Vardas</th>
    <th>Pavarde</th>
    <th>Balai</th>
    <th>Redaguoti</th>
    <th>Istrinti</th>
  </tr>                                                                                    
  <?php foreach ($_SESSION['dienynas'] as $list) { ?>           
  <tr>
    <td><?=$list['id']?></td>
    <td><?=$list['name']?></td>
    <td><?=$list['surname']?></td>
    <td><?=$list['score']?></td>
    <td>
       <a href="?id=<?=$list['id']?>"> <div class="btn btn-success">Redaguoti</div> </a>
    </td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="id" value='<?=$list['id']?>'>
             <input type="submit" class="btn btn-danger value="Istrinti">
    </form>

</td>
  </tr>
<?php } ?>
</table>
</body>
</html>