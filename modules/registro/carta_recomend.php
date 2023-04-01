<?php include("../../database.php");

if (isset($_GET['textID'])) {
    $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
    $sentencia = $conn->prepare("SELECT *,(SELECT puesto FROM `caracteristicas` 
    WHERE `caracteristicas`.`id_puesto` = `registro`.`id_puesto` 
    LIMIT 1) as puesto FROM `registro` where id = :id ;");
  
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $registro["nombre"];
    $foto = $registro["foto"];
    $cv = $registro["cv"];
    $idpuesto = $registro["id_puesto"];
    $puesto = $registro["puesto"];
    $fecha = $registro["fecha"];

    $fecha_inicio = new DateTime($fecha);
    $fecha_fin = new DateTime(date('Y-m-d'));
    $differncia = date_diff($fecha_inicio,$fecha_fin);
  }
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Carta de recomendación</title>
</head>
<body>
	<h1>Carta de recomendación</h1>

	<h2>Introducción</h2>
	<p>A quien corresponda</p>

	<h2>Experiencia laboral</h2>
	<p>Conozco a <strong><?php echo $nombre;?></strong> 
    desde hace <?php echo $differncia->y ;?> años, 
    cuando comenzó a trabajar en Biosofhus. 
    Durante su tiempo en la empresa, 
    ha demostrado ser un trabajador dedicado y comprometido con su trabajo.
    ha sido responsable de <?php echo $puesto;?> y ha demostrado habilidades 
    excepcionales en el equipo de programacion.</p>

	<h2>Habilidades y aptitudes</h2>
	<p>Además de sus habilidades técnicas, <?php echo $nombre;?>
     es una persona muy amable y colaboradora. Siempre está dispuesto
      a ayudar a sus compañeros de trabajo y a compartir sus conocimientos
       y habilidades. También tiene una excelente capacidad para 
       trabajar en equipo y para comunicarse de manera efectiva con los demás.</p>

	<h2>Recomendación</h2>
	<p>En base a mi experiencia trabajando con <?php echo $nombre;?>, 
    recomiendo encarecidamente su contratación para cualquier puesto en el que 
    se requieran habilidades técnicas, trabajo en equipo y habilidades interpersonales. 
    Lo que lo convertiria en un activo valioso para cualquier empresa o equipo de trabajo.</p>

	<p>Por favor, no dude en ponerse en contacto conmigo si necesita más información o 
        referencias sobre <?php echo $nombre;?>. </p>

	<p>Atentamente,</p>
	<p>Msc. Francisco Ascue Orosco</p>
    <table cellpadding="0" cellspacing="0" class="table_StyledTable-sc-1avdl6r-0 jWJRxL" 
    style="min-width: 450px; 
    vertical-align: -webkit-baseline-middle; 
    font-size: medium; 
    font-family: Arial;">
    <tbody><tr style="text-align: center;">
    <td><h2 color="#6b90b1" class="nameNameContainer-sc-1m457h3-0 hkyYrA" 
    style="margin: 0px; font-size: 18px; color: rgb(107, 144, 177);
     font-weight: 600;"><span>Francisco</span><span>&nbsp;</span>
     <span>Ascue Orosco</span></h2><p color="#6b90b1" font-size="medium" 
     class="job-titleContainer-sc-1hmtp73-0 iJcqpv" style="margin: 0px;
     color: rgb(107, 144, 177); font-size: 14px; line-height: 22px;">
     <span>Coordinador de Operaciones</span></p>
     <p color="#6b90b1" font-size="medium" 
     class="company-detailsCompanyContainer-sc-j5pyy8-0 bEBXsp" 
     style="margin: 0px; font-weight: 500; color: rgb(107, 144, 177); 
     font-size: 14px; line-height: 22px;">
     <span>I+D</span><span>&nbsp;|&nbsp;</span><span>Foreslab S.A.C</span></p>
    </td></tr><tr><td><table cellpadding="0" cellspacing="0" 
    class="tableStyledTable-sc-1avdl6r-0 jWJRxL" style="width: 100%; 
    vertical-align: -webkit-baseline-middle; font-size: medium;
     font-family: Arial;"><tbody><tr><td height="30"></td></tr>
     <tr><td color="#82bd56" direction="horizontal" width="auto" height="1" 
     class="color-dividerDivider-sc-1h38qjv-0 dcKmvZ" style="width: 100%;
      border-bottom: 1px solid rgb(130, 189, 86); border-left: none; display: block;">
      </td></tr><tr><td height="30"></td></tr></tbody></table>
      <table cellpadding="0" cellspacing="0" class="tableStyledTable-sc-1avdl6r-0 jWJRxL"
       style="width: 100%; vertical-align: -webkit-baseline-middle; font-size: medium;
        font-family: Arial;"><tbody><tr style="vertical-align: middle;"><td>
            <table cellpadding="0" cellspacing="0" 
            class="tableStyledTable-sc-1avdl6r-0 jWJRxL" 
            style="vertical-align: -webkit-baseline-middle; 
            font-size: medium; font-family: Arial;">
            <tbody><tr height="25" style="vertical-align: middle;">
            <td width="30" style="vertical-align: middle;">
            <table cellpadding="0" cellspacing="0" 
            class="tableStyledTable-sc-1avdl6r-0 jWJRxL" 
            style="vertical-align: -webkit-baseline-middle; font-size: medium; 
            font-family: Arial;"><tbody><tr><td style="vertical-align: bottom;">
            <span color="#82bd56" width="11" 
            class="contact-infoIconWrapper-sc-mmkjr6-1 hBHfIp" 
            style="display: inline-block; background-color: rgb(130, 189, 86);">
            <img src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png" 
            color="#82bd56" alt="mobilePhone" width="13" 
            class="contact-infoContactLabelIcon-sc-mmkjr6-0 dGVIJx" 
            style="display: block; background-color: rgb(130, 189, 86);"></span>
        </td></tr></tbody></table></td>
        <td style="padding: 0px; color: rgb(107, 144, 177);">
        <a href="tel:+51 902295669" color="#6b90b1" 
        class="contact-infoExternalLink-sc-mmkjr6-2 bibcmr" 
        style="text-decoration: none; color: rgb(107, 144, 177); font-size: 12px;">
        <span>+51 950600047</span></a></td></tr>
        <tr height="25" style="vertical-align: middle;"><td width="30" 
        style="vertical-align: middle;"><table cellpadding="0" 
        cellspacing="0" class="tableStyledTable-sc-1avdl6r-0 jWJRxL" 
        style="vertical-align: -webkit-baseline-middle; 
        font-size: medium; font-family: Arial;"><tbody>
            <tr><td style="vertical-align: bottom;">
            <span color="#82bd56" width="11" 
            class="contact-infoIconWrapper-sc-mmkjr6-1 hBHfIp" 
            style="display: inline-block; 
            background-color: rgb(130, 189, 86);">
            <img src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/email-icon-2x.png" 
            color="#82bd56" alt="emailAddress" width="13" 
            class="contact-infoContactLabelIcon-sc-mmkjr6-0 dGVIJx" 
            style="display: block; background-color: rgb(130, 189, 86);"></span>
        </td></tr></tbody></table></td><td style="padding: 0px;">
        <a href="mailto:bianca.vigil@foreslab.com" color="#6b90b1" 
        class="contact-infoExternalLink-sc-mmkjr6-2 bibcmr" 
        style="text-decoration: none; color: rgb(107, 144, 177); 
        font-size: 12px;"><span>info@foreslab.com</span></a>
        </td></tr><tr height="25" style="vertical-align: middle;">
        <td width="30" style="vertical-align: middle;"><table cellpadding="0" 
        cellspacing="0" class="tableStyledTable-sc-1avdl6r-0 jWJRxL" 
        style="vertical-align: -webkit-baseline-middle; font-size: medium; 
        font-family: Arial;"><tbody><tr><td style="vertical-align: bottom;">
        <span color="#82bd56" width="11" class="contact-infoIconWrapper-sc-mmkjr6-1 hBHfIp" 
        style="display: inline-block; background-color: rgb(130, 189, 86);">
        <img src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/link-icon-2x.png" 
        color="#82bd56" alt="website" width="13" 
        class="contact-infoContactLabelIcon-sc-mmkjr6-0 dGVIJx" 
        style="display: block; background-color: rgb(130, 189, 86);"></span>
    </td></tr></tbody></table></td><td style="padding: 0px;">
    <a href="https://foreslab.com/" color="#6b90b1" 
    class="contact-infoExternalLink-sc-mmkjr6-2 bibcmr" 
    style="text-decoration: none; color: rgb(107, 144, 177); font-size: 12px;">
    <span>https://foreslab.com/</span></a></td></tr></tbody></table></td><td 
    style="text-align: right;"><table cellpadding="0" cellspacing="0" 
    class="tableStyledTable-sc-1avdl6r-0 jWJRxL" style="width: 100%; 
    vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial;">
    <tbody><tr><td><img src="https://foreslab.com/wp-content/uploads/2023/02/logo-foreslab_reducido-255x57.png" 
    role="presentation" width="130" class="imageStyledImage-sc-hupvqm-0 fQKUvi" 
    style="display: inline-block; max-width: 130px;"></td></tr></tbody></table></td>
</tr></tbody></table><table cellpadding="0" cellspacing="0" 
class="tableStyledTable-sc-1avdl6r-0 jWJRxL" 
style="width: 100%; vertical-align: -webkit-baseline-middle; font-size: medium; 
font-family: Arial;"><tbody><tr><td height="30"></td></tr><tr><td color="#82bd56" 
direction="horizontal" width="auto" height="1" 
class="color-divider_Divider-sc-1h38qjv-0 dcKmvZ" 
style="width: 100%; border-bottom: 1px solid rgb(130, 189, 86); 
border-left: none; display: block;"></td></tr><tr><td 
height="30"></td></tr></tbody></table></td></tr></tbody></table>
</body>
</html>

<?php 

$HTML = ob_get_clean();

require_once("../../libs/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$opciones = $dompdf->getOptions();
$opciones->set(array("isRemoteEnabled"=>true));

$dompdf-> setOptions($opciones);
$dompdf -> loadHtml($HTML);

$dompdf -> setPaper('letter');
$dompdf -> render();
$dompdf -> stream()

?>