<?php
include ("../TGN/gate/liberay/lib.php");
$name = $_GET["name"];
$img = $_GET["img"];
$dsname = $_GET["dsname"];
$birth = $_GET["birth"];
$key = $_GET["key"];
$img_uuid =$_GET["img_uuid"];
if($name=="")
{
$name = "cyber Ahn";
}
$search_url = encodesearchurlprofil($name);
$image_url = slProfil($search_url,"image");
$display_name = slProfil($search_url,"displayname");
$age = slProfil($search_url,"age");
$id=name2Key($name);
echo"$name|";
if($key=="yes")
{
echo"$id|";
}
if($dsname=="yes")
{
echo"$display_name|";
}
if($birth=="yes")
{
echo"$age|";
}
if($img=="yes")
{
?>
<html>
<head>
<script language="JavaScript" src="../../liberay/overlib.js" type="text/javascript"></script>
</head>
<body>
<a href="#" target="_self" onmouseover="return overlib('<img src=<? echo $image_url; ?> width=350 height=250 border=0 class=name/>');" onmouseout="nd();" alt=""/><img src=<? echo $image_url; ?> border="0" width='50' height='50' alt='gateimage'></a>
</body>
</html>
<?php
}
if($img_uuid=="yes")
{
$image_UUID = getBetween($image_url,'app/image/','/1');
echo"$image_UUID";
}
?>