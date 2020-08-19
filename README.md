### _Requirements_
1. php >= 7.3
2. mysql >= 8
3. apache >= 2.2
4. check if mysqli extension is installed
   if not, then :  sudo apt-get install php-mysql



### _Data Information_

1. ATP.csv contains raw data scrapped from ATP's official website.

2. Cleaning of Data is already done.

3. But if you want to check how, Just go to Data folder above and open Data_Minimalized.ipynb in jupyter notebook.
   (Jupyter notebook should be installed)

   jupyter notebook Data_Minimalized.ipynb

4. IMP:-  All Data is reduced using Database Concepts and some Common sense which is not so common.




### _Steps to Create and Run_   

*** If you want already created Database then dump file is available above , Then You can skip this.

1. Clone this repository (Dumb to write this but Still ...)
2. Now, we have to create a mysql Database using the reduced csv files in data folders or you can reduce given Data yourself.
3. Please Create a mysql user with : 
   Username : "username"
   Password : "password"
   
   You can follow below steps : 
   
   First open your mysql root user. 
   
   1. mysql -u root -p
   2. CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
   3. GRANT ALL PRIVILEGES ON * . * TO 'username'@'localhost';
   
   This work is Done.....
   
4. Open mysql user with username "username" and password "password".
   
   Now, Create a Database named "ATP" or whatever you like but just remember to edit in php files in Website.

5. Convert CSV files into Tables in ATP Database.
   You Can do it by this:
  
   See this : https://stackoverflow.com/questions/3635166/how-do-i-import-csv-file-into-a-mysql-table
  
6. If you followed every step carefully, Then you are good to go.

   You just have to set primary keys suitably for all the tables. (Don't Ignore this)
   
   

### _Steps for Viewing our progress in a Web Interface_

1. Just Copy the Website Folder above in /var/www/html
    
   open cloned Repo and write this:
   sudo cp -r Website /var/www/html/
 
 
2. Now, Start your Apache Server.
  
   sudo service apache2 start
   
   
3. Now, Just open any browser and open localhost/Website.

4. Just click on Stats on Top right side of front Web Page.

5. Enjoy the Data. Try different queries.
  


