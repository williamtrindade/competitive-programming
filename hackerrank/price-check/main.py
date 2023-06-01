#!/bin/python3

import math
import os
import random
import re
import sys


#
# Complete the 'priceCheck' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. STRING_ARRAY products
#  2. FLOAT_ARRAY productPrices
#  3. STRING_ARRAY productSold
#  4. FLOAT_ARRAY soldPrice
#

def priceCheck(products, productPrices, productSold, soldPrice):
    # I used 2 maps to store the prices, because is very simple and o(1) read access.
    original_price_map = dict(zip(products, productPrices))

    sold_price_map = dict(zip(productSold, soldPrice))

    counter_error = 0

    for key, value in sold_price_map.items():
        if original_price_map[key] != sold_price_map[key]:
            counter_error = counter_error + 1

    return counter_error


print(priceCheck(
    {'rice', 'sugar', 'wheat', 'cheese'},
    {16.89, 56.92, 20.89, 345.99},
    {'rice', 'cheese'},
    {18.99, 400.89},
))