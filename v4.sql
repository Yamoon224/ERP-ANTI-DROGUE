
-- ======================
-- ERP DATABASE STRUCTURE (Extended with User Roles)
-- ======================

-- USER ROLES TABLE
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    name VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- EMPLOYEES TABLE
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    phone VARCHAR(20),
    employee_type ENUM('officer', 'civil_agent') NOT NULL,
    status ENUM('active', 'sick', 'retired', 'on_leave', 'in_training', 'dismissed') DEFAULT 'active',
    hire_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- USERS TABLE
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    employee_id INT,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL
);


-- EQUIPMENT ASSIGNMENTS
CREATE TABLE equipment_assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    employee_id INT,
    equipment_name VARCHAR(255),
    quantity INT DEFAULT 1,
    assignment_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE
);

-- APPOINTMENTS
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    employee_id INT,
    appointment_type ENUM('internal', 'external'),
    subject VARCHAR(255),
    appointment_date DATETIME,
    location VARCHAR(255),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE SET NULL
);

-- INCOMING MAIL
CREATE TABLE incoming_mails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    sender_name VARCHAR(255),
    subject VARCHAR(255),
    content TEXT,
    reception_date DATE,
    reference_code VARCHAR(100),
    attached_file VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- OUTGOING MAIL
CREATE TABLE outgoing_mails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    receiver_name VARCHAR(255),
    subject VARCHAR(255),
    content TEXT,
    send_date DATE,
    reference_code VARCHAR(100),
    attached_file VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- SUMMONS
CREATE TABLE summons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    person_name VARCHAR(255),
    person_contact VARCHAR(100),
    fingerprint_hash VARCHAR(255),
    photo_profile VARCHAR(255),
    photo_left_angle VARCHAR(255),
    photo_right_angle VARCHAR(255),
    reason TEXT,
    scheduled_date DATETIME,
    status ENUM('pending', 'honored', 'missed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- INTERPELLATIONS
CREATE TABLE arrests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    suspect_name VARCHAR(255),
    arrest_date DATETIME,
    arrest_location VARCHAR(255),
    reason TEXT,
    arrest_type ENUM('flagrant', 'warrant', 'control', 'complaint'),
    officer_id INT,
    resistance BOOLEAN DEFAULT FALSE,
    injuries TEXT,
    witness_present BOOLEAN DEFAULT FALSE,
    witness_name VARCHAR(255),
    follow_up ENUM('released', 'custody', 'prosecuted', 'hospitalized') DEFAULT 'custody',
    report_file VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (officer_id) REFERENCES employees(id) ON DELETE SET NULL
);

-- AUDITIONS
CREATE TABLE hearings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    suspect_name VARCHAR(255),
    officer_id INT,
    summon_id INT,
    hearing_date DATETIME,
    location VARCHAR(255),
    topic VARCHAR(255),
    statement TEXT,
    lawyer_present BOOLEAN DEFAULT FALSE,
    lawyer_name VARCHAR(255),
    duration_minutes INT,
    transcript_file VARCHAR(255),
    result ENUM('released', 'custody', 'prosecuted', 'no_action') DEFAULT 'no_action',
    remarks TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (officer_id) REFERENCES employees(id) ON DELETE SET NULL,
    FOREIGN KEY (summon_id) REFERENCES summons(id) ON DELETE SET NULL
);