:loop
hostname > c:/host.txt
set /p USER=<c:/host.txt
set form="pc=%USER%"
rem curl -F "data=@aa.jpg" -F %form% http://localhost:8080/api/photo
for /f %%i in ('dir *jpg /b') do curl -F "data=@%%i" -F %form% http://localhost:8080/api/photo
TIMEOUT /T 600
goto loop


rem Deneme curl -F 'data=@%USERPROFILE%\Desktop\mofis\aa.jpg' https://8ff6fabc98d4707f3588dde65fe86bf9.m.pipedream.net
