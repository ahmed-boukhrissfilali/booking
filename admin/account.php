<!DOCTYPE html>
<?php
    require_once 'validate.php';
    require 'name.php';
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hotel AHL FES</title>
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
    
    <!-- Other CSS -->
    <?php require('../links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <style type="text/css">
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

<?php require_once './theme/temp/nav.php'; require_once './theme/temp/header.php' ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-5">
    <div class="container mx-auto">
        <div class="bg-blue-100 p-4 rounded">
            <div class="bg-blue-500 text-white p-2 rounded">Mes Comptes</div>
            <a class="bg-green-500 text-white py-2 px-4 rounded" href="add_account.php"><i class="fa fa-plus"></i> Creer Nouveau Compte</a>
            <br>
            <br>
            <table id="table" class="table-auto border-collapse border border-blue-800">
                <thead class="bg-gray-900 text-white">
                    <tr>
                        <th class="text-center p-2">Nom</th>
                        <th class="text-center p-2">Usernom</th>
                        <th class="text-center p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $query = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
                        while($fetch = $query->fetch_array()){
                    ?>
                    <tr>
                        <td class="text-center p-2 mt-2"><?php echo $fetch['name']?></td>
                        <td class="text-center p-2"><?php echo $fetch['username']?></td>
                        <td class="text-center p-2">
                            <div class="flex justify-center space-x-2">
                                <a class="bg-yellow-500 text-white py-2 px-4 rounded" href="edit_account.php?admin_id=<?php echo $fetch['admin_id']?>">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <a class="bg-red-500 text-white py-2 px-4 rounded" onclick="confirmationDelete(this); return false;" href="delete_account.php?admin_id=<?php echo $fetch['admin_id']?>">
                                    <i class="fa fa-remove"></i> Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    <div class="container mx-auto">
        <div class="row justify-center">
            <div class="col-12 text-center fixed-bottom">
                <label>&copy; <?php echo date("Y"); ?> Hotel AHL FES</label>
            </div>
        </div>
    </div>
</main>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    function confirmationDelete(anchor){
        var conf = confirm("Are you sure you want to delete this record?");
        if(conf){
            window.location = anchor.attr("href");
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#table").DataTable();
    });
</script>
</body>
</html>
