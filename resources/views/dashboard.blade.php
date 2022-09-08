
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <title>Document</title>
<style>
     
     .lien {
        text-align: center;
     display: flex;
     flex-direction: column;
    }
    figure {
    border: thin #c0c0c0 solid;
    display: flex;
    flex-flow: column;
    padding: 5px;
    max-width: 220px;
    margin: auto;
}

img {
    max-width: 220px;
    max-height: 150px;
}

figcaption {
    background-color: #222;
    color: #fff;
     padding: 3px;
    text-align: center;
}
td{
   margin: 50px; 
}
    </style>
</head>

<body>
@include('sidenav')
      
 <div class="main">
    <x-app-layout >
       
    

  <div class="lien">
      <br>
      <h3>Listes des emplois du temps : </h3><br>
      <table>
          <tr>
              <td>
                 <a href="/emploi/1"><figure><img src="./classe.jpg" alt="emploi">
<figcaption>emploi du temps CPI 1</figcaption>
</figure>  </a> 
  <br> 
              </td>
              <td>
               
   <a href="/emploi/2"><figure><img src="./classe.jpg" alt="emploi">
    <figcaption>emploi du temps CPI 2</figcaption>
    </figure></a> <br>   
              </td>
              <td>
                   <a href="/emploi/3"><figure><img src="./classe.jpg" alt="emploi">
    <figcaption>emploi du temps CS1</figcaption>
    </figure></a> <br>
              </td>
          </tr>
          <tr>
              <td>
                    <a href="/emploi/4"><figure><img src="./classe.jpg" alt="emploi">
    <figcaption>emploi du temps CS2 SIW</figcaption>
    </figure></a> <br>
              </td>
              <td>
                <a href="/emploi/5"><figure><img src="./classe.jpg" alt="emploi">
                    <figcaption>emploi du temps CS2 ISI</figcaption>
                    </figure></a> <br>
              </td>
              <td>
                   <a href="/emploi/5"><figure><img src="./classe.jpg" alt="emploi">
    <figcaption>emploi du temps CS2 ISI</figcaption>
    </figure></a> <br>
              </td>
          </tr>
          <tr>
              <td>
                 
   <a href="/emploi/6"><figure><img src="./classe.jpg" alt="emploi">
<figcaption>emploi du temps CS3 SIW</figcaption>
</figure> </a> <br> 
              </td>
              <td>
                   
   <a href="/emploi/7"><figure><img src="./classe.jpg" alt="emploi">
<figcaption>emploi du temps CS3 ISI</figcaption>
</figure> </a> <br>
              </td>
          </tr>
      </table>

 
  </div>
</x-app-layout>
 </div>
</body>

</html>
