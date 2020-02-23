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
    vehicle_make varchar(255) NOT NULL,
    vehicle_model varchar(255) NOT NULL,
    vehicle_color varchar(255) NOT NULL,
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

