<?php
    $file = "counter.db";
        
    if(file_exists($file))
    {
        $json = json_decode(file_get_contents($file),TRUE);
    }
    else
    {
        $json = [];
    }


    // Program to display URL of current page.
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else $link = "http";
      
    // Here append the common URL characters.
    $link .= "://";
      
    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];
      
    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];
      
    // Print the link
    $cur_link = $link;
