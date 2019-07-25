import sys
import json
# print "This is the name of the script: ", sys.argv[0]
# print "Number of arguments: ", len(sys.argv)
# print "The arguments are: " , str(sys.argv)

serverData = json.loads(sys.argv[1])

totalWaterFilterSold = 0

for month in serverData:
	totalWaterFilterSold += int(serverData[month])

# totalWaterFilterSold = int(sys.argv[1])
pricePerWaterFilter = 2500


if(totalWaterFilterSold > -1 and totalWaterFilterSold < 6):
	percentage = 5
else:
	percentage = 15

totalComission = (pricePerWaterFilter * totalWaterFilterSold * (percentage / 100))

jsonFormat = {
	"totalComission": totalComission,
	"totalUnitsSold": totalWaterFilterSold,
	"totalComissionPecentage": percentage
}

print(json.dumps(jsonFormat))