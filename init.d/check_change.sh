#!/bin/bash

prev_modify_date=$(date +%s -r ~/Inscription/temp.txt)

while true
do
	cur_date=$(date +%s)
	cur_modify_date=$(date +%s -r ~/Inscription/temp.txt)
	if [ $cur_modify_date -ne $prev_modify_date ]
	then
		vlan=$(cat ~/Inscription/temp.txt | cut -d':' -f1 )
		interface=$(cat ~/Inscription/temp.txt | cut -d':' -f2)
		switch=$(cat ~/Inscription/temp.txt | cut -d':' -f3)
		echo "$vlan, $interface, $switch"
		prev_modify_date=$cur_modify_date
		ansible-playbook -i /home/six/ansible-hpe-cw7/hosts /home/six/ansible-hpe-cw7/hp-vlans.yml -e ansible_python_interpreter=/usr/bin/python2 --extra-vars "pvid=400 interface=GigabitEthernet1/0/2 host=hp1" > /var/www/html/Inscription/Page\ 1/log.txt
	fi
done

