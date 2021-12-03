# aCTF4 Writeup

I played this one solo, just for fun. The Team played on saturday this week.


**Challenge 1 : Blackgold**

I tried figuring it out but couldn't. Eventually, I stole an exploit using wireshark and also wrote a script to automate flag collection and submission. The problem was that at the end of the payload, 2 addresses were being passed. Since these addresses are not constant, my exploit was segfaulting on every I We tried figuring out the logic so I could get an offset and calculate the address myself but could not.

Exploit - stolen_black.py

**Challenge 2 : gdps**

I spent time trying to reverse the encryption but couldnt get it done in time.

**Challenge 3 : dungeon**

Couldn't solve this one

## Takeaways

It was a good opportunity for me to get the hang of wireshark and I had fun using it.