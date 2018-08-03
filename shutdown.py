import sys
#!/usr/bin/env python
import time
import select
import paramiko
import MySQLdb

db = MySQLdb.connect(host="localhost",user="root",passwd="7842555912",db="upsmon")
cur = db.cursor()
########################probing code here
cur.execute("SELECT * from data")
for each in cur.fetchall():
	u=each[1]
	b ="00:00:04"
	n="3s"
	s="ON"
	d = each[2]
	t="ON"
	cur.execute("""INSERT INTO info(upsip,bt,nextprobe,status,deviceip,dstatus) VALUES ('%s','%s','%s','%s','%s','%s')"""%(u,b,n,s,d,t))
	
########################till here

cur.execute("SELECT * from info")
for row in cur.fetchall():

	hours,minutes,seconds = str(row[2]).split(':')
	
	
	
		
	if(int(hours)==0 and int(minutes)==0 and int(seconds)<=5):
		ipadr = row[5]	
		uname = "saaishb"
	

		cur.execute("UPDATE info SET dstatus='%s' WHERE deviceip ='%s'"%('OFF',row[5]))
		ssh = paramiko.SSHClient()
		
		k= paramiko.RSAKey.from_private_key_file("test")
		ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
		ssh.connect(ipadr, username=uname, pkey=k)
		
		print " Connected to %s" % ipadr
		
		stdin, stdout, stderr = ssh.exec_command("sudo -S poweroff")


		

	



db.commit()
ssh.close()
