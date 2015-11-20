<?php

convertToFlv( "/root/public_html/downloadmp3.cc/public/dmp3/Ransom.mpg", "/root/public_html/downloadmp3.cc/public/dmp3/test.mp3" );

function convertToFlv( $input, $output ) {
   echo "Converting $input to $output<br />";
   $command = "/usr/local/bin/ffmpeg -i $input -s 320x240 -ar 44100 -r 12 $output";
   $command = escapeshellarg($command);
   echo "$command<br />";
   exec($command, $outputs, $return_var);
   foreach($outputs as $mine) {
		echo "$mine<br />";
   }
   echo $return_var;
   echo "Converted<br />";
}

?>