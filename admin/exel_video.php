<?php
include_once('function.php');

$query = "SELECT * FROM `extra_detail`";
$header = '';
$data ='';
$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
 
$fields = mysql_num_fields ( $export );
 
for ( $i = 0; $i < $fields ; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . ",";
}
 
while( $row = mysql_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value =$value . ",";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );
 
if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=export.csv");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
exit(0);
?>
