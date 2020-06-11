
<div align="center">
  <section id="pageContent">
    <article>
      <br><h1> Veuillez vous connectés </h1>
    </article>
    <article>
    
      <form action='index.php?action=Login' method='POST'>
        <table >
          <tr> 
            <td> <label for="username">Pseudo</label></td>
            <td> <input name="user_name" id="user_name" type="text" required></td>
          </tr>
          <tr>
            <td> <label for="password">Mot de passe</label></td> 
            <td> <input name="password" id="password" type="password" required ></td> 
          </tr>
          <tr>
            <td colspan='2'> <input type='submit' name='action' value='Login'></td>
            
          </tr>
         
            <?php
          if(isset($_SESSION['erreurMessage']))
          {
            echo "<tr>";
            echo "<td colspan='2'>";
            echo $_SESSION['erreurMessage'];
            echo "</td>";
            echo "</tr>";
            session_destroy();

          }
          ?>
          
        </table>
      </form>
      </div>
    </article>
     
  </section>

  