CREATE TABLE admins (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'ADMIN'
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    full_name VARCHAR(100),
    device_mac VARCHAR(50),
    bandwidth_used_mb INT DEFAULT 0,
    created_at DATE DEFAULT CURRENT_DATE
);

CREATE TABLE daily_usage (
    id SERIAL PRIMARY KEY,
    usage_date DATE,
    total_bandwidth_mb INT
);

INSERT INTO admins (username, password, role)
VALUES ('admin', crypt('admin123', gen_salt('bf')), 'SUPER');
