
venomous = ['Atractaspidinae', 'Elapidae', 'Viperidae', 'Boiga',
            'Dispholidus', 'Thelotornis', 'Rhabdophis', 'Malpolon',
            'Philodryas', 'Hydrodynastes gigas', 'Ahaetulla']


with open('t2snakes.tab') as t2:
    lines = t2.readlines()

t3 = open('t3snakes.tab', 'w')
for line in lines:
    line = line[:-1]
    tabs = line.split('\t')
    added = 0
    for venom in venomous:
        if venom in line:
            added = 1
            tabs.append('1')
            break
    if added == 0:
        tabs.append('0')

    out = tabs[0]
    for tab in tabs[1:]:
        out += '\t' + tab
    out += '\n'
    if(len(tabs) != 9):
        print(tabs)
    t3.write(out)

print('done')
t2.close()
