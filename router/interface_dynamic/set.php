<?php 
//print_r($_POST['check_list']);
$array=$_POST['check_list'];
//print_r($array);
//print_r($array[0]);
//foreach($array as $i)
//{
 //echo($i);///echo("</br>");
//}echo json_encode($array);

?>

<script type="text/javascript">
// pass PHP variable declared above to JavaScript variable
var arr = <?php echo json_encode($array) ?>;
</script>

<html>
<body>
<div id="content">
This is parent element
</div>

<button onclick="addRow()" >Add</button>


<script>
	
for(i=0;i<arr.length;i++)
{
	count=0;

	
	//document.write(arr[2]);
    var div = document.createElement('div');

    div.className = 'row';

    div.innerHTML =
        '<input type="text" name="name" value=" '+arr[count]+ ' " />\
        <input type="text" name="value" value="" />\
        <label> <input type="checkbox" name="check" value="1" /> Checked</label>\
        <input type="button" value="-" onclick="removeRow(this)">';

    document.getElementById('content').appendChild(div);
    count++;
}

function removeRow(input) {
    document.getElementById('content').removeChild(input.parentNode);
}

</script>



</html>


