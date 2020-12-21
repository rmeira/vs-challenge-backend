# VS Challenge

This project contain the backend app for "VS Challenge" read more in (CHALLENGE)[./CHALLENGE.md]

# Installation

For running this project you need to install Docker and Docker Swarm Cluster(if you don't want to running with Docker swarm, just running in docker-compose).

The steps below are for the Ubuntu 20.04
```shell

# To install docker on linux ubuntu
curl -sSL https://get.docker.com/ | sh
sudo usermod -aG docker <you user>

# Reboot your pc

# Disabled IPV6
sudo vim /etc/sysctl.conf

# Add this lines on the end of the file sysctl.conf
net.ipv6.conf.all.disable_ipv6 = 1
net.ipv6.conf.default.disable_ipv6 = 1
net.ipv6.conf.lo.disable_ipv6 = 1

# For activate running the command bellow
sudo sysctl -p

# Now lets init docker swarm
docker swarm init

# For init the project running the command bellow
docker stack deploy --compose-file docker-compose.yml vs-challenge

# For stop the project
docker stack rm challenge

```


