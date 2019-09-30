import sys
import json

# Declare global variables
totalWaterFilterSold = int(0)
totalComission = float(0)
calculatedResults = []

# Return the amount of comission for a specified value
# @param int count, float price
# @return float price
def calculate(count, price) :
	comission = float(0)
	
	if count > 5 :
		type = 'success'
		comission = float(0.15)
	elif count > 1 :
		type = 'warning'
		comission = float(0.05)
	else :
		type = 'info'
		comission = float(0)

	return {
		"amount": count,
		"comission": price * count * comission,
		"percentage": comission,
		"type": type
	}

# Declare user inputs variable
months = json.loads(sys.argv[1]) # get the months array with amount of water filter sold for that month
pricePerWaterFilter = int(sys.argv[2]) # get the price from the user input

for month in months:
	waterFilterSoldForThisMonth = int(month['value'])
	calculated = calculate(waterFilterSoldForThisMonth, pricePerWaterFilter)

	# set global variables
	calculatedResults.append(calculated)
	totalWaterFilterSold += waterFilterSoldForThisMonth
	totalComission += calculated['comission']

jsonFormat = {
	"totalComission": totalComission,
	"totalUnitsSold": totalWaterFilterSold,
	"calculated": calculatedResults
}

print(json.dumps(jsonFormat))