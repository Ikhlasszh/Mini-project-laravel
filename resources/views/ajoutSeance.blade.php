<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire ajout seance</title>
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
  background-color: #37df77;
  color: white;
  border: 2px solid #37df77;
  border-radius: 10px;
}

#button:hover {
    background-color: white;
  color: black;
  
}
        
    </style>
</head>
<body>
    @include('sidenav')
<div class="main">
    <x-app-layout >
        <br><br>
    <h3>Ajouter Seance :</h3>
    <form action="/ajouterSeance/{{$niveau}}" class="formulaire" >
        <br>
      <?php
      echo "<label for= 'enseignant'>Enseignant :</label>";
      echo "<select name=enseignant>";
      echo "<option value=0>Choisissez l'enseignant</option>";
      foreach ($enseignants as $e) {
       echo "<option value='$e->id'> $e->nom </option>";
      }
      echo "</select><br><br>";
      ?>
    
    
    
    
      <?php
          echo "<label for= 'module'>Module :</label>";
      echo "<select name=module>";
      echo "<option value=0>Choisissez le module</option>";
      foreach ($modules as $m) {
       echo "<option value='$m->id'> $m->nomModule </option>";
      }
      echo "</select><br><br>";
      ?>
    
    
    
      <?php
          echo "<label for= 'salle'>Salle :</label>";
      echo "<select name=salle>";
      echo "<option value=0>Choisissez la salle</option>";
      foreach ($salles as $s) {
       echo "<option value='$s->id'> $s->nom </option>";
      }
      echo "</select><br><br>";
      ?>
    
    
      <?php
          echo "<label for= 'groupe'>Groupe :</label>";
      echo "<select name=groupe id='g'>";
      echo "<option value='1' selected >Choisissez le groupe</option>";
      foreach ($groupes as $g) {
       echo "<option value='$g->id'> $g->nom </option>";
      }
      echo "</select><br><br>";
      ?>
    
    
      <!-- choisir le type de seance -->
      <label for="type">Type :</label>
      <select name="type" id="t">
       <option value="cours" >cours</option>
       <option value="tp" >tp</option>
       <option value="td">td</option>
      </select><br><br>
<label for="jour">Jour :</label>
      <select name="jour">
        <option value="dimanche">dimanche</option>
        <option value="lundi">lundi</option>
        <option value="mardi">mardi</option>
        <option value="mercredi">mercredi</option>
        <option value="jeudi">jeudi</option>
       </select><br><br>
      <!-- choissir le temps -->
      <label for=debut>
       heure de debut :
      </label>
      <input type="time" id="debut" name="t_debut">
      <br><br>
      <label for=fin>
       heure de fin :
      </label>
      <input type="time" id="fin" name="t_fin">
      <br><br>
  <input type="submit" value="ajouter la séance" id="button">
    </form></x-app-layout>
     </div>
    
      <script>
      
      var groupe=document.getElementById('g');
      var type=document.getElementById('t');
      groupe.disabled=true;
      type.addEventListener('input',function(){
          if(type.value=="cours"){
         
          groupe.disabled=true;
      }
      else  groupe.disabled=false;
      });
      </script>
    
</body>
</html>