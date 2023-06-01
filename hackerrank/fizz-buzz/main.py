#!/bin/python3

import math
import os
import random
import re
import sys


#
# Complete the 'fizzBuzz' function below.
#
# The function accepts INTEGER n as parameter.
#

def fizzBuzz(n):
    # Write your code here
    for num in range(n):
        num = num + 1
        three = (num % 3 == 0)
        five = (num % 5 == 0)

        if three and five:
            print('FizzBuzz')
            continue
        if three and not five:
            print('Fizz')
            continue
        if five and not three:
            print('Buzz')
            continue
        if not five or not three:
            print(num)
            continue


if __name__ == '__main__':
    n = int(input().strip())

    fizzBuzz(n)
