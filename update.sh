#!/usr/bin/env bash
export TGT_DIR=/home/vagrant/Zend/workspaces/DefaultWorkspace
echo "IMPORTANT: you need to run this as root user!"
echo "Updating software sources list ..."
apt-get -y update
echo "Updating Ubuntu packages ..."
echo "Just hit ENTER to accept the defaults when prompted:"
echo "Keep the local versions currently installed"
apt-get -y upgrade
echo "Updating phpMyAdmin ..."
tools/phpmyadmin_510.sh
echo "Updating PHP II source code ..."
cp -rf orderapp/* $TGT_DIR/orderapp
