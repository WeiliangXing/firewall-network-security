<!DOCTYPE html>

<html lang="en">
  <head>
    <title>First Page</title>
  </head>
  <body>
    
    <?php $link_name = "Second Page"; ?>
    <?php $id = 508; ?>
    <?php $course = "Network Security"; ?>
    
    <a href="second_page.php?id=<?php echo $id; ?>&course=<?php echo rawurlencode($course); ?>"><?php echo $link_name; ?></a>

  </body>
</html>
