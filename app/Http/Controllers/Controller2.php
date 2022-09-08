<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Niveau;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Controller2 extends Controller
{
    //
    public function formAjout(){
      if (Auth::check()) {
        $niveaux=DB::select('select * from niveaux ');
        return view('ajouter',['niveaux'=>$niveaux]);}
else{
  return view('welcome');
}
        
    }
    public function ajouterEnseignant(Request $req){
        $nom=$req->input("nom");
        $prenom=$req->input("prenom");
        DB::insert('insert into enseignants (nom,prenom) values (?,?)',[$nom,$prenom]);
       // $enseignant=DB::select('select* from enseignants');
       $niveaux=DB::select('select * from niveaux ');
        return view('ajouter',['niveaux'=>$niveaux]);
    }  
    public function ajouterModule(Request $req){
      $module=$req->input("module");
      $niveau=$req->input("niveau");
   // $id=$_POST['niveau'];
      DB::insert('insert into modules (nomModule,niveau_id) values (?,?)',[$module,$niveau]);
     // $module=DB::select('select* from modules');
      //return view('emploi',['module' =>$module]);  
      $niveaux=DB::select('select * from niveaux ');
      return view('ajouter',['niveaux'=>$niveaux]); 
  } 
  public function ajouterSalle(Request $req){
      $salle=$req->input("salle");
      DB::insert('insert into salles (nom) values (?)',[$salle]);
      //$salle=DB::select('select* from salles');
      //return view('emploi',['salle' =>$salle]);  
      $niveaux=DB::select('select * from niveaux ');
      return view('ajouter',['niveaux'=>$niveaux]); 
  }   
  public function ajouterGroupe(Request $req){
      $groupe=$req->input("groupe");
      $niveau=$req->input("niveau");
      DB::insert('insert into groupes (nom,niveau_id)  values (?,?)',[$groupe,$niveau]);
      //$groupe=DB::select('select* from groupes');
      //return view('emploi',['groupe' =>$groupe]); 
      $niveaux=DB::select('select * from niveaux ');
      return view('ajouter',['niveaux'=>$niveaux]);  
  } 
  

  ////////////////////////////suppression////////////////////////////////////////
  public function formSupp(){
    if (Auth::check()) {
       $enseignant=DB::select('select* from enseignants'); 
    $groupe=DB::select('select g.id as id, g.nom as groupe,n.nom as niveau from groupes g  join niveaux n where g.niveau_id= n.id');
    $salle=DB::select('select* from salles');
    $module=DB::select('select* from modules');
    return view ('suppression',['enseignants' =>$enseignant,'groupes'=>$groupe,'salles'=>$salle,'modules'=>$module]);

    }
else{
  return view('welcome');
}
   }
  public function supprimerEnseignant(Request $req){
    $enseignant=$req->input("enseignant");
      DB::delete('delete from enseignants where id=? ',[$enseignant]);
      $enseignant=DB::select('select* from enseignants');
      $groupe=DB::select('select g.id as id ,g.nom as groupe,n.nom as niveau from groupes g  join niveaux n where g.niveau_id= n.id');
      $salle=DB::select('select* from salles');
      $module=DB::select('select* from modules');
      return view ('suppression',['enseignants' =>$enseignant,'groupes'=>$groupe,'salles'=>$salle,'modules'=>$module]);
  
  }
  public function supprimerModule(Request $req){
    $module=$req->input("module");
      DB::delete('delete from modules where id=? ',[$module]);
      $enseignant=DB::select('select* from enseignants');
      $groupe=DB::select('select  g.id as id ,g.nom as groupe,n.nom as niveau from groupes g  join niveaux n where g.niveau_id= n.id');
      $salle=DB::select('select* from salles');
      $module=DB::select('select* from modules');
      return view ('suppression',['enseignants' =>$enseignant,'groupes'=>$groupe,'salles'=>$salle,'modules'=>$module]);
  }
  public function supprimerSalle(Request $req){
    $salle=$req->input("salle");
      DB::delete('delete from salles where id=? ',[$salle]);
      $enseignant=DB::select('select* from enseignants');
      $groupe=DB::select('select g.id as id ,g.nom as groupe,n.nom as niveau from groupes g  join niveaux n where g.niveau_id= n.id');
      $salle=DB::select('select* from salles');
      $module=DB::select('select* from modules');
      return view ('suppression',['enseignants' =>$enseignant,'groupes'=>$groupe,'salles'=>$salle,'modules'=>$module]);
  }
  public function supprimerGroupe(Request $req){
    $groupe=$req->input("groupe");
      DB::delete('delete from groupes where id=? ',[$groupe]);
      $enseignant=DB::select('select* from enseignants');
      $groupe=DB::select('select g.id as id ,g.nom as groupe,n.nom as niveau from groupes g  join niveaux n where g.niveau_id= n.id');
      $salle=DB::select('select* from salles');
      $module=DB::select('select* from modules');
      return view ('suppression',['enseignants' =>$enseignant,'groupes'=>$groupe,'salles'=>$salle,'modules'=>$module]);

  }

 
public function getEmploi($niveau){
  if (Auth::check()) {
    $nomNiveau=DB::select('select n.nom as nom  from niveaux n where n.id=?  ',[$niveau]);

  $ng=DB::select('select * from groupes where niveau_id=?',[$niveau]);
  $dimanche=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="dimanche") order by se.t_debut ASC ',[$niveau]);
  $lundi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="lundi") order by se.t_debut ASC ',[$niveau]);
  $mardi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="mardi") order by se.t_debut ASC ',[$niveau]);
  $mercredi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="mercredi") order by se.t_debut ASC ',[$niveau]);
  $jeudi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="jeudi") order by se.t_debut ASC ',[$niveau]);
  $grp=count($ng);
 
  return view('emploi',['niveau'=> $niveau,'nomNiveau' =>$nomNiveau,'ng'=>$grp,'dimanche'=>$dimanche,'lundi'=>$lundi,'mardi'=>$mardi,'mercredi'=>$mercredi,'jeudi'=>$jeudi]);

  }
