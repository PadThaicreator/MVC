



<table border = 1>
    <tr><td>Year</td> <td>Month</td><td> CustomerType </td> <td> serviceType </td> <td> totalOrder </td><td> totalPrice </td></tr>
<?php foreach($show_list as $s)
{    
    echo "<tr><td> $s->year </td><td> $s->month </td><td> $s->typeCus </td> <td> $s->serviceType </td> <td> $s->totalOrder </td> <td> $s->totalPrice </td> </tr>";
}
echo "</table>";

?>