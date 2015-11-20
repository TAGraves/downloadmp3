<?php
// Set our source file
$srcFile = "/path/to/clock.avi";
$destFile = "/path/to/clock.flv";
$ffmpegPath = "/path/to/ffmpeg";
$flvtool2Path = "/path/to/flvtool2";
// Create our FFMPEG-PHP class
$ffmpegObj = new ffmpeg_movie($srcFile);
// Save our needed variables
$srcWidth = makeMultipleTwo($ffmpegObj->getFrameWidth());
$srcHeight = makeMultipleTwo($ffmpegObj->getFrameHeight());
$srcFPS = $ffmpegObj->getFrameRate();
$srcAB = intval($ffmpegObj->getAudioBitRate()/1000);
$srcAR = $ffmpegObj->getAudioSampleRate();
// Call our convert using exec()
exec($ffmpegPath . " -i " . $srcFile . " -ar " . $srcAR . " -ab " . $srcAB . " -f flv -s " . $srcWidth . "x" . $srcHeight . " " . $destFile . " | " . $flvtool2Path . " -U stdin " . $destFile);
// Make multiples function
function makeMultipleTwo ($value)
{
$sType = gettype($value/2);
if($sType == "integer")
{
return $value;
} else {
return ($value-1);
}
}
?>

