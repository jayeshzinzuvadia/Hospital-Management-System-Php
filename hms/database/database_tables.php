<?php 
    require '_connection.php';
    $dbhandler=(new DBFactory())->DBHandler;
    try { /*       
        // Patient Table         
        $patient = "create table patient 
                    (
                        name VARCHAR(30) NOT NULL,
                        gender VARCHAR(7) NOT NULL,
                        address VARCHAR(50),
                        phoneno VARCHAR(11),
                        birthdate DATE,
                        imageurl VARCHAR(256),
                        p_email VARCHAR(30) UNIQUE NOT NULL,
                        password VARCHAR(15) UNIQUE NOT NULL,
                        PRIMARY KEY(p_email)
                    )";
        $exequery = $dbhandler->query($patient);
        echo "Patient Table is created successfully";
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Vimal','male','Rajkot',9624718289,'2000-10-07','/user1','vimal@gmail.com','vimal')";
        
        $exeinsquery=$dbhandler->query($patient);        
        */
        $doctor="insert into doctor(name,gender,degree,typeofdoctor,hospitaladdress,phoneno,birthdate,imageurl,d_email,password)"
                . "values('Harshil','male','MDS','Dentist','Ahmedabad',7424718289,'2000-10-25','images/default.png','harshil@gmail.com','harshil')";        
        $exeinsquery=$dbhandler->query($doctor);
        
        $doctor="insert into doctor(name,gender,degree,typeofdoctor,hospitaladdress,phoneno,birthdate,imageurl,d_email,password)"
                . "values('Darsh','male','B.Pharm','Pharmacy','Godhra',8624718289,'2001-10-25','images/default.png','darsh@gmail.com','darsh')";        
        $exeinsquery=$dbhandler->query($doctor);
        
        $doctor="insert into doctor(name,gender,degree,typeofdoctor,hospitaladdress,phoneno,birthdate,imageurl,d_email,password)"
                . "values('Luckyraj','male','Ayurvedic','Neurologist','Rajkot',8224718289,'1991-10-25','images/default.png','lucky@gmail.com','lucky')";        
        $exeinsquery=$dbhandler->query($doctor);
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Janak','male','Bagasra',7824718289,'2000-12-02','images/default.png','janak@gmail.com','janak')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Jayesh','male','Ruda Nagar 1, Street No.10, Rajkot',6353101260,'2000-10-07','images/default.png','jayesh@gmail.com','jayesh')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Janki','female','Vadodra',7224718289,'2000-1-02','images/default.png','janki@gmail.com','janki')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Jeet','male','Rajkot',7828718289,'2000-12-02','images/default.png','jeet@gmail.com','jeet')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Hitesh','male','Rajkot',7824718289,'1993-12-03','images/default.png','hitesh@gmail.com','hitesh')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Pooja','female','Kandorna',7724718289,'1998-12-02','images/default.png','pooja@gmail.com','pooja')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Nehal','female','Kandorna',7724718289,'2006-12-02','images/default.png','nehal@gmail.com','nehal')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Nirali','female','Popatpara',6365718289,'2002-09-02','images/default.png','nirali@gmail.com','nirali')";
        $exeinsquery=$dbhandler->query($patient);
        
        $patient="insert into patient(name,gender,address,phoneno,birthdate,imageurl,p_email,password)"
                . "values('Sahil','male','Sachin',9365718289,'2001-09-02','images/default.png','sahil@gmail.com','sahil')";
        $exeinsquery=$dbhandler->query($patient);
        
        /*
        // Doctor Table         
        $doctor = "create table doctor 
                    (
                        name VARCHAR(30) NOT NULL,
                        gender VARCHAR(7) NOT NULL,
                        degree VARCHAR(20),
                        typeofdoctor VARCHAR(20),
                        hospitaladdress VARCHAR(50),
                        phoneno VARCHAR(11),
                        birthdate DATE,
                        imageurl VARCHAR(256),
                        d_email VARCHAR(30) UNIQUE NOT NULL,
                        password VARCHAR(15) UNIQUE NOT NULL,
                        PRIMARY KEY(d_email)
                    )";
        $exequery = $dbhandler->query($doctor);
        echo "Doctor Table is created successfully";
        
        $doctor="insert into doctor(name,gender,degree,typeofdoctor,hospitaladdress,phoneno,birthdate,imageurl,d_email,password)"
                . "values('Ravi','male','MBBS','Cardiologist','Ahmedabad',9624718289,'2000-10-07','/user1','ravi@gmail.com','ravi')";
        
        $exeinsquery=$dbhandler->query($doctor);
        */
        
        
        // Patient Complaint Table 
        /*
        $patientcomplaint = "create table patientcomplaint 
                    (
                        case_id INT(11) AUTO_INCREMENT PRIMARY KEY,
                        p_email VARCHAR(30),
                        FOREIGN KEY(p_email) references patient(p_email),
                        chief_complaint VARCHAR(20),
                        description VARCHAR(50),
                        status VARCHAR(15),
                        d_email VARCHAR(30),
                        FOREIGN KEY(d_email) references doctor(d_email),
                        appointmenttime DATETIME,
                        prescription VARCHAR(40)
                    )";
        $exequery = $dbhandler->query($patientcomplaint);
        echo "PatientComplaint Table is created successfully";
        
        $patientcomplaint="insert into patientcomplaint(p_email,chief_complaint,description,status,d_email,appointmenttime,prescription)"
                . "values('vimal@gmail.com','Dengue','Fever since last week','checked','ravi@gmail.com','2020-02-18 9:30:00','Take Medicines Regularly')";
        $exeinsquery=$dbhandler->query($patientcomplaint);
        
        $patientcomplaint="insert into patientcomplaint(p_email,chief_complaint,description,status,d_email,appointmenttime,prescription)"
                . "values('vimal@gmail.com','High Fever','Fever from morning','pending','ravi@gmail.com',null,null)";
        $exeinsquery=$dbhandler->query($patientcomplaint);
        
        $patientcomplaint="insert into patientcomplaint(p_email,chief_complaint,description,status,d_email,appointmenttime,prescription)"
                . "values('vimal@gmail.com','High Fever','Fever from morning','confirmed','ravi@gmail.com','2020-01-15 10:30:00',null)";
        $exeinsquery=$dbhandler->query($patientcomplaint);
        
        $patientcomplaint="insert into patientcomplaint(p_email,chief_complaint,description,status,d_email,appointmenttime,prescription)"
                . "values('vimal@gmail.com','High Fever','Fever from morning','cancelled','ravi@gmail.com',null,null)";
        $exeinsquery=$dbhandler->query($patientcomplaint);
        
        $patientcomplaint="insert into patientcomplaint(p_email,chief_complaint,description,status,d_email,appointmenttime,prescription)"
                . "values('vimal@gmail.com','High Cold','Fever from morning','confirmed','ravi@gmail.com','2020-02-29 12:30:00',null)";
        $exeinsquery=$dbhandler->query($patientcomplaint);*/
    }
    catch (PDOException $e) 
    {
        echo $e->getMessage();
        die();
    }
?>