<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>liste enseignants</title>
    <style>
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 50%;
        }
        
        /* The Close Button */
        .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
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
      
<br>   
   
    <?php
    echo"<h1>liste des Groupes : </h1><br>";
    echo'<table border=1 width=100%>';
    
    foreach($groupes as $e){
        echo  '<tr><td>' . $e->nom . '</td>';
            echo  '<td>' . $e->niveau . '</td>';
        echo '<td> <button class="myBtn" >Modifier</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="/modifierFormG/'.$e->id.'">
        <label for="nom">Nom:</label>
        <input value="'.$e->nom.'" name="nom"/><br> <br>
        <label for="nom">Niveau:</label>
        <select name="niveau">';
       foreach ($niveaux as $n) {
        echo '<option value="'.$n->id.'"> '.$n->nom.' </option>"';
        };
        echo ' </select>
       
        <button type="submit">Valider</button>
    </form>
  </div>

</div>
 </td></tr>';
    };
    
    ?></table> </x-app-layout>
  </div>
    
    <script>
         
         
        var modal = document.querySelectorAll(".modal");
   
         var btns = document.querySelectorAll(".myBtn");
     
     var span = document.querySelectorAll(".close");
     for(var i=0;i<btns.length;i++)  {
          y=modal[i]
         x=btns[i]
         x.addEventListener('click', myFunc, false);
         x.pr=i;

       function myFunc (evt){
           //  this.style.color="red";
            b= evt.target.pr
           modal[b].style.display="block"
            }
     s=span[i]
     s.addEventListener('click', myFunc2, false);
         s.pr=i;

       function myFunc2 (evt){
           //  this.style.color="red";
            b= evt.target.pr
           modal[b].style.display="none"
            }
     }
     
        </script>
</body>
</html>