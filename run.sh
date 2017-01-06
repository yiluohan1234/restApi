#!/bin/bash
#######################################################################
	#'''	
	#> File Name: run.sh
	#> Author: cyf
	#> Mail: XXX@qq.com
	#> Created Time: Sun 25 Dec 2016 04:03:48 PM CST
	#'''	
#######################################################################

#set -x
pwd=`pwd`
#原来的文字
Name="Demo"
name="demo"
#将要替换成的文字
word=$1
Word=`echo $word|sed 's/^\w\|\s\w/\U&/g'`
#需要替换的文件
controller=$pwd"/app/Http/Controllers/Rest/"$Word"Controller.php"
model=$pwd"/app/Http/Model/"$Word".php"
html=$pwd"/resources/views/rest/"$word
html_add=$pwd"/resources/views/rest/"$word"/add.blade.php"
html_edit=$pwd"/resources/views/rest/"$word"/edit.blade.php"
html_index=$pwd"/resources/views/rest/"$word"/index.blade.php"
file_copy()
{
	cp $pwd/demo/controller.php $controller
	cp $pwd/demo/Demo.php $model
	mkdir -p $html
	cp $pwd/demo/html/add.blade.php $html_add
	cp $pwd/demo/html/edit.blade.php $html_edit
	cp $pwd/demo/html/index.blade.php $html_index
}
#将模板中的数据进行替换
replace_word()
{
	local file=$1
	cat $file | sed "s/$Name/$Word/g" |sed "s/$name/$word/g" >> ./tmp.php
	mv tmp.php $file
}
#创建数据库中的表
create_db()
{
	local name=$1
	local HOSTNAME="localhost"
	local PORT="3306"
	local USERNAME="root"
	local PASSWORD="199037"
	local DBNAME="monitor"
	local TABLENAME="monitor_$name"
	local MYSQL_CMD="mysql -h${HOSTNAME} -P${PORT} -u${USERNAME} -p${PASSWORD}"
	echo "create table ${TABLENAME}"
	local create_table_sql="CREATE TABLE IF NOT EXISTS ${TABLENAME}(api_id int(11) NOT NULL AUTO_INCREMENT COMMENT '//接口的id',api_name varchar(50) DEFAULT '' COMMENT '//接口的名字',api_description varchar(255) DEFAULT '' COMMENT '//接口的描述',api_url text COMMENT '//接口的url',api_wiki varchar(255) DEFAULT '' COMMENT '//接口的wiki地址',api_redmine varchar(255) DEFAULT '' COMMENT '//接口的redmine地址',api_time int(11) DEFAULT '0' COMMENT '//创建的时间',api_editor varchar(50) DEFAULT '' COMMENT '//接口作者',PRIMARY KEY (api_id)) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8"
	echo ${create_table_sql} | ${MYSQL_CMD} ${DBNAME}
	if [ $? -ne 0 ]
	then
		echo "create table ${DBNAME}.${TABLENAME} failed ..."
	fi
}
main()
{
	create_db $word
	file_copy
	replace_word $controller
	replace_word $model
	replace_word $html_add
	replace_word $html_edit
	replace_word $html_index
}
main
