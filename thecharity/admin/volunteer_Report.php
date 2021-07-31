<?php
include("conn.php");
if(isset($_POST['Generate_volunteer'])) {
        ob_start();
        require "../fpdf181/fpdf.php";



        class PDF extends FPDF
        {
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', '', '8');
                $this->Cell(10, 10, 'Page ' . $this->PageNo() . " / Of {pages}", 0, 0, 'c');
            }
        }

        $pdf = new PDF('P', 'mm', 'A4');
        $pdf->AliasNbPages('{pages}');
        $pdf->AddPage('P');
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont("Arial", 'B', 18);

        $pdf->Cell(190, 30,"", 1, 2);
        $pdf->Image("../images/donation_hub_black_edit.png", 100, 20, 60, 20);
        $pdf->SetFont("Arial", '', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont("Arial", '', 10);
        $pdf->Cell(190, 10, "", 0, 1, 'C', true);
        $pdf->SetFont("Arial", 'B', 18);
        $pdf->Cell(190, 10, "Volunteers", 0, 0, 'C', true);

        $pdf->Cell(190, 10, "", 0, 1, 'C', true);
        $pdf->SetFont("Arial", '', 12);
        $pdf->Cell(190, 10, "", 0, 1, 'C', true);
        $pdf->Cell(14, 10, "Sr No.", 1, 0, 'C', true);
        $pdf->Cell(35, 10, "Volunteer Name", 1, 0, 'C', true);
        $pdf->Cell(60, 10, "Email", 1, 0, 'C', true);
        $pdf->Cell(25, 10, "Mobile No", 1, 0, 'C', true);
        $pdf->Cell(25, 10, "City", 1, 0, 'C', true);
    $pdf->Cell(40, 10, "Area", 1, 1, 'C', true);

            $sql="select * from volunteer_register";
            $res=mysqli_query($conn,$sql);
            $j=1;
            while($row=mysqli_fetch_array($res)){
                $sql1="select * from city where c_id=".$row['city'];
                $res1=mysqli_query($conn,$sql1);
                if($row1=mysqli_fetch_array($res1)){
                    $city=$row1['c_name'];
                }

                $sql1="select * from area where area_id=".$row['area_name'];
                $res1=mysqli_query($conn,$sql1);
                if($row1=mysqli_fetch_array($res1)){
                    $area=$row1['area_name'];
                }

                $pdf->Cell(14, 10, $j, 1, 0, 'C', true);
                $pdf->Cell(35, 10, $row['firstname'], 1, 0, 'C', true);
                $pdf->Cell(60, 10, $row['email'], 1, 0, 'C', true);
                $pdf->Cell(25, 10, $row['contactno'], 1, 0, 'C', true);
                $pdf->Cell(25, 10, $city, 1, 0, 'C', true);
                $pdf->Cell(40, 10, $area, 1, 1, 'C', true);
                $j++;
            }

        $pdf->Output('demo2.pdf', 'I');


}

if(isset($_POST['Generate_donor'])) {
    ob_start();
    require "../fpdf181/fpdf.php";

    class PDF extends FPDF
    {
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', '', '8');
            $this->Cell(10, 10, 'Page ' . $this->PageNo() . " / Of {pages}", 0, 0, 'c');
        }
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->AddPage('P');
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont("Arial", 'B', 18);

    $pdf->Cell(190, 30, "", 1, 2);
    $pdf->Image("../images/donation_hub_black_edit.png", 70, 15, 70, 20);
    $pdf->SetFont("Arial", '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont("Arial", '', 10);
    $pdf->Cell(190, 10, "", 0, 1, 'C', true);
    $pdf->SetFont("Arial", 'B', 18);
    $pdf->Cell(190, 10, "Donors", 0, 0, 'C', true);

    $pdf->Cell(190, 10, "", 0, 1, 'C', true);
    $pdf->SetFont("Arial", '', 12);
    $pdf->Cell(190, 10, "", 0, 1, 'C', true);
    $pdf->Cell(14, 10, "Sr No.", 1, 0, 'C', true);
    $pdf->Cell(35, 10, "Donor Name", 1, 0, 'C', true);
    $pdf->Cell(60, 10, "Email", 1, 0, 'C', true);
    $pdf->Cell(25, 10, "Mobile No", 1, 0, 'C', true);
    $pdf->Cell(25, 10, "City", 1, 0, 'C', true);
    $pdf->Cell(40, 10, "Area", 1, 1, 'C', true);

    $sql="select * from donor_register";
    $res=mysqli_query($conn,$sql);
    $j=1;
    while($row=mysqli_fetch_array($res)){
        $sql1="select * from city where c_id=".$row['city'];
        $res1=mysqli_query($conn,$sql1);
        if($row1=mysqli_fetch_array($res1)){
            $city=$row1['c_name'];
        }

        $sql1="select * from area where area_id=".$row['area_name'];
        $res1=mysqli_query($conn,$sql1);
        if($row1=mysqli_fetch_array($res1)){
            $area=$row1['area_name'];
        }

        $pdf->Cell(14, 10, $j, 1, 0, 'C', true);
        $pdf->Cell(35, 10, $row['firstname'], 1, 0, 'C', true);
        $pdf->Cell(60, 10, $row['email'], 1, 0, 'C', true);
        $pdf->Cell(25, 10, $row['contactno'], 1, 0, 'C', true);
        $pdf->Cell(25, 10, $city, 1, 0, 'C', true);
        $pdf->Cell(40, 10, $area, 1, 1, 'C', true);
        $j++;
    }

    $pdf->Output('demo2.pdf', 'I');


}

