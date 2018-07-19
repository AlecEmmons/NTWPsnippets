function auto_copyright($year = 'auto'){ 
    if(intval($year) == 'auto'){ $year = date('Y'); } 
    if(intval($year) == date('Y')){ echo intval($year); } 
    if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); } 
    if(intval($year) > date('Y')){ echo date('Y'); } 
 }
