
with open('countries.txt') as cnt:
    countries = cnt.read().splitlines()

f = open('t1snakes.tab', 'w')
with open('tempsnakes.tab') as f3:
    lines = f3.readlines()

for line in lines:
    tabs = line.split('\t')
    prefix = tabs[0] + '\t' + tabs[1] + '\t' + tabs[2] + '\t' + \
        tabs[3] + '\t' + tabs[4] + '\t' + tabs[5] + '\t'
    found = 0
    for country in countries:
        if country in tabs[6]:
            found += 1
            out = prefix + country + '\n'
            f.write(out)
    if found == 0:
        out = prefix + 'None' + '\n'
        f.write(out)

f.close()
print('alldone')
