<?php
$params = array();

parse_str($_POST['data'], $params);

 class trajet{
public $id;
public $idv;
public $sdepart;
public $sarrive;
public $longs;
function __construct($idv,$sdepart,$sarrive,$longs) {
    $this->idv = $idv;
    $this->sdepart = $sdepart;
    $this->sarrive = $sarrive;
    $this->longs = $longs;
  }
}
$deppart=$params['Deppart'];
$arrive=$params['Arriver'];
//===============================================================================
function getcourt($trajets){
    $count=0;
    $count1=0;
    $i=0;
        while($i<count($trajets)){
        $count1=0;
        foreach($trajets[$i] as $trajet ){
        $count1+=$trajet->longs;
    }
        if($count!=0 && $count1<=$count){
        if($i>0){
           
            array_splice($trajets, $i-1, 1);
            $count=$count1;
            $count1=0;
        }
    }
    elseif($count!=0 && $count1>=$count){
            array_splice($trajets, $i, 1);
            $count=$count1;
            $count1=0;
    }
    else{
        $count=$count1;
        $i++;
    }
    }
    return $trajets ;
    }
//================================================================================
function gettrajet ($listdep,$listarr,$point){
    $trajrets=array();
    $c=0;
       $exist=false;
foreach($listdep as $dep){
    array_push($trajrets,$dep);
    if($dep->sarrive==$point){
break;
    }
}
    foreach($listarr as $arr){
        if($arr->sdepart==$point || $exist==true) {
            array_push($trajrets,$arr);
            $exist=true;
        }
}
return $trajrets;
}
//================================================================================
function filtre_Aller($list,$dep){
$i=0;
    while($i<1){
        if(count( $list)==0){
break;
        }
if($list[$i]->sdepart!=$dep){
    
    array_splice($list, $i, 1);
}
else{
   $i=1;
}
    }
    return $list;
 
}
//================================================================================
function trie_Aller($list){
    $dep="";
$existe=false;
$i=0;
while($i<count($list)){
    $dep=$list[$i]->sdepart;
    if($i==0){
        foreach($list as $trajet){
            if($dep==$trajet->sarrive){
                $existe=true;
                break;
               }
        }
        if($existe==true){
            $list[]=$list[$i];
            array_splice($list, $i, 1);
            $existe=false;
        }
        else{
            $i++;
        }
    }
    else{
            if($dep!=$list[$i-1]->sarrive){
                $list[]=$list[$i];
                array_splice($list, $i, 1);
               }
               else{
                $i++;
               }
    }
}
    return $list ;
}
//=============================================================================================================================
function trie_Retour($list){
    $listetri=trie_Aller($list);
    $listretour=[];
    $dep="";
$i=count( $listetri)-1;
while($i>=0){
    $trajet=$listetri[$i];
    $dep=$trajet->sarrive;
    $trajet->sarrive=$trajet->sdepart;
    $trajet->sdepart= $dep;
    $listretour[]=$trajet;
$i--;
}
    return $listretour ;
}
//=============================================================================================================================
function get_fromDB($sql,$bd){
    
    $listeViyage=[];
    $result1= mysqli_query($bd,$sql)or die($sql);
    while($row1 =mysqli_fetch_assoc($result1))
    {
        $Listtrajet=[];
        $sql = "SELECT * FROM `plusch` WHERE `idv`=".$row1["idv"];
        $result= mysqli_query($bd,$sql)or die($row1);
        while($row =mysqli_fetch_assoc($result))
        {
            $Listtrajet[]=new trajet($row['idv'],$row['sdepart'],$row['sarrive'],$row['longs']);
        } 
        $listeViyage[]=$Listtrajet;
    }
return  $listeViyage;
}
//=============================================================================================================================
$Listtrajet=[];
$listeViyageAller=[];
$listeViyageretour=[];
$bd=new mysqli('localhost','root','','kenibus')   or die ("unable to connect"); 
				$sql = "SELECT `idv` FROM `plusch` WHERE `sdepart`='".$deppart."'";
				foreach(get_fromDB($sql,$bd) as $value){
                   
                    $listeViyageAller[]= filtre_Aller(trie_Aller($value),$deppart);
                }
             
                
                //===============================================================================
                $sql = "SELECT `idv` FROM `plusch` WHERE `sarrive`='".$deppart."'";
                foreach(get_fromDB($sql,$bd) as $value){
                     $listeViyageretour[]=filtre_Aller(trie_Retour($value),$deppart);

                }
                //echo "liste : ".print_r($listeViyageretour)."</br>" ;
            //==============================================================================
            //===============================================================================
            //===============================================================================
            //===============================================================================
