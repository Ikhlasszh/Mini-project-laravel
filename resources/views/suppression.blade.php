<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <title>Supprimer</title>
</head>
<style>
    body{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .formulaire{
   border: black 2px solid;
        width: 100%;
        padding: 5px 5px 10px 5px;
    }
    input,select,label{
        width: 100%;
        margin:20px 20px;
        padding: 5px 5px;
    }
   #button {
       
border: none;
color: white;
padding: 16px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin-bottom: 20px;
transition-duration: 0.4s;
cursor: pointer;
background-color: #ec6035;
color: white;
border: 2px solid #ec6035;
border-radius: 10px;
}

#button:hover {
background-color: white;
color: black;

}
    
</style>
<body>
 <!-- supprimer enseignant  -->
 @include('sidenav')
      
 <div class="main">
    <x-app-layout >
       <h1>Suppression :</h1><br>
 <form action="/supprimerEnseignant" method="">
  <?php
  echo "<select name='enseignant'>";
  echo "<option value=0>Choisissez enseignant</option>";
  foreach ($enseignants as $e) {
   echo "<option value ='$e->id'> .$e->nom.&nbsp;. $e->prenom. </option>";
  }
  ?>
  <input type="submit" value="Supprimer l'enseignant" id="button">
 </form>

 <!-- supprimer module -->
 <form action="/supprimerModule" >
  <?php
  echo "<select name='module'>";
  echo "<option value=0>Choisissez module</option>";
  foreach ($modules as $m) {
   echo "<option value ='$m->id'> .$m->nomModule </option>";
  }
  ?>
  <input type="submit" value="Supprimer le module" id="button">
 </form>

 <!-- supprimer la salle -->
 <form action="/supprimerSalle" >
  <?php
  echo "<select name='salle'>";
  echo "<option value=0>Choisissez salle</option>";
  foreach ($salles as $s) {
   echo "<option value ='$s->id'> .$s->nom </option>";
  }
  ?>
  <input type="submit" value="Supprimer la salle" id="button">
 </form>

 <!-- supprimer le groupe -->
 <form action="supprimerGroupe" >
  <?php
  echo "<select name='groupe'>";
  echo "<option value=0>Choisissez groupe</option>";
  foreach ($groupes as $g) {
   echo "<option value ='$g->id'> .$g->groupe. $g->niveau </option>";
  }
  ?>
  <input type="submit" value="Supprimer groupe" id="button">
 </form></x-app-layout></div>
</body>

</html>