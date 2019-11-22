FROM ubuntu:18.04
RUN apt-get update
RUN apt-get install -y rsnapshot mysql-client
RUN mkdir /db-backups

CMD exec /bin/bash -c "trap : TERM INT; sleep infinity & wait"
