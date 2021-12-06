# Reversing Writeup

## **Level 01**

I decompiled the binary and saw that simply providing `NYduy7SRP8cZy0tR9my6` as the input gives us the flag

## **Level 02**

The same as level01 but with a mangle() function. I reversed the obfuscation in ipython3

```for k in key:
    print(chr(ord(k)- 0x03),end='')

```
## **Level 03**

Like level02 but with an extra step

```for k in key:
    k=ord(k)^2
    print(chr(k- 0x03),end='')

```

## **Level 04**

I threw the 4 equations in wolfram alpha and got the result

equations:

* (c + a * b) - d = 873457778
* b - a = 24297
* c * -5 + d = -378312
* b + d = 116595 #seemed like wolfram didnt support '%' so i just tried it with 116595

final answer: 19805-44102-90161-72493

## **Level 05**

It was a game of true and false conditions leading to one point that set the return value to 1. I manually went through all bit conditions of each byte and got the following binary sequence

`00110111 01000110 01000011 01010110 00110101 01010010 01001111 01001001 01000001 00110100 01011001 00111001 01111001 00110011 01110010 01001000 00110101 00111000 01101000 01010111
`

converted it to ASCII - `7FCV5ROIA4Y9y3rH58hW`

## **Level 06**

Similar to level05. since the return value was initialised with 0, all i had to do was make sure every if condition evaluated to false. final string was - `67gW6YmKvUpaqoAX1F4l`

## **Level 07**

This one seemed really hard at first until I understood what the code was doing. it was a maze game with 'wasd' controls and the end goal being to reach point (1,11). Also, only 0s were valid paths. final string was - `ssssdsssddwdwdddwwwwddd`
