<!doctype html>
 <?php
 require_once "./modelOTD/model.php";
 require_once "./controlerOTD/controleur.php";
 ?>
 <html>
 
 <body>
 <article>
 <div align="center">
        <h1>Veuillez vous inscrire</h1>
        
        <form action="index.php?action=Inscription" method="POST">
          <input type="text"  required="required" name="pseudo" id="pseudo" placeholder="Pseudo"> <br><br>
          
          <input type="email" pattern="[^ @]*@[^ @]*" name="mail" id="mail" placeholder="Mail"><br><br>
          <input type="password" required name="mdp" id="mdp" placeholder="Mot de passe"><br><br>
          
          <input type="submit" name="action" value="Inscription">
      
          <br><br>
        </form>
		</div>
      </article>
	  </body>
	  </hmtl>
    