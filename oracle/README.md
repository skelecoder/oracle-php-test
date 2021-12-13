Oracle Standard Edition 12c Release 2
============================

### Credentials


Connect database with following setting:

    hostname: 178.18.252.38
    port: 1521
    sid: xe
    service name: xe
    username: system
    password: oracle

To connect using sqlplus:

<pre>
sudo docker exec -it 4f7143973659 sh
sqlplus system/oracle@//178.18.252.38:1521/xe
</pre>

Password for SYS & SYSTEM:

    oracle

Connect to Oracle Application Express web management console with following settings:

    http://178.18.252.38:8080/apex
    workspace: INTERNAL
    user: ADMIN
    password: T#nger2021


Connect to Oracle Enterprise Management console with following settings:

    http://178.18.252.38:8080/em
    user: sys
    password: oracle
    connect as sysdba: true
