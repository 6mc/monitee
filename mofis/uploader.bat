:loop
hostname > c:/host.txt
set /p USER=<c:/host.txt
set form="pc=%USER%"
rem for /f %%i in ('dir *jpg /b') do(
rem set file=%%i
rem goto send
rem )
FOR /F %%i IN ('dir *jpg /b /O-D') DO (
    SET file=%%i
    GOTO send
)
:send
rem %file%
curl -F "data=@%file%" -F %form% http://monitor.local/api/photo
TIMEOUT /T 1
goto loop