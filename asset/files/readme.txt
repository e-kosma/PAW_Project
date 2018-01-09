192.168.10.8

-------Server------
Switch>enable
Switch#show vlan
Switch#conf
Switch(config)#vlan 10
Switch(config-vlan)#name akademik
Switch(config-vlan)#vlan 20
Switch(config-vlan)#name keuangan
Switch(config-vlan)#do show vlan
Switch(config-vlan)#exit
Switch(config)#vtp domain uin
Switch(config)#vtp password cisco
Switch(config)#vtp mode server
Switch(config)#do show vtp status
Switch(config)# hostname gedungA-server
gedungA-server(config)#

------Client-----
Switch>enable
Switch#show vlan
Switch#configure terminal
Switch(config)#hostname gedungB-client
gedungB-client(config)#vtp domain uin
gedungB-client(config)#vtp password cisco
gedungB-client(config)#vtp mode client
gedungB-client(config)#do show vtp
gedungB-client(config)#do show vlan
gedungB-client(config)#int fa0/1
gedungB-client(config-if)#switchport mode trunk
gedungB-client(config-if)#do show vlan

----Setting vlan----
switch>enable
switch#conf
switch(config)#int fa0/2
switch(config)#switchport mode access
switch(config)#switchport access vlan 10


--------------------------------------------------------------------------------------------------

Router>enable 
Router#configure terminal
Router(config)#interface fastEthernet 0/0.10
Router(config-subif)#encapsulation dot1Q 10
Router(config-subif)#ip address 192.168.1.1 255.255.255.0
Router(config-subif)#exit
Router(config)#interface fastEthernet 0/0.20
Router(config-subif)#encapsulation dot1Q 20
Router(config-subif)#ip address 192.168.2.1 255.255.255.0
Router(config-subif)#exit
Router(config)#interface fastEthernet 0/0
Router(config-if)#no shutdown
Router(config-if)#exit
Router(config)#exit
Router#copy running-config startup-config 
Destination filename [startup-config]? 
Building configuration...

 PC 0 : 
IP address  : 192.168.1.10
Subnet Mask : 255.255.255.0
Gateway : 192.168.1.1
PC 1 : 
IP address  : 192.168.2.10
Subnet Mask : 255.255.255.0
Gateway : 192.168.2.1
