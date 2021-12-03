# aCTF6 Writeup

**Challenge 1 : gdpsv2**

Couldn't solve this one. Since no other team solved it either, Wireshark wasn't an option.

**Challenge 2 : ghorme_sabzi**

We figured that admin access cannot be granted since the isAdmin variable isn't set by a GET operation. Next approach was to use the 'userAccessField' method. We understood what the program was doing fully but couldn't exploit the password check when ssn or password was supplied as the key. Since no other team solved it either, Wireshark wasn't an option. 

I tried testing something online and found a vulnerability but it looks like the exploit only worked in PHP 7 and my guess is that the CTF used PHP 8.

![alt text](https://github.com/hemenduroy/Software-Security/blob/main/aCTF/aCTF6/php.png?raw=true)

Exploit - ghtest.py

**Challenge 3 : postbox**

Couldn't solve this one.