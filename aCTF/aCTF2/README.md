# aCTF2 Writeup

**Challenge 1 : uncleservice**

We spent more time on trying to keep the service up rather than fetching flags since that would've fetched us more points at the time.

Patches-
* commented out all the eval() statements although this didn't keep the service up for too long.
* added string.punctuations to the password charset. This kept our service up for around 2 hours and fetched us a lot of points!
* I commented out and modified various print statements in an attempt to cause errors in Red Reboot's pwn tools scripts. The idea was to break statements like `p.recvuntil(<print statement>)` and stop our flag from being collected. Such mitigations worked for a short period of time.

Exploit - uncleexploit.py

**Challenge 2 : wc**

Used binary ninja to decomplie. Tried to understand the get_secret function, but had no luck in doing so. Tried analysing pcap files, had no luck there as well. The one thing we did figure out is that we had to use buffer overflow.

**Challenge 3 : configurations**

We tried to keep the service up by filtering out all non-alphanumeric characters in user input:  
```
    echo "[*] Please enter the name of the configuration parameter:"  
    echo -n "> "  
    read NAME  
    NAME_E=${NAME//[^a-zA-Z0-9]/}  
    echo "[*] Please enter the value of the configuration parameter:"  
    echo -n "> "  
    read VALUE  
    VALUE_E=${VALUE//[^a-zA-Z0-9]/}  
    declare CONFIG_$NAME_E=$VALUE_E  
    ;;  
```