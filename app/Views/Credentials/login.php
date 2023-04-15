<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Login Page</title>
	<style type="text/css">
	
	body {
    		font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    		background: #ffffff;
	}


	.cont {
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    width: 900px;
    height:550px;
    margin: 0 auto 100px;
    background: #fff;
    box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.3), 10px 10px 15px rgba(70, 70, 70, 0.15), inset -10px -10px 15px rgba(255, 255, 255, 0.3), inset 10px 10px 15px rgba(70, 70, 70, 0.15);
	}

	.form {
    position: relative;
    width: 640px;
    height: 100%;
    -webkit-transition: -webkit-transform 1.2s ease-in-out;
    transition: -webkit-transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
    padding: 45px 200px 0;
	}

.sub-cont {
    overflow: hidden;
    position: absolute;
    left: 640px;
    top: 0;
    width: 900px;
    height: 100%;
    padding-left: 260px;
    background: #fff;
    -webkit-transition: -webkit-transform 1.2s ease-in-out;
    transition: -webkit-transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}

.cont.s--signup .sub-cont {
    -webkit-transform: translate3d(-640px, 0, 0);
    transform: translate3d(-640px, 0, 0);
}


.img {
    overflow: hidden;
    z-index: 2;
    position: absolute;
    left: 0;
    top: 0;
    width: 260px;
    height: 100%;
    padding-top: 220px;
}

.img:before {
    content: '';
    position: absolute;
    right: 0;
    top: 0;
    width: 900px;
    height: 100%;
    background-image: url("ext.jpg");
    opacity: .8;
    background-size: cover;
    -webkit-transition: -webkit-transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}

.img:after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
}

.cont.s--signup .img:before {
    -webkit-transform: translate3d(640px, 0, 0);
    transform: translate3d(640px, 0, 0);
}

.img__text {
    z-index: 2;
    position: absolute;
    left: 0;
    top: 50px;
    width: 100%;
    padding: 0 20px;
    text-align: center;
    color: #fff;
    -webkit-transition: -webkit-transform 1.2s ease-in-out;
    transition: -webkit-transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out;
    transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
}

.img__text h2 {
    margin-bottom: 10px;
    font-weight: normal;
}

.img__text p {
    font-size: 20px;
    line-height: 1.5;
}

.cont.s--signup .img__text.m--up {
    -webkit-transform: translateX(520px);
    transform: translateX(520px);
}

.img__text.m--in {
    -webkit-transform: translateX(-520px);
    transform: translateX(-520px);
}

.cont.s--signup .img__text.m--in {
    -webkit-transform: translateX(0);
    transform: translateX(0);
}

.img__btn {
    overflow: hidden;
    z-index: 2;
    position: relative;
    width: 100px;
    height: 36px;
    margin: 0 auto;
    background: transparent;
    color: #fff;
    text-transform: uppercase;
    font-size: 15px;
    cursor: pointer;
}

.img__btn:after {
    content: '';
    z-index: 2;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border: 2px solid #fff;
    border-radius: 30px;
}

.img__btn span {
    position: absolute;
    left: 0;
    top: 0;
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    width: 100%;
    height: 100%;
    -webkit-transition: -webkit-transform 1.2s;
    transition: -webkit-transform 1.2s;
    transition: transform 1.2s;
    transition: transform 1.2s, -webkit-transform 1.2s;
}

.img__btn span.m--in {
    -webkit-transform: translateY(-72px);
    transform: translateY(-72px);
}

.cont.s--signup .img__btn span.m--in {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}

.cont.s--signup .img__btn span.m--up {
    -webkit-transform: translateY(72px);
    transform: translateY(72px);
}

h2 {
    width: 100%;
    font-size: 26px;
    text-align: center;
}


/*.forgot-pass {
    margin-top: 15px;
    text-align: center;
    font-size: 12px;
    color: #cfcfcf;
}*/

