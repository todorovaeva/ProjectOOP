<?php
echo validation_errors();
echo "<h1> Register your username and password</h1>";
echo form_open('login/index');
echo"<p>Enter username</p>";
echo form_input('username');
echo"<p>Enter passowrd</p>";
echo form_password('password');
echo form_submit('submit', 'Save');
echo form_close();
echo "<h1> If you have username and password</h1>";
echo "<p>".anchor('login/log_in', 'Login')."</p>";
