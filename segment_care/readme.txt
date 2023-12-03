Segment care: 

A Secured Online Medical Appointments Booking & Intrusion Detection System Powered by Twilio Segments & Amazon S3 Cloud Storage.


License: MIT Open Source

This Application is powered by Twilio Segment Services(Javascript API), Amazon S3 Cloud Storage, PHP, Mysql Database, Ajax, Jquery, Bootstraps etc...



Before you Start using this application, 

1.)  Please make sure that you have signed up with Twilio Segment (https://app.segment.com/signup) and have obtained or downloaded your generated 
Mimified Twilio Segment Javascript Code along with its API Keys.

2.) Make sure that you have signed up with Amazon S3 Cloud Storage (https://aws.amazon.com/s3/) and have created your Storage Bucket, 
and also have created and configure your IAM Credentials and must have connected your Twilio Segment Workspace with Your Amazon S3 Cloud Services..


Next: 

How to Install and Run the Application......


1.)You will need to install Xampp Server. After installation, ensure that PHP and Mysql Server has been started and Running from Xampp Control Panel.


2.) copy main application folder segment_care which contains the application codes to htdocs of the Xammp server. Eg. C:\xampp\htdocs\segment_care.


3.) open phpmyadmin interface  of the Xammpp Server Eg at http://localhost/phpmyadmin/ to create database name Eg. segment_care_db.

4.) Locate file segment_care_database.SQL to import 2 tables to Mysql Database you created above.


5.) Locate at Main directory and Edit twilio_segment.php file, then copy and paste your mimified Twilio Segment Javascript Code along with the API Keys and then save.


6.) Locate at Main directory and Edit twilio_segment_track_settings.php file to update and Set Twilio Segment Track name or title where appropriate.


7.) Locate at backend directory and Edit ../backend/data6rst.php (data6rst.php) file to reflect mysql database credentials.




It is time to test the app.


8.) Callup Browser at http://localhost/segment_care/index.php and the application will start running. Thanks.. 








