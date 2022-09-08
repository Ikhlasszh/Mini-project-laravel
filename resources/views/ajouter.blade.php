<!DOCTYPE html>
<html>
   <head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Ajouts</title>
<style>
   body{

            display: flex;
           
        }
    fieldset{
      border: black 1px solid;
            width: 90%;
   margin: 20px 0px;
   background-color: white;
        }
        input,select,label{
            width: 90%;
            margin:10px 20px;
            padding: 5px 5px;
        }
       #button {
  border: none;
  color: white;
  padding: 16px ;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 0px;
  transition-duration: 0.4s;
  cursor: pointer;
  background-color: #2220a0;
  color: white;
  border: 2px solid #2220a0;
  border-radius: 10px;
  width: 10%
}

#button:hover {
    background-color: white;
  color: black;
  
}
.div1{
   text-align: center;
  
}
legend{
   color: #2220a0
}
</style>
   </head>
<body>
   @include('sidenav')
 <div class="main">
   <x-app-layout >
      <div class="div1">
         <br><br>
          <form action="/ajouterEnseignant"  >
   <fieldset>
    <legend>Ajouter Enseignant </legend>
    <br>
    <label name="">Ajouter le nom de l'Enseignant :</label>
    <input type="text" name="nom">  
     <label name="">Ajouter le prenom de l'Enseignant :</label>
     <input type="text" name="prenom">
 <br>
    <input type="submit" value="Ajouter" id="button">
   </fieldset>
   </form>
<br><br>
  <form action="/ajouterModule" >
   <fieldset>
    <legend>Ajouter Module </legend><br>
    <label name="">Ajouter le nom du module :</label>
    <input type="text" name="module">
    <label name="">Ajouter le niveau :</label>
 <select name='niveau'>
    @foreach ($niveaux as $n) 
     <option value='{{$n->id}}'> {{$n->nom}} </option>"
     @endforeach
 </select>
 <br>
    <input type="submit" value="Ajouter" id="button">
   </fieldset>
   </form>
   <br><br>
  <form action="/ajouterSalle" >
   <fieldset>
    <legend>Ajouter Salle </legend><br>
    <label name="">Ajouter le numero de la Salle</label>
    <input type="text" name="salle">
    <br>
    <input type="submit" value="Ajouter" id="button">
   </fieldset>
   </form>
   <br><br>
   <form action="/ajouterGroupe" >
   <fieldset>
    <legend>Ajouter Groupe </legend><br>
    <label name="">Ajouter le nom du Groupe</label>
    <input type="text" name="groupe">
    <label name="">Ajouter le niveau :</label>
    <select name='niveau'>
       @foreach ($niveaux as $n) 
        <option value='{{$n->id}}'> {{$n->nom}} </option>"
        @endforeach
    </select>
    <br>
    <input type="submit" value="Ajouter" id="button">
   </fieldset>
</form>
      </div>
  </x-app-layout>
 </div>
</body></html>