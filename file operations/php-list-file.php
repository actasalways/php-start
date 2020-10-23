<?php

/*
    scandir()
    glob()
*/

#$folders =array_filter(scandir('.'), 'is_dir');
#print_r($folders);


#$folders = glob('*', GLOB_ONLYDIR);
#$folders = glob('*/');
#$folders = glob('*{/,php,txt}', GLOB_BRACE);
#print_r($folders);
 
function _list_file($folder_name){
    $folders = scandir($folder_name);
    #print_r($folders);
    echo '<ul>';
        foreach ($folders as $folder){
            if(!in_array($folder, ['.', '..'])){
                echo '<li>'. $folder;
                    if(is_dir($folder_name. '/'. $folder)){
                        _list_file($folder_name. '/'. $folder);
                    }
                
                echo '</li>';
            }
        }
    echo '</ul>';

}

# _list_file('.');

function _list_file_glob($folder_name)
{  
    echo '<ul>';
         $folders = glob($folder_name);
        foreach ($folders as $folder){
            echo '<li>'.$folder;
                if(is_dir($folder)){
                    _list_file_glob($folder.'/*');
                }
            echo '</li>';
        }

    echo '</ul>'; 
}

_list_file_glob('*');

