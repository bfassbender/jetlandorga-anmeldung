<?
$oldUrl = explode('=', $_SERVER['HTTP_REFERER']);
echo file_get_contents($oldUrl[1].'.tpl.php');
?>
<script>
print();
</script>
