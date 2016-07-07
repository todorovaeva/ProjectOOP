<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>ADMINISTRATION</title>
 
<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />
 
</head>
<body>
    <div class="content">
        <h1><?php echo $title; ?></h1>
        <div class="data">
        <table>
            <tr>
                <td width="30%">ID</td>
                <td><?php echo $event->id; ?></td>
            </tr>
            <tr>
                <td valign="top">EVENT NAME</td>
                <td><?php echo $event->name; ?></td>
            </tr>
            <tr>
                <td valign="top">EVENT PRICE</td>
                <td><?php echo $event->price; ?></td>
            </tr>
            <tr>
                <td valign="top">EVENT DESCRIPTION</td>
                <td><?php echo $event->descr; ?></td>
            </tr>
            
            <tr>
                <td valign="top">START DATE (dd-mm-yyyy)</td>
                <td><?php echo date('d-m-Y',strtotime($event->dob)); ?></td>
            </tr>
            <tr>
                <td valign="top">END DATE (dd-mm-yyyy)</td>
                <td><?php echo date('d-m-Y',strtotime($event->end)); ?></td>
            </tr>

            

            <tr>
                <td valign="top">EVENT image1</td>
                <td><?php echo $event->image1; ?></td>
            </tr>
            <tr>
                <td valign="top">EVENT image2</td>
                <td><?php echo $event->image2; ?></td>
            </tr>
            <tr>
                <td valign="top">EVENT image3</td>
                <td><?php echo $event->image3; ?></td>
            </tr>
        </table>
        </div>
        <br />
        <?php echo $link_back; ?>
    </div>
</body>
</html>