
with open('t1snakes.tab') as t1:
    lines = t1.readlines()

t2 = open('t2snakes.tab', 'w')
for line in lines:
    tabs = line.split('\t')
    out = tabs[1] + ' ' + tabs[2] + '\t' + line
    t2.write(out)
t2.close()
