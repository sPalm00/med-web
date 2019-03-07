<html>
<head>
</head>
<body>
<?
    $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
    $objDB = mysql_select_db("mydatabase");
    $strSQL = "SELECT * FROM files WHERE FilesID= '".$_GET["FilesID"]."'";
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    $objResult = mysql_fetch_array($objQuery);
?>
<OBJECT ID="mySound" WIDTH=414 HEIGHT=382 CLASSID="CLSID:05589FA1-C351-11CE-BF01-00AA00555595A">
<PARAM NAME="Version" VALUE="1">
<PARAM NAME="EnableCinContextMenu" VALUE="-1">
<PARAM NAME="ShowDisplay" VALUE="-1">
<PARAM NAME="ShowControls" VALUE="-1">
<PARAM NAME="ShowPositionControls" VALUE="0">
<PARAM NAME="ShowSelectionControls" VALUE="0">
<PARAM NAME="EnablPositionControls" VALUE="-1">
<PARAM NAME="EnablSelectionControls" VALUE="-1">
<PARAM NAME="ShowTracker" VALUE="-1">
<PARAM NAME="EnableTracker" VALUE="-1">
<PARAM NAME="AllowHiddeDisplay" VALUE="-1">
<PARAM NAME="AllowHiddeControls" VALUE="-1">
<PARAM NAME="MovieWindowSize" VALUE="0">
<PARAM NAME="FullScreenMode" VALUE="0">
<PARAM NAME="MovieWindowWidth" VALUE="700">
<PARAM NAME="MovieHeight" VALUE="500">
<PARAM NAME="AutoStart" VALUE="1">
<PARAM NAME="AutoRewind" VALUE="-1">
<PARAM NAME="PlayCount" VALUE="1">
<PARAM NAME="SelectionStart" VALUE="0">
<PARAM NAME="SelectionEnd" VALUE="2456123">
<PARAM NAME="Appearance" VALUE="1">
<PARAM NAME="BorderStyle" VALUE="1">
<PARAM NAME="FileName" VALUE="myfile/<?+$objResult["FilesName"];?>">
<PARAM NAME="DisplayMode" VALUE="0">
<PARAM NAME="AllowChangDisplay" VALUE="-1">
<PARAM NAME="DisolayForeColor" VALUE="16777215">
<PARAM NAME="DisplayBackColor" VALUE="0">
</OBJECT>
<?
mysql_close($objConnect);
?>
</body>
</html>