.submit {
    background: grey;
    text-transform: uppercase;
    margin-left:35%;
    border-radius: 20%;
}

.fb-btn {
    border: 2px solid #d3dae9;
    color: #8fa1c7;
}

.fb-btn span {
    font-weight: bold;
    color: #455a81;
}

.sign-in {
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;

}

.cont.s--signup .sign-in {
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
    -webkit-transition-duration: 1.2s;
    transition-duration: 1.2s;
    -webkit-transform: translate3d(640px, 0, 0);
    transform: translate3d(640px, 0, 0);
}

.sign-up {
    -webkit-transform: translate3d(-900px, 0, 0);
    transform: translate3d(-900px, 0, 0);
}

.cont.s--signup .sign-up {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}


.inputBox,
.inputBox1 {
  position: relative;
  width: 250px;
  margin-bottom: 30px;
}

.inputBox1{
	margin-top: 30px;
}

.inputBox input,
.inputBox1 input {
  width: 100%;
  padding: 10px;
  outline: none;
  border: none;
  color: #000;
  font-size: 1em;
  background: transparent;
  border-left: 2px solid #000;
  border-bottom: 2px solid #000;
  transition: 0.1s;
  border-bottom-left-radius: 8px;
}

.inputBox span,
.inputBox1 span {
  margin-top: 5px;
  position: absolute;
  left: 0;
  transform: translateY(-4px);
  margin-left: 10px;
  padding: 10px;
  pointer-events: none;
  font-size: 12px;
  color: #000;
  text-transform: uppercase;
  transition: 0.5s;
  letter-spacing: 3px;
  border-radius: 8px;
}

.inputBox input:valid~span,
.inputBox input:focus~span {
  transform: translateX(113px) translateY(-15px);
  font-size: 0.8em;
  padding: 5px 10px;
  background: #000;
  letter-spacing: 0.2em;
  color: #fff;
  border: 2px;
}

.inputBox1 input:valid~span,
.inputBox1 input:focus~span {
  transform: translateX(156px) translateY(-15px);
  font-size: 0.8em;
  padding: 5px 10px;
  background: #000;
  letter-spacing: 0.2em;
  color: #fff;
  border: 2px;
}

.inputBox input:valid,
.inputBox input:focus,
.inputBox1 input:valid,
.inputBox1 input:focus {
  border: 2px solid #000;
  border-radius: 8px;
}


	</style>
</head>
<body>
	<!DOCTYPE html>
<html>
<body>

	<br>
<br>
    <div class="cont">
         <div class="form sign-in">
        		
        					<h2>Sign In</h2>
        					<form action="<?= base_url('databliss/login/login_check')?>" method="POST">

            				<div class="inputBox1" style="margin-top:60px;">
                				<input type="text" name="username" required="required">
                				<span>Username</span>
            				</div>

            				<div class="inputBox" style="margin-bottom: 50px;">
                				<input type="password" name="password" required="required">
                				<span>Password</span>
            				</div>

            			 <button type="submit" class="btn btn-dark submit">Log In</button>
            			</form>
        	</div>

        	<div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>

            <div class="form sign-up">
                <h2>Create your Account</h2>
                <form action="<?php echo base_url('databliss/register');?>" method="post">

  					<div class="inputBox1">
                		 <input type="text" name="name" required="required">
                		 <span>Name</span>
                	</div>	
                    <div class="inputBox">
                		 <input type="text" name="username" required="required">
                		 <span>UserName</span>
                	</div>
                	<div class="inputBox">
                		 <input type="Email" name="email" required="required">
                		 <span>Email</span>
                	</div>
                    <div class="inputBox1">
                		 <input type="text" name="contact" required="required">
                		 <span>Contact Number</span>
                	</div>
                	<div class="inputBox">
                		 <input type="password" name="password" required="required">
                		 <span>Password</span>
                		 
                	</div>
                	 <button type="submit" class="btn btn-dark submit">Sign up</button>
                </form> 
                

            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>





<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>

</body>
</html>