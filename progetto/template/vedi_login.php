<section>
    <form class=" contact-form  login-form custom-input" action="#" method="POST">
        <h2 class="mt-2 title-login">Accedi a Nuvole di Gelato</h2>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p class=" ms-2 text-brown text-center"><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <div class="mx-2 mb-2">
                <label for="username">Email</label>
                <input type="text" class="form-control" id="email" name="email" />
            </div> 
            <div class="mx-2 mb-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" />    
            </div>  
            <div class=" grid-layout ">   
            <button type="submit" class="btn btn-primary d-block mx-auto mt-4 mb-4" id="invia_login">Accedi</button>
            </div>  
       
        </form>
    <div class="text-center">
        <p class="mt-3 text-brown" >Non hai un accout? Registrati!</p>
        <a href="iscrizione.php" class="btn btn-primary mt-4 mb-4" id="registrazione"> Registrati</a>
    </div>
           
    
    
    
    </section>

    