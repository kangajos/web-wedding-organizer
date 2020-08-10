<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uying ~ Chat Bot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <style type="text/css">
        body{
            font-family: 'Bree Serif', serif;
        }
        .my-bg{
            background:#0d2d6c !important;
            color: white !important;
        }
    </style>
</head>
<body style="background: #F3FAED">
    <!-- navbar -->
    <?php $this->load->view('admin/partials/navbar') ?>
    <div class="container mt-3 p-3" style="background: white">
        <?php if ($this->session->flashdata('msg')):?>
            <div class="alert alert-warning"><h5 class="text-center"><?=$this->session->flashdata('msg')?></h5></div>
        <?php endif; ?>
        <?php $this->load->view($content_file, $content_data) ?>
    </div>
    <!-- footer -->
    <?php $this->load->view('admin/partials/footer') ?>
</body>
</html>