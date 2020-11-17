REM tasklist /fi "MEMUSAGE gt 209600" > c:/list.txt
:loop
hostname > c:/host.txt
set /p USER=<c:/host.txt
REM set /p APPS=<c:/list.txt
set header="User: %USER%"
for /f "tokens=9 skip=1 delims=," %%i in ('tasklist /fi "imagename eq chrome.exe" /fo csv /v') do curl -X POST -H "Content-Type: text/plain" -H %header% --data-raw %%i http://monitor.local/api/save & goto done
:done
TIMEOUT /T 600
goto loop
REM set /p choice= "Please Select one of the above options :"