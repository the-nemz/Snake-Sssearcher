
with open('snakedataprev.tab') as t2:
    lines = t2.readlines()

t3 = open('snakedata.tab', 'w')
for line in lines:
    line = line[:-1]
    tabs = line.split('\t')

    badcoms = tabs[6]
    if 'E:' in badcoms:
        coms = badcoms.split(':')
        tabs[6] = coms[1][1:-2]
        print('Split to:', tabs[6])

    out = tabs[0]
    for tab in tabs[1:]:
        if (len(tab) > 254):
            print('\n\nlong:', tab)
            tab = tab[:254]
            print('crop:', tab)
        out += '\t' + tab
    out += '\n'
    t3.write(out)

print('done')
t2.close()
