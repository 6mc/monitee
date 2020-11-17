:loop
set fn=%random%.jpg
nircmd.exe cmdwait 10000 savescreenshot %fn%
goto loop
 