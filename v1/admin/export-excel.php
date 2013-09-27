<?					
include "../config/config.php";
include "../functions/database.fn.php";
include "../functions/auth.fn.php";
include "../functions/class.csv.php";

session_start();
$db['link']=database_connect($db);

if(Auth::isLogged()){
}
else{
    header('Location:index.php');
}

/*$table = 'participants';
$file = 'export_participants_jeux_concours';

$result = mysql_query("SHOW COLUMNS FROM ".$table."");
$i = 0;

    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $csv_output .= $row['Field']."; ";
            $i++;
        }
    }
    $csv_output .= "\n";
    
    $values = mysql_query("SELECT * FROM ".$table."");
    while ($rowr = mysql_fetch_row($values)) {
        for ($j=0;$j<$i;$j++) {
            $csv_output .= $rowr[$j]."; ";
        }
        $csv_output .= "\n";
    }
    
    $filename = $file."_".date("Y-m-d_H-i",time());
    header("Content-type: application/vnd.ms-excel");
    header("Content-disposition: xls" . date("Y-m-d") . ".xls");
    header( "Content-disposition: filename=".$filename.".xls");
    print $csv_output;
    exit;
 */


$sql="SELECT * FROM participants";
$req= mysql_query($sql) or die('Erreur SQL !<br />'.sql.'<br />'.mysql_error());
            
$csv=array();
while($row=mysql_fetch_array($req,MYSQL_ASSOC)){
    
    $csv[$row['id']]=array('id'=>$row['id'],'nom'=>$row['nom'],'prenom'=>$row['prenom'],'email'=>$row['email'],'adresse'=>$row['adresse'],'cp'=>$row['cp'],'telephone'=>$row['telephone']);

}

CSV::export($csv,'Export Participants');

?>