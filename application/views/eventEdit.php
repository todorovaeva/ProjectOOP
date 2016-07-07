<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>SIMPLE CRUD APPLICATION</title>
 
<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />
 
<link href="<?php echo base_url(); ?>style/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>script/calendar.js"></script>
 
</head>
<body>
    <div class="content">
        <h1><?php echo $title; ?></h1>
        <?php echo $message; ?>
        <form method="post" action="<?php echo $action; ?>">
        <div class="data">
        <table>
            <tr>
                <td width="30%">ID</td>
                <td><input type="text" name="id" disabled="disable" class="text" value="<?php echo $this->validation->id; ?>"/></td>
                <input type="hidden" name="id" value="<?php echo $this->validation->id; ?>"/>
            </tr>
            <tr>
                <td valign="top">EVENT NAME<span style="color:red;">*</span></td>
                <td><input type="text" name="name" class="text" value="<?php echo $this->validation->name; ?>"/>
                <?php echo $this->validation->name_error; ?></td>
            </tr>
            <tr>
                <td valign="top">EVENT PRICE<span style="color:red;">*</span></td>
                <td><input type="text" name="price" class="text" value="<?php echo $this->validation->price; ?>"/>
                <?php echo $this->validation->price_error; ?></td>
            </tr>

            <tr>
                <td valign="top">EVENT DESCRIPTION<span style="color:red;">*</span></td>
                <td><input type="text" name="descr" class="text" value="<?php echo $this->validation->descr; ?>"/>
                <?php echo $this->validation->descr_error; ?></td>
            </tr>
            
            <tr>
                <td valign="top">Start Date (dd-mm-yyyy)<span style="color:red;">*</span></td>
                <td><input type="text" name="dob" onclick="displayDatePicker('dob');" class="text" value="<?php echo $this->validation->dob; ?>"/>
                <a href="javascript:void(0);" onclick="displayDatePicker('dob');"><img src="<?php echo base_url(); ?>style/images/calendar.png" alt="calendar" border="0"></a>
                <?php echo $this->validation->dob_error; ?></td>
            </tr>

            <tr>
                <td valign="top">End Date (dd-mm-yyyy)<span style="color:red;">*</span></td>
                <td><input type="text" name="end" onclick="displayDatePicker('end');" class="text" value="<?php echo $this->validation->end; ?>"/>
                <a href="javascript:void(0);" onclick="displayDatePicker('end');"><img src="<?php echo base_url(); ?>style/images/calendar.png" alt="calendar" border="0"></a>
                <?php echo $this->validation->end_error; ?></td>
            </tr>
            <tr>
                <td valign="top">EVENT Image1<span style="color:red;">*</span></td>
                <td><input type="file" name="image1"  value=""/>
                </td>
            </tr>
            <tr>
                <td valign="top">EVENT Image2<span style="color:red;">*</span></td>
                <td><input type="file" name="image2"  value=""/>
                </td>
            </tr>
            <tr>
                <td valign="top">EVENT Image3<span style="color:red;">*</span></td>
                <td><input type="file" name="image3"  value=""/>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Save"/></td>
            </tr>
        </table>
        </div>
        </form>
        <br />
        <?php echo $link_back; ?>
    </div>
</body>
</html>