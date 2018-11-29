# coding:utf-8
import sys

a = open('data.csv','r')



def WorkTime(Name,Month,Year):
	Flag = 0
	IN = 0
	OUT= 0
	estimate = 0
	num = 0
	for i in a:
		if num >= 1:
			LINE = i.rstrip().split(',')
			time = LINE[0].replace('"','')
			name = LINE[1]
			InOut= LINE[2]
			timestamp=LINE[3]
			year  = time.split('/',3)[0]
			#print year
			month = time.split('/',3)[1]
			#print month
			if year==Year and month==Month and name==Name:
				if Flag==0 and InOut=='出勤':
					IN = timestamp
					Flag = 1
				elif Flag==1 and InOut=='退勤':
					OUT= timestamp
					Flag = 2
				if Flag==2:
					worktime = int(OUT) - int(IN)
					estimate += worktime
					#初期化
					Flag = 0
					IN = 0
					OUT= 0
		num+=1
	return estimate
			





if __name__=='__main__':
	Name  = sys.argv[1]
	Month = sys.argv[2]
	Year  = sys.argv[3]
	#print 'parameter1 is ' + sys.argv[1]
	#print 'parameter2 is ' + sys.argv[2]
	estimate = WorkTime(Name,Month,Year)
	hour = estimate / 3600
	minu = estimate % 3600 / 60
	sec  = estimate % 3600 % 60
	#print str(estimate)
	print str(hour)+'時間'+str(minu)+'分'+str(sec)+'秒'
	paycheck = int(900*hour + 900*minu/60)
	print str(paycheck)
	#print 'result is OK!'
	#print 'result is NG!'

a.close()	
