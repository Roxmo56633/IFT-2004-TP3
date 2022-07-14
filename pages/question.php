<?php
if(isset($_GET["question"])){
    $question  =$_GET["question"];
    include("init.php");
    $stid = oci_parse($conn, "select * from TP2_QUESTION where ID_QUESTION=:idquestion");
    oci_bind_by_name($stid, ':idquestion', $question);
    oci_execute($stid);
    while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {  
        echo "<h5>ID question</h5>";
        echo $row["ID_QUESTION"];
        echo "<h5>Numéro d’ordre de la question</h5>";
        echo $row["NO_ORDRE_QUESTION"];
        echo "<h5>Texte de la question</h5>";
        echo $row["TEXTE_QUE"];
        echo "<h5>Instruction de la question</h5>";
        echo $row["INSTRUCTION_QUE"];
        echo "<h5>La question est active?</h5>";
        if($row["EST_ACTIVE_QUE"] == 0){
           echo "<input type='checkbox'>"; 
        }
        if($row["EST_ACTIVE_QUE"] == 1){
            echo "<input type='checkbox' checked='checked' >";
        }
        echo "<h5>Le délai question</h5>";
        echo $row["DELAI_QUE"];
        echo "<h5>Les résultats	de la question sont confidentiels?</h5>";
        if($row["BOOL_RESULTATS_CONFIDENTIELS_QUE"] == 0){
            echo "<input type='checkbox'>";
        }
        if($row["BOOL_RESULTATS_CONFIDENTIELS_QUE"] == 1){
            echo "<input type='checkbox' checked='checked' >";
        }
        echo "<h5>Type question de la question</h5>";
        $codeType = $row["CODE_TYPE_QUESTION"];
        $stid = oci_parse($conn, "select DESC_TYPE_QUE from TP2_QUESTION_TYPE where CODE_TYPE_QUESTION=:codeType");
        oci_bind_by_name($stid, ':codeType', $codeType );
        oci_execute($stid);
        while (($row2 = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo $row2["DESC_TYPE_QUE"];
        }
        echo "<h5>choix</h5>";
        $ok= $row["ID_QUESTION"];
        $stid2 = oci_parse($conn, "select ID_CHOIX, NO_ORDRE_CHO,TEXTE_CHO from TP2_CHOIX where ID_QUESTION=:ok");
        oci_bind_by_name($stid2, ':ok', $ok);
        oci_execute($stid2);
        echo "<select size='5'>";
        while (($row3 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo "<option>".$row3["ID_CHOIX"].$row3["NO_ORDRE_CHO"].$row3["TEXTE_CHO"];
            echo "</option>";
        }  
        echo"</select>";
    }   
}
echo "<br>";
echo "<a href='index.php'>revenir à l’événement</a>";
?>