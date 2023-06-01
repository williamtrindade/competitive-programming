#!/bin/python3

import math
import os
import random
import re
import sys


#
# Complete the 'sockMerchant' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER_ARRAY ar
#

def sockMerchant(n, ar):
    # Write your code here
    hashmap = {}

    for color in ar:
        if color in hashmap:
            hashmap[color] = hashmap[color] + 1
        else:
            hashmap[color] = 1

    counter = 0

    for color, quantity in hashmap.items():
        if math.floor(quantity / 2) >= 1:
            counter = counter + math.floor(quantity / 2)

    return counter


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    ar = list(map(int, input().rstrip().split()))

    result = sockMerchant(n, ar)

    fptr.write(str(result) + '\n')

    fptr.close()
