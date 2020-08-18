# For running on your localhost

# Requirements
1. php >= 7.3
2. mysql >= 8
3. apache >= 2.2
4. check if mysqli extension is installed
   if not, then :  sudo apt-get install php-mysql


# Data Information

ATP.csv contains raw data scrapped from ATP's official website.

Cleaning of Data is already done.

But if you want to check how, Just go to Data folder above and open Data_Minimalized.ipynb in jupyter notebook.
(Jupyter notebook should be installed)

jupyter notebook Data_Minimalized.ipynb

IMP:-  All Data is reduced using Database Concepts and some Common sense which is not so common.


# Steps to Create and Run   (If you want already created Database then dump file is available above)

1. Clone this repository (Dumb to write this but Still ...)
2. Now, we have to create a mysql Database using the reduced csv files in data folders or you can reduce given Data yourself.
3. Please Create a mysql user with : 
   Username : "username"
   Password : "password"
   
   You can follow below steps : 
   
   First open your mysql root user. 
   
   A. mysql -u root -p
   B. CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
   C. GRANT ALL PRIVILEGES ON * . * TO 'username'@'localhost';
   
   This work is Done.....
   
4. Open mysql user with username "username" and password "password".
   
   Now, Create a Database named "ATP" or whatever you like but just remember to edit in php files in Website.

5. Convert CSV files into Tables in ATP Database.
   You Can do it by this:
  
  See this : https://stackoverflow.com/questions/3635166/how-do-i-import-csv-file-into-a-mysql-table
  
6. If you followed every step carefully, Then you are good to go.

   You just have to set primary keys suitably for all the tables. (Don't Ignore this)
   
   

# Steps for Viewing our progress in a Web Interface

1. Just Copy the Website Folder above in /var/www/html
    
   open cloned Repo and write this:
   sudo cp -r Website /var/www/html/
 
 
2. Now, Start your Apache Server.
  
   sudo service apache2 start
   
   
3. Now, Just open any browser and open localhost/Website.

4. Just click on Stats on Top right side of front Web Page.

5. Enjoy the Data. Try different queries.
  


