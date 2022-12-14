<style>
  .sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
  }
  
  .sidenav a {
    padding: 6px 8px 35px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
  }
  
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  .main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 23px; /* Increased text to enable scrolling */
    padding: 0px 10px;
  }
  
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
   </style>
<div class="sidenav">

    <a href="/listeEnseignant">Enseignant</a>
    <a href="/listeModules">Module</a>
    <a href="/listeGroupes">Groupe</a>
    <a href="/listeSalles">Salle</a>
    <a href="/AjouterForm">   Ajouter
    </a>
    <a href="/supprimerForm">  Supprimer
    </a>
  </div>