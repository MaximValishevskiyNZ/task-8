<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <link href="css/style.css" rel="stylesheet">
   <script src="https://use.fontawesome.com/ed06eed6dd.js"></script>
   <title>Document</title>
   <?php
   require_once("yandex-master/vendor/autoload.php");
   require_once("classes/diskHandler.php");
   $diskHandler = new diskHandler($token);
   ?>
</head>
<body>
   <div class="container">
      <form action="includes/fileUpload.php" method="post" enctype="multipart/form-data">
         <input type="file" name="file">
         <button type="submit" class="btn btn-primary">
            <i class="fa fa-upload" aria-hidden="true"></i> Upload file
         </button>
      </form>
      <table class="table">
         <thead>
            <tr class="table-warning ">
               <th scope="col">File name</th>
               <th scope="col">Size</th>
               <th scope="col">Delete</th>
               <th scope="col">Download</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $collection = $diskHandler->getAll();

            foreach ($collection as $item) { ?>
               <tr>
                  <td><?= $item['name'] ?></td>
                  <td><?= intdiv($item['size'], 1024) . " МБ" ?></td>
                  <td>
                     <form action="includes/fileDelete.php" method="post">
                        <button type="submit" class="btn btn-danger" name="file_path" value=<?= $item['path'] ?>>
                           <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                     </form>
                  </td>
                  <td>
                     <form action="includes/fileDownload.php" method="post">
                        <button type="submit" class="btn btn-primary" name="file_path" value=<?= $item['path'] ?>>
                           <i class="fa fa-download" aria-hidden="true"></i>
                        </button>
                     </form>
                  </td>
               </tr>
            <? } ?>
   </div>
</body>
</html>