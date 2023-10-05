<!DOCTYPE html>
<?php
require_once 'validate.php';
require 'name.php';
require_once 'pdf/autoload.php'; // Inclure l'autoloader de Composer

use Mpdf\Mpdf;

 (int)$id = 0; 

function generatePDFContent($data) {
    $html = '<style>';
    $html .= 'body { font-family: Arial, sans-serif; margin: 2cm; }';
    $html .= 'table { width: 100%; border-collapse: collapse; }';
    $html .= 'th, td { border: 1px solid #ccc; padding: 8px; }';
    $html .= 'thead tr { background-color: #f2f2f2; }';
    $html .= '</style>';
    
    $html .= '<div style="text-align: center; padding: 20px;">
                    <h1 style="color: #ff6600; font-size: 24px; margin-bottom: 10px;">Hotel Ahl Fes</h1>
                    <img src="logo_hotel.png" alt="Logo Hotel" style="width: 150px; margin-bottom: 20px;">
                    <hr style="border: none; border-top: 1px solid #ccc; margin-bottom: 20px;">
                </div>';
    
    $html .= '<h1>Liste des Check In</h1> <br>';
    
    $html .= '<table>';
    $html .= '<thead><tr><th>Nom</th><th>Type Chambre</th><th>N° Chambre</th><th>Check In</th><th>NB Jour</th><th>Check Out</th><th>Status</th><th>Lit Supplémentaire</th><th>Facture</th></tr></thead>';
    $html .= '<tbody>';
    $date = date("Y-m-d");
    
    foreach ($data as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td>';
        $html .= '<td>' . $row['room_type'] . '</td>';
        $html .= '<td>' . $row['room_no'] . '</td>';
        $html .= '<td>' . date("M d, Y", strtotime($row['checkin'])) . ' @ ' . date("h:i a", strtotime($row['checkin_time'])) . '</td>';
        $html .= '<td>' . $row['days'] . '</td>';
        $html .= '<td>' . date("M d, Y", strtotime($row['checkin'] . "+" . $row['days'] . "DAYS")) . '</td>';
        $html .= '<td>' . $row['status'] . '</td>';
        $html .= '<td>' . ($row['extra_bed'] == "0" ? 'None' : $row['extra_bed']) . '</td>';
        $html .= '<td>MAD ' . $row['bill'] . '.00</td>';
        $html .= '</tr>';
    }
    
    $html .= '</tbody>';
    $html .= '</table>';

    return $html;
}



if (isset($_POST['pdf'])) {
    // Récupérer les données de la base de données
    $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check In'") or die(mysqli_query());
    $data = array();
    while ($fetch = $query->fetch_array()) {
        $data[] = $fetch;
        
    }

    // Créer une instance MPDF
	
// Ajouter le style CSS à MPDF
    // Générer le contenu du PDF
    $pdfContent = generatePDFContent($data);

    // Créer une instance de mPDF
$mpdf = new Mpdf();

// Create an instance of mPDF
$mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

// Add the generated content to mPDF
$mpdf->WriteHTML($pdfContent);

// Save the PDF to a file
$guestLastname = "CheckinlistPDF";
$pdfFilePath ='C:\wamp64\www\v12\admin\Archive\CheckinlistPDF\\'  . $guestLastname . date('Y-m-d-H-i') . '.pdf';
$mpdf->Output($pdfFilePath, \Mpdf\Output\Destination::FILE);

}

require 'exel/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;





// ...

