CREATE TABLE stream_demographics (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            artist_id INT(6) UNSIGNED NOT NULL,
            recorded_at DATE NOT NULL,
            gender ENUM('F', 'M') NOT NULL,
            stream_count INT(7) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create index IX_stream_demographics_artist_id on stream_demographics(artist_id) using HASH;

CREATE INDEX IX_stream_demographics_recorded_at on stream_demographics(recorded_at) using BTREE;
