<main>
<h2> signup </h2>
<form method="post" action="?route=signup">

    <div class="label"> Login :  </div>
    <div class="content"> <input type="text" name="login"/> </div> <br>

    <div class="label"> Mot de passe :  </div>
    <div class="content"> <input type="password" name="password"/> </div> <br>

    <div class="label"> répéter le mot de passe :  </div>
    <div class="content"> <input type="password" name="passwordR"/> </div> <br>

    <div class="label"> Genre : </div>
    <div class="content">
        <select name="gender">
            <option value="male"> Masculin </option>
            <option value="female"> Féminin </option>
        </select>
    </div><br>

    <input type="submit" value="s'inscrire" name="signup">

</form>

</main>