if (isset($_POST['exel'])) {

  // Create a new Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set the cell value
$sheet->setCellValue('A1', 'Some value');

// Apply style to the cell
$cell = $sheet->getCell('A1');
$cell->getStyle()
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

$cell->getStyle()
    ->getFont()
    ->setBold(true)
    ->setSize(830);

// Merge cells and set hotel information
$sheet->mergeCells('A1:J1');
$sheet->setCellValue('A1', 'Informations Hôtel');

// Apply style to the merged cell
$mergedCell = $sheet->getCell('A1');
$mergedCell->getStyle()
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

$mergedCell->getStyle()
    ->getFont()
    ->setBold(true)
    ->setSize(14);

// Replace $hotelInfo with the actual hotel information
    
    // Replace $hotelInfo with the actual hotel information
    
    $sheet->insertNewRowBefore(4, 2);
    $sheet->setCellValue('A4', 'Nom');
    $sheet->setCellValue('B4', 'Type Chambre');
    $sheet->setCellValue('C4', 'N° Chambre');
    $sheet->setCellValue('D4', 'Check In');
    $sheet->setCellValue('E4', 'NB Jour');
    $sheet->setCellValue('F4', 'Check Out');
    $sheet->setCellValue('G4', 'Status');
    $sheet->setCellValue('H4', 'Lit Supplémentaire');
    $sheet->setCellValue('I4', 'Action');
    $sheet->setCellValue('J4', 'Facture');
    
    // Apply style to the header row
    $headerStyle = $sheet->getStyle('A4:J4');
    $headerStyle->getFont()->setBold(true);
    $headerStyle->getFont()->setSize(12);
    $headerStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $headerStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('CCCCCC');
    
    // Récupérer les données de la table HTML et les insérer dans le fichier Excel
    $row = 5;
    $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check In'") or die(mysqli_query());
    while ($fetch = $query->fetch_array()) {
        $sheet->setCellValue('A' . $row, $fetch['firstname'] . ' ' . $fetch['lastname']);
        $sheet->setCellValue('B' . $row, $fetch['room_type']);
        $sheet->setCellValue('C' . $row, $fetch['room_no']);
        $sheet->setCellValue('D' . $row, date("M d, Y", strtotime($fetch['checkin'])) . ' @ ' . date("h:i a", strtotime($fetch['checkin_time'])));
        $sheet->setCellValue('E' . $row, $fetch['days']);
        $sheet->setCellValue('F' . $row, date("M d, Y", strtotime($fetch['checkin'] . "+" . $fetch['days'] . "DAYS")));
        $sheet->setCellValue('G' . $row, $fetch['status']);
        $sheet->setCellValue('H' . $row, $fetch['extra_bed'] == "0" ? 'None' : $fetch['extra_bed']);
        $sheet->setCellValue('J' . $row, "MAD " . $fetch['bill'] . ".00");
        $sheet->setCellValue('I' . $row, 'Check Out');
    
        // Apply border to the data cells
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Border color (black)
                ],
            ],
        ];
    
        $sheet->getStyle('A' . $row . ':J' . $row)->applyFromArray($styleArray);
    
        $row++;
    }
    
    $file = 'Chekin_list_' . date('Y-m-d_H-i') . '.xlsx';
    $write = new Xlsx($spreadsheet);
    $destination = 'C:\wamp64\www\v12\admin\Archive\Chekinlist\\'.basename($file); // Chemin complet du dossier de destination
    $write->save($destination);
}

?>



