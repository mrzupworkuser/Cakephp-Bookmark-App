<!DOCTYPE html>
<html lang="en">

<head>
    <title>CakePHP 4 CRUD Using Ajax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
    <script>
        var csrfToken = $('meta[name="csrfToken"]').attr('content');
    </script>

</head>

<body>

    <div class="container" style="margin-top:50px">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <?php echo $this->Html->script('custom'); ?>
</body>

</html>