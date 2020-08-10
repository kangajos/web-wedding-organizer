<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uying ~ Chat Bot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Bree Serif', serif;
        }
    </style>
</head>
<body style="background: #F3FAED">
<!-- navbar -->
<?php $this->load->view('partials/navbar') ?>
<div class="container mt-3">
    <?php $this->load->view($content_file, $content_data) ?>
</div>
<!-- footer -->
<?php $this->load->view('partials/footer') ?>
</body>
</html>