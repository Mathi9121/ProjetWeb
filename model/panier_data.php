<?php
if(isset($_POST["commander"])){
    $bdd = new connexion();
    for($i=1;$i<=sizeof($_COOKIE["achat"]["produit"]);$i++){
        $ins = "INSERT INTO panier(id_ann, id_utilisateur) VALUES(:id_ann, :id_utilisateur)";
        //$rep = prepare(îns, array(":id_ann" => ,
        //                    ":id_utilisateur" => ));
    }
    
}
?>