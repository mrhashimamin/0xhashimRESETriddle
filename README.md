# 0xhahimRESETriddle
`0xhashimRESETriddle` is a Vulnerable Web Application. It consists of 4 labs, Each lab has a broken password reset function leads to `Account takeover (ATO)`

![0xhashimRESETriddle](https://github.com/mrhashimamin/0xhashimRESETriddle/blob/main/src/github%20(2).png?raw=true)  

# Requirements
- Python
- LAMP STACK

# Installation
1- Clone the repository at your localhost

`git clone https://github.com/mrhashimamin/0xhashimRESETriddle.git`

2- Initialize MYSQL Database using the setup.py script

`python setup.py`

![setup.py](https://github.com/mrhashimamin/0xhashimRESETriddle/blob/main/src/setup.png?raw=true)

3- Make a `phpmailer` directory at the lab directory & Clone the phpmailer repository inside the phpmailer directory

```
mkdir path-to-your-localhost/0xhashimRESETriddle/phpmailer
cd path-to-your-localhost/0xhashimRESETriddle/phpmailer
git clone https://github.com/PHPMailer/PHPMailer.git
cd PHPMailer/
mv * path-to-your-localhost/0xhashimRESETriddle/phpmailer/
cd ../
rmdir PHPMailer/
```

4- If you have modified MYSQL database username/password
```
nano path-to-your-localhost/0xhashimRESETriddle/backend/connect.php
// Modify MYSQL username/password as yours
```
![connect.php](https://github.com/mrhashimamin/0xhashimRESETriddle/blob/main/src/CONNECT.png?raw=true)

# Some images

![lab](https://github.com/mrhashimamin/0xhashimRESETriddle/blob/main/src/github%20(1).png?raw=true)

![lab](https://github.com/mrhashimamin/0xhashimRESETriddle/blob/main/src/github%20(3).png?raw=true)

# Solutions
To view the lab solutions, please visit the following link: [Solutions](https://medium.com/@hashimamin/0xhashimresetriddle-4f3270411800)
