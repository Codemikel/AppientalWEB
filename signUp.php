<?php $title = 'Registro'?>
<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nickname'] && !empty($_POST['name']))) {
    $sql = "INSERT INTO users (name, email, nickname, password) VALUES (:name, :email, :nickname, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':nickname', $_POST['nickname']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado con éxito';
    } else {
      $message = 'Lo sentimos, tenemos un error con tu registro.';
    }
  }
?>
<?php include('Components/Header.php');?>
    <section class="signUpFrame">
        <form action="signUp.php" method="post" class="signUpForm">
            <h2>Crear Cuenta</h2>
            <input type="text" name="name" id="" placeholder="Tu Nombre">
            <input type="email" name="email" id="" placeholder="Tu Email">
            <input type="text" name="nickname" id="" placeholder="@ejemplousario">
            <input type="password" name="password" placeholder="Debe contener entre 8 a 12 carácteres">
            <input type="submit" value="submit">
        </form>    
    </section>
<?php include('Components/Footer.php');?>