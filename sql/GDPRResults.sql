CREATE TABLE GDPRResults (
id int REFERENCES GDPRResultsIndex(id),
question VARCHAR(50),
answer VARCHAR(50)

)

CREATE TABLE GDPRResultsIndex (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ts datetime
)
