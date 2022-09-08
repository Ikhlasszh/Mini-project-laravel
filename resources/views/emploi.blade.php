<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emploi</title>
<style>
    table{
        font-size: 17px;
    }
    button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  background-color: white;
  color: #4650df;
  border: 2px solid #4650df;
  border-radius: 10px;
}

button:hover {
  background-color: #4650df;
  color: white;
}
table {
    border: medium solid black;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: medium solid black;
    text-align: center;
    padding: 15px;
  }

  tr:nth-child(even) {
    background-color: #c7c4c4;
  }
 

</style>
</head>
<body>
    @include('sidenav')
      
 <div class="main">
    <x-app-layout >
        <br><br>
   

  <a href="/ajouterSeanceForm/{{$niveau}} "  ><button>ajouter seance</button></a><br><br>
      <?php

    echo"<h3>emploi du temps du ".$nomNiveau[0]->nom." </h3>";
    echo'<table border=1 width=100%>';
    echo'  
    <tr>
    <th >Dimanche</th>
    ';
    foreach($dimanche as $d){
    
       if($d->type=="cours"){
        echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
            echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';}
        else{
          echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->groupe.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
          echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';
        }
       
    }
    echo'  
    </tr>

    <tr>
    <th>Lundi</th>
    ';
    foreach($lundi as $d){
    
       
        if($d->type=="cours"){
        echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
            echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';}
        else{
          echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->groupe.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
          echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';
        }
};
echo'  
    </tr>
    <tr>
    <th>Mardi</th>
    ';
    foreach($mardi as $d){
    
        if($d->type=="cours"){
        echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
            echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';}
        else{
          echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->groupe.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
          echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';
        }
};
echo'  
    </tr>
    <tr>
    <th>Mercredi</th>
    ';
    foreach($mercredi as $d){
        if($d->type=="cours"){
        echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
            echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';}
        else{
          echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->groupe.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
          echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '" style="color: red"> supprimer</a></td>';
        }
};
echo'  
    </tr>
    <tr>
    <th>Jeudi</th>
    ';
    foreach($jeudi as $d){
    
        if($d->type=="cours"){
        echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
            echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '"  style="color: red"> supprimer</a></td>';}
        else{
          echo  '<td>' .$d->module.'<br>'.$d->nom.' &nbsp;'.$d->prenom.'<br>'.$d->groupe.'<br>'.$d->salle.'<br>'.$d->t_debut.'&nbsp;'.$d->t_fin  ;
      
          echo '<br> <a href="/'. 'supprimerSeance/'.$niveau. '/'.$d->id. '"  style="color: red"> supprimer</a></td>';
        }
};
    echo "</tr></table>";
    ?></x-app-layout>

 </div>
</body>
</html>