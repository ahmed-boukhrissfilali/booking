<?php
    require_once 'connect.php';
    require_once 'pdf/autoload.php'; // Inclure l'autoloader de Composer
    require_once 'mail/autoload.php'; // Inclure l'autoloader de Composer
    // Enregistrer le PDF dans un fichier
    
    use Mpdf\Mpdf;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    $transactionId = $_REQUEST['transaction_id']; // ID de la transaction à partir de laquelle vous souhaitez générer le devis

    if (isset($_POST['add_form'])) {
        $room_no = $_POST['room_no'];
        $days = $_POST['days'];
        $extra_bed = $_POST['extra_bed'];
        
        $query = $conn->query("SELECT * FROM `transaction` WHERE `room_no` = '$room_no' AND `status` = 'Check In'") or die(mysqli_error());
        $row = $query->num_rows;
        $time = date("H:i:s", strtotime("+8 HOURS"));
        
        if ($row > 0) {
            echo "<script>alert('Room not available')</script>";
        } else {
            $query_update_transaction = $conn->query("UPDATE `transaction` AS t
            INNER JOIN `room` AS r ON t.room_id = r.room_id
            SET t.`room_no` = '$room_no',
                t.`days` = '$days',
                t.`extra_bed` = '$extra_bed',
                t.`status` = 'Check In',
                t.`checkin_time` = '$time',
                t.`checkout` = DATE_ADD(t.`checkin`, INTERVAL $days DAY),
                t.`bill` = r.`price` * $days + 800 * $extra_bed,
                r.`chambre_livree` = r.`chambre_livree` + 1
            WHERE t.`transaction_id` = '$transactionId'") or die(mysqli_error($conn));




if ($query_update_transaction) {
    // Récupérer les informations de la transaction et du client à partir de la base de données
    $query = "SELECT g.firstname, g.lastname, g.address, t.checkin, t.checkout, t.bill,t.room_no, r.room_type
              FROM guest g
              INNER JOIN transaction t ON g.guest_id = t.guest_id
              INNER JOIN room r ON t.room_id = r.room_id
              WHERE t.transaction_id = '$transactionId'";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $guestFirstname = $row['firstname'];
        $guestLastname = $row['lastname'];
        $guestAddress = $row['address'];
        $checkinDate = $row['checkin'];
        $checkoutDate = $row['checkout'];
        $billAmount = $row['bill'];
        $roomType = $row['room_type'];
        $roomNum = $row['room_no'];

// Générer le contenu HTML du devis
$html = '<!DOCTYPE html>
<html>
<head>
  <title>Devis d\'hôtel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="m-5 text-center">Devis d\'hôtel</h1>
    <div class="row">
      <div class="col-md-6 m-2">
        <h4>Informations du client :</h4>
        <p><strong>Prénom :</strong>'. $guestFirstname .'</p>
        <p><strong>Nom :</strong> '. $guestLastname .'</p>
        <p><strong>Adresse :</strong> '. $guestAddress .'</p>
      </div>
      <div class="col-md-12">
        <h4 class="m-3">Informations de réservation :</h4>
        
        <table class="table">
            <thead>
              <tr>
                <th>Date d\'arrivée :</th>
                <th>Date de départ :</th>
                <th>Type de chambre :</th>
                <th>Chambre numéro :</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>'. $checkinDate .'</td>
                <td>'. $checkoutDate .'</td>
                <td>'. $roomType .'</td>
                <td>'. $roomNum .'</td>
              </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-right" colspan="3">Montant à payer :</th>
                    <td class="text-right">'. $billAmount .'</td>
                </tr>
            </tfoot>
          </table>
      </div>
    </div>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>';



// Créer une instance de mPDF
$mpdf = new Mpdf();

// Charger le HTML dans mPDF
$mpdf->WriteHTML($html);

// Enregistrer le PDF dans un fichier
$pdfFilePath = 'C:\wamp64\www\v12\admin\Archive\Devis\\' . $guestLastname . date('Y-m-d-H-i') . '.pdf';
$mpdf->Output($pdfFilePath, 'F');

$mail = new PHPMailer(true);

// Configuration de PHPMailer
$mail->isSMTP();
$mail->Host= 'smtp.gmail.com'; // Set the SMTP server to send through
$mail->SMTPAuth = true;
$mail->Username = 'fesahl912@gmail.com'; // SMTP username
$mail->Password = 'srqcolsfsttppitt'; // SMTP password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Destinataire et expéditeur
$mail->setFrom('fesahl912@gmail.com', 'hotel fes'); // Replace with your email address and your name
$mail->addAddress($guestAddress, $guestFirstname . ' ' . $guestLastname); // Recipient's email address and name

// Sujet et corps du message
$mail->Subject = 'Confirmation de réservation de chambre d\'hôtel et Devis';

$mail->Body = '
    <!DOCTYPE html>
    <html>
    <head>
      <style>
        .container {
          background-color: #f9f9f9;
          padding: 20px;
          font-family: Arial, sans-serif;
        }
        .header {
          text-align: center;
          margin-bottom: 30px;
        }
        .title {
          font-size: 24px;
          color: #333;
          margin-bottom: 10px;
        }
        .content {
          font-size: 16px;
          color: #555;
        }
        .footer {
          text-align: center;
          margin-top: 30px;
          color: #888;
        }
      </style>
    </head>
    <body>
      <div class="container">
        <div class="header">
          <h2 class="title">Confirmation de réservation d\'hôtel</h2>
        </div>
        <div class="content">
          <p>
            Cher(e) Nom Destinataire,
          </p>
          <p>
            Nous sommes ravis de vous informer que votre réservation de chambre d\'hôtel a été confirmée. Nous avons hâte de vous accueillir dans notre établissement.
          </p>
          <p>
            Si vous avez des questions ou des demandes spéciales, n\'hésitez pas à nous contacter. Nous nous ferons un plaisir de vous assister.
          </p>
          <p>
            Cordialement,
            <br>
            Votre Nom
          </p>
        </div>
        <div class="footer">
          <p>Merci de votre confiance.</p>
        </div>
      </div>
    </body>
    </html>
';

$mail->IsHTML(true); // Indique que le contenu du message est au format HTML

$mail->addAttachment($pdfFilePath);
}}}}
// Envoi du message
try {
  try {
    $mail->send();
    echo '<script>alert("Le message a été envoyé avec succès."); window.location.href = "checkin.php";</script>';

} catch (Exception $e) {
    echo '<script>alert("Une erreur est survenue lors de l\'envoi du message : ' . $mail->ErrorInfo . '");</script>';
}} catch (Exception $e) {
    echo 'Une erreur est survenue lors de l\'envoi du message : ' . $mail->ErrorInfo;
}



?>