else{
  return view('welcome');
}
  }

public function ajouterSeanceForm($niveau){
  if (Auth::check()) {
    $enseignants=DB::select('select* from enseignants'); 
    $groupes=DB::select('select* from groupes where niveau_id=?',[$niveau]);
    $salles=DB::select('select* from salles ');
    $modules=DB::select('select* from modules where niveau_id=?',[$niveau]);
    return view ('ajoutSeance',['niveau'=> $niveau,'enseignants' =>$enseignants,'groupes'=>$groupes,'salles'=>$salles,'modules'=>$modules]);
  
  }
else{
  return view('welcome');
}
    
}
public function ajouterSeance(Request $req,$niveau){
  $type=$req->input("type");
  $jour=$req->input("jour");
  $module=$req->input("module");
  $groupe=$req->input("groupe");
  if (!$groupe){
    $groupe=1;
  }
  $enseignant=$req->input("enseignant");
  $salle=$req->input("salle");
  $t_debut=$req->input("t_debut");
  $t_fin=$req->input("t_fin");
  $e=DB::select('select s.enseignant_id from seances s where s.enseignant_id=? and s.jour=? and (s.t_debut<=? or s.t_fin>=?) ',[$enseignant,$jour,$t_fin,$t_fin]);
  $s=DB::select('select s.salle_id from seances s where s.salle_id=? and s.jour=?  and  (s.t_debut<=? or s.t_fin>=?) ',[$salle,$jour,$t_fin,$t_fin]);
  $g=DB::select('select s.groupe_id from seances s where s.groupe_id=? and s.jour=? and (s.t_debut<=? or s.t_fin>=?)',[$groupe,$jour,$t_fin,$t_fin]);
  if(count($e)>0){

      echo('<script>alert("enseignant a déja un cours")</script>');
      $enseignants=DB::select('select* from enseignants'); 
    $groupes=DB::select('select* from groupes where niveau_id=?',[$niveau]);
    $salles=DB::select('select* from salles ');
    $modules=DB::select('select* from modules where niveau_id=?',[$niveau]);
    return view ('ajoutSeance',['niveau'=> $niveau,'enseignants' =>$enseignants,'groupes'=>$groupes,'salles'=>$salles,'modules'=>$modules]);
  
  }
  else if(count($s)>0){
    //echo("$s");
      echo('<script>alert("salle deja occupée")</script>');
      $enseignants=DB::select('select* from enseignants'); 
    $groupes=DB::select('select* from groupes where niveau_id=?',[$niveau]);
    $salles=DB::select('select* from salles ');
    $modules=DB::select('select* from modules where niveau_id=?',[$niveau]);
    return view ('ajoutSeance',['niveau'=> $niveau,'enseignants' =>$enseignants,'groupes'=>$groupes,'salles'=>$salles,'modules'=>$modules]);
  
  }
  else if(count($g)>0){
    echo(count($g));
      echo('<script>alert("ce groupe a déja une seance")</script>');
      $enseignants=DB::select('select* from enseignants'); 
    $groupes=DB::select('select* from groupes where niveau_id=?',[$niveau]);
    $salles=DB::select('select* from salles ');
    $modules=DB::select('select* from modules where niveau_id=?',[$niveau]);
    return view ('ajoutSeance',['niveau'=> $niveau,'enseignants' =>$enseignants,'groupes'=>$groupes,'salles'=>$salles,'modules'=>$modules]);
  
  }
  
  else {
      DB::insert('insert into seances (type,jour,niveau_id,enseignant_id,module_id,groupe_id,salle_id,t_debut,t_fin) values (?,?,?,?,?,?,?,?,?)',[$type,$jour,$niveau,$enseignant,$module,$groupe,$salle,$t_debut,$t_fin]);  
      
      $nomNiveau=DB::select('select n.nom as nom  from niveaux n where n.id=?  ',[$niveau]);

  $ng=DB::select('select *  from groupes where niveau_id=?',[$niveau]);
  $dimanche=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="dimanche") order by se.t_debut ASC ',[$niveau]);
  $lundi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="lundi") order by se.t_debut ASC ',[$niveau]);
  $mardi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="mardi") order by se.t_debut ASC ',[$niveau]);
  $mercredi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="mercredi") order by se.t_debut ASC ',[$niveau]);
  $jeudi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="jeudi") order by se.t_debut ASC ',[$niveau]);
 $grp=count($ng);
  echo($grp);
  return view('emploi',['niveau'=> $niveau,'nomNiveau' =>$nomNiveau,'ng'=>$grp,'dimanche'=>$dimanche,'lundi'=>$lundi,'mardi'=>$mardi,'mercredi'=>$mercredi,'jeudi'=>$jeudi]);

    }

}
public function supprimerSeance($niveau,$id){
//DB::delete('delete from seances where id=?',[$id]);
DB::table('seances')->where('id', $id)->delete();
$ng=DB::select('select count(*) from groupes where niveau_id=?',[$niveau]);
$nomNiveau=DB::select('select n.nom as nom  from niveaux n where n.id=?  ',[$niveau]);

  $dimanche=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="dimanche") order by se.t_debut ASC ',[$niveau]);
  $lundi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="lundi") order by se.t_debut ASC ',[$niveau]);
  $mardi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="mardi") order by se.t_debut ASC ',[$niveau]);
  $mercredi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="mercredi") order by se.t_debut ASC ',[$niveau]);
  $jeudi=DB::select('select m.nomModule as module, e.nom as nom ,e.prenom as prenom, g.nom as groupe,s.nom as salle,se.type as type, se.t_debut,se.t_fin,se.id  from seances se,groupes g,salles s,modules m,enseignants e where (e.id=se.enseignant_id)and (m.id=se.module_id)and (s.id=se.salle_id)and (g.id=se.groupe_id) and (se.niveau_id=?) and (jour="jeudi") order by se.t_debut ASC ',[$niveau]);
 
  return view('emploi',['niveau'=> $niveau,'nomNiveau' =>$nomNiveau,'ng'=>$ng,'dimanche'=>$dimanche,'lundi'=>$lundi,'mardi'=>$mardi,'mercredi'=>$mercredi,'jeudi'=>$jeudi]);

}


