CREATE TABLE config (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(50) NOT NULL, update_server VARCHAR(255) NOT NULL, wireless_channel SMALLINT, wireless_mode ENUM('auto', 'B', 'G', 'N') DEFAULT 'auto' NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE device (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(50) NOT NULL, config_id INT UNSIGNED NOT NULL, certificate_name VARCHAR(50) NOT NULL, INDEX cert_name_idx (certificate_name), INDEX config_id_idx (config_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE dhcp_server (id INT UNSIGNED AUTO_INCREMENT, mode3_id INT UNSIGNED NOT NULL, ip VARCHAR(15), INDEX mode3_id_idx (mode3_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mode1 (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(32) NOT NULL, wpa_mode ENUM('wpa', 'wpa2', 'off') DEFAULT 'wpa2' NOT NULL, vlan SMALLINT, broadcast TINYINT(1) DEFAULT '1' NOT NULL, passphrase VARCHAR(255), group_rekey_interval INT NOT NULL, strict_rekey TINYINT(1) NOT NULL, config_id INT UNSIGNED NOT NULL, INDEX config_id_idx (config_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mode2 (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(32) NOT NULL, wpa_mode ENUM('wpa', 'wpa2', 'off') DEFAULT 'wpa2' NOT NULL, vlan SMALLINT, broadcast TINYINT(1) DEFAULT '1' NOT NULL, passphrase VARCHAR(255), group_rekey_interval INT NOT NULL, strict_rekey TINYINT(1) NOT NULL, retry_interval INT UNSIGNED NOT NULL, own_ip VARCHAR(15) NOT NULL, nas_identifier VARCHAR(48) NOT NULL, radius_auth_ip VARCHAR(15) NOT NULL, radius_auth_port MEDIUMINT UNSIGNED NOT NULL, radius_auth_shared_secret VARCHAR(255) NOT NULL, radius_acct_ip VARCHAR(15) NOT NULL, radius_acct_port MEDIUMINT UNSIGNED NOT NULL, radius_acct_shared_secret VARCHAR(255) NOT NULL, radius_acct_interim_interval MEDIUMINT UNSIGNED NOT NULL, config_id INT UNSIGNED NOT NULL, file_name VARCHAR(255) NOT NULL, INDEX config_id_idx (config_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mode3 (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(32) NOT NULL, wpa_mode ENUM('wpa', 'wpa2', 'off') DEFAULT 'wpa2' NOT NULL, vlan SMALLINT, broadcast TINYINT(1) DEFAULT '1' NOT NULL, passphrase VARCHAR(255), group_rekey_interval INT NOT NULL, strict_rekey TINYINT(1) NOT NULL, retry_interval INT UNSIGNED NOT NULL, own_ip VARCHAR(15) NOT NULL, nas_identifier VARCHAR(48) NOT NULL, radius_auth_ip VARCHAR(15) NOT NULL, radius_auth_port MEDIUMINT UNSIGNED NOT NULL, radius_auth_shared_secret VARCHAR(255) NOT NULL, radius_acct_ip VARCHAR(15) NOT NULL, radius_acct_port MEDIUMINT UNSIGNED NOT NULL, radius_acct_shared_secret VARCHAR(255) NOT NULL, radius_acct_interim_interval MEDIUMINT UNSIGNED NOT NULL, config_id INT UNSIGNED NOT NULL, dhcp_hw_interface VARCHAR(5) NOT NULL, vpn_auth_server VARCHAR(255) NOT NULL, vpn_auth_port MEDIUMINT UNSIGNED NOT NULL, vpn_auth_cipher ENUM('DES-CBC', 'AES-128-CBC', 'AES-192-CBC', 'AES-256-CBC', 'BF-CBC') DEFAULT 'AES-128-CBC' NOT NULL, vpn_auth_compression TINYINT(1) NOT NULL, vpn_data_server VARCHAR(255) NOT NULL, vpn_data_port MEDIUMINT UNSIGNED NOT NULL, vpn_data_cipher ENUM('DES-CBC', 'AES-128-CBC', 'AES-192-CBC', 'AES-256-CBC', 'BF-CBC') DEFAULT 'AES-128-CBC' NOT NULL, vpn_data_compression TINYINT(1) NOT NULL, INDEX config_id_idx (config_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE mode3_certificate (id INT UNSIGNED AUTO_INCREMENT, mode3_id INT UNSIGNED NOT NULL, device_id INT UNSIGNED NOT NULL, public_key_name VARCHAR(255) NOT NULL, public_key TEXT NOT NULL, private_key_name VARCHAR(255) NOT NULL, private_key TEXT NOT NULL, cert_of_authority TEXT NOT NULL, INDEX unique_mode3_device_idx (mode3_id, device_id), INDEX mode3_id_idx (mode3_id), INDEX device_id_idx (device_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE radius_ssid (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(32) NOT NULL, wpa_mode ENUM('wpa', 'wpa2', 'off') DEFAULT 'wpa2' NOT NULL, vlan SMALLINT, broadcast TINYINT(1) DEFAULT '1' NOT NULL, passphrase VARCHAR(255), group_rekey_interval INT NOT NULL, strict_rekey TINYINT(1) NOT NULL, retry_interval INT UNSIGNED NOT NULL, own_ip VARCHAR(15) NOT NULL, nas_identifier VARCHAR(48) NOT NULL, radius_auth_ip VARCHAR(15) NOT NULL, radius_auth_port MEDIUMINT UNSIGNED NOT NULL, radius_auth_shared_secret VARCHAR(255) NOT NULL, radius_acct_ip VARCHAR(15) NOT NULL, radius_acct_port MEDIUMINT UNSIGNED NOT NULL, radius_acct_shared_secret VARCHAR(255) NOT NULL, radius_acct_interim_interval MEDIUMINT UNSIGNED NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE ssid (id INT UNSIGNED AUTO_INCREMENT, name VARCHAR(32) NOT NULL, wpa_mode ENUM('wpa', 'wpa2', 'off') DEFAULT 'wpa2' NOT NULL, vlan SMALLINT, broadcast TINYINT(1) DEFAULT '1' NOT NULL, passphrase VARCHAR(255), group_rekey_interval INT NOT NULL, strict_rekey TINYINT(1) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE device ADD CONSTRAINT device_config_id_config_id FOREIGN KEY (config_id) REFERENCES config(id);
ALTER TABLE dhcp_server ADD CONSTRAINT dhcp_server_mode3_id_mode3_id FOREIGN KEY (mode3_id) REFERENCES mode3(id);
ALTER TABLE mode1 ADD CONSTRAINT mode1_config_id_config_id FOREIGN KEY (config_id) REFERENCES config(id);
ALTER TABLE mode2 ADD CONSTRAINT mode2_config_id_config_id FOREIGN KEY (config_id) REFERENCES config(id);
ALTER TABLE mode3 ADD CONSTRAINT mode3_config_id_config_id FOREIGN KEY (config_id) REFERENCES config(id);
ALTER TABLE mode3_certificate ADD CONSTRAINT mode3_certificate_mode3_id_mode3_id FOREIGN KEY (mode3_id) REFERENCES mode3(id);
ALTER TABLE mode3_certificate ADD CONSTRAINT mode3_certificate_device_id_device_id FOREIGN KEY (device_id) REFERENCES device(id);
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
