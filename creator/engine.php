<?php

$tableName=$_GET['nombre'];
$primaryKey=$_GET['primaryKey'];

$atributos=$_GET['atributos'];
$atrArray=preg_split ("/\,/", $atributos);

$file=fopen("modelo/".$tableName.".php","w") or die("Unable to open file!");

fwrite($file,"<?php \nrequire_once 'Modelo.php';");
fwrite($file,"\nclass ".$tableName." extends Modelo{");

foreach ($atrArray as $value) {
    fwrite($file,"\n\tprivate $".$value.";");
}
fwrite($file,"\n\n\tpublic function __construct() {");
fwrite($file,"\n\t\tparent::__construct(get_class(\$this),\"".$primaryKey."\");");
fwrite($file,"\n\t}");
foreach ($atrArray as $value) {
    fwrite($file,"\n\tpublic function get".ucfirst($value)."(){");
    fwrite($file,"\n\t\treturn \$this->".$value.";");
    fwrite($file,"\n\t}");

    fwrite($file,"\n\tpublic function set".ucfirst($value)."($".$value."){");
    fwrite($file,"\n\t\t \$this->".$value."=$".$value.";");
    fwrite($file,"\n\t}");
}
fwrite($file,"\n}");
fclose($file) or die("Unable to close file!");

//Controlador

$fileC=fopen("controlador/Controlador".ucfirst($tableName).".php","w") or die("Unable to open file!");
fwrite($fileC,"<?php \nrequire_once 'Controlador.php';\n");
fwrite($fileC,"\nclass Controlador".$tableName." extends Controlador{");
fwrite($fileC,"\n\tprivate \$modelo;");
fwrite($fileC,"\n\tpublic function __construct(\$modelo) {");
fwrite($fileC,"\n\t\tparent::__construct(\$modelo);");
fwrite($fileC,"\n\t}");
fwrite($fileC,"\n}");
fclose($fileC) or die("Unable to close file!");

echo "Generación exitosa!";

