# aCTF0 Writeup

Team members - roy, nana, tristana2006, sagar2101

We placed 5th among 42 teams in total!

**Challenge 1 : babyservice**

The source code revealed that passing '4' when asked to choose an option would give us the backdoor. To patch this, we commented out the backdoor function.

Exploit - babyexploit.py

**Challenge 2 : welcome**

Decompiling in Ghidra revealed that passing 'B' gave us access to the flags. We tried patching this but couldn't do it without killing the service.

For both these challenges, we automated flag collection and submission using Python. We placed our exploit scripts under ~/exploits and used a script (Courtesy:https://medium.com/csictf/cisco-seccon-2020-ad-ctf-2614b27f387a) to repeatedly execute them and submit flags.

Since flags were being deleted/corrupted by other teams, we weren't able to get every flag in every tick. Additionally, our 'welcome' flags were overwritten with fake ones so we missed out on some points for submitting those flags.

Exploit - welcomeexploit.py

**Challenge 3 : configurations**

Tried our best but couldn't get past this one in time. We look forward to reading writeups from the other teams!


## Takeaways

These are some of the tools that the top teams used:

[patchKit](https://github.com/lunixbochs/patchkit) - To patch vulnerable binaries

[wireshark](https://www.wireshark.org/) - To analyze network traffic and figure out what other teams are doing.
