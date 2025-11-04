<?php 
if (!isset($page_title)) {
    $page_title = "HealthConnect Campus";
}
$css_path = '../../public/assets/css/style.css'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="<?php echo $css_path; ?>">
</head>

<body>
    <div class="dashboard-layout">

        <?php require_once 'sidebar.php'; ?>

        <main class="main-content">
            <div class="page-container">