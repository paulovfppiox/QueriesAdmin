<?php
if ( true ) { // First missing if
	echo 'Ok1!';
    if ( true ) { // Second missing if
    	echo 'Ok2!';
    } else { // Report the errors.
    
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></p>';
        
    } // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>