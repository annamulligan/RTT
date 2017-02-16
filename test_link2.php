<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
<h1>Hi</h1>
<div id="log"></div>
<div id="pass"></div>
<script language="JavaScript">
    function processUser()
    {
        var parameters = location.search.substring(1).split("&");

        var temp = parameters[0].split("=");
        l = unescape(temp[1]);
        temp = parameters[1].split("=");
        p = unescape(temp[1]);
        document.getElementById("log").innerHTML = l;
        document.getElementById("pass").innerHTML = p;
    }
    //processUser();
</script>

<div id="username"> <?php session_start(); echo $_SESSION['varname'] ?></div>
</body>
</html>