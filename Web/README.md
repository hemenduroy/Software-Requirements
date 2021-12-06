# Web Writeup

**Level 01** 

I looked at the sources and got the verify function. The login credentials were username:`script` and password:`kiddie`
secret - `Your First Blood`

**Level 02**

I looked at the source and understood that the list of users were being fetched from `/cgi-bin/users.php`. However, when I tried accessing the file, I was met with 'No users'. I then tried running `fetch('http://webexploit.cse545.io:8082/cgi-bin/users.php` from the chrome console and realised that the referer was important. I then tested my theory by running

`curl --referer http://webexploit.cse545.io:8082/users.html 'http://webexploit.cse545.io:8082/cgi-bin/users.php?filter=root`

it printed only `root`

Then, I tried using `filter=a` and it printed all users containing an a

I then realised that it is running a shell command probably ending with grep. So i tried command injection

```
roy@ubuntu:~$ curl --referer http://webexploit.cse545.io:8082/users.html 'http://webexploit.cse545.io:8082/cgi-bin/users.php?filter=;ls'
<pre>
myid
secretuser.txt
users.php
</pre>
```

and then

```
roy@ubuntu:~$ curl --referer http://webexploit.cse545.io:8082/users.html 'http://webexploit.cse545.io:8082/cgi-bin/users.php?filter=;cat%20secretuser.txt'
<pre>
allyourbasebelongtous
</pre>
```

very cool!

**Level 03**
I found that not passing an ID gives us an ID. I then passed Mike's details and got his ID. Then i passed nothing but the ID and got the secret, `Hack the planet!`.

**Level 04**
I figured out that there was a javascript injection vulnerability. I tried injecting php too but that got commented using `<!--?` and `-->` so I presumed that was some sort of protection. I spent a lot of time injecting javascript code but didn't make any headway. Finally, I got Fish's hint to check for session files. I got the name of the file using the vuln from level02. When i injected random php code, some code got leaked out and it was listing files. I keyed in `../sess_91c7e1e10744d69fd8fe35ecfc` and got the secret, `thisissuchasimplesecret`

**Level 05**
After numerous rickrolls, i figured out that the answer lay in the error messages. a blacklist cookie needed to be set and once i set it, it needed to be alphanumeric. Once I did that, it threw a python error saying the file couldnt be read. I then passed legitimate filenames such as `store` and `receive` (the two pages) and was able to read the python scripts. the password was `terriblechoice`. I then used this password with admin mode to retrieve all passwords and usernames from all IDs. Got mike's password, `wel0vesecurity`

**Level 06**
It was detecting a browser. naturally, i looked at the user agent field. modifying it threw errors indicating that it was trying to read files by appending `.php` to the field. also, using curl gives an error because the website wasnt programmed to handle curl. i checked files under `/tmp/` and found `x.php`. passing `/tmp/x` revealed the secret, `SuperMegaSecretNoGuessing`

**Level 07**
I found an sql injection vulnerability in the username field of the registration page. After some trial and error, the final string i passed to the username field was

`notexist' UNION SELECT password,username,email,firstname,1,1 FROM users WHERE username LIKE '%`

flag - `GoodInjectionCongrats`

**Level 08**
I used burpsuite to anaylse and noticed that responses contained `302` codes, a google search indicated that it meant redirection due to a temporary unavailability of a requested resource. I then attempted to replace them with `200` OK codes and that worked. got the flag - `SecretAfterRedirect`