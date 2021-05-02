<?php
require_once("atuload.php");
class Imagenes_Eventos extends Conexion
{

	private $Conexion;

	function __construct()
	{
		$this->Conexion = new Conexion;
	}

	/**********************************
	Función para guardar la ruta de la
	   Imagen en la base de datos
	**********************************/
	public function uploadImage($Imagen)
	{
		$ruta = 'ImagenesE/'.$Imagen['imagen']['name'];
		move_uploaded_file($Imagen['imagen']['tmp_name'],$ruta);
		$SQLStatement = $this->conexion->prepare("INSERT INTO Imagenes_Eventos (UrlImag) VALUES (:url)");
		$SQLStatement->bindParam(":url",$ruta);
		$SQLStatement->execute();
		$idImagenes_Eventos = $this->conexion->lastInsertId();
        return $idImagenes_Eventos;
	}

	/**********************************
	Función visualizar las imagenes 
	que estan en la ruta guardada en la 
	BD
	**********************************/
	public function viewImages()
	{ 
		$SQLStatement = $this->Conexion->prepare("SELECT * FROM Imagenes_Eventos WHERE IdEvento = $IdEvento");
		$SQLStatement->execute();

		while($img = $SQLStatement->fetch(PDO::FETCH_ASSOC))
		{
		?>
		<center><img src="<?php print($img['urlImg']); ?>" width="200"></center>
		<?php 
		}
	}

}

?>