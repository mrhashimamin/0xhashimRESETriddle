# Imports
import mysql.connector
from mysql.connector import errorcode
import subprocess
import sys

# Defines
def install(package):
    subprocess.check_call([sys.executable, "-m", "pip", "install", package])

# List of packages to install
required_packages = ['pyfiglet', 'termcolor', 'mysql-connector-python']

# Install each package
for package in required_packages:
    try:
        __import__(package)
    except ImportError:
        install(package)

# Imports after install
import pyfiglet as PF
from termcolor import colored

# Welcome message
print("="*105)
print(colored(PF.figlet_format('0xhashimRESETriddle',font='standard',width=200),"yellow"))
print(colored("                                     By: mrhashimamin","magenta"))
print("="*105)

# INFO
print(colored("""If there's any problem with installing the lab check these requirements and try again""","yellow"))
print("[Windows] => XAMPP or any web server that can deal with {PHP, MYSQL} ")
print("[Linux] => Apache2 , MYSQL ")
print(colored("""Note: Clone the repo to your localhost and then run this script""","blue"))
print("="*105)

# Database configuration
db_username=input(colored("MYSQL database username (if you didn't modify one just press ENTER): ","cyan"))
db_password=input(colored("MYSQL database password (if you didn't modify one just press ENTER): ","yellow"))
print("="*105)

if db_username.strip() == '':
    config = {
        'user': 'root',
        'password': db_password,
        'host': 'localhost',
        'raise_on_warnings': True
    }
else:
    config = {
        'user': db_username,
        'password': db_password,
        'host': 'localhost',
        'raise_on_warnings': True
    }

# Connect to MySQL
try:
    conn = mysql.connector.connect(**config)
    cursor = conn.cursor()
    print(colored("Successfully connected to MySQL","green"))

    # Create the database
    cursor.execute("CREATE DATABASE IF NOT EXISTS 0xhashimRESETriddle")
    print(colored("Database '0xhashimRESETriddle' created successfully","green"))

    # Use the new database
    cursor.execute("USE 0xhashimRESETriddle")

    # Create the users table
    create_users_table = """
    CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    usermail VARCHAR(50) NOT NULL,
    userpass VARCHAR(20) NOT NULL,
    reset_token VARCHAR(64) NULL,
    reset_otp INT(4) NULL,
    att_counter INT(1),
    user_ip VARCHAR(100) NULL
    )
    """
    cursor.execute(create_users_table)
    print(colored("Table 'users' created successfully","green"))

    # Insert some default users
    add_user = (
        "INSERT INTO users (username, usermail, userpass) "
        "VALUES (%s, %s, %s)"
    )
    users = [
        ('foo1', 'foo1@hashimresetriddle.foo', '0'),
    ('foo2', 'foo2@hashimresetriddle.foo', '0'),
    ('foo3', 'foo3@hashimresetriddle.foo', '0'),
    ('foo4', 'foo4@hashimresetriddle.foo', '0'),
    ('foo5', 'foo5@hashimresetriddle.foo', '0')
    ]
    cursor.executemany(add_user, users)
    conn.commit()
    print(colored("Default users inserted successfully","green"))
    print("="*105)

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print(colored("Something is wrong with MYSQL username or password","red"))
        print("="*105)
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print(colored("Database does not exist","red"))
        print("="*105)
    else:
        print(colored(err,"red"))
        print("="*105)
else:
    cursor.close()
    conn.close()
    print(colored("Everything is fine, Enjoy the lab!","magenta"))
    print("="*105)