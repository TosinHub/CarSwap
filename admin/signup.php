<?php
$title = "Car Swap | Add Admin "; 
include 'includes/header.php'; 



$errors = [];

 if(array_key_exists('register', $_POST)){
  
    #validate first name

    if(empty($_POST['name'])){

        $errors['name'] = "Please enter your name";

    }
    
    if(empty($_POST['email'])){

        $errors['email'] = "Please enter your email";

    }

    if(Admin::doesEmailExist($conn,$_POST['email'])){

        $errors['email'] = "Email already exists";
    }




    if(empty($_POST['password'])){

        $errors['password'] = "Please enter password";

    }


    if($_POST['password'] != $_POST['pword']){

        $errors['pword'] = "Password do not match";

    }

    if(empty($errors)){

      //echo $_POST['fname'];


      //acess database
      $clean = array_map('trim', $_POST);


      #register admin

       Admin::doAdminRegister($conn,$clean);
  

    }

      
}

?>			
     <div id="page-wrapper">
         <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
                            <p><span>Register a New Admin</span><br>
                            <img src="images/logo_dark.png" width="200px" height="80px"></p>
						</div>
						<div class="signin">
							<?php Admin::displayMessage(); ?>
				<form action="" method="POST">

               		<?php if(isset($errors['name'])){echo "<p style='color:red'>" .$errors['name']."<p>"; } ?>
                
				<div class="log-input">
                <div class="log-input-left">
								   <input type="text" class="user" placeholder="Enter Name" name="name"/>
                                </div>  
                                
                                
                              
							<?php if(isset($errors['email'])){echo "<p style='color:red'>" .$errors['email']."<p>"; } ?>
                           
                                	<div class="log-input-left">
								   <input type="text" class="email" placeholder="Enter Email" name="email"/>
								</div>             
													
							 </div>
      		<?php if(isset($errors['password'])){echo "<p style='color:red'>" .$errors['password']."<p>"; } ?>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock"  placeholder="Enter Password" name="password"/>
                                </div>

                           		<?php if(isset($errors['pword'])){echo "<p style='color:red'>" .$errors['pword']."<p>"; } ?>
                                <div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock"  placeholder="Confirm Password" name="pword"/>
								</div>
							
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Register" name="register">
						</form>	 
						</div>				
					</div>
				</div>
            </div>
            
</div>


<?php include('includes/footer.php');	