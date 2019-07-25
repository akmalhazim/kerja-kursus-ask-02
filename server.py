import sys
import json
# print "This is the name of the script: ", sys.argv[0]
# print "Number of arguments: ", len(sys.argv)
# print "The arguments are: " , str(sys.argv)

totalWaterFilterSold = int(sys.argv[1])
pricePerWaterFilter = 2500

if(totalWaterFilterSold > 0 and totalWaterFilterSold < 6):
	totalComission = (pricePerWaterFilter * totalWaterFilterSold * (5 / 100))
else:
	totalComission = (pricePerWaterFilter * totalWaterFilterSold * (15 / 100))

jsonFormat = {
	"totalComission": totalComission
}

print(json.dumps(jsonFormat))