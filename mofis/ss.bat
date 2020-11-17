:loop
set fn=%random%.jpg
nircmd.exe cmdwait 10000 savescreenshot %fn%
magick.exe mogrify -resize 307x173 -path thumbnails/ %fn%
goto loop
 