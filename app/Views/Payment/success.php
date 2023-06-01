<!DOCTYPE html>
<html lang="en">
<?php echo view("includes/head"); ?>
<style>
        ion-icon {
            font-size: 30rem !important;
            color:green;
        }
        .main__content_wrapper{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .link{
            margin-top: 2rem;
            color:white;
            margin-bottom: 50rem;
            font-size: 1.6rem;
            background:var(--secondary-color) ;
            padding: 15px;
            border-radius:10px;
        }
        .link:hover{
            color: white;
            opacity:0.7;
        }
    </style>
<body>

    <?php echo view("includes/header"); ?>

    <main class="main__content_wrapper">
        <ion-icon name="checkmark-circle-outline"></ion-icon>
        <h3>Ödeme Başarılı</h3>
        <a href="<?php echo base_url("/hesap");?>" class="link">Siparişlerime git</a>
    </main>

    <?php echo view("includes/footer"); ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>