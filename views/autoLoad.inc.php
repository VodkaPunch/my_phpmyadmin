<?php
function __autoload($className){

	$repClasses = array(
        'C:\wamp64\www\my_phpmyadmin/models/', 
        'C:\wamp64\www\my_phpmyadmin/controllers/'
    );

    # Count the total item in the array.
    $total_paths = count($repClasses);

    # Loop the array.
    for ($i = 0; $i < $total_paths; $i++) 
    {
        if(file_exists($repClasses[$i].$className.'.class.php')) 
        {
            require $repClasses[$i].$className.'.class.php';
        } 
    }
}
