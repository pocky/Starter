#!/bin/bash -eux

apt-get update
apt-get install -y python-dev python-pip ssh-pass
pip install ansible