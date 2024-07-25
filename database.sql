CREATE TABLE `app_doc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) DEFAULT NULL,
  `document_data` longblob,
  `upload_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `contacts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `emp_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(50) DEFAULT NULL,
  `flat_number1` int DEFAULT NULL,
  `facilities1` varchar(255) DEFAULT NULL,
  `owner_name1` varchar(255) DEFAULT NULL,
  `owner_contact1` varchar(20) DEFAULT NULL,
  `flat_number2` int DEFAULT NULL,
  `facilities2` varchar(255) DEFAULT NULL,
  `owner_name2` varchar(255) DEFAULT NULL,
  `owner_contact2` varchar(20) DEFAULT NULL,
  `flat_number3` int DEFAULT NULL,
  `facilities3` varchar(255) DEFAULT NULL,
  `owner_name3` varchar(255) DEFAULT NULL,
  `owner_contact3` varchar(20) DEFAULT NULL,
  `flat_number4` int DEFAULT NULL,
  `facilities4` varchar(255) DEFAULT NULL,
  `owner_name4` varchar(255) DEFAULT NULL,
  `owner_contact4` varchar(20) DEFAULT NULL,
  `flat_number5` int DEFAULT NULL,
  `facilities5` varchar(255) DEFAULT NULL,
  `owner_name5` varchar(255) DEFAULT NULL,
  `owner_contact5` varchar(20) DEFAULT NULL,
  `flat_number6` int DEFAULT NULL,
  `facilities6` varchar(255) DEFAULT NULL,
  `owner_name6` varchar(255) DEFAULT NULL,
  `owner_contact6` varchar(20) DEFAULT NULL,
  `flat_number7` int DEFAULT NULL,
  `facilities7` varchar(255) DEFAULT NULL,
  `owner_name7` varchar(255) DEFAULT NULL,
  `owner_contact7` varchar(20) DEFAULT NULL,
  `flat_number8` int DEFAULT NULL,
  `facilities8` varchar(255) DEFAULT NULL,
  `owner_name8` varchar(255) DEFAULT NULL,
  `owner_contact8` varchar(20) DEFAULT NULL,
  `flat_number9` int DEFAULT NULL,
  `facilities9` varchar(255) DEFAULT NULL,
  `owner_name9` varchar(255) DEFAULT NULL,
  `owner_contact9` varchar(20) DEFAULT NULL,
  `flat_number10` int DEFAULT NULL,
  `facilities10` varchar(255) DEFAULT NULL,
  `owner_name10` varchar(255) DEFAULT NULL,
  `owner_contact10` varchar(20) DEFAULT NULL,
  `numFlat` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_number_UNIQUE` (`registration_number`),
  CONSTRAINT `fk_emp_details_studentdetails_registration_number` FOREIGN KEY (`registration_number`) REFERENCES `studentdetails` (`registration_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `mentors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `other_expertise` varchar(255) DEFAULT NULL,
  `experience` int NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `studentdetails` (
  `registration_number` varchar(50) NOT NULL,
  `First_Name` varchar(100) DEFAULT NULL,
  `Fathers_Name` varchar(100) DEFAULT NULL,
  `Mothers_Name` varchar(100) DEFAULT NULL,
  `Address` text,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Alternate_Contact` varchar(15) DEFAULT NULL,
  `Qualification` varchar(100) NOT NULL,
  `Course_To_Be_Pursued` varchar(100) NOT NULL,
  `Institution` varchar(100) NOT NULL,
  `Academic_Year1` varchar(20) NOT NULL,
  `Course1` varchar(100) NOT NULL,
  `Term1` varchar(20) NOT NULL,
  `Marks_Obtained1` varchar(20) NOT NULL,
  `Academic_Year2` varchar(20) DEFAULT NULL,
  `Course2` varchar(100) DEFAULT NULL,
  `Term2` varchar(20) DEFAULT NULL,
  `Marks_Obtained2` varchar(20) DEFAULT NULL,
  `Academic_Year3` varchar(20) DEFAULT NULL,
  `Course3` varchar(100) DEFAULT NULL,
  `Term3` varchar(20) DEFAULT NULL,
  `Marks_Obtained3` varchar(20) DEFAULT NULL,
  `School_College_Fees` decimal(10,2) DEFAULT NULL,
  `Other_Amount_Payable_To_College` decimal(10,2) DEFAULT NULL,
  `All_Other_Expenses` decimal(10,2) DEFAULT NULL,
  `Total_Fees` decimal(10,2) DEFAULT NULL,
  `Relation` varchar(100) DEFAULT NULL,
  `Working_As` varchar(50) DEFAULT NULL,
  `Have_Laptop` varchar(3) DEFAULT NULL,
  `Have_PC` varchar(3) DEFAULT NULL,
  `Have_Online_Tuition` varchar(3) DEFAULT NULL,
  `Hobbies` varchar(100) DEFAULT NULL,
  `Ashraya_Support` varchar(50) DEFAULT NULL,
  `Scholarship_From_Ashraya_Past` int DEFAULT NULL,
  `Applied_For_Scholarship_Elsewhere` varchar(3) DEFAULT NULL,
  `Adhar` longblob,
  `marksheet` blob,
  `fee_rec` blob,
  `scholarship_amt` int DEFAULT NULL,
  PRIMARY KEY (`registration_number`),
  UNIQUE KEY `registration_number_UNIQUE` (`registration_number`),
  KEY `fk_studentdetails_users_email` (`Email`),
  CONSTRAINT `fk_studentdetails_users_email` FOREIGN KEY (`Email`) REFERENCES `users` (`email`),
  CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`registration_number`) REFERENCES `users` (`registration_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




CREATE TABLE `user_profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `phone` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `scholarship_amt` int unsigned DEFAULT NULL,
  `msg` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration_number_UNIQUE` (`registration_number`),
  KEY `FK_user_profile_email` (`email`),
  CONSTRAINT `FK_user_profile_email` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`registration_number`) REFERENCES `users` (`registration_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `valid` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`),
  UNIQUE KEY `registration_number` (`registration_number`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

