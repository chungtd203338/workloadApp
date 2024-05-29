#!/bin/bash
name="chung123abc/webapp:v1.0"
docker build -t $name .
docker push $name
# hostPort=28080
# memlimit="4096m"
# echo "docker run --memory $memlimit -d -p $hostPort:8080 $name" 
