FROM ubuntu:18.04

COPY sources.list /etc/apt/

# setup
RUN apt-get update && apt-get -y install xinetd
RUN apt-get -y install libssl-dev
RUN useradd -m --uid 31337 chall

# copy xinetd config and run
COPY xinetd /etc/xinetd.d/gdps
CMD ["/usr/sbin/xinetd", "-dontfork"]
