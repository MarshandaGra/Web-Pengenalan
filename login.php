<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
session_start();
$error = '';
$validate = '';
//mengecek apakah form disubmit atau tidak
if( isset($_POST['submit']) ){
        
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($db, $username);
         // menghilangkan backshlases
        $password = stripslashes($_POST['password']);
         //cara sederhana mengamankan dari sql injection
        $password = mysqli_real_escape_string($db, $password);
    
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($username)) && !empty(trim($password))){
            //select data berdasarkan username dari database
            $query      = "SELECT * FROM user WHERE username = '$username'";
            $result     = mysqli_query($db, $query);
            $rows       = mysqli_num_rows($result);
            if ($rows != 0) {
                $hash   = mysqli_fetch_assoc($result)['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['username'] = $username;
            
                    header('Location: index.php');
                }
                            
            //jika gagal maka akan menampilkan pesan error
            } else {
                $error =  'Upaya Masuk User Gagal !!';
            }
            
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport"$dbtent="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- costum css -->
<style>
*{
    margin: 0;
    padding: 0;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
    background: url('12.jpg')no-repeat center center fixed;
    background-size: cover;
    color: #fff;
}
.form-box{
    position: relative;
    width: 400px;
    height: 450px;
    background-color: rgba(255, 255, 255, 0.9);
    border: 2px solid rgba(0, 0, 0, 0.42);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;
}
h4{
    font-size: 2rem;
    color: floralwhite;
    text-align: center;
    letter-spacing: 0.5rem;
    margin-bottom: 8%;
    margin-top: 5%;
    text-shadow: 9%;
}
.form-container {
    background: rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 900px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    margin: 0 auto;
}
.form-box{
    position: relative;
    margin: 20px 0;
    width: 500px;
    border-bottom: 2px solid #fff;
}
.form-box label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    transition: all .5s ease-in-out;
    color: #fafafa;
    font-size: 1rem;
    pointer-events: none;
}
.form-group label{
    color: #fafafa;
    font-weight: bold;
}
input:focus~label, input:valid~label{
    top: -5px;
}
.inputbox input{
    width: 350px;
    height: 60px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1rem;
    padding: 0 35px 0 5px;
    color: #fff;
}
button{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
}
.form-footer{
    font-size: .9rem;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}
.form-footer p a{
    text-decoration: none;
    color: #fff;
    font-weight: 600;
}
.form-footer p a:hover{
    text-decoration: underline;
}
</style>
</head>
<body>
        <section class="container-fluid mb-4">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="login.php" method="POST">
                    <h4 class="text-center font-weight-bold"> MASUK </h4>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                    <div class="form-footer mt-2">
                        <p> Belum punya akun? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </section>
            </section>
        </section>
        <script src="script.js"></script>
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>