//modification

public function updateEnseignant(Request $req, $id){
  $nom=$req->input("nom");
  $prenom=$req->input("prenom");
  DB::insert('update enseignants set nom=?,prenom=? where id=?',[$nom,$prenom,$id]);
  $enseignants=DB::select('select* from enseignants'); 
  return view('listeEnseignant',['enseignants'=>$enseignants]);

} 

public function updateModule(Request $req, $id){
  $module=$req->input("nom");
  $niveau=$req->input("niveau");
  $niveaux=DB::select('select * from niveaux ');
  DB::insert('update modules set nomModule=?,niveau_id=? where id=?',[$module,$niveau, $id]);
  $modules=DB::select('select modules.nomModule as nom,niveaux.nom as niveau,modules.id as id from modules join niveaux where niveaux.id=modules.niveau_id ');
  return view('listeModules',['modules'=>$modules,'niveaux'=>$niveaux]); 
} 
public function updateSalle(Request $req,$id){
  $salle=$req->input("nom");
  DB::insert('update salles set nom=? where id=?',[$salle,$id]);

  $salles=DB::select('select* from salles'); 
  return view('listeSalles',['salles'=>$salles]);

}  
 
public function updateGroupe(Request $req,$id){
  $groupe=$req->input("nom");
  $niveau=$req->input("niveau");
  DB::insert('update groupes set nom=?,niveau_id=? where id=? ',[$groupe,$niveau,$id]);
  $niveaux=DB::select('select * from niveaux ');
  $groupes=DB::select('select groupes.nom as nom,niveaux.nom as niveau,groupes.id as id from groupes join niveaux where niveaux.id=groupes.niveau_id'); 
  return view('listeGroupes',['groupes'=>$groupes,'niveaux'=>$niveaux]);
 
}
public function afficherListeG (){
  if (Auth::check()) {
      $niveaux=DB::select('select * from niveaux ');
  $groupes=DB::select('select groupes.nom as nom,niveaux.nom as niveau,groupes.id as id from groupes join niveaux where niveaux.id=groupes.niveau_id'); 
  return view('listeGroupes',['groupes'=>$groupes,'niveaux'=>$niveaux]);
 }
else{
  return view('welcome');
}

}

function afficherListeEn(){

  if (Auth::check()) {
  $enseignants=DB::select('select* from enseignants'); 
  return view('listeEnseignant',['enseignants'=>$enseignants]);}
  else{
    return view('welcome');
  }
}
function afficherListeS(){
if (Auth::check()) {
  $salles=DB::select('select* from salles'); 
  return view('listeSalles',['salles'=>$salles]);}
  else{
    return view('welcome');
  }

}
function afficherListeM(){
  if (Auth::check()) {  $niveaux=DB::select('select * from niveaux ');
  $modules=DB::select('select modules.nomModule as nom,niveaux.nom as niveau,modules.id as id from modules join niveaux where niveaux.id=modules.niveau_id');
  return view('listeModules',['modules'=>$modules,'niveaux'=>$niveaux]); }
else{
  return view('welcome');
}

}

}