$liste2ViyageAller=[];
$liste2Viyageretour=[];
$trajets=[];
 $trajrets2=[];
                $sql = "SELECT `idv` FROM `plusch` WHERE `sdepart`='".$arrive."'";
                foreach(get_fromDB($sql,$bd) as $value){
                    $liste2ViyageAller[]= trie_Retour(filtre_Aller(trie_Aller($value),$arrive));
                }
				
               
                //===============================================================================
                $sql = "SELECT `idv` FROM `plusch` WHERE `sarrive`='".$arrive."'";
                foreach(get_fromDB($sql,$bd) as $value){
                    //print_r($value);
                    $liste2Viyageretour[]=trie_Retour(filtre_Aller(trie_Retour($value),$arrive));
                }
                //==============================================================================
                //===============================================================================
             function trajetfrompoint($list1,$list2,$point){
                $trajets1=[];
                $exist=false;
                
                foreach($list1 as $trajetlist3){
                    $exist=false;
                    foreach($trajetlist3 as $trajet3){
                        //echo"point r: ".$trajet2->sarrive."</br>";
                    if($trajet3->sdepart==$point && $exist==false){
                        
                       array_push($trajets1,gettrajet($list2,$trajetlist3,$point)) ;
                       $exist=true;
                        
                    }
                    }
                   }
                   
                   return $trajets1;
             }


              //====================================================================================================
              foreach($listeViyageAller as $trajetlist){
                foreach($trajetlist as $trajet){
                   $point=$trajet->sarrive;

                   if(count(trajetfrompoint($liste2ViyageAller,$trajetlist,$point))>0){
                    for($i=0;$i<count(trajetfrompoint($liste2ViyageAller,$trajetlist,$point));$i++){
                        array_push($trajets, trajetfrompoint($liste2ViyageAller,$trajetlist,$point)[$i]);
                       }
                    break;
                   }
                 
if(count(trajetfrompoint($liste2Viyageretour,$trajetlist,$point))>0){
    for($i=0;$i<count(trajetfrompoint($liste2Viyageretour,$trajetlist,$point));$i++){
        array_push($trajets, trajetfrompoint($liste2Viyageretour,$trajetlist,$point)[$i]);
       
       }
 break;
}
                }
              }

 //====================================================================================================             
              foreach($listeViyageretour as $trajetlist){
                foreach($trajetlist as $trajet){
                   $point=$trajet->sarrive;

                   if(count(trajetfrompoint($liste2ViyageAller,$trajetlist,$point))>0){
                       for($i=0;$i<count(trajetfrompoint($liste2ViyageAller,$trajetlist,$point));$i++){
                        array_push($trajets, trajetfrompoint($liste2ViyageAller,$trajetlist,$point)[$i]);
                       }
                    break;
                   }
                 
if(count(trajetfrompoint($liste2Viyageretour,$trajetlist,$point))>0){
    for($i=0;$i<count(trajetfrompoint($liste2Viyageretour,$trajetlist,$point));$i++){
        array_push($trajets, trajetfrompoint($liste2Viyageretour,$trajetlist,$point)[$i]);
       
       }
 break;
}
                }
              }


  tableau(getcourt($trajets),$arrive,$deppart,$bd);


    function tableau($chemins,$arrive,$depart,$bd){
        $ligne="";
        $pointchange="";
        $idv="";
        foreach($chemins as $chemin){
            foreach($chemin as $trajet){
                if($idv!=$trajet->idv){
                    $sql = "SELECT * FROM `voyages` WHERE `IdVoyages`='".$trajet->idv."'";
                    $result= mysqli_query($bd,$sql)or die($sql);
                    while($row =mysqli_fetch_assoc($result))
                    {
                        $idv=$trajet->idv;
                        if($ligne!=""){
                            $pointchange.=$trajet->sdepart;
                        }
                        $ligne.=$row["Nligne"]."/";
                    }
                }
                }}
        $response="<table>";
        $response .= "<tr class='r'><td>deppart :".$depart."</br>arrivee :".$arrive."</td></tr>"; 
        $response .= "<tr class='r'><td>les Bus :".$ligne."</br>Aret de change :".$pointchange."</td></tr>"; 
foreach($chemins as $chemin){
    $response .= "<tr class='r'><td>";
    foreach($chemin as $trajet){
        $response .= $trajet->sdepart."==>";
    }
    $response .= $arrive."</td></tr><table>";
}
echo $response;
    }    



?>