<html>
    <head>
	<title>Hotel AHL FES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">

   
	<!-- CSS only -->
    <?php require('../links.php'); ?>
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <style type="text/css">
	
	.availability-form{
		margin-top: -50px;
		z-index: 2;
		position: relative;
	}

	@media screen and (max-width: 575px) {
	.availability-form{
		margin-top: 25px;
		padding: 0 35px;
	}

	}
        .dropdown-menu.show {
            animation: fadeInDown 0.5s;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -10%, 0);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }
		.export-button-container {
            position: absolute;
            top: 3%;
            right: 100px;
            transform: translateY(-50%,);
            z-index: 999;
        }

        .export-dropdown .btn-export {
            margin-bottom: 10px;
        }

        .export-dropdown .dropdown-menu {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
   
    </style>
</head>
    <body>


    <?php require_once './theme/temp/nav.php'; require_once './theme/temp/header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

    <div class="export-button-container">
        
            <div method = "post" class="export-dropdown">
                <button class="btn btn-primary btn-export" id="export-button">Exporter</button>
                <div class="dropdown-menu" id="export-dropdown-menu">
                    <form action="" method="post">
                    <button type="submit"  class="dropdown-item" id="export-pdf" name="pdf">Exporter en PDF</button>
                    <button class="dropdown-item" id="export-excel" name="exel">Exporter en Excel</button>
                    </form>
                </div>
            </div>
        </div>

        <br />
        <div class = "container-fluid">	
            <div class = "panel panel-default">
                <?php
                    $q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
                    $f_p = $q_p->fetch_array();
                    $q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
                    $f_ci = $q_ci->fetch_array();
                ?>
                <div class = "panel-body">
                    <a class = "btn btn-success" href = "reserve.php"><span class = "badge"><?php echo $f_p['total']?></span> En attente</a>
                    <a class = "btn btn-info disabled"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
                    <a class = "btn btn-warning" href = "checkout.php"><i class = "glyphicon glyphicon-eye-open"></i> Check Out</a>
                    <br />
                    <br />
                    <table id = "table" class = "table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Type Chambre</th>
                                <th>N° Chambre</th>
                                <th>Check In</th>
                                <th>NB Jour</th>
                                <th>Check Out</th>
                                <th>Status</th>
                                <th>Lit Supplémentaire</th>
                                <th>Facture</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check In'") or die(mysqli_query());
                                while($fetch = $query->fetch_array()){
                            ?>
                            <tr>
                                <td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
                                <td><?php echo $fetch['room_type']?></td>
                                <td><?php echo $fetch['room_no']?></td>
                                <td><?php echo "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($fetch['checkin']))."</label>"." @ "."<label>".date("h:i a", strtotime($fetch['checkin_time']))."</label>"?></td>
                                <td><?php echo $fetch['days']?></td>
                                <td><?php echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkin']."+".$fetch['days']."DAYS"))."</label>"?></td>
                                <td><?php echo $fetch['status']?></td>
                                <td><?php if($fetch['extra_bed'] == "0"){ echo "None";}else{echo $fetch['extra_bed'];}?></td>
                                <td><?php echo "MAD ".$fetch['bill'].".00"?></td>
                                <td><center><a class = "btn btn-warning" href = "checkout_query.php?transaction_id=<?php echo $fetch['transaction_id']?>" onclick = "confirmationCheckin(); return false;"><i class = "glyphicon glyphicon-check"></i> Check Out</a></center></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                            </main>
        <br />
        <br />
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center fixed-bottom">
        <label>&copy; <?php echo date("Y"); ?> Hotel AHL FES</label>
        </div>
    </div>
    </div>
    </body>
    <script src = "../js/jquery.js"></script>
    <script src = "../js/bootstrap.js"></script>
    <script src = "../js/jquery.dataTables.js"></script>
    <script src = "../js/dataTables.bootstrap.js"></script>	
    <script type = "text/javascript">
        $(document).ready(function(){
            $("#table").DataTable();
        });
    </script>
    <script type = "text/javascript">
        function confirmationCheckin(anchor){
            var conf = confirm("Are you sure you want to check out?");
            if(conf){
                window.location = anchor.attr("href");
            }
        }
            // Ajouter un gestionnaire d'événements au bouton "Exporter"
        document.getElementById("export-button").addEventListener("click", function () {
                document.getElementById("export-dropdown-menu").classList.toggle("show");
            });

            // Fermer le menu déroulant lors du clic en dehors du bouton
            window.addEventListener("click", function (event) {
                if (!event.target.matches("#export-button")) {
                    var dropdown = document.getElementById("export-dropdown-menu");
                    if (dropdown.classList.contains("show")) {
                        dropdown.classList.remove("show");
                    }
                }
            });


    </script>

</html>