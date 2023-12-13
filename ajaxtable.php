<?php include('functions.php');
    $query = "SELECT * FROM contacts2todo GROUP BY list_created_date   ";
    $result = mysqli_query($db, $query);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $date_created = $row['list_created_date'];
        $date = strtotime($row['list_created_date']);
        $formatteddate = date('d-m-Y', $date);

        $listname = $row['list_name'];
        $yearnow = date('Y');
        $list_created_by = $row['list_created_by'];
        $list_created_for = $row['list_created_for'];

        $btnfunc = "openModalEditList('$list_created_by','$date_created','$listname','$list_created_for')";

        $data[] = array(
            "date" => '$formatteddate',
            "name" => '$listname',
            "created_by" => '$list_croeated_by',
            "created_for" => '$list_created_for',
            "action" => '',
        );
        echo json_encode($data);

    }

?>