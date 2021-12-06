**Level01**

Tried cat, then looked at what a REXX file is because of the magic bytes, tried binwalk and finally just noticed a large amount of spaces at the end. Upon checking a few lines, I noticed that the number of spaces in each line was in the range of lowercase ASCII letters. My script - 

```
f = open("spaces.txt","r")
lines=f.readlines()
spaces=[]
for line in lines:
	count=0
	for char in line:
		if char==" ":
			count+=1
	spaces.append(count)

for i in spaces:
	print(chr(i),end="")
```

Flag - CSE545{SnOmmpmKbyZjGv6TA8thFzn6uVQqwgl9}

**Level02**

Since the flag was encoded in the LSB, I just had to read the LSB of every pixel. 

```
import sys
from PIL import Image


img = Image.open("flag.bmp")

i=0

for y in range(img.size[1]):
    for x in range(img.size[0]):
        pixel = img.getpixel((x, y))
        bit = (pixel[0] & 0x1)
        print(bit,end="")
        i+=1
        if i==1000:
            quit()
```

I got the message -

Good job! Here is a flag for you: CSE545{99hz3p4tfn10pgdxjt57} . Enjoy!

**Level03**

I used binwalk and noticed that there are 2 binaries. Decompiling the next one revealed the flag.

Flag - CSE545{tuodpyfrb5z12sguj7l8}

**Level04**

I followed the hint. Got CRCs by `7z l -slt flag.zip`, sorted them by filename, stored the CRCs in a file. Ran a script to brute force them

```
from itertools import chain, product
import binascii

f = open("crc.txt","r")

crcs=f.readlines()
for i in range(len(crcs)):
	crcs[i]=crcs[i].strip('\n')

def bruteforce(charset, maxlength):
    return (''.join(candidate)
        for candidate in chain.from_iterable(product(charset, repeat=i)
        for i in range(1, maxlength + 1)))

for crc in crcs:
	for i in list(bruteforce('ABCDEFGHIJKLMNOPQRSTUVWXYZ{}abcdefghijklmnopqrstuvwxtz1234567890', 2)):
		i=bytes(i, 'utf-8')
		if binascii.crc32(i) == int(crc,16):
			print(i.decode("utf-8"),end="")
```

Flag - CSE545{G63rZIeZxWxrkB9T8haZavp07ospTnL1}
