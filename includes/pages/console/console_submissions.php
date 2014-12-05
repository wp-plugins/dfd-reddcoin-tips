
<div style='position: relative; width: 20%; float: left; overflow: hidden; margin: 1%; border: 0px dotted green;'>
    
    <fieldset style='border: 2px solid #808080; color: #808080; width: 90%; padding: 4%;'>
        <legend style='font-weight: bold; color: #808080;'> Console Options </legend>
    
    <p><input class='console_toggles' type='radio' name='console_mode' value='create_new_user' title='Create a new user.' onfocus='
    toggle_console(this.value);
    ' <?php echo ( isset($_POST['console_mode']) && $_POST['console_mode'] == 'create_new_user' ? ' checked ' : '' ); ?> /> <span class='console_titles' title='Create a new user.'>Create New User</span></p>
    
    
    <p><input class='console_toggles' type='radio' name='console_mode' value='get_user_list' title='Get the full list of users on your ReddAPI account.' onfocus='
    toggle_console(this.value);
    ' <?php echo ( isset($_POST['console_mode']) && $_POST['console_mode'] == 'get_user_list' ? ' checked ' : '' ); ?> /> <span class='console_titles' title='Get the full list of users on your ReddAPI account.'>User List</span></p>
    
    
    <p><input class='console_toggles' type='radio' name='console_mode' value='get_user_info' title='Get all information for a specific user account.' onfocus='
    toggle_console(this.value);
    ' <?php echo ( isset($_POST['console_mode']) && $_POST['console_mode'] == 'get_user_info' ? ' checked ' : '' ); ?> /> <span class='console_titles' title='Get all information for a specific user account.'>User Info</span></p>
    
    
    <p><input class='console_toggles' type='radio' name='console_mode' value='send_to_address' title='Send Reddcoin to any other Reddcoin address.' onfocus='
    toggle_console(this.value);
    ' <?php echo ( isset($_POST['console_mode']) && $_POST['console_mode'] == 'send_to_address' ? ' checked ' : '' ); ?> /> <span class='console_titles' title='Send Reddcoin to any other Reddcoin address.'>Send To Address</span></p>
    
    
    <p><input class='console_toggles' type='radio' name='console_mode' value='move_to_user' title='Move Reddcoin to another user account within yor ReddAPI account.' onfocus='
    toggle_console(this.value);
    ' <?php echo ( isset($_POST['console_mode']) && $_POST['console_mode'] == 'move_to_user' ? ' checked ' : '' ); ?> /> <span class='console_titles' title='Move Reddcoin to another user account within yor ReddAPI account.'>Move To User</span></p>

        </fieldset>

</div>


<div style='position: relative; width: 75%; height: 250px; float: left; overflow: hidden; border: 0px dotted blue;'>



    <div id='id_create_new_user' style='display: none; position: absolute; padding: 3%; top: 0px; left: 0px;'>
    
    
    Create User: <input type='text' class='dfd_rdd_username' name='username_create' value='<?php echo trim($_POST['username_create']); ?>' />
    
     
    </div>





    <div id='id_get_user_list' style='display: none; position: absolute; padding: 3%; top: 0px; left: 0px;'>
    
    Get all user's data for this ReddAPI account
     
    </div>





    <div id='id_get_user_info' style='display: none; position: absolute; padding: 3%; top: 0px; left: 0px;'>
    
    Get user information: <input type='text' class='dfd_rdd_username' name='get_username_data' value='<?php echo trim($_POST['get_username_data']); ?>' />
     
    </div>





    <div id='id_send_to_address' style='display: none; position: absolute; padding: 3%; top: 0px; left: 0px;'>
    
    Send <input type='text' class='dfd_rdd_amount' name='send_external_amount' value='<?php echo trim($_POST['send_external_amount']); ?>' /> amount of Reddcoin<br /><br />
    To <i>external address</i> <input type='text' class='dfd_rdd_address' name='send_to_external_address' value='<?php echo trim($_POST['send_to_external_address']); ?>' /><br /><br />
    From internal username <input type='text' class='dfd_rdd_username' name='send_external_from_username' value='<?php echo trim($_POST['send_external_from_username']); ?>' />
     
    </div>





    <div id='id_move_to_user' style='display: none; position: absolute; padding: 3%; top: 0px; left: 0px;'>
    
    
    Send <input type='text' class='dfd_rdd_amount' name='send_internal_amount' value='<?php echo trim($_POST['send_internal_amount']); ?>' /> amount of Reddcoin<br /><br />
    To <i>internal username</i>&nbsp;&nbsp; <input type='text' class='dfd_rdd_username' name='send_internal_to_username' value='<?php echo trim($_POST['send_internal_to_username']); ?>' /><br /><br />
    From internal username <input type='text' class='dfd_rdd_username' name='send_internal_from_username' value='<?php echo trim($_POST['send_internal_from_username']); ?>' />
     
    </div>



</div>


<br clear='all' />
