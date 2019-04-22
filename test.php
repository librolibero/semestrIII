<?php
setcookie("test_cookie", "test", time() + 3600, '/'); //czy w danej przegladarce zostalo zapamietane okreslone cookies
?>
<html>
<body>

<?php
if(count($_COOKIE) > 0) {
    echo "Cookies wlaczone.";
} else {
    echo "Cookies wylaczone.";
}
?>

</body>
</html>
