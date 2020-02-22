CREATE TABLE customer (
    customer_id SERIAL PRIMARY KEY,
    customer_name varchar(255) NOT NULL UNIQUE,
    customer_email varchar(255) NOT NULL UNIQUE
);

CREATE TABLE technician (
    technician_id SERIAL PRIMARY KEY,
    technician_name varchar(255) NOT NULL UNIQUE
);

CREATE TABLE vehicle (
    vehicle_id SERIAL PRIMARY KEY,
    vehicle_make varchar(255) NOT NULL UNIQUE,
    vehicle_model varchar(255) NOT NULL UNIQUE,
    vehicle_color varchar(255) NOT NULL UNIQUE,
    vehicle_license_plate varchar(255) NOT NULL UNIQUE,
    customer_id integer NOT NULL REFERENCES customer (customer_id)
);

CREATE TABLE notes (
    note_id SERIAL PRIMARY KEY,
    note_text varchar(255) NOT NULL UNIQUE,
    technician_id integer NOT NULL REFERENCES technician (technician_id),
    vehicle_id integer NOT NULL REFERENCES vehicle (vehicle_id)
)

CREATE TABLE appointment (
    appointment_id SERIAL PRIMARY KEY,
    appointment_date varchar(255) NOT NULL UNIQUE,
    appointment_time varchar(255) NOT NULL UNIQUE,
    appointmet_type varchar(255) NOT NULL UNIQUE,
    appointment_est_cost integer NOT NULL UNIQUE,
    appointment_vehicle_id integer NOT NULL REFERENCES vehicle (vehicle_id),
    appointment_customer_id integer NOT NULL REFERENCES customer (customer_id),
    appointment_remind_next_apt DATE NOT NULL DEFAULT CURRENT_DATE,
    appointment_working_tech_id integer NOT NULL REFERENCES technician (technician_id)
);


ALTER TABLE appointment  
   ADD COLUMN appointment_working_tech_id integer NOT NULL REFERENCES employees (employee_id) DEFAULT 9


SELECT a.appointment_id, a.appointment_date, a.appointment_time, a.appointmet_type, v.vehicle_make, v.vehicle_model, e.employee_name, es.employee_name FROM appointment a 
JOIN vehicle v ON a.appointment_vehicle_id = v.vehicle_id 
JOIN customer c ON a.appointment_customer_id = c.customer_id 
JOIN employees e ON a.appointment_working_tech_id = e.employee_id
JOIN employees es ON a.service_advisor_id = es.employee_id
WHERE c.customer_name = 'John Doe'


INSERT INTO appointment 
(appointment_time, appointmet_type, appointment_est_cost, appointment_vehicle_id, appointment_customer_id, appointment_remind_next_apt, appointment_working_tech_id, service_advisor_id, appointment_date)
VALUES ('11:00 AM', 'Tire Rotation', '75', 2, 3, '06-29-2020', 11, 5, '02-25-2020')