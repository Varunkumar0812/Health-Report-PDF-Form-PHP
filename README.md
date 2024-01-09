# Health-Report-PDF-Form-PHP

A simple registration form followed a option to collect a PDF file from the user implmented using `PHP`. The register.php file is the registration form that gets user information and stores it in the MySQL database; it also stores the name of a pdf. The actual pdfs are stored in a repository called "pdfs".

The get_health_report.pdf feature later allows retrieval of the PDF when the email ID of the user is given. 

The MySQL Users table looks like 

|   Name      |  Age     |   Weight   |   Emailid                |  health_report  |
| :---: | :---: | :---: | :---: | :---: |
|Varunkumar   |19        |65          |varunkumarceg@gmail.com   |sample.pdf       |

