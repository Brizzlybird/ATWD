<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <td>catgory</td>
          <td>quote</td>
          <td>author</td>
          <td>wiki link</td>
          <td>image</td>
        </tr>
      </thead>
      <tbody>
        <?php $xml = simplexml_load_file("quotes.xml"); ?>
        <?php foreach($xml->children() as $quotes): ?>
          <tr>
              <td> <?php echo $quotes->text['category'];?> </td>
              <td> <?php echo $quotes->text;?> </td>
              <td> <?php echo $quotes->source;?> </td>
              <td> <?php echo $quotes->dob_dod;?> </td>
              <td> <?php echo $quotes->wplink;?> </td>
              <td> <img src="<?php echo $quotes->wplink;?>"> </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </body>
</html>
