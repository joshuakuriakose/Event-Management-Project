<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
  <style>
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

body{
    font-family: "Lato", sans-serif;
}

.outer-box{
    width: 100vw;
    height: 100vh;
    background: linear-gradient(to top left,rgb(73, 5, 125),#002236);
}

.inner-box {
    width: 400px;
    padding: 20px 40px;
    margin: 0 auto;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(to top left, #ffffffea, #ffffff33);
    /* Removed blur effect */
    border-radius: 25px;
    box-shadow: 4px 4px 5px rgba(46, 49, 53, 0.634);
    z-index: 2;
    transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
}

.inner-box:hover {
    transform: translateY(-50%) scale(1.03); /* Reduced scale effect */
    box-shadow: 4px 10px 10px rgba(46, 49, 53, 0.634);
}

.signup-header h1{
    font-size: 2.5rem;
    color: 212121;
}
.signup-header p{
    font-size: 0.9rem;
    color: #555;
}

.signup-body{
    margin: 20px 0;
}

.signup-body p{
    margin: 10px 0;
}

.signup-body p label{
    display: block;
    font-weight: bold;
}

.signup-body p input{
    width: 100%;
    padding: 15px;
    border: 2px solid #ccc;
    border-radius: 25px;
    font-size: 1rem;
    margin-top: 4px;
}

/*or we can declare a new id that is defined, #submit{}*/
.signup-body p input[type="submit"]{
    border: none;
    /* background-image: linear-gradient(to right,red,black); */
    color: white;
    cursor: pointer;
    transition: 0.4s ease-in-out;
    background-size: 200% ;
    background-image: linear-gradient(to right,rgb(73, 5, 125),#002236 );
}

.signup-body p input[type="submit"]:hover{
    background-position: -100% 0;
    box-shadow: 0 4px 15px #3498db;
    transform: scale(1.05);
}

.signup-footer p a{
    display: block;
    color: #3498db;
    text-decoration: none;
}
.signup-footer p a:link{color: blue;}
.signup-footer p a:visited{color: #3498db;}
.signup-footer p a:hover{color: #6b00b8;}
.signup-footer p a:active{color: red;}

.circle{
    width: 200px;
    height: 200px;
    border-radius: 100px;
    background: linear-gradient(to top right,#ffffff22,#ffffffff);
    position: fixed;
    animation: float 6s ease-in-out infinite;
}

.c1{
    top: 100px;
    left: 50px;
    animation-delay: 0s;
}
.c2{
    bottom: 200px;
    right: 50px;
    animation-delay: 3s;
}
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

</style>
</head>
<body>
    
<div class="outer-box">
    <div class="inner-box">
        <header class="signup-header">
            <h1>SignUp</h1>
            <p>It just takes 30 seconds</p>
        </header>
        <main class="signup-body">
<form action = signup_process.php method="POST">
                <p>
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="username" placeholder="Enter your name" required>
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </p>
                <p>
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone_number" placeholder="Enter your phone number" required pattern="[0-9]{10}" title="Phone number must be exactly 10 digits" required>
                </p>
                <p>
                    <label for="password">Your password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>
                </p>
                <p>
                    <input type="submit" id="submit" value="Create Account">
                </p>
            
        </main>
    </div>
    <div class="circle c1"></div>
    <div class="circle c2"></div>
</div>
</form>
</body>
